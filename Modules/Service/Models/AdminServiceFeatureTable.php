<?php


namespace Modules\Service\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class AdminServiceFeatureTable extends Model
{
    use ListTableTrait;
    protected $table = "admin_service_feature";
    protected $primaryKey = "service_feature_id";
    protected $fillable = [
        "service_feature_id",
        "service_id",
        "feature_group_id",
        "is_deleted",
        "created_at",
        "created_by",
        "updated_at",
        "update_by"
    ];

//    Tạo danh sách tính năng theo dịch vụ
    public function createServiceFeature($data)
    {
        $oSelect = $this->insert($data);
        return $oSelect;
    }

    /**
     * tạo trả về id nhóm chức năng
     *
     * @param $data
     * @return mixed
     */
    public function create1ServiceFeature($data)
    {
        $oSelect = $this->create($data);
        return $oSelect->service_feature_id;
    }

//    Xóa danh sách tính năng theo id dịch vụ
    public function deleteServiceFeature($id)
    {
        $oSelect = $this->where('service_id',$id)->delete();
        return $oSelect;
    }

//    Lấy danh sách tính năng theo id dịch vụ
    public function getListById($id)
    {
        $oSelect = $this
            ->join('admin_feature_group','admin_feature_group.feature_group_id','admin_service_feature.feature_group_id')
            ->where('service_id',$id)
            ->where('is_deleted',0)->get();
        return $oSelect;
    }

    public function getAllBrandFeatureById($data)
    {
        $oSelect = $this->whereIn('service_id',$data)->select('feature_group_id')->get()->toArray();
        return $oSelect;
    }

//    Lấy danh sách dịch vụ theo id tính năng
    public function getListServiceByFeatureId($id)
    {
        $oSelect = $this
            ->join('admin_service','admin_service.service_id','admin_service_feature.service_id')
            ->where('admin_service_feature.feature_group_id',$id)
            ->where('is_deleted',0)->groupBy('admin_service_feature.service_id')->orderBy('service_feature_id','DESC')->select('admin_service.*')->get();
        return $oSelect;
    }
}