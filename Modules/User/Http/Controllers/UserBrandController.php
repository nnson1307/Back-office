<?php

namespace Modules\User\Http\Controllers;

use Carbon\Carbon;
use DaiDP\StsSDK\SystemUserManagement\SystemUserManagementInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\User\Repositories\Admin\AdminRepositoryInterface;
use Modules\User\Repositories\AdminBrand\AdminBrandRepositoryInterface;
use Modules\User\Repositories\User\UserRepositoryInterface;
use Modules\User\Models\AdminMenuTable;

/**
 * User manager
 *
 * @author isc-daidp
 * @since Feb 23, 2018
 */
class UserBrandController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    protected $user;
    protected $adminMenu;
    protected $adminBrand;

    public function __construct(
        UserRepositoryInterface $user,
        AdminBrandRepositoryInterface $adminBrand
    ) {
        $this->user = $user;
        $this->adminMenu = new AdminMenuTable();
        $this->adminBrand = $adminBrand;
    }

    public function index()
    {
        $filter = request()->all();

        $data = $this->adminBrand->list($filter);

        return view('user::brand-portal.index', ['LIST' => $data, 'filter' => $filter]);
    }

    public function create()
    {
        $optionAdminMenu = $this->adminMenu->getOption();

        return view('user::brand-portal.create', ['optionAdminMenu' => $optionAdminMenu]);
    }

    public function store(Request $request)
    {
        $param = $request->only('full_name', 'email', 'password', 'password_confirm','default_menu');
        $mes = [
            'full_name.required' => __('user::validation.store.PLEASE_ENTER_NAME'),
            'email.required' => __('user::validation.store.PLEASE_ENTER_EMAIL'),
            'email.email' => __('user::validation.store.PLEASE_ENTER_EMAIL'),
            'email.unique' => __('user::validation.store.EMAIL_EXIST'),
            'password.required' => __('user::validation.store.PLEASE_ENTER_PASSWORD'),
            'password.min' => __('user::validation.store.PASSWORD_LENGTH'),
            'default_menu.required' => __('user::validation.store.PLEASE_ENTER_ADMIN_MENU'),
        ];
        $validator = \Validator::make($param, [
            'full_name' => 'required',
            'email' => 'required|email|unique:admin,email,' . ',id,is_deleted,0',
            'password' => ['required', 'min:6'],
            'default_menu' => 'required',
        ], $mes);

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                '_error' => $validator->errors()->all(),
                'message' => 'Thêm thất bại'
            ]);
        } else {

            $param['full_name'] = strip_tags($param['full_name']);
            $param['email'] = strip_tags($param['email']);
            $param['is_admin'] = 0;
            $param['is_actived'] = 1;
            $param['is_deleted'] = 0;
            $param['created_at'] = date('Y-m-d H:m:i');
            $param['updated_at'] = date('Y-m-d H:m:i');

            $umSDK  = app(SystemUserManagementInterface::class);
            $data = [
                'username' => strip_tags($param['email']),
                'fullname' => strip_tags($param['full_name']),
                'email' => strip_tags($param['email']),
                'password' => $param['password'],
                'confirmpassword' => $param['password_confirm'],
            ];
            $result = $umSDK->register($data);

            unset($param['password'], $param['password_confirm']);

            if(!$result->error){
                $resultData = $result->data;
                $param['admin_code'] = $resultData['id'];
                $this->adminBrand->store($param);
                return response()->json([
                    'error' => false,
                    'message' => 'Thêm thành công'
                ]);
            } else {
                return response()->json([
                    'error' => true,
                    'message' => 'Thêm thất bại'
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $this->adminBrand->destroy($id);
        Session::flash('remove-user', 'true');
        return redirect()->route('user.my-store');
    }

    public function edit($id)
    {
        $data = $this->adminBrand->getItem($id);
        $optionAdminMenu = $this->adminMenu->getOption();
        return view('user::brand-portal.edit', ['data' => $data, 'optionAdminMenu' => $optionAdminMenu]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $param = $request->only('id', 'full_name', 'is_actived', 'password', 'default_menu');
//        $param = $request->only('id', 'full_name', 'is_actived', 'default_menu');

        if ($param['password'] == null) {
            unset($param['password']);
            $mes = [
                'full_name.required' => __('user::validation.edit.PLEASE_ENTER_NAME'),
                'is_actived.required' => __('user::validation.edit.PLEASE_ACTIVE'),
                'default_menu.required' => __('user::validation.store.PLEASE_ENTER_ADMIN_MENU'),
            ];
            $validator = \Validator::make($param, [
                'full_name' => 'required',
                'is_actived' => 'required',
                'default_menu' => 'required',
            ], $mes);
        } else {
            $mes = [
                'full_name.required' => __('user::validation.edit.PLEASE_ENTER_NAME'),
                'is_actived.required' => __('user::validation.edit.PLEASE_ACTIVE'),
                'default_menu.required' => __('user::validation.store.PLEASE_ENTER_ADMIN_MENU'),
                'password.required' => __('user::validation.store.PLEASE_ENTER_PASSWORD'),
                'password.min' => __('user::validation.store.PASSWORD_LENGTH'),
            ];
            $validator = \Validator::make($param, [
                'full_name' => 'required',
                'is_actived' => 'required',
                'default_menu' => 'required',
                'password' => ['required', 'min:6'],
            ], $mes);
            $param['password'] = bcrypt($param['password']);
        }

        if ($validator->fails()) {
            return response()->json([
                'error' => true,
                '_error' => $validator->errors()->all(),
                'message' => 'Thêm thất bại'
            ]);
        } else {

            if ($param['password'] !== null) {
                $umSDK  = app(SystemUserManagementInterface::class);
                $result = $umSDK->resetPassword(Auth::user()->email, $param['password'], $param['password']);
            }
            $param['full_name'] = strip_tags($param['full_name']);
            $param['is_actived'] = strip_tags($param['is_actived']);
            $param['updated_at'] = date('Y-m-d H:m:i');
            $this->adminBrand->edit($param, $param['id']);
            return response()->json([
                'error' => false,
                'message' => 'Thêm thành công'
            ]);
        }
    }
}
