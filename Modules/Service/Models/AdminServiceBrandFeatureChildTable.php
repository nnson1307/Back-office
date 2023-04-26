<?php


namespace Modules\Service\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class AdminServiceBrandFeatureChildTable extends Model
{
    use ListTableTrait;
    protected $table = "admin_service_brand_feature_child";
    protected $primaryKey = "service_brand_feature_child_id";
    protected $fillable = [
        "service_brand_feature_child_id",
        "service_brand_feature_id",
        "brand_id",
        "service_id",
        "feature_group_id",
        "feature_id",
        "feature_code",
        "is_actived",
        "created_at",
        "created_by",
        "updated_at",
        "updated_by",
        "brand_update_at",
        "brand_update_by"
    ];

    /**
     * Create brand feature chil get key
     *
     * @param $data
     * @return mixed
     */
    public function createBrandFeatureChild($data)
    {
        $oSelect = $this->create($data);
        return $oSelect->service_brand_feature_child_id;
    }

    /**
     * insert brand feature child array
     *
     * @param $data
     * @return mixed
     */
    public function insertBrandFeatureChild($data)
    {
        $oSelect = $this->insert($data);
        return $oSelect;
    }
    public function deleteBrandFeatureChildByBrand($id)
    {
        return $this->where('brand_id', $id)->delete();
    }

}
