<?php


namespace Modules\User\Repositories\StoreUser;

use DaiDP\StsSDK\UserManagement\UserManagementInterface;
use Modules\BrandApi\Models\BrandSubscriptionTable;
use Modules\User\Models\PhoneServiceTable;
use Modules\User\Models\UserTable;

class StoreUserRepository implements StoreUserRepositoryInterface
{
    protected $user;
    protected $brandSubs;
    protected $umSDK;
    protected $phoneService;


    /**
     * StoreUserRepository constructor.
     *
     * @param UserTable $user
     * @param UserManagementInterface $um
     */
    public function __construct(
        UserTable $user,
        BrandSubscriptionTable $brandSubs,
        UserManagementInterface $um,
        PhoneServiceTable $phoneService
    ) {
        $this->user = $user;
        $this->umSDK = $um;
        $this->phoneService = $phoneService;
        $this->brandSubs = $brandSubs;
    }


    /**
     * Lấy danh sách tài khoản Store user
     *
     * @param array $filters
     * @return mixed
     */
    public function list(array $filters = [])
    {
        // TODO: Implement list() method.
        if (!isset($filters['sort_user$phone'])) {
            $filters['sort_user$phone'] = null;
        }
        if (!isset($filters['sort_user$fullname'])) {
            $filters['sort_user$fullname'] = null;
        }
        if (!isset($filters['sort_user$is_activated'])) {
            $filters['sort_user$is_activated'] = null;
        }
        if (!isset($filters['keyword_phone'])) {
            $filters['keyword_phone'] = null;
        }
        if (!isset($filters['keyword_fullname'])) {
            $filters['keyword_fullname'] = null;
        }
        if (!isset($filters['keyword_is_activated'])) {
            $filters['keyword_is_activated'] = null;
        }
        $check = $filters;
        $check = array_filter($check);
        if (count($check) == 0) {
            $filters['sort_user$phone'] = 'asc';
        }
        $result = [
            'data' => $this->user->getListNew($filters),
            'filter' => $filters
        ];

        return $result;
    }

    /**
     * Tạo tài khoản Store user
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        try {
            // Kiểm tra phone đã có trong đb hay chưa
            // insert database
            if ($this->isUserExist($data['phone'])) {
                return response()->json([
                    'error' => true,
                    'message' => __('user::store-user.create.USER_EXIST')
                ]);
            }
            //cắt 3 số đầu SĐT
            $firstPhone = substr($data['phone'], 0, 3);
            $arrayFirstPhone = $this->phoneService->getServiceNumList();
            if (!in_array($firstPhone, $arrayFirstPhone)) {
                return response()->json([
                    'error' => true,
                    'message' => __('user::store-user.create.VALIDATE_PASSWORD')
                ]);
            }
            // dữ liệu gọi api
            $request = $this->getBodyRequestCreateStoreUserApi($data);
            // Gọi api tạo tài khoản
            $result = $this->umSDK->register($request);
            if ($result->error) {
                $message =  __('user::store-user.create.CREATE_FAIL');
                if (isset($result->data['errors']) &&
                    sizeof($result->data['errors']) > 0 &&
                    isset($result->data['errors'][0]['description'])) {
                    $message = $result->data['errors'][0]['description'];
                }
                return response()->json([
                    'error' => true,
                    'message' => $message
                ]);
            }
            // data insert DB
            $data = $this->getDataInsertDBStoreUser($data, $result->data['id']);
            $data['password'] = bcrypt($data['password']);
            // insert DB
            $this->user->insertStoreUser($data);

            return response()->json([
                'error' => false,
                'message' => __('user::store-user.create.CREATE_SUCCESS')
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => true,
                'message' => __('user::store-user.create.CREATE_FAIL')
            ]);
        }
    }

    /**
     * Dữ liệu insert DB của một tài khoản Store user
     * @param $data
     * @param $userCode
     * @return
     */
    public function getDataInsertDBStoreUser($data, $userCode)
    {
        $data['user_code'] = $userCode;
        $data['phone_verified'] = 1;
        $data['phone_verified_at'] = date('Y-m-d H:m:s', time());
        $data['email_verified'] = 1;
        $data['email_verified_at'] = date('Y-m-d H:m:s', time());
        return $data;
    }

    /**
     * Body truyền vào api tạo store user
     * @param $data
     * @return array
     */
    public function getBodyRequestCreateStoreUserApi($data)
    {
        return $request = [
            'username' => strip_tags($data['phone']),
            'fullname' => strip_tags($data['fullname']),
            'email' => strip_tags($data['phone']) . '@gmail.com',
            'password' => strip_tags($data['password']),
            'confirmpassword' => strip_tags($data['password']),
        ];
    }

    /**
     * Lấy thông tin tài khoản Store user theo id
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->user->getItem($id);
    }

    /**
     * Cập nhật tài khoản Store user
     * @param array $data
     * @return mixed
     */
    public function edit(array $data)
    {
        $result = $this->user->updateUserInfo($data['phone'], $data);

        return !$result ?
            response()->json([
                'error' => true,
                'message' => __('user::store-user.edit.UPDATE_FAIL')
            ]) :
            response()->json([
                'error' => false,
                'message' => __('user::store-user.edit.UPDATE_SUCCESS')
            ]);
    }

    /**
     * Xóa tài khoản Store user
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        $result = $this->user->remove($id);

        return !$result ?
            response()->json([
                'error' => 0,
                'message' => __('user::store-user.remove.REMOVE_FAIL')
            ]) :
            response()->json([
                'error' => 0,
                'message' => __('user::store-user.remove.REMOVE_SUCCESS')
            ]);
    }

    /**
     * Kiểm tra user đã tồn tại hay chưa
     *
     * @param $phone
     * @return mixed
     */
    public function isUserExist($phone)
    {
        $user = $this->user->getUserByPhone($phone);
        return !empty($user);
    }

    /**
     * Cập nhật trạng thái của store user
     * @param $user_id
     * @param $is_activated
     * @return mixed
     */
    public function updateStatus($user_id, $is_activated)
    {
        $result = $this->user->updateUserStatus($user_id, $is_activated);
        return !$result ?
            response()->json([
                'error' => true,
                'message' => __('user::store-user.edit.UPDATE_FAIL')
            ]) :
            response()->json([
                'error' => false,
                'message' => __('user::store-user.edit.UPDATE_SUCCESS')
            ]);
    }

    /**
     * Reset mật khẩu tài khoản store user
     * @param array $data
     * @return mixed
     */
    public function resetPasswordStoreUser(array $data)
    {
        // call api reset mật khẩu
        $result = $this->umSDK->resetPassword(
            strip_tags($data['phone']),
            strip_tags($data['password'])
        );
        if ($result->error) {
            response()->json([
                'error' => true,
                'message' => __('user::store-user.reset-password.UPDATE_FAIL')
            ]);
        }

        $user = $this->user->getUserByPhone($data['phone']);

        $item = [
            'phone' => $user['phone'],
            'fullname' => $user['fullname'],
            'password' => $data['password']
        ];
//        return view('user::store-user.popup.popup-reset-password-success', [
//            'item' => $item
//        ]);
        return response()->json([
            'error' => false,
            'message' => __('user::store-user.reset-password.UPDATE_SUCCESS'),
            'item' => $item
        ]);
    }

    /**
     * Lấy đầu số điện thoại
     *
     * @return mixed
     */
    public function getPhoneServices()
    {
        $mPhone = app(PhoneServiceTable::class);

        return $mPhone->getServiceNumList();
    }

    /**
     * Lấy danh sách store của user.
     * @param $phone
     * @return mixed
     */
    public function getStoreReferenceUser($phone)
    {
//        return $this->user->getStoreReferenceUser($phone);
        return $this->brandSubs->getStoreReferenceUser($phone);
    }
}
