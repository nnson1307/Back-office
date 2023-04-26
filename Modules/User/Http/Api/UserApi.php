<?php


namespace Modules\User\Http\Api;


use MyCore\Api\ApiAbstract;

class UserApi extends ApiAbstract
{
    protected $baseUrlApi = '';

    public function resetPassword(array $data=[])
    {
        return $this->baseClient('/user/reset-password',$data);
    }

    public function twoFactorAuth(array $data=[])
    {
        return $this->baseClient('/login-verify',$data);
    }
}