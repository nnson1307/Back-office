<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 9/19/2019
 * Time: 10:07 AM
 */

namespace Modules\BrandApi\Http\Controllers;

use Illuminate\Http\Request;
use Modules\BrandApi\Repositories\User\UserRepositoryInterface;

class UserController extends Controller
{
    protected $user;

    public function __construct(
        UserRepositoryInterface $user
    ) {
        $this->user = $user;
    }

    /**
     * Tìm kiếm cửa hàng theo tên.
     * @param Request $request
     *
     * @return mixed
     */
    public function search(Request $request)
    {
        $filters = $this->validate($request, [
            'user_id' => 'nullable',
            'fullname' => 'nullable',
            'phone' => 'nullable',
            'user_in' => 'nullable',
        ]);
        return $this->user->search($filters);
    }
}