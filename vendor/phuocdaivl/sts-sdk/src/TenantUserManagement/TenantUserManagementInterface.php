<?php
namespace DaiDP\StsSDK\TenantUserManagement;

use DaiDP\StsSDK\HttpClient\ReponseData;

/**
 * Interface TenantUserManagementInterface
 * @package DaiDP\StsSDK\Providers
 * @author DaiDP
 * @since Sep, 2019
 */
interface TenantUserManagementInterface
{
    /**
     * Set ID Tenant
     *
     * @param $idTenant
     * @return TenantUserManagementInterface
     */
    public function setTenantId($idTenant);

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
     * @param $username
     * @param $password
     * @return mixed
     */
    public function resetPassword($username, $password);

    /**
     * Đổi mật khẩu
     *
     * @param $username
     * @param $oldPassword
     * @param $newPassword
     * @return mixed
     */
    public function changePassword($username, $oldPassword, $newPassword);

    /**
     * Đăng nhập
     *
     * @param $username
     * @param $password
     * @return mixed
     */
    public function login($username, $password);

    /**
     * Refresh token
     *
     * @param $refreshToken
     * @return ReponseData
     */
    public function refreshToken($refreshToken);
}