<?php
/**
 * Created by PhpStorm   .
 * User: Mr Son
 * Date: 2020-02-12
 * Time: 3:16 PM
 * @author SonDepTrai
 */

namespace Modules\Admin\Repositories\Profile;


interface ProfileRepoInterface
{
    /**
     * Lấy thông tin tài khoản
     *
     * @param $id
     * @return mixed
     */
    public function getInfo($id);

    /**
     * Upload hình ảnh
     *
     * @param $fileName
     * @return mixed
     */
    public function uploadAvatar($fileName);

    /**
     * Chỉnh sửa thông tin cá nhân
     *
     * @param $data
     * @return mixed
     */
    public function editProfile($data);

    /**
     * Chỉnh sửa mật khẩu
     *
     * @param $data
     * @return mixed
     */
    public function submitChangePass($data);
}