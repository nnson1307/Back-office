<?php

namespace Modules\User\Repositories\User;

use Modules\User\Http\Api\UserApi;
use Modules\User\Models\UserTable;
use MyCore\Http\Response\ResponseFormatTrait;

/**
 * User repository
 *
 * @author isc-daidp
 * @since Feb 23, 2018
 */
class UserRepository implements UserRepositoryInterface
{
    use ResponseFormatTrait;
    /**
     * @var UserTable
     */
    protected $user;
    protected $user_api;
    protected $timestamps = true;


    public function __construct(UserTable $user, UserApi $user_api)
    {
        $this->user = $user;
        $this->user_api = $user_api;
    }


    /**
     * Lấy danh sách user
     */
    public function getList(array $filters = [])
    {
        return $this->user->getListNew($filters);
    }

    /**
     * Xóa user
     */
    public function remove($id)
    {
        $this->user->remove($id);
    }


    /**
     * Thêm user
     */
    public function add(array $data)
    {
        return $this->user->add($data);
    }

    public function getItem($id)
    {
        // TODO: Implement getItem() method.
        return $this->user->getItem($id);
    }

    public function edit(array $data, $id)
    {
        // TODO: Implement edit() method.
        return $this->user->edit($data, $id);
    }

    public function getUserToken($token)
    {
        // TODO: Implement getUserToken() method.
        return $this->user->getUserToken($token);
    }

    public function resetPassword(array $data = [])
    {
        // TODO: Implement resetPassword() method.
        return $this->user_api->resetPassword($data);
    }

    public function twoFactorAuth(array $data = [])
    {
        // TODO: Implement twoFactorAuth() method.
        $data= $this->user_api->twoFactorAuth($data);
        return $data['Result'];
    }

    public function getItemUser($id)
    {
        $result = $this->user->getItem($id);
        return $this->responseJson(CODE_SUCCESS, null, $result);
    }

    public function searchUser($name, $phone, $code)
    {
        $result = $this->user->searchUser($name, $phone, $code);
        return $this->responseJson(CODE_SUCCESS, null, $result);
    }
}
