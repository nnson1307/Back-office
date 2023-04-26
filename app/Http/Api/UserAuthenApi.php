<?php
namespace App\Http\Api;

use MyCore\Api\ApiAbstract;

/**
 * Created by PhpStorm.
 * User: daidp
 * Date: 11/19/2018
 * Time: 11:23 AM
 */

class UserAuthenApi extends ApiAbstract
{



    public function __construct()
    {
        $this->baseUrlApi = '123123123';
    }

    /**
     * Login API
     *
     * @param $data
     * @return mixed
     * @throws \MyCore\Api\ApiException
     */
    public function login($data)
    {
        return $this->baseClient('/login', $data);
    }


    public function loginAut($data)
    {
        return $this->baseClient('/login-verify', $data);
    }


    public function getUserLogin()
    {
        return $this->baseClient('/user', []);
    }
}