<?php


namespace Modules\Admin\Repositories\Upload;


interface UploadRepoInterface
{
    /**
     * Upload hình ảnh
     *
     * @param $input
     * @return mixed
     */
    public function uploadImage($input);
}