<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use MyCore\Storage\Azure\UploadFileToAzureManager;

class UploadImgController extends Controller
{
    private $uploadManager;

    public function __construct(UploadFileToAzureManager $uploadManager)
    {
        $this->uploadManager = $uploadManager;
    }

    public function upload(Request $request)
    {
        $result = $this->uploadManager->doUpload($request->file('file'));

        return response()->json([
            'success' => 1,
            'file' => $result['public_path']
        ]);
    }
}
