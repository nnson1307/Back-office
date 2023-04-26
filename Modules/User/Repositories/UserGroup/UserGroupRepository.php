<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 10/1/2019
 * Time: 4:57 PM
 */

namespace Modules\User\Repositories\UserGroup;


use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\User\Models\FilterConditionTypeTable;
use Modules\User\Models\GroupSelfDefineTable;
use Modules\User\Models\MyStoreFilterDetailTable;
use Modules\User\Models\MyStoreFilterGroupTable;
use Modules\User\Models\UserTable;
use Modules\User\Repositories\UserGroup\UserGroupRepositoryInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Box\Spout\Common\Type;
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class UserGroupRepository implements UserGroupRepositoryInterface
{
    protected $user;
    protected $filterCondition;
    protected $userGroup;
    protected $userGroupDetail;
    protected $groupSelfDefine;

    public function __construct(
        UserTable $user,
        FilterConditionTypeTable $filterCondition,
        MyStoreFilterGroupTable $userGroup,
        MyStoreFilterDetailTable $userGroupDetail,
        GroupSelfDefineTable $groupSelfDefine
    ) {
        $this->user = $user;
        $this->filterCondition = $filterCondition;
        $this->userGroup = $userGroup;
        $this->userGroupDetail = $userGroupDetail;
        $this->groupSelfDefine = $groupSelfDefine;
    }

    /**
     * Tìm kiếm toàn bộ user.
     * @param array $filters
     * @return array
     * @throws \Throwable
     */
    public function searchAllUser(array $filters = [])
    {
        $filter['keyword_user$phone'] = $filters['user'];
        $filter['keyword_user$fullname'] = $filters['fullName'];
        $filter['user$is_activated'] = $filters['isActive'];
        $filter['page']=(int) ($filters['page'] ?? 1);
        $filter['perpage']=10;
        $list = $this->user->getListSearch($filter);
        //render view.
        $view = view(
            'user::user-group-notification.user-define.partial.tr-user-2',
            [
                'list' => $list,
            ]
        )->render();

        $arrayPhone = [];
        $filter['perpage'] = 100000;
        $listAll = $this->user->getListSearch($filter);
        foreach ($listAll as $item) {
            $arrayPhone[] = $item['phone'];
        }

        $result = [
            'view'       => $view,
            'arrayPhone' => $arrayPhone,
        ];


        return $result;
    }

    /**
     * Lấy 4 loại điều kiện.
     * @param array $arrayCondition
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCondition(array $arrayCondition = [])
    {
        $getCondition = $this->filterCondition->getCondition($arrayCondition);
        return response()->json($getCondition);
    }

    /**
     * Thêm mới user group (type: auto).
     * @param array $data
     * @return array
     */
    public function storeAuto(array $data = [])
    {
        try {
            DB::beginTransaction();

            //Thêm nhóm user.
            $dataUserGroup = [
                'name'                    => $data['name'],
                'is_active'               => 1,
                'filter_group_type'       => 'auto',
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s'),
                'created_by'              => Auth::id(),
                'updated_by'              => Auth::id(),
                'filter_condition_rule_A' => $data['andOrA'],
                'filter_condition_rule_B' => $data['andOrB'],
            ];

            $insertGroupUser = $this->userGroup->store($dataUserGroup);

            //Thêm vào nhóm user detail (A).
            if (isset($data['arrayResultA'])) {
                if (count($data['arrayResultA']) > 0) {
                    foreach ($data['arrayResultA'] as $key => $value) {
                        if ($value['condition_id'] == 1
                            && $value['value1'] == null
                        ) {

                        } else {
                            if ($value['condition_id'] != null) {
                                $dataUserGroupDetailA = [
                                    'mystore_filter_group_id'          => $insertGroupUser,
                                    'mystore_filter_group_detail_type' => 'A',
                                    'filter_condition_rule'            => $data['andOrA'],
                                    'filter_condition_type_id'         => (int)$value['condition_id'],
                                    'user_group_id'                    => $value['condition_id']
                                    == 1 ? strip_tags($value['value1']) : null,
                                    'group_self_open_app'              => $value['condition_id']
                                    == 3 ? strip_tags($value['value1']) : null,
                                    'group_self_not_open_app'          => $value['condition_id']
                                    == 4 ? strip_tags($value['value1']) : null,
                                    'group_most_active'                => $value['condition_id']
                                    == 5 ? '{"top":' . strip_tags($value['value1']) . ',"day":'
                                        . $value['value2'] . '}' : null,
                                ];
                                $this->userGroupDetail->store($dataUserGroupDetailA);
                            }
                        }
                    }

                }
            }

            //Thêm vào nhóm user detail (B).
            if (isset($data['arrayResultB'])) {
                if (count($data['arrayResultB']) > 0) {
                    foreach ($data['arrayResultB'] as $key => $value) {
                        if ($value['condition_id'] == 1
                            && $value['value1'] == null
                        ) {

                        } else {
                            if ($value['condition_id'] != null) {
                                $dataUserGroupDetailB = [
                                    'mystore_filter_group_id'          => $insertGroupUser,
                                    'mystore_filter_group_detail_type' => 'B',
                                    'filter_condition_rule'            => $data['andOrB'],
                                    'filter_condition_type_id'         => $value['condition_id'],
                                    'user_group_id'                    => $value['condition_id']
                                    == 1 ? strip_tags($value['value1']) : null,
                                    'group_self_open_app'              => $value['condition_id']
                                    == 3 ? strip_tags($value['value1']) : null,
                                    'group_self_not_open_app'          => $value['condition_id']
                                    == 4 ? strip_tags($value['value1']) : null,
                                    'group_most_active'                => $value['condition_id']
                                    == 5 ? '{"top":' . strip_tags($value['value1']) . ',"day":'
                                        . strip_tags($value['value2']) . '}' : null,
                                ];
                                $this->userGroupDetail->store($dataUserGroupDetailB);
                            }
                        }
                    }
                }
            }

            $computeUser = $this->computeUserInUserGroupAuto(['id' => $insertGroupUser]);

            $message = [
                __('user::validation.user_group.ADD_SUCCESS'),
                $computeUser['totalUser'].' ' . __('user::validation.user_group.USER_INVALID'),
            ];
            DB::commit();
            return [
                'error'   => false,
                'message' => $message
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'error'   => $e->getMessage(),
                'message' => ''
            ];
        }
    }

    /**
     * Import excel.
     * @param $file
     * @param $arrayPhoneExist
     * @return \Illuminate\Http\JsonResponse
     * @throws \Box\Spout\Common\Exception\IOException
     * @throws \Box\Spout\Reader\Exception\ReaderNotOpenedException
     */
    public function importExcel($file, $arrayPhoneExist)
    {

        if (isset($file)) {
            $total = 0;
            $success = 0;
            $fail = 0;
            $arrayTemp = [];
            $typeFileExcel = $file->getClientOriginalExtension();
            if ($typeFileExcel == "xlsx" || $typeFileExcel == "csv") {
                $reader = ReaderEntityFactory::createXLSXReader($file);
                $reader->open($file);
                foreach ($reader->getSheetIterator() as $sheet) {
                    foreach ($sheet->getRowIterator() as $key => $row) {
                        $rowAsArray = $row->toArray();
                        if ($key > 1) {
                            if (isset($rowAsArray[1])) {
                                $total += 1;
                                if ( ! in_array($rowAsArray[1],
                                    $arrayPhoneExist)
                                ) {
                                    $user = $this->user->getUserByPhone($rowAsArray[1]);
                                    if ($user != null) {
                                        $success += 1;
                                        $arrayTemp[] = $user['phone'];
                                    } else {
                                        $fail += 1;
                                    }
                                } else {
                                    $fail += 1;
                                }
                            }
                        } else {
                            $flag = false;
                            if (isset($rowAsArray[0]) && isset($rowAsArray[1])) {
                               if ($rowAsArray[0] == 'STT' && $rowAsArray[1] == 'Số điện thoại') {
                                   $flag = true;
                               }
                            }
                            if ($flag == false) {
                                return response()->json([
                                    'success' => 10,
                                    'message' => ''
                                ]);
                            }
                        }
                    }
                }
                $result['total'] = $total;
                $result['success'] = $success;
                $result['fail'] = $fail;
                $result['arrayPhone'] = $arrayTemp;

                $reader->close();
                return $result;
            }
            return response()->json([
                'success' => 1,
                'message' => ''
            ]);
        }
    }

    /**
     * Get list.
     *
     * @param array $filters
     *
     * @return mixed
     */
    public function list(array $filters = [])
    {
        if (!isset($filters['sort_mystore_filter_group$name'])) {
            $filters['sort_mystore_filter_group$name'] = null;
        }
        if (!isset($filters['sort_mystore_filter_group$filter_group_type'])) {
            $filters['sort_mystore_filter_group$filter_group_type'] = null;
        }
        if (!isset($filters['sort_mystore_filter_group$created_at'])) {
            $filters['sort_mystore_filter_group$created_at'] = null;
        }
//        dd($filters);
        $list = $this->userGroup->getListNew($filters);
        return [
            'list' => $list,
            'filter' => $filters,
        ];
    }

    /**
     * Get item.
     *
     * @param $id
     *
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->userGroup->getItem($id);
    }

    /**
     * Update user group.
     * @param array $data
     * @return array
     */
    public function updateAuto(array $data = [])
    {
        try {
            DB::beginTransaction();

            //Update nhóm user.

            $dataUserGroup = [
                'name'                    => strip_tags($data['name']),
                'is_active'               => 1,
                'filter_group_type'       => 'auto',
                'updated_at'              => date('Y-m-d H:i:s'),
                'updated_by'              => Auth::id(),
                'filter_condition_rule_A' => ($data['andOrA']),
                'filter_condition_rule_B' => ($data['andOrB']),
            ];

            $this->userGroup->edit($dataUserGroup, $data['id']);
            $this->userGroupDetail->removeByUserGroupId($data['id']);
            //Thêm vào nhóm user detail (A).
            if (isset($data['arrayResultA'])) {
                if (count($data['arrayResultA']) > 0) {
                    foreach ($data['arrayResultA'] as $key => $value) {
                        if ($value['condition_id'] == 1
                            && $value['value1'] == null
                        ) {

                        } else {
                            if ($value['condition_id'] != null) {
                                $dataUserGroupDetailA = [
                                    'mystore_filter_group_id'          => $data['id'],
                                    'mystore_filter_group_detail_type' => 'A',
                                    'filter_condition_rule'            => $data['andOrA'],
                                    'filter_condition_type_id'         => $value['condition_id'],
                                    'user_group_id'                    => $value['condition_id']
                                    == 1 ? strip_tags($value['value1']) : null,
                                    'group_self_open_app'              => $value['condition_id']
                                    == 3 ? strip_tags($value['value1']) : null,
                                    'group_self_not_open_app'          => $value['condition_id']
                                    == 4 ? strip_tags($value['value1']) : null,
                                    'group_most_active'                => $value['condition_id']
                                    == 5 ? '{"top":' . strip_tags($value['value1']) . ',"day":'
                                        . strip_tags($value['value2']) . '}' : null,
                                ];
                                $this->userGroupDetail->store($dataUserGroupDetailA);
                            }
                        }
                    }

                }
            }
            //Thêm vào nhóm user detail (B).
            if (isset($data['arrayResultB'])) {
                if (count($data['arrayResultB']) > 0) {
                    foreach ($data['arrayResultB'] as $key => $value) {
                        if ($value['condition_id'] == 1
                            && $value['value1'] == null
                        ) {

                        } else {
                            if ($value['condition_id'] != null) {
                                $dataUserGroupDetailB = [
                                    'mystore_filter_group_id'          => $data['id'],
                                    'mystore_filter_group_detail_type' => 'B',
                                    'filter_condition_rule'            => $data['andOrB'],
                                    'filter_condition_type_id'         => $value['condition_id'],
                                    'user_group_id'                    => $value['condition_id']
                                    == 1 ? strip_tags($value['value1']) : null,
                                    'group_self_open_app'              => $value['condition_id']
                                    == 3 ? strip_tags($value['value1']) : null,
                                    'group_self_not_open_app'          => $value['condition_id']
                                    == 4 ? strip_tags($value['value1']) : null,
                                    'group_most_active'                => $value['condition_id']
                                    == 5 ? '{"top":' . $value['value1'] . ',"day":'
                                        . strip_tags($value['value2']) . '}' : null,
                                ];
                                $this->userGroupDetail->store($dataUserGroupDetailB);
                            }
                        }
                    }
                }
            }
            $computeUser = $this->computeUserInUserGroupAuto(['id' => $data['id']]);

            $message = [
                __('user::validation.user_group.EDIT_SUCCESS'),
                $computeUser['totalUser'].' '. __('user::validation.user_group.USER_INVALID'),
            ];
            DB::commit();
            return [
                'error'   => false,
                'message' => $message
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'error'   => true,
                'message' => $e -> getMessage()
            ];
        }
    }

    /**
     * Tìm kiếm danh sách user có trong mảng.
     *
     * @param array $data
     *
     * @return string
     * @throws \Throwable
     */
    public function searchWhereInUser(array $data = [])
    {
        if (isset($data['arrayUser'])) {
            if (count($data['arrayUser']) == 0) {
                $data['arrayUser'][] = "099999999999999";
            }

            //Tìm kiếm trong mycore.
            $filters['arrayUser'] = $data['arrayUser'];
            $filters['keyword_user$phone'] = isset($data['phone'])
                ? $data['phone'] : '';
            $filters['keyword_user$fullname'] = isset($data['fullName'])
                ? $data['fullName'] : '';
            $filters['user$is_activated'] = isset($data['isActive'])
                ? $data['isActive'] : '';
            $filters['page'] = (int)($data['page'] ?? 1);
            $filters['perpage'] = 10;
            $page = $filters['page'];
            $list = $this->user->getListSearch($filters);

            $view = view(
                'user::user-group-notification.user-define.partial.tr-user',
                [
                    'list' => $list,
                    'page' => $page
                ]
            )->render();
            return $view;
        } else {
            $view = view(
                'user::user-group-notification.user-define.partial.tr-user',
                [

                ]
            )->render();
            return $view;
        }
    }

    /**
     * Get all user.
     *
     * @return mixed
     */
    public function getAllUser()
    {
        return $this->user->getAll();
    }

    public function addUserGroupDefine(array $data = [])
    {
        if (isset($data['arrayAccount'])) {
            if (count($data['arrayAccount']) == 0) {
                $data['arrayAccount'][] = "099999999999999";
            }
            $filters['arrayUser'] = $data['arrayAccount'];
            $filters['arrayUser'] = $data['arrayAccount'];
            $filters['page'] = (int)($data['page'] ?? 1);
            $filters['keyword_user$phone'] = isset($data['phone'])
                ? $data['phone'] : '';
            $filters['keyword_user$fullname'] = isset($data['fullName'])
                ? $data['fullName'] : '';
            $filters['user$is_activated'] = isset($data['isActive'])
                ? $data['isActive'] : '';
            $list = $this->user->getListSearch($filters);
            $page = $filters['page'];
            $view = view(
                'user::user-group-notification.user-define.partial.tr-user-define',
                [
                    'list' => $list,
                    'page' => $page
                ]
            )->render();
            return $view;
        } else {
            $view = view(
                'user::user-group-notification.user-define.partial.tr-user-define',
                []
            )->render();
            return $view;
        }
    }

    public function storeUserGroupDefine(array $data = [])
    {
        try {
            DB::beginTransaction();

            $dataUserGroup = [
                'name'              => strip_tags($data['name']),
                'is_active'         => 1,
                'filter_group_type' => 'user_define',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
                'created_by'        => Auth::id(),
                'updated_by'        => Auth::id(),
            ];
            $insertGroupUser = $this->userGroup->store($dataUserGroup);
            $count = 0;
            if (isset($data['arrayAccount'])) {
                foreach ($data['arrayAccount'] as $key => $value) {
                    $dataInsert = [
                        'phone'         => $value,
                        'user_group_id' => $insertGroupUser,
                        'created_at'    => date('Y-m-d H:i:s'),
                        'updated_at'    => date('Y-m-d H:i:s'),
                    ];
                    $this->groupSelfDefine->store($dataInsert);
                    $count++;
                }
            }
            $message = [
                $count . ' ' . __('user::validation.user_group.USER_INVALID'),
            ];
            DB::commit();
            return [
                'error'   => false,
                'message' => $message
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'error'   => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function userGroupDefineDetail($id)
    {
        return $this->groupSelfDefine->getDetail($id);
    }

    public function updateUserGroupDefine(array $data = [])
    {
        try {
            DB::beginTransaction();

            $dataUserGroup = [
                'name'              => strip_tags($data['name']),
                'is_active'         => 1,
                'filter_group_type' => 'user_define',
                'updated_at'        => date('Y-m-d H:i:s'),
                'updated_by'        => Auth::id(),
            ];
            //Cập nhật nhóm tự định nghĩa.
            $this->userGroup->edit($dataUserGroup, $data['id']);
            //Xóa các user trong detail để cập nhật lại.
            $this->groupSelfDefine->removeByUserGroupId($data['id']);

            $count = 0;
            if (isset($data['arrayAccount'])) {
                foreach ($data['arrayAccount'] as $key => $value) {
                    $dataInsert = [
                        'phone'         => $value,
                        'user_group_id' => $data['id'],
                        'created_at'    => date('Y-m-d H:i:s'),
                        'updated_at'    => date('Y-m-d H:i:s'),
                    ];
                    $this->groupSelfDefine->store($dataInsert);
                    $count++;
                }
            }
            $message = [
                $count . ' ' . __('user::validation.user_group.USER_INVALID'),
            ];
            DB::commit();
            return [
                'error'   => false,
                'message' => $message
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'error'   => true,
                'message' => $e->getMessage()
            ];
        }
    }

    public function computeUserInUserGroupAuto(array $data = [])
    {
        try {
            $result = [];
            $userGroupId = $data['id'];
            //Tất cả user.
            $totalUser = $this->user->getAll();
            //Chi tiết nhóm user.
            $userGroup = $this->userGroup->getItem($userGroupId);
            $userGroupDetail = $this->userGroupDetail->getUserGroupDetail($userGroupId);

            $allUser = [];
            foreach ($totalUser as $item) {
                $allUser[] = $item['phone'];
            }
            // A = null, B = null.
            if (count($userGroupDetail) == 0) {
                return [
                    'result' => [],
                    'totalUser' => count([]),
                    'error'   => false,
                    'message' => ''
                ];
            }
            ///Danh sách rule A.
            $ruleA = $userGroup['filter_condition_rule_A'];

            $userGroupDetailA = $this->userGroupDetail
                ->getUserGroupDetailByType($userGroupId, 'A');
            $tempA = [];
            if ($userGroupDetailA != null) {
                if ($ruleA == 'and') {
                    foreach ($userGroupDetailA as $item) {
                        if ($item['filter_condition_type_id'] == 1) {
                            $userGroupDefine = $this->groupSelfDefine->getDetail($item['user_group_id']);
                            if (count($userGroupDefine) > 0) {
                                foreach ($userGroupDefine as $value) {
                                    $tempA[] = $value['phone'];
                                }
                            }
                        }
                    }
                }

                foreach ($userGroupDetailA as $item) {
                    if ($ruleA == 'or') {
                        if ($item['filter_condition_type_id'] == 1) {
                            $userGroupDefine = $this->groupSelfDefine->getDetail($item['user_group_id']);
                            if (count($userGroupDefine) > 0) {
                                foreach ($userGroupDefine as $value) {
                                    if (!in_array($value['phone'], $tempA)) {
                                        $tempA[] = $value['phone'];
                                    }
                                }
                            }
                        }
                        if ($item['filter_condition_type_id'] == 3) {
                            //Điều kiện lấy user đăng nhập trong value ngày.
                            ///Danh sách user theo điều kiện where in and datetime last login.
                            $dateTime = Carbon::now()->subDays($item['group_self_open_app']);
                            $dateTimeFormat = Carbon::parse($dateTime)
                                ->format('Y-m-d H:i:s');
                            $userLastLogin = $this->user->getLastLoginOrWhere2($allUser, '>=', $dateTimeFormat);
                            if (count($userLastLogin) > 0) {
                                foreach ($userLastLogin as $u) {
                                    if (!in_array($u['phone'], $tempA)) {
                                        $tempA[] = $u['phone'];
                                    }
                                }
                            }
                        }

                        if ($item['filter_condition_type_id'] == 4) {
                            //Điều kiện lấy user đăng nhập trong value ngày.
                            ///Danh sách user theo điều kiện where in and datetime last login.
                            $dateTime = Carbon::now()
                                ->subDays($item['group_self_not_open_app']);
                            $dateTimeFormat = Carbon::parse($dateTime)
                                ->format('Y-m-d H:i:s');
                            $userLastLogin = $this->user->getLastLoginOrWhere($tempA, '<=', $dateTimeFormat);
                            if (count($userLastLogin) > 0) {
                                foreach ($userLastLogin as $u) {
                                    if (!in_array($u['phone'], $tempA)) {
                                        $tempA[] = $u['phone'];
                                    }
                                }

                            }
                        }
                    } else {
                        if (count($tempA) == 0) {
                            $tempA = $allUser;
                        }
                        if ($item['filter_condition_type_id'] == 3) {
                            //Điều kiện lấy user đăng nhập trong value ngày.
                            ///Danh sách user theo điều kiện where in and datetime last login.
                            $dateTime = Carbon::now()->subDays($item['group_self_open_app']);
                            $dateTimeFormat = Carbon::parse($dateTime)
                                ->format('Y-m-d H:i:s');
                            $userLastLogin = $this->user->getLastLoginWhere($tempA, '>=', $dateTimeFormat);

                            $tempA = [];
                            if (count($userLastLogin) > 0) {
                                foreach ($userLastLogin as $u) {
                                    if (!in_array($u['phone'], $tempA)) {
                                        $tempA[] = $u['phone'];
                                    }
                                }

                            }
                        }

                        if ($item['filter_condition_type_id'] == 4) {
                            //Điều kiện lấy user đăng nhập trong value ngày.
                            ///Danh sách user theo điều kiện where in and datetime last login.
                            $dateTime = Carbon::now()
                                ->subDays($item['group_self_not_open_app']);
                            $dateTimeFormat = Carbon::parse($dateTime)
                                ->format('Y-m-d H:i:s');
                            $userLastLogin = $this->user->getLastLoginWhere($tempA, '<=', $dateTimeFormat);
                            $tempA = [];
                            if (count($userLastLogin) > 0) {
                                foreach ($userLastLogin as $u) {
                                    if (!in_array($u['phone'], $tempA)) {
                                        $tempA[] = $u['phone'];
                                    }
                                }
                            }
                        }

                    }
                }
            }

            ///Danh sách rule B.
            $ruleB = $userGroup['filter_condition_rule_B'];

            $userGroupDetailB = $this->userGroupDetail->getUserGroupDetailByType($userGroupId, 'B');
            $tempB = [];
            if ($userGroupDetailB != null) {
                if ($ruleB == 'and') {
                    foreach ($userGroupDetailB as $item) {
                        if ($item['filter_condition_type_id'] == 1) {
                            $userGroupDefine = $this->groupSelfDefine->getDetail($item['user_group_id']);
                            if (count($userGroupDefine) > 0) {
                                foreach ($userGroupDefine as $value) {
                                    $tempB[] = $value['phone'];
                                }
                            }
                        }
                    }
                }
                foreach ($userGroupDetailB as $item) {
                    if ($ruleB == 'or') {
                        if ($item['filter_condition_type_id'] == 1) {
                            $userGroupDefine = $this->groupSelfDefine->getDetail($item['user_group_id']);
                            if (count($userGroupDefine) > 0) {
                                foreach ($userGroupDefine as $value) {
                                    if (!in_array($value['phone'], $tempB)) {
                                        $tempB[] = $value['phone'];
                                    }
                                }
                            }
                        }
                        if ($item['filter_condition_type_id'] == 3) {
                            //Điều kiện lấy user đăng nhập trong value ngày.
                            ///Danh sách user theo điều kiện where in and datetime last login.
                            $dateTime = Carbon::now()->subDays($item['group_self_open_app']);
                            $dateTimeFormat = Carbon::parse($dateTime)
                                ->format('Y-m-d H:i:s');
                            $userLastLogin = $this->user->getLastLoginOrWhere2($allUser, '>=', $dateTimeFormat);
                            if (count($userLastLogin) > 0) {
                                foreach ($userLastLogin as $u) {
                                    if (!in_array($u['phone'], $tempB)) {
                                        $tempB[] = $u['phone'];
                                    }
                                }

                            }
                        }

                        if ($item['filter_condition_type_id'] == 4) {
                            //Điều kiện lấy user đăng nhập trong value ngày.
                            ///Danh sách user theo điều kiện where in and datetime last login.
                            $dateTime = Carbon::now()
                                ->subDays($item['group_self_not_open_app']);
                            $dateTimeFormat = Carbon::parse($dateTime)
                                ->format('Y-m-d H:i:s');
                            $userLastLogin = $this->user->getLastLoginOrWhere($tempB, '<=', $dateTimeFormat);
                            if (count($userLastLogin) > 0) {
                                foreach ($userLastLogin as $u) {
                                    if (!in_array($u['phone'], $tempB)) {
                                        $tempB[] = $u['phone'];
                                    }
                                }

                            }
                        }
                    } else {
                        if ($item['filter_condition_type_id'] == 1) {
                            $userGroupDefine = $this->groupSelfDefine->getDetail($item['user_group_id']);
                            if (count($userGroupDefine) > 0) {
                                foreach ($userGroupDefine as $value) {
                                    if (!in_array($value['phone'], $tempB)) {
                                        $tempB[] = $value['phone'];
                                    }
                                }
                            }
                        }
                        if (count($tempB) == 0) {
                            $tempB = $allUser;
                        }

                        if ($item['filter_condition_type_id'] == 3) {
                            //Điều kiện lấy user đăng nhập trong value ngày.
                            ///Danh sách user theo điều kiện where in and datetime last login.
                            $dateTime = Carbon::now()->subDays($item['group_self_open_app']);
                            $dateTimeFormat = Carbon::parse($dateTime)
                                ->format('Y-m-d H:i:s');
                            $userLastLogin = $this->user->getLastLoginWhere($tempB, '>=', $dateTimeFormat);
                            $tempB = [];
                            if (count($userLastLogin) > 0) {
                                foreach ($userLastLogin as $u) {
                                    if (!in_array($u['phone'], $tempB)) {
                                        $tempB[] = $u['phone'];
                                    }
                                }

                            }
                        }

                        if ($item['filter_condition_type_id'] == 4) {
                            //Điều kiện lấy user đăng nhập trong value ngày.
                            ///Danh sách user theo điều kiện where in and datetime last login.
                            $dateTime = Carbon::now()
                                ->subDays($item['group_self_not_open_app']);
                            $dateTimeFormat = Carbon::parse($dateTime)
                                ->format('Y-m-d H:i:s');
                            $userLastLogin = $this->user->getLastLoginWhere($tempB, '<=', $dateTimeFormat);
                            $tempB = [];
                            if (count($userLastLogin) > 0) {
                                foreach ($userLastLogin as $u) {
                                    if (!in_array($u['phone'], $tempB)) {
                                        $tempB[] = $u['phone'];
                                    }
                                }
                            }
                        }
                    }
                }
            }
            if ($tempA != null) {
                foreach ($tempA as $key => $value) {
                    if (!in_array($value, $tempB)) {
                        $result[] = $value;
                    }
                }
            } else {
                $result = [];
            }
            return [
                'result' => $result,
                'totalUser' => count($result),
                'error'   => false,
                'message' => ''
            ];
        } catch (\Exception $e) {
            return [
                'result' => [],
                'totalUser' => 0,
                'error'   => true,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Tính các user hợp lệ thông qua nhóm user(động).
     * @param $id
     */
    public function computeUserInvalid($id)
    {
        try {
            //Chi tiết nhóm user.
            $userGroup = $this->userGroup->getItem($id);
            //Bao gồm A.
            $ruleA = $userGroup['filter_condition_rule_A'];
                $userGroupDetailA = $this->userGroupDetail
                    ->getUserGroupDetailByType($id, 'A')
                    ->toArray();
                dd($userGroupDetailA);
                $result = $this->user->includeCondition($id);
            } catch (\Exception $e) {
            return [
                'result' => [],
                'totalUser' => 0,
                'error'   => true,
                'message' => $e->getMessage()
            ];
        }
    }
}