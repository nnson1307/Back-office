<?php

namespace Modules\User\Repositories\Admin;

use App\Mail\ResetPassword;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\User\Models\AdminForgotPassTable;
use Modules\User\Models\AdminGroupTable;
use Modules\User\Models\AdminTable;
use Modules\User\Repositories\AdminHasGroup\AdminHasGroupRepositoryInterface;
use DaiDP\StsSDK\SystemUserManagement\SystemUserManagementInterface;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminRepository implements AdminRepositoryInterface
{
    /**
     * @var AdminTable
     */
    protected $admin;
    protected $adminHasGroup;
    protected $adminGroup;
    protected $forgotPass;
    protected $timestamps = true;

    public function __construct(
        AdminTable $admin,
        AdminGroupTable $adminGroup,
        AdminHasGroupRepositoryInterface $adminHasGroup
    ) {
        $this->admin = $admin;
        $this->adminGroup = $adminGroup;
        $this->adminHasGroup = $adminHasGroup;
        $this->forgotPass = new AdminForgotPassTable();
    }

    /**
     * Lấy danh sách user
     *
     * @param array $filters
     * @return mixed
     */
    public function getList(array $filters = [])
    {
        $filters['admin$is_admin'] = 0;
        if (!isset($filters['sort_admin$email'])) {
            $filters['sort_admin$email'] = null;
        }
        if (!isset($filters['sort_admin$full_name'])) {
            $filters['sort_admin$full_name'] = null;
        }
        if (!isset($filters['sort_admin$is_actived'])) {
            $filters['sort_admin$is_actived'] = null;
        }
        $check = $filters;
        $check = array_filter($check);
        if (count($check) == 0) {
            $filters['sort_admin$email'] = 'desc';
        }
        $data = $this->admin->getListNew($filters);
        $result = [
            'data' => $data,
            'filters' => $filters,
        ];
        return $result;
    }

    /**
     * Xóa user
     *
     * @param int $id
     * @return mixed
     */
    public function destroy($id)
    {
        $tk=$this->admin->getItem($id);
        $umSDK = app(SystemUserManagementInterface::class);

        $result = $umSDK->delete($tk['admin_code']);
        $this->admin->remove($id);
    }

    /**
     * Thêm user
     *
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        $arrayRoleGroup = [];
        if (isset($data['arrayRoleGroup'])) {
            $arrayRoleGroup = $data['arrayRoleGroup'];
        }

        $param['full_name'] = strip_tags($data['full_name']);
        $param['email'] = strip_tags($data['email']);
        $param['is_admin'] = 0;
        $param['is_actived'] = $data['isActive'];
        $param['is_deleted'] = 0;
        $param['created_at'] = date('Y-m-d H:m:i');
        $param['updated_at'] = date('Y-m-d H:m:i');

        $umSDK = app(SystemUserManagementInterface::class);
        $dataUmSDK = [
            'username' => strip_tags($data['email']),
            'fullname' => strip_tags($data['full_name']),
            'email' => strip_tags($data['email']),
            'password' => $data['password'],
            'confirmpassword' => $data['password'],
        ];


        $result = $umSDK->register($dataUmSDK);

        unset($param['password_confirm']);

        if (!$result->error) {
            $resultData = $result->data;
            $param['admin_code'] = $resultData['id'];
            $adminId = $this->admin->store($param);

            if ($arrayRoleGroup != null) {
                $insertAdminHasGroup = [];
                foreach ($arrayRoleGroup as $key => $value) {
                    $insertAdminHasGroup[] = [
                        'admin_id' => $adminId,
                        'group_id' => $value,
                        'is_deleted' => 0,
                        'created_by' => Auth::id(),
                        'updated_by' => Auth::id(),
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];

                }
                $this->adminHasGroup->addMultipleRecords($insertAdminHasGroup);
            }

            return response()->json([
                'error' => false,
                'data' => __('user::store-user.create.CREATE_SUCCESS')
            ]);
        } else {
            $message =  __('user::store-user.create.CREATE_FAIL');
            if (isset($result->data['errors']) &&
                sizeof($result->data['errors']) > 0 &&
                isset($result->data['errors'][0]['description'])) {
                $message = $result->data['errors'][0]['description'];
            }
            return response()->json([
                'error' => true,
                'data' => $message
            ]);
        }
    }

    public function getItem($id)
    {
        return $this->admin->getItem($id);
    }

    public function edit(array $data, $id)
    {
        if (!isset($data['password']) || $data['password'] == null) {
            unset($data['password']);
        }
// else {
////            $param['password'] = bcrypt($data['password']);
//            if (isset($data['password'])) {
//                $umSDK = app(SystemUserManagementInterface::class);
//                $result = $umSDK->resetPassword(
//                    Auth::user()->email,
//                    $data['password'],
//                    $data['password']
//                );
//            }
//        }
        $param['full_name'] = strip_tags($data['full_name']);
        $param['is_actived'] = strip_tags($data['is_actived']);
        $param['updated_at'] = date('Y-m-d H:m:i');
        //Xóa hết nhóm quyền của user.
        $this->adminHasGroup->removeByUser($data['id']);
//        dd($data['arrayRoleGroup']);
        if (isset($data['arrayRoleGroup']) && count($data['arrayRoleGroup'])) {
            //Nếu tồn tại nhóm quyền thì add quyền cho user.
            foreach ($data['arrayRoleGroup'] as $key => $value) {
                $insertAdminHasGroup = [
                    'admin_id' => $data['id'],
                    'group_id' => $value,
                    'is_deleted' => 0,
                    'created_by' => Auth::id(),
                    'updated_by' => Auth::id(),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];
                $this->adminHasGroup->addMultipleRecords($insertAdminHasGroup);
            }
        }
        if ($data['is_actived'] == 1) {
            DB::table('admin_lock_out')->where('admin_id', $id)->delete();
        }
        $edit = $this->admin->edit($param, $data['id']);
        return response()->json([
            'error' => false,
            'message' => ''
        ]);
//        if ($edit) {
//            return response()->json([
//                'error' => false,
//                'message' => ''
//            ]);
//        } else {
//            return response()->json([
//                'error' => true,
//                'message' => ''
//            ]);
//        }
    }

    /**
     * Lấy danh sách admin không phân trang
     *
     * @param array $filters
     * @return mixed
     */
    public function getListAll(array $filters = [])
    {
        return $this->admin->getListAll($filters)->toArray();
    }

    /**
     * Lấy danh sách quyền truy cập người dùng
     *
     * @param int $admin_id
     * @return array|mixed
     */
    public function getListActionById($admin_id)
    {
        $result = $this->admin->getListActionById($admin_id)->toArray();

        return $result;
    }


    /**
     * Chỉnh sửa trạng thái my store user
     *
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function changeStatus(array $data, $id)
    {
        if ($data['is_actived'] == 1) {
            DB::table('admin_lock_out')->where('admin_id', $id)->delete();
        }
        // TODO: Implement changeStatus() method.
        return $this->admin->changeStatus($data, $id);
    }

    public function updatePassword(array $data, $id)
    {
        $tk = $this->admin->getItem($id);
        $umSDK = app(SystemUserManagementInterface::class);
        $pass = isset($data['password']) ? $data['password'] : '23873463';
        $result = $umSDK->resetPassword(
            $tk['email'],
            strip_tags($pass)
        );

        if (!$result->error) {
            $params['is_change_pass'] = !$data['is_activated'];
            $this->admin->edit($params, $id);

            $item = [
                'email' => $tk['email'],
                'full_name' => $tk['full_name'],
                'password' => strip_tags($pass)
            ];

            return response()->json([
                'error' => false,
                'message' => __('user::store-user.reset-password.UPDATE_SUCCESS'),
                'item' => view('user::index.popup.popup-reset-password-success', $item)->render()]);
        } else {
            $message =  __('user::store-user.create.CREATE_FAIL');
            if (isset($result->data['errors']) &&
                sizeof($result->data['errors']) > 0 &&
                isset($result->data['errors'][0]['description'])) {
                $message = $result->data['errors'][0]['description'];
            }
            return response()->json([
                'error' => true,
                'data' => $message
            ]);
        }
    }

    /**
     * Lấy danh sách nhóm quyền cho user chọn.
     *
     * @param array $listChildId
     * @return mixed
     */
    public function getListGroupChildForPopup(array $listChildId)
    {
        $group_id_list = [];

        if (count($listChildId) > 0) {
            if (isset($listChildId['group_id_list'])) {
                if (isset($listChildId['group_id'])
                    && $listChildId['group_id'] > 0
                ) {
                    array_push(
                        $listChildId['group_id_list'],
                        $listChildId['group_id']
                    );
                    $listParent
                        = $this->getListParent($listChildId['group_id']);
                    $listParent = $listParent->keyBy('group_id')->keys()->all();
                    $group_id_list = array_merge(
                        $listParent,
                        $listChildId['group_id_list']
                    );
                } else {
                    $group_id_list = $listChildId['group_id_list'];
                }
            } else {
                if (isset($listChildId['group_id'])
                    && $listChildId['group_id'] > 0
                ) {
                    $listParent
                        = $this->getListParent($listChildId['group_id']);
                    $listParent = $listParent->keyBy('group_id')->keys()->all();
                    $group_id_list[] = $listChildId['group_id'];
                    $group_id_list = array_merge($listParent, $group_id_list);
                }
            }

            $listChild
                = $this->getAdminGroupListAll(['notin' => $group_id_list]);
        } else {
            $listChild = $this->getAdminGroupListAll();
        }

        return $listChild;
    }

    public function getListParent($group_id)
    {
        return $this->adminGroup->getListParent($group_id);
    }

    public function getAdminGroupListAll(array $filters = [])
    {
        $result = $this->adminGroup->getListAll($filters);

        return $result->toArray();
    }

    /**
     * Lấy danh sách user cho popup
     *
     * @param array $listUserId
     * @return mixed
     */
    public function getListUserForPopup(array $listUserId)
    {
        if (count($listUserId) > 0 && isset($listUserId['user_id_list'])) {
            $result = $this->admin->getListAll(['notin' => $listUserId['user_id_list']]);
        } else {
            $result = $this->admin->getListAll();
        }

        return $result;
    }

    /**
     * Lấy danh sách menu theo admin id
     *
     * @param int $admin_id
     * @return mixed
     */
    public function getListMenuByAdminId($admin_id)
    {
        $result = $this->admin->getListMenuByAdminId($admin_id)->toArray();

        return $result;
    }

    public function getUserByEmail($email)
    {
        $getUserByEmail = $this->admin->getUserByEmail($email);
        if ($getUserByEmail == null) {
            return response()->json(['error' => true]);
        } else {
            $ran_string = Str::random(32);

            $this->forgotPass->unActiveForgotPass($getUserByEmail['id']);
            $dt = Carbon::now();

            $data = [
                'admin_id' => $getUserByEmail['id'],
                'code' => $ran_string,
                'expire' => $dt->addDays(1)->toDateTimeString(),
                'is_actived' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            $this->forgotPass->store($data);

            //viết hàm gửi email
            Mail::to($email)->send(new ResetPassword($ran_string));

            return response()->json([
                'error' => false,
                'message' => 'Gửi email thành công'
            ]);
        }
    }

    public function getUserToken($token)
    {
        return $this->forgotPass->getItem($token);
    }

    public function forgetPassword($data)
    {
        $user = $this->forgotPass->getItemCode($data['token']);

        if ($user != null) {
            $umSDK = app(SystemUserManagementInterface::class);
            $result = $umSDK->resetPassword(
                $user['email'],
                $data['password']
            );
            
            if (!$result->error) {
                $this->forgotPass->unActiveForgotPass($user['id']);
                return response()->json([
                    'error' => false,
                    'data' => $result
                    ]);
            } else {
                $message = 'Đổi mật khẩu thất bại';
                if (isset($result->data['errors']) &&
                    sizeof($result->data['errors']) > 0 &&
                    isset($result->data['errors'][0]['description'])) {
                    $message = $result->data['errors'][0]['description'];
                }
                return response()->json([
                    'error' => true,
                    'data' => $message
                ]);
            }
        }
        return response()->json([
            'error' => true,
            'message' => ''
        ]);
    }
}
