<?php

namespace Modules\BrandApi\Repositories\StoreGroup;

use Illuminate\Support\Facades\DB;
use Matrix\Exception;
use Modules\BrandApi\Models\BrandSubscriptionTable;
use Modules\User\Models\GroupSelfDefineTable;
use Modules\User\Models\MyStoreFilterDetailTable;
use Modules\User\Models\MyStoreFilterGroupTable;

class StoreGroupRepository implements StoreGroupRepositoryInterface
{
    /**
     * @var MyStoreFilterGroupTable
     */
    protected $storeGroup;

    /**
     * @var MyStoreFilterDetailTable
     */
    protected $storeGroupDetail;

    /**
     * @var GroupSelfDefineTable
     */
    protected $groupSelfDefine;

    /**
     * @var BrandSubscriptionTable
     */
    protected $brandSubscription;

    protected $storeFilterGroup;
    protected $storeFilterDetail;

    public function __construct(
        MyStoreFilterGroupTable $storeGroup,
        MyStoreFilterDetailTable $storeGroupDetail,
        GroupSelfDefineTable $groupSelfDefine,
        BrandSubscriptionTable $brandSubscription,
        MyStoreFilterGroupTable $storeFilterGroup,
        MyStoreFilterDetailTable $storeFilterDetail
    ) {
        $this->storeGroup = $storeGroup;
        $this->storeGroupDetail = $storeGroupDetail;
        $this->groupSelfDefine = $groupSelfDefine;
        $this->brandSubscription = $brandSubscription;
        $this->storeFilterGroup = $storeFilterGroup;
        $this->storeFilterDetail = $storeFilterDetail;
    }

    /**
     * Lấy danh sách nhóm cửa hàng
     *
     * @param array $filter
     * @return mixed
     */
    public function getList(array $filter = [])
    {
        $filter['is_brand'] = 1;
        $result = $this->storeGroup->getListNew($filter);

        return $result;
    }

    /**
     * Lấy danh sách toàn bộ nhóm cửa hàng đã tạo
     *
     * @param int $tenant_id
     * @return mixed
     */
    public function getOption($tenant_id)
    {
        $result = $this->storeGroup->getOption($tenant_id);

        return $result;
    }

    /**
     * Thêm nhóm cửa hàng
     *
     * @param array $data
     * @return mixed
     */
    public function storeAuto(array $data)
    {
        try {
            DB::beginTransaction();
            $dataStoreGroup = [
                'name'                    => strip_tags($data['name']),
                'is_active'               => 1,
                'filter_group_type'       => 'auto',
                'created_at'              => date('Y-m-d H:i:s'),
                'updated_at'              => date('Y-m-d H:i:s'),
                'tenant_id'               => $data['tenant_id'],
                'is_brand'                => 1,
                'created_by'              => $data['created_by'],
                'updated_by'              => $data['updated_by'],
                'filter_condition_rule_A' => $data['andOrA'],
                'filter_condition_rule_B' => $data['andOrB'],
            ];

            $storeGroupId = $this->storeGroup->store($dataStoreGroup);

            if (isset($data['arrayResultA'])) {
                $this->addStoreGroupDetail($data, $storeGroupId, 'A');
            }

            if (isset($data['arrayResultB'])) {
                $this->addStoreGroupDetail($data, $storeGroupId, 'B');
            }

//            $computeStore = $this->computeUserInUserGroupAuto(['id' => $data['id']]);

            $message = [
                __('Thêm thành công'),
//                $computeStore['totalUser'].' '. __('user::validation.user_group.USER_INVALID'),
            ];

            DB::commit();
            return [
                'error'   => false,
                'message' => $message,
                'data' => $storeGroupId
            ];
        } catch (Exception $e) {
            DB::rollBack();
            return [
                'error'   => true,
                'message' => $e->getMessage()
            ];
        }
    }

    private function addStoreGroupDetail($data, $storeGroup, $detail_type = 'A')
    {
        if ($detail_type == 'A') {
            $dataArrayResult = $data['arrayResultA'];
        } else {
            $dataArrayResult = $data['arrayResultB'];
        }

        if (count($dataArrayResult) > 0) {
            foreach ($dataArrayResult as $key => $value) {
                if ($value['condition_id'] == 1
                    && $value['value1'] == null
                ) {
                    continue;
                } else {
                    if ($value['condition_id'] != null) {
                        $dataUserGroupDetail = [
                            'mystore_filter_group_id'          => $storeGroup,
                            'mystore_filter_group_detail_type' => $detail_type,
                            'filter_condition_rule'            => $detail_type == 'A' ? $data['andOrA'] : $data['andOrB'],
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
                        $this->storeGroupDetail->store($dataUserGroupDetail);
                    }
                }
            }
        }
    }

    /**
     * Thêm nhóm cửa hàng tự định nghĩa
     *
     * @param array $data
     * @return mixed
     */
    public function storeDefine(array $data)
    {
        try {
            DB::beginTransaction();

            $dataStoreGroup = [
                'name'              => strip_tags($data['name']),
                'is_active'         => 1,
                'is_brand'          => 1,
                'tenant_id'         => $data['tenant_id'],
                'filter_group_type' => 'user_define',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
                'created_by'        => $data['created_by'],
                'updated_by'        => $data['updated_by'],
            ];
            $storeGroupId = $this->storeGroup->store($dataStoreGroup);
            $count = 0;
            if (isset($data['arrayAccount'])) {
                foreach ($data['arrayAccount'] as $key => $value) {
                    if ($value != null) {
                        $dataInsert = [
                            'phone'         => $value,
                            'user_group_id' => $storeGroupId,
                            'created_at'    => date('Y-m-d H:i:s'),
                            'updated_at'    => date('Y-m-d H:i:s'),
                        ];
                        $this->groupSelfDefine->store($dataInsert);
                        $count++;
                    }
                }
            }
            $message = [
                $count . ' ' . __('user::validation.user_group.USER_INVALID'),
            ];
            DB::commit();
            return [
                'error'   => false,
                'message' => $message,
                'data' => $storeGroupId
            ];
        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'error'   => true,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Lấy chi tiết nhóm
     *
     * @param $data
     * @return mixed
     */
    public function getDetail($data)
    {
        $result = $this->storeGroup->getItem($data['id'], $data['tenant_id']);

        if ($result) {
            return [
                'error' => 0,
                'message' => 'Success',
                'data' => $result
            ];
        }

        return [
            'error' => 1,
            'message' => 'Fail',
            'data' => $result
        ];
    }

    /**
     * Lấy danh sách chi tiết nhóm cửa hàng
     *
     * @param $data
     * @return array
     */
    public function getStoreGroupDetail($data)
    {
        $result = $this->storeGroupDetail->getUserGroupDetail($data['id']);

        if ($result) {
            return [
                'error' => 0,
                'message' => 'Success',
                'data' => $result,
            ];
        }

        return [
            'error' => 1,
            'message' => 'Fail',
            'data' => $result,
        ];
    }

    /**
     * Cập nhật nhóm tự động
     *
     * @param $data
     * @return array
     */
    public function updateAuto($data)
    {
        try {
            DB::beginTransaction();

            $dataUserGroup = [
                'name'                    => strip_tags($data['name']),
                'updated_at'              => date('Y-m-d H:i:s'),
                'updated_by'              => $data['updated_by'],
                'filter_condition_rule_A' => ($data['andOrA']),
                'filter_condition_rule_B' => ($data['andOrB']),
            ];

            $this->storeGroup->edit($dataUserGroup, $data['id']);
            $this->storeGroupDetail->removeByUserGroupId($data['id']);

            if (isset($data['arrayResultA'])) {
                $this->addStoreGroupDetail($data, $data['id'], 'A');
            }

            if (isset($data['arrayResultB'])) {
                $this->addStoreGroupDetail($data, $data['id'], 'B');
            }

            $message = [
                __('user::validation.user_group.EDIT_SUCCESS'),
            ];

            DB::commit();
            return [
                'error'   => false,
                'message' => $message,
                'data' => null
            ];
        } catch (Exception $e) {
            DB::rollBack();
            return [
                'error'   => true,
                'message' => $e -> getMessage(),
                'data' => null
            ];
        }
    }

    /**
     * Cập nhật nhóm tự định nghĩa
     *
     * @param $data
     * @return array
     */
    public function updateDefine($data)
    {
        try {
            DB::beginTransaction();

            $dataUserGroup = [
                'name'              => strip_tags($data['name']),
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
                'updated_by'        => $data['updated_by'],
            ];

            //Cập nhật nhóm tự định nghĩa.
            $this->storeGroup->edit($dataUserGroup, $data['id']);
            //Xóa các user trong detail để cập nhật lại.
            $this->groupSelfDefine->removeByUserGroupId($data['id']);

            $count = 0;
            if (isset($data['arrayAccount'])) {
                foreach ($data['arrayAccount'] as $key => $value) {
                    if ($value != null) {
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
            }

            $message = [
                $count . ' ' . __('user::validation.user_group.USER_INVALID'),
            ];

            DB::commit();
            return [
                'error'   => false,
                'message' => $message
            ];
        } catch (Exception $e) {
            DB::rollBack();
            return [
                'error'   => true,
                'message' => $e->getMessage()
            ];
        }
    }

    /**
     * Lấy danh sách store theo tenant_id
     *
     * @param array $data
     * @return mixed
     */
    public function getListStore($data)
    {
        $tenant_id = $data['tenant_id'];
        $filter = $data['filter'] ?? null;

        $result = $this->brandSubscription->getListStoreByTenantId($tenant_id, $filter, isset($data['group']) ? $data['group'] : false);

        return $result;
    }

    /**
     * Lấy danh sách số điện thoại theo customer_code và ship_to_code trong data excel
     *
     * @param array $data
     * @return mixed
     */
    public function getPhoneNumberListByDataExcel($data)
    {
        $tenant_id = $data['tenant_id'];
        $dataExcel = $data['data'] ?? null;

        if ($dataExcel) {
            return $this->brandSubscription->checkExcel($tenant_id, $dataExcel);
        }

        return null;
    }

    /**
     * Danh sách sdt của nhóm
     * @param $id
     *
     * @return array
     */
    public function getDetailDefine($id)
    {
        $result = $this->groupSelfDefine->getDetail($id);
        if ($result) {
            return [
                'error' => 0,
                'message' => 'Success',
                'data' => $result,
            ];
        }

        return [
            'error' => 1,
            'message' => 'Fail',
            'data' => $result,
        ];
    }

    /**
     * Lấy ds all store không phân trang
     *
     * @param $data
     * @return mixed|string
     */
    public function getAllStore($data)
    {
        try {
            $tenant_id = $data['tenant_id'];
            $data = $this->brandSubscription->getAllStore($tenant_id);

            return $data;
        } catch (\Exception $exception) {
            return 'Lấy danh sách store thất bại';
        }
    }

    /**
     * Danh sách nhận thông báo của nhóm khách hàng
     * @return array
     */
    public function storeGroup(array $data = [])
    {
        try {
            $id = $data['id'];
            $tenant = $data['tenant_id'];
            //Chi tiết nhóm user.
            $storeGroup = $this->storeFilterGroup->getItem($id);
            if ($storeGroup['is_brand'] == 1) {
                if ($storeGroup['filter_group_type'] == 'user_define') {
                    // Danh sách user theo nhóm.
                    $user = $this->groupSelfDefine->getDetail2($id);
                    $result = $this->resultUser($user);
                    $getOutletId = $this->brandSubscription->getCodeByphone($result,$tenant);

                    return [
                        'result' => $getOutletId,
                        'totalUser' => count($getOutletId),
                        'error'   => true,
                        'message' => ''
                    ];
                } else {
                    $userGroupDefine = $this->storeFilterDetail->getUserGroupDetail($id);
                    $result = [];
                    $tempA = [];
                    $tempB = [];
                    if (count($userGroupDefine) > 0) {
                        foreach ($userGroupDefine as $item) {
                            if ($item['mystore_filter_group_detail_type'] == 'A') {
                                if ($item['filter_condition_type_id'] == 1) {
                                    $user = $this->groupSelfDefine->getDetail2($item['user_group_id']);
                                    $tempA = $this->resultUser($user);
                                }
                            } else {
                                if ($item['filter_condition_type_id'] == 1) {
                                    $users = $this->groupSelfDefine->getDetail2($item['user_group_id']);
                                    $tempB = $this->resultUser($users);
                                }
                            }
                        }
                    }
                    if (count($tempA) > 0) {
                        foreach ($tempA as $key => $value) {
                            if (!in_array($value, $tempB)) {
                                $result[] = $value;
                            }
                        }
                        $getOutletId = $this->brandSubscription->getCodeByphone($result,$tenant);
                    }
                    return [
                        'result' => $result,
                        'totalUser' => count($result),
                        'error'   => true,
                        'message' => ''
                    ];
                }
            } else {
                return [
                    'result' => [],
                    'totalUser' => 0,
                    'error'   => true,
                    'message' => ''
                ];
            }
        } catch (\Exception $e) {
            return [
                'result' => [],
                'totalUser' => 0,
                'error'   => true,
                'message' => $e->getMessage()
            ];
        }
    }

    private function resultUser($collection)
    {
        $result = [];
        if ($collection != null) {
            foreach ($collection as $item) {
                $result[] = $item['phone'];
            }
        }
        return $result;
    }
}
