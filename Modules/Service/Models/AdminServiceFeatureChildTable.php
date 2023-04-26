<?php


namespace Modules\Service\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use MyCore\Models\Traits\ListTableTrait;

class AdminServiceFeatureChildTable extends Model
{
    use ListTableTrait;
    protected $table = "admin_service_feature_child";
    protected $primaryKey = "service_feature_child_id";
    protected $fillable = [
        "service_feature_child_id",
        "service_feature_id",
        "service_id",
        "feature_group_id",
        "feature_id",
        "feature_code",
        "is_deleted",
        "created_at",
        "created_by",
        "updated_at",
        "updated_by"
    ];
    CONST IS_DELETED = 0;

    /**
     * Tạo nhiều chức năng con của từng service , group
     *
     * @param $data
     * @return mixed
     */
    public function createServiceFeatureChild($data)
    {
        $oSelect = $this->insert($data);
        return $oSelect;
    }

    /**
     * Ds chức năng con hiện tại của dịch vụ, nhóm
     *
     * @param $id
     * @param $group
     * @return mixed
     */
    public function getListFeatureByServiceAndGroupId($id, $group)
    {
        $oSelect = $this->select(
            "service_feature_child_id",
            "service_feature_id",
            "service_id",
            "feature_group_id",
            "feature_id",
            "feature_code",
            "is_deleted",
            "created_at",
            "created_by",
            "updated_at",
            "updated_by")
            ->where('service_id',$id)
            ->where('feature_group_id',$group)
            ->where('is_deleted',self::IS_DELETED)->get();
        return $oSelect;
    }

    /**
     * Xoá hết chức năng con của 1 dịch vụ
     *
     * @param $id
     * @return mixed
     */
    public function deleteServiceFeatureChild($id)
    {
        $oSelect = $this->where('service_id',$id)->delete();
        return $oSelect;
    }
}