<?php
/**
 * Created by PhpStorm
 * User: manh
 * Date: 03/30/2021
 * Time: 11:04 AM
 */
namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Repositories\Upload\UploadRepoInterface;

class UploadController extends Controller
{
    protected $upload;

    public function __construct(
        UploadRepoInterface $upload
    ) {
        $this->upload = $upload;
    }

    /**
     * Upload image
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImageAction(Request $request)
    {
        $data = $this->upload->uploadImage($request->all());
        return response()->json($data);
    }
}