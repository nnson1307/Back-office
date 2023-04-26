<?php

namespace Modules\Service\Repositories\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Modules\Service\Models\AdminFeatureTable;
use Modules\Service\Models\AdminServiceBrandFeatureTable;
use Modules\Service\Models\AdminServiceBrandTable;
use Modules\Service\Models\AdminServiceFeatureChildTable;
use Modules\Service\Models\AdminServiceFeatureTable;
use Modules\Service\Models\AdminFeatureGroupTable;
use Modules\Service\Models\AdminServiceTable;

class ServiceRepository implements ServiceRepositoryInterface
{
    protected $adminServiceTable;
    protected $adminFeatureGroupTable;
    protected $adminFeatureTable;
    protected $adminServiceFeatureTable;
    protected $serviceBrandTable;
    protected $serviceBrandFeatureTable;
    protected $adminServiceFeatureChildTable;

    public function __construct(
        AdminServiceTable $adminServiceTable,
        AdminFeatureGroupTable $adminFeatureGroupTable,
        AdminFeatureTable $adminFeatureTable,
        AdminServiceFeatureTable $adminServiceFeatureTable,
        AdminServiceBrandTable $serviceBrandTable,
        AdminServiceFeatureChildTable $adminServiceFeatureChildTable,
        AdminServiceBrandFeatureTable $serviceBrandFeatureTable
    )
    {
        $this->adminServiceFeatureChildTable = $adminServiceFeatureChildTable;
        $this->adminFeatureTable = $adminFeatureTable;
        $this->adminServiceTable = $adminServiceTable;
        $this->adminFeatureGroupTable = $adminFeatureGroupTable;
        $this->adminServiceFeatureTable = $adminServiceFeatureTable;
        $this->serviceBrandTable = $serviceBrandTable;
        $this->serviceBrandFeatureTable = $serviceBrandFeatureTable;
    }

//    Lấy danh sách dịch vụ có phân trang
    public function getList(array $filters = [])
    {
        $list = $this->adminServiceTable->getListNew($filters);
        return $list;
    }

//    Lấy danh sách tính năng không phân trang cho popup tạo và sửa
    public function getListFeature($filters)
    {
        $list = $this->adminFeatureGroupTable->getListAll($filters);
        return $list;
    }

//    lấy danh sách tính năng theo sesstion để hiển thị khi user thêm tính năng lúc tạo và sửa
    public function getListFeatureBySession($data)
    {
        $list = $this->adminFeatureGroupTable->getListFeatureBySesstion($data);
        return $list;
    }

    /**
     * Danh sách chức năng con
     *
     * @param $id
     * @return array
     */
    public function getListFeatureChild($id)
    {
        $list = $this->adminFeatureTable->getListFeatureByGroupId($id)->toArray();
        $list1 = [];
        $arrSession = session()->get('feature_child');
        $arrFeatureId = [];
        foreach ($arrSession[$id] as $i){
            $arrFeatureId[] = $i;
        }
        foreach ($list as $item){
            $temp = $item;
            $temp['is_checked'] = 0;
            $temp['is_checked'] = in_array($item['feature_id'], $arrFeatureId) ? 1 : 0;
            $list1[] = $temp;
        }
        return $list1;
    }

    public function getListServiceBySession($data)
    {
        $list = $this->adminServiceTable->getListServiceBySession($data);
        return $list;
    }

    public function getListServiceByBrandId($id)
    {
        $list = $this->adminServiceTable->getListServiceByBrandId($id);
        return $list;
    }

    public function getListFeatureByIdSessionService($data)
    {
        $list = $this->adminFeatureGroupTable->getListFeatureByIdSessionService($data);
        return $list;
    }

    public function getListFeatureByIdBrand($id)
    {
        $list = $this->adminFeatureGroupTable->getListFeatureByIdBrand($id);
        return $list;
    }

//    Kiểm tra số lượng tính năng ( ít nhất 1 tính năng)
//    Tạo dịch vụ
//    Insert tính năng theo dịch vụ
    public function storeService($data)
    {
        try {
            DB::beginTransaction();
            $session = session()->get('feature_group');
            $sessionChild = session()->get('feature_child');
            if ($session == null || count($session) == 0) {
                return [
                    'error' => true,
                    'message' => __('service::validation.service.feature_one')
                ];
            }

            $arrService = [
                'service_name_vi' => strip_tags($data['service_name_vi']),
                'service_name_en' => strip_tags($data['service_name_en']),
                'description_short' => strip_tags($data['description']),
                'description' => $data['img_content'],
                'is_actived' => $data['is_actived'],
                'created_at' => Carbon::now(),
                'created_by' => Auth::id(),
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::id()
            ];

            $createService = $this->adminServiceTable->createService($arrService);

            foreach ($session as $key => $value)
            {
                $arrServiceFeature = [
                    'service_id' => $createService,
                    'feature_group_id' => $value,
                    'is_deleted' => 0,
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::id(),
                    'updated_at' => Carbon::now(),
                    'update_by' => Auth::id(),
                ];
                $serviceFeatureId = $this->adminServiceFeatureTable->create1ServiceFeature($arrServiceFeature);
                $arrServiceFeatureChild = [];
                foreach ($sessionChild[$value] as $item){
                    $featureCode = $this->adminFeatureTable->getFeatureCodeByFeatureId($item);
                    $arrServiceFeatureChild[] = [
                        'service_feature_id' => $serviceFeatureId,
                        'service_id' => $createService,
                        'feature_group_id' => $value,
                        'feature_id' => $item,
                        'feature_code' => $featureCode['feature_code'],
                        'is_deleted' => 0,
                        'created_at' => Carbon::now(),
                        'created_by' => Auth::id(),
                        'updated_at' => Carbon::now(),
                        'updated_by' => Auth::id(),
                    ];
                }
                $createServiceFeatureChild = $this->adminServiceFeatureChildTable->createServiceFeatureChild($arrServiceFeatureChild);
            }
//            $createServiceFeature = $this->adminServiceFeatureTable->createServiceFeature($arrServiceFeature);
            DB::commit();
            return [
                'error' => false,
                'message' => __('service::validation.service.service_create_success')
            ];

        } catch (\Exception $e) {
            DB::rollBack();
            return [
                'error' => $e->getMessage(),
                'message' => ''
            ];
        }
    }

//    Kiểm tra sesstion fearture group
//    Tạo mảng dịch vụ
//    Update dịch vụ
//    Xóa danh sách tính năng theo dịch vụ
//    Tạo lại tính năng theo dịch vụ
    public function updateService($data)
    {
        try {
            $session = session()->get('feature_group');
            $sessionChild = session()->get('feature_child');
//            Kiểm tra sesstion fearture group
            if ($session == null || count($session) == 0) {
                return [
                    'error' => true,
                    'message' => __('service::validation.service.feature_one')
                ];
            }
            $id = $data['service_id'];
//            Tạo mảng dịch vụ
            $arrService = [
                'service_name_vi' => strip_tags($data['service_name_vi']),
                'service_name_en' => strip_tags($data['service_name_en']),
                'description_short' => strip_tags($data['description']),
                'description' => $data['img_content'],
                'is_actived' => $data['is_actived'],
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::id()
            ];

//            Lấy chi tiết dịch vụ
            $getDetail = $this->adminServiceTable->getDetail($id);
            if ($getDetail['is_actived'] == 1) {
                if ($data['is_actived'] == 0) {
                    $checkServiceUsing = $this->serviceBrandTable->checkService($id);
                    if ($checkServiceUsing != 0){
                        return [
                            'error' => true,
                            'message' => __('service::validation.service.is_active_service')
                        ];
                    }
                }
            }
//            Update dịch vụ
            $updateService = $this->adminServiceTable->updateService($id,$arrService);

//            Xóa danh sách tính năng theo id dịch vụ
            $deleteServiceFeature = $this->adminServiceFeatureTable->deleteServiceFeature($id);
//            Xóa danh sách tính năng con theo id dịch vụ
            $deleteServiceFeatureChild = $this->adminServiceFeatureChildTable->deleteServiceFeatureChild($id);

            foreach ($session as $key => $value)
            {
                $arrServiceFeature = [
                    'service_id' => (int)$id,
                    'feature_group_id' => $value,
                    'is_deleted' => 0,
                    'created_at' => Carbon::now(),
                    'created_by' => Auth::id(),
                    'updated_at' => Carbon::now(),
                    'update_by' => Auth::id(),
                ];
                $serviceFeatureId = $this->adminServiceFeatureTable->create1ServiceFeature($arrServiceFeature);
                $arrServiceFeatureChild = [];
                foreach ($sessionChild[$value] as $item){
                    $featureCode = $this->adminFeatureTable->getFeatureCodeByFeatureId($item);
                    $arrServiceFeatureChild[] = [
                        'service_feature_id' => $serviceFeatureId,
                        'service_id' => (int)$id,
                        'feature_group_id' => $value,
                        'feature_id' => $item,
                        'feature_code' => $featureCode['feature_code'],
                        'is_deleted' => 0,
                        'created_at' => Carbon::now(),
                        'created_by' => Auth::id(),
                        'updated_at' => Carbon::now(),
                        'updated_by' => Auth::id(),
                    ];
                }
                $createServiceFeatureChild = $this->adminServiceFeatureChildTable->createServiceFeatureChild($arrServiceFeatureChild);
            }
            return [
                'error' => false,
                'message' => __('service::validation.service.service_edit_success')
            ];

        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'message' => ''
            ];
        }
    }

    /**
     *function create feature
     * @param array $data
     * @return mixed
    */
    public function storeFeature($data)
    {
        try {
            $session = session()->get('feature_group');
            if ($session == null || count($session) == 0){
                request()->session()->put('feature_group', $data['feature_group']);
            } else {
                foreach ($data['feature_group'] as $item)
                {
                    request()->session()->push('feature_group', (int)$item);
                }
            }
            foreach (session()->get('feature_group') as $key => $value) {
                $arrFeatureId = $this->adminFeatureTable->getListIdFeatureByIdGroup($value)->toArray();
                $arrId = [];
                $arr= [];
                foreach ($arrFeatureId as $k => $v){
                    array_push($arrId, $v['feature_id']);
                }
                $session = session()->get('feature_child');
                if(count($arrId) > 0){
                    $arr = [
                        $value => $arrId
                    ];
                }
                if ($session == null){
                    if(count($arr) > 0){
                        request()->session()->put('feature_child', $arr);
                    }
                } else {
                    $oldArr = session()->get('feature_child');
                    if(count($arrId) > 0){
                        $oldArr[$value] = $arrId;
                        request()->session()->forget('feature_child');
                        request()->session()->put('feature_child', $oldArr);
                    }
                }
            }
            return [
                    'error' => false,
                    'message' => __('Thêm tính năng thành công'),
                    'data' => '',
            ];
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'message' => __('Thêm tính năng thất bại')
            ];
        }
    }
    public function storeFeatureChild($data)
    {
        try {
            $session = session()->get('feature_child');
            $sessionGroup = session()->get('feature_group');
            if(isset($data['feature_name']) != ''){
                if ($session == null){
                    $arr = [
                        $data['feature_group_id'] => $data['feature_name']
                    ];
                    request()->session()->put('feature_child', $arr);
                } else {
                    $oldArr = session()->get('feature_child');
                    $oldArr[$data['feature_group_id']] = $data['feature_name'];
                    request()->session()->forget('feature_child');
                    request()->session()->put('feature_child', $oldArr);
                }
            }
            else{
                $dataGroup = [];
                foreach ($sessionGroup as $key=>$value){
                    if($value != $data['feature_group_id']){
                        array_push($dataGroup, $value);
                    }
                }
                request()->session()->put('feature_group', $dataGroup);
            }
            return [
                    'error' => false,
                    'message' => __('Thêm tính năng con thành công'),
                    'data' => '',
            ];
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'message' => __('Thêm tính năng con thất bại')
            ];
        }
    }

    /**
     *function destroy feature
     * @param int $id
     * @return mixed
     */
    public function removeFeature($id)
    {
        try {
//            $checkFeature = $this->serviceBrandFeatureTable->checkFeatureById($id);
//            if ($checkFeature != 0) {
//                return [
//                    'error' => true,
//                    'message' => __('service::validation.service.feature_using')
//                ];
//            }
            if (request()->session()->has('feature_group')) {
                $arrayFeature = session()->get('feature_group');
                $arrayFeatureChild = session()->get('feature_child');
                foreach ($arrayFeature as $key => $item){
                    if ($item == $id){
                        unset($arrayFeature[$key]);
                        unset($arrayFeatureChild[$id]);
                    }
                }
                session()->put('feature_group',$arrayFeature);
                session()->put('feature_child',$arrayFeatureChild);
                return [
                    'error' => false,
                    'message' => __('Xóa tính năng thành công')
                ];
            }
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'message' => __('Xóa thất bại')
            ];
        }
    }

    /**
     * get detail feature
     * @param int $id
     * @return mixed
    */
    public function getDetailFeature($id)
    {
        if (request()->session()->has('feature')) {
            return $arrayFeature = session()->get('feature.'.$id);
        } else {
            return [
                'error' => true,
                'message' => __('Thông tin tính năng này không tồn tại')
            ];
        }
    }

    /**
     * update info feature
     * @param $data
     * @return mixed
     */
    public function updateFeature($data)
    {
        try {
            if (isset($data['is_activated'])) {
                $is_actived = 1;
            } else {
                $is_actived = 0;
            }
            $dataFeature = [
                'name_feature' => $data['feature_name'],
                'is_actived'   => $is_actived,
                'description'   => $data['description'],
                'img_content'   => $data['img_content2'],
                'create_date'   => $data['create_date'],
                'update_date'   => Carbon::now(),
            ];
            // remove session
            if (request()->session()->has('feature')) {
                $arrayFeature = session()->get('feature');
                if (isset($arrayFeature[$data['id']])) {
                    session()->forget(['feature.'.$data['id']]);
                }
            }

            // push data to session
            $session = session()->get('feature');
            $collection = collect($session);
            $filtered = $collection->where('name_feature', $data['feature_name']);

            if (count($filtered) > 0) {
                return [
                    'error' => true,
                    'message' => __('Tính năng này đã tồn tại'),
                    'data' => $dataFeature,
                ];
            } else {
                request()->session()->push('feature', $dataFeature);
                return [
                    'error' => false,
                    'message' => __('Thêm tính năng thành công'),
                    'data' => $dataFeature,
                ];
            }
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'message' => __('Chỉnh sửa thất bại')
            ];
        }
    }

    /**
     *function change status job
     * @param int $id
     * @param string  $data
     * @return mixed
     */
    public function changeStatusFeature($id, $data)
    {
        try {
            if (request()->session()->has('feature')) {
                $arrayFeature = session()->get('feature');
                $dataF = $arrayFeature[$data['id']];

                //delete session
                if (isset($arrayFeature[$data['id']])) {
                    session()->forget(['feature.'.$data['id']]);
                }

                // update data session
                $dataFeature = [
                    'name_feature' => $dataF['name_feature'],
                    'is_actived'   => $data['is_actived'],
                    'description'   => $dataF['description'],
                    'img_content'   => $dataF['img_content'],
                    'create_date'   => $dataF['create_date'],
                    'update_date'   => Carbon::now(),
                ];

                //puss data to session
                request()->session()->push('feature', $dataFeature);
                return [
                    'error' =>false,
                    'message' => __('Thay đổi trạng thái thành công')
                ];
            }
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'message' => __('Thay đổi trạng thái thất bại')
            ];
        }
    }

//    Lấy chi tiết dịch vụ
    public function getDetail($id)
    {
        $getDetail = $this->adminServiceTable->getDetail($id);
        return $getDetail;
    }

//    Lấy danh sách tính năng theo id dịch vụ
    public function listServiceFeatureById($id)
    {
        $list = $this->adminServiceFeatureTable->getListById($id);
        return $list;
    }

    public function listServiceFeatureByIdSession($id)
    {
        $session = session()->get('feature_group');
        $list = $this->adminServiceFeatureTable->getListById($id);
        $arrId = collect($list)->pluck('feature_group_id');
        request()->session()->put('feature_group', $arrId);

    }
    public function listServiceFeatureChildByIdSession($id)
    {
        $session = session()->get('feature_group');
        foreach ($session as $item){
            $list = $this->adminServiceFeatureChildTable->getListFeatureByServiceAndGroupId($id,$item);
            $arrId = collect($list)->pluck('feature_id');
            $oldArr = session()->get('feature_child');
            $oldArr[$item] = $arrId;
            request()->session()->forget('feature_child');
            request()->session()->put('feature_child', $oldArr);
        }

    }
}
