<?php
/**
 * Created by PhpStorm   .
 * User: Mr Son
 * Date: 2020-02-12
 * Time: 3:16 PM
 * @author SonDepTrai
 */

namespace Modules\Admin\Repositories\Profile;


use DaiDP\StsSDK\SystemUserManagement\SystemUserManagementInterface;
use DaiDP\StsSDK\TenantUserManagement\TenantUserManagementInterface;
use Modules\Admin\Models\AdminTable;
use MyCore\Storage\Azure\UploadFileToAzureManager;

class ProfileRepo implements ProfileRepoInterface
{
    protected $profile;
    protected $uploadManager;

    public function __construct(
        AdminTable $profile,
        UploadFileToAzureManager $uploadManager
    ) {
        $this->profile = $profile;
        $this->uploadManager = $uploadManager;
    }

    /**
     * Lấy thông tin tài khoản
     *
     * @param $id
     * @return array|mixed
     */
    public function getInfo($id)
    {
        $info = $this->profile->getInfo($id);

        return [
            'item' => $info
        ];
    }

    /**
     * Upload hình ảnh
     *
     * @param $fileName
     * @return mixed
     */
    public function uploadAvatar($fileName)
    {
        $result = $this->uploadManager->doUpload($fileName);

        return $result['public_path'];
    }

    /**
     * Chỉnh sửa thông tin tài khoản
     *
     * @param $data
     * @return array|mixed
     */
    public function editProfile($data)
    {
        try {

            $this->profile->edit($data, Auth()->id());

            return [
                'error' => 0,
                'message' => __('admin::validation.profile.EDIT_SUCCESS')
            ];
        } catch (\Exception $e) {
            return [
                'error' => 1,
                'message' => __('admin::validation.profile.EDIT_ERROR')
            ];
        }
    }

    /**
     * Chỉnh sửa mật khẩu
     *
     * @param $data
     * @return array|mixed
     */
    public function submitChangePass($data)
    {
        try {
            $tk = $this->profile->getInfo(Auth()->id());
            $umSDK = app(SystemUserManagementInterface::class);

            $result = $umSDK->changePassword($tk['email'], $data['current_pass'], $data['new_pass']);

            if (!$result->error) {
                return [
                    'error' => 0,
                    'message' => __('admin::validation.change_pass.CHANGE_SUCCESS')
                ];
            } else {
                return [
                    'error' => 1,
                    'message' => __('admin::validation.change_pass.CURRENT_PASS_VALID')
                ];
            }
        } catch (\Exception $e) {
            return [
                'error' => 1,
                'message' => __('admin::validation.change_pass.CHANGE_ERROR')
            ];
        }
    }
}