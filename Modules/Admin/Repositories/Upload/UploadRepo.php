<?php

namespace Modules\Admin\Repositories\Upload;

use App\Http\Middleware\S3UploadsRedirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class UploadRepo implements UploadRepoInterface
{
    protected $s3Disk;

    public function __construct(
        S3UploadsRedirect $s3
    ) {
        $this->s3Disk = $s3;
    }

    /**
     * Upload hình ảnh
     *
     * @param $input
     * @return mixed|void
     */
    public function uploadImage($input)
    {
        if ($input['file'] != null) {
            $fileName = $this->uploadImageS3($input['file'], $input['link']);
            return [
                'error' => 0,
                'file' => $fileName
            ];
        }
    }

    /**
     * Lưu ảnh vào folder temp
     *
     * @param $file
     * @param $link
     * @return string
     */
    private function uploadImageS3($file, $link)
    {
        $time = Carbon::now();
        $idTenant = 'backoffice';

        $to = $idTenant . '/' . date_format($time, 'Y') . '/' . date_format($time, 'm') . '/' . date_format($time, 'd') . '/';

        $file_name =
            str_random(5) .
            rand(0, 9) .
            time() .
            date_format($time, 'd') .
            date_format($time, 'm') .
            date_format($time, 'Y') .
            $link .
            $file->getClientOriginalExtension();
        Storage::disk('public')->put( $to . $file_name, file_get_contents($file), 'public');
        //Lấy real path trên s3
        $realPath = $this->s3Disk->getRealPath($to. $file_name);
        return $realPath;
    }
}