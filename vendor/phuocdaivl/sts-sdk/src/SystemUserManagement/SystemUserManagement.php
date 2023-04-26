<?php
namespace DaiDP\StsSDK\SystemUserManagement;

use DaiDP\StsSDK\HttpClient\UMClient;

/**
 * Interface UserManagement
 * @package DaiDP\StsSDK\Providers
 * @author DaiDP
 * @since Sep, 2019
 */
class SystemUserManagement implements SystemUserManagementInterface
{
    /**
     * @var UMClient
     */
    protected $client;


    /**
     * UserManagement constructor.
     */
    public function __construct()
    {
        $this->client = app()->get('daidp.sts.sys_user_client');
    }

    /**
     * Đăng ký user mới
     *
     * @param $data
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function register($data)
    {
        return $this->client->post('/api/v1/users/register', $data);
    }

    /**
     * Đặt lại mật khẩu mới
     *
     * @param $email
     * @param $password
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function resetPassword($email, $password)
    {
        $data = [
            'email'           => $email,
            'newpassword'     => $password,
            'confirmpassword' => $password
        ];

        return $this->client->post('/api/v1/users/resetpassword', $data);
    }

    /**
     * Đổi mật khẩu
     *
     * @param $email
     * @param $oldPassword
     * @param $newPassword
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function changePassword($email, $oldPassword, $newPassword)
    {
        $data = [
            'email'           => $email,
            'currentpassword' => $oldPassword,
            'newpassword'     => $newPassword,
            'confirmpassword' => $newPassword
        ];

        return $this->client->post('/api/v1/users/changepassword', $data);
    }

    /**
     * Đăng nhập
     *
     * @param $email
     * @param $password
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function login($email, $password)
    {
        $data = [
            'grant_type' => 'password',
            'scope'      => 'openid offline_access',
            'username'   => $email,
            'password'   => $password
        ];

        return $this->client->token('/connect/token', $data);
    }

    /**
     * Refresh access token
     *
     * @param $refreshToken
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refreshToken($refreshToken)
    {
        $data = [
            'grant_type'    => 'refresh_token',
            'refresh_token' => $refreshToken
        ];

        return $this->client->token('/connect/token', $data);
    }

    /**
     * xóa tài khoản
     *
     * @param $uid
     * @return mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($uid)
    {
        return $this->client->delete('api/v1/users/'.$uid);
    }
}
