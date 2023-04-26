<?php
namespace DaiDP\StsSDK\SystemUserManagement;

use DaiDP\StsSDK\HttpClient\ReponseData;

/**
 * Interface UserManagementInterface
 * @package DaiDP\StsSDK\Providers
 * @author DaiDP
 * @since Sep, 2019
 */
interface SystemUserManagementInterface
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
     * @param $email
     * @param $password
     * @return ReponseData
     */
    public function resetPassword($email, $password);

    /**
     * Đổi mật khẩu
     *
     * @param $email
     * @param $oldPassword
     * @param $newPassword
     * @return ReponseData
     */
    public function changePassword($email, $oldPassword, $newPassword);

    /**
     * Đăng nhập
     *
     * @param $email
     * @param $password
     * @return ReponseData
     */
    public function login($email, $password);

    /**
     * Refresh token
     *
     * @param $refreshToken
     * @return ReponseData
     */
    public function refreshToken($refreshToken);
}