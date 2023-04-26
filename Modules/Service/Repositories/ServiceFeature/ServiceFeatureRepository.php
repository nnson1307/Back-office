<?php

namespace Modules\Service\Repositories\ServiceFeature;

use Modules\Service\Models\AdminFeatureGroupTable;
use Modules\Service\Models\AdminServiceBrandFeatureTable;
use Modules\Service\Models\AdminServiceFeatureTable;

class ServiceFeatureRepository implements ServiceFeatureRepositoryInterface
{
    protected $featureGroup;
    protected $serviceFeatureTable;
    protected $serviceBrandFeatureTable;

    public function __construct(
        AdminFeatureGroupTable $featureGroup,
        AdminServiceFeatureTable $serviceFeatureTable,
        AdminServiceBrandFeatureTable $serviceBrandFeatureTable
    ){
        $this->featureGroup = $featureGroup;
        $this->serviceFeatureTable = $serviceFeatureTable;
        $this->serviceBrandFeatureTable = $serviceBrandFeatureTable;
    }

//    Lấy danh sách tính năng
    public function getList(array $filters = [])
    {
        $list = $this->featureGroup->getListNew($filters);
        return $list;
    }

//    Lấy chi tiết tính năng
    public function getDetail($id)
    {
        $getDetail = $this->featureGroup->getDetail($id);
        return $getDetail;
    }

//    Lấy danh sách dịch vụ sử dụng tính năng
    public function getListService($id)
    {
        $getList = $this->serviceFeatureTable->getListServiceByFeatureId($id);
        return $getList;
    }

//    Lấy danh sách thương hiệu theo tính năng
    public function getListBrand($id)
    {
        $getList = $this->serviceBrandFeatureTable->getListBrandByFeatureId($id);
        return $getList;
    }

//    Kiểm tra tên định nghĩa lại bị trùng
//    Cập nhật lại tên định nghĩa lại theo id
    public function updateFeature($data)
    {
        try {
            $arr = [
                'feature_group_id' => strip_tags($data['feature_group_id']),
                'feature_group_name_redefine' => strip_tags($data['feature_group_name_redefine']),
                'description_short' => strip_tags($data['description_short']),
                'description' => $data['description'],
            ];
            $checkName = $this->featureGroup->checkName($arr['feature_group_id'],$arr['feature_group_name_redefine']);
            if ($checkName != 0) {
                return [
                    'error' => true,
                    'message' => __('service::service_feature.validate.redefine_using')
                ];
            }
//            Cập nhật tên định nghĩa lại
//            $update = $this->featureGroup->updateNameRedefine($arr['feature_group_id'],$arr['feature_group_name_redefine']);
            $update = $this->featureGroup->updateFeatureGroup($arr['feature_group_id'],$arr);

            return [
                'error' => false,
                'message' => __('service::service_feature.validate.feature_edit_success')
            ];

        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'message' => ''
            ];
        }
    }

    public function getListFeature($data)
    {
        $list = $this->featureGroup->getListFeatureById($data);
        return $list;
    }
}
