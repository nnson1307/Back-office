<?php


namespace Modules\Service\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class AdminServiceBrandFeatureTable extends Model
{
    use ListTableTrait;
    protected $table = "admin_service_brand_feature";
    protected $primaryKey = "service_brand_feature_id";
    protected $fillable = [
        "service_brand_feature_id",
        "brand_id",
        "service_id",
        "feature_group_id",
        "is_actived",
        "created_at",
        "created_by",
        "updated_at",
        "updated_by",
        "brand_update_at",
        "brand_update_by"
    ];

    public function createBrandFeature($data)
    {
        $oSelect = $this->insert($data);
        return $oSelect;
    }

    public function create1BrandFeature($data)
    {
        $oSelect = $this->create($data);
        return $oSelect->service_brand_feature_id;
    }

    public function deleteByBrandId($id)
    {
        $oSelect = $this->where('brand_id',$id)->delete();
        return $oSelect;
    }

    public function getServiceBrandFeature($id)
    {
        $oSelect = $this->where('brand_id',$id)->get();
        return $oSelect;
    }

    public function checkFeatureById($id)
    {
        $oSelect = $this->where('feature_group_id',$id)->count();
        return $oSelect;
    }

    public function getListBrandByFeatureId($id)
    {
        $oSelect = $this
            ->join('brand','brand.brand_id','admin_service_brand_feature.brand_id')
            ->where('admin_service_brand_feature.feature_group_id',$id)
            ->groupBy('admin_service_brand_feature.brand_id')
            ->orderBy('admin_service_brand_feature.brand_id','DESC')
            ->select('brand.*','admin_service_brand_feature.is_actived as feature_is_actived')
            ->get();
        return $oSelect;
    }

    /**
     * Get item service brand feature
     *
     * @param $brand_id
     * @param $service_id
     * @param $feature_group_id
     * @return mixed
     */
    public function getServiceBrandFeatureByServiceBrand($brand_id, $service_id, $feature_group_id)
    {
        $oSelect = $this->where('brand_id',$brand_id)
            ->where('service_id',$service_id)
            ->where('feature_group_id',$feature_group_id)
            ->first();
        return $oSelect;
    }
}
