<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 9/19/2019
 * Time: 4:01 PM
 */

namespace Modules\User\Http\Controllers;

use Modules\User\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use MyCore\Http\Response\ResponseFormatTrait;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Thông tin khách hàng theo id.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function getItemUser(Request $request)
    {
        $filters = $this->validate($request, [
            'user_id' => 'required|int',
        ]);
        return $this->user->getItemUser($filters['user_id']);
    }

    public function searchUser(Request $request)
    {
        $filters = $this->validate($request, [
            'full_name' => 'nullable',
            'phone' => 'nullable',
            'user_code' => 'nullable',
        ]);
        return $this->user->searchUser(
            $filters['full_name'],
            $filters['phone'],
            $filters['user_code']
        );
    }
}