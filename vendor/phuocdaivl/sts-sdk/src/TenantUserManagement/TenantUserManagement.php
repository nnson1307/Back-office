<?php
namespace DaiDP\StsSDK\TenantUserManagement;

use DaiDP\StsSDK\HttpClient\ReponseData;
use DaiDP\StsSDK\HttpClient\UMClient;

/**
 * Class TenantUserManagement
 * @package DaiDP\StsSDK\UserManagement
 * @author DaiDP
 * @since Sep, 2019
 */
class TenantUserManagement implements TenantUserManagementInterface
{
    /**
     * @var string
     */
    protected $idTenant = null;

    /**
     * @var UMClient
     */
    protected $client;


    /**
     * TenantUserManagement constructor.
     */
    public function __construct()
    {
        $this->client = app()->get('daidp.sts.tenant_user_client');
    }

    /**
     * Set ID Tenant
     *
     * @param $idTenant
     * @return TenantUserManagementInterface
     */
    public function setTenantId($idTenant)
    {
        $this->idTenant = $idTenant;
        return $this;
    }

    /**
     * Đăng ký user mới
     *
     * @param $data
     * @return ReponseData
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function register($data)
    {
        $url = $this->buildUrl('/portal/api/v1/users/register');

        return $this->client->post($url, $data);
    }

    /**
     * Đặt lại mật khẩu mới
     *
     * @param $username
     * @param $password
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function resetPassword($username, $password)
    {
        $url  = $this->buildUrl('/portal/api/v1/users/resetpassword');
        $data = [
            'email'        => $username,
            'newpassword'     => $password,
            'confirmpassword' => $password
        ];

        return $this->client->post($url, $data);
    }

    /**
     * Đổi mật khẩu
     *
     * @param $username
     * @param $oldPassword
     * @param $newPassword
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changePassword($username, $oldPassword, $newPassword)
    {
        $url  = $this->buildUrl('/portal/api/v1/users/changepassword');
        $data = [
            'email'        => $username,
            'currentpassword' => $oldPassword,
            'newpassword'     => $newPassword,
            'confirmpassword' => $newPassword
        ];

        return $this->client->post($url, $data);
    }

    /**
     * Đăng nhập
     *
     * @param $username
     * @param $password
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function login($username, $password)
    {
        $url  = $this->buildUrl('/portal/connect/token');
        $data = [
            'grant_type' => 'password',
            'scope'      => 'openid offline_access',
            'username'   => $username,
            'password'   => $password
        ];

        return $this->client->token($url, $data);
    }

    /**
     * Refresh token
     *
     * @param $refreshToken
     * @return ReponseData
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refreshToken($refreshToken)
    {
        $url  = $this->buildUrl('/portal/connect/token');
        $data = [
            'grant_type'    => 'refresh_token',
            'refresh_token' => $refreshToken
        ];

        return $this->client->token($url, $data);
    }

    /**
     * Build Url tenant
     *
     * @param $url
     * @return string
     */
    protected function buildUrl($url)
    {
        return '/' . $this->idTenant . $url;
    }
}