<?php
namespace DaiDP\StsSDK\UserManagement;

use DaiDP\StsSDK\HttpClient\ReponseData;

/**
 * Interface UserManagementInterface
 * @package DaiDP\StsSDK\Providers
 * @author DaiDP
 * @since Sep, 2019
 */
interface UserManagementInterface
{
    /**
     * Đăng ký user mới
     *
     * @param $data
     * @return ReponseData
     */
    public function register($data);

    /**
     * Đặt lại mật khẩu mới
     *
     * @param $phone
     * @param $password
     * @return ReponseData
     */
    public function resetPassword($phone, $password);

    /**
     * Đổi mật khẩu
     *
     * @param $phone
     * @param $oldPassword
     * @param $newPassword
     * @return ReponseData
     */
    public function changePassword($phone, $oldPassword, $newPassword);

    /**
     * Đăng nhập
     *
     * @param $phone
     * @param $password
     * @return ReponseData
     */
    public function login($phone, $password);

    /**
     * Refresh token
     *
     * @param $refreshToken
     * @return ReponseData
     */
    public function refreshToken($refreshToken);
}