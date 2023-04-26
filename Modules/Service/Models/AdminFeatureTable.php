<?php


namespace Modules\Service\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use MyCore\Models\Traits\ListTableTrait;

class AdminFeatureTable extends Model
{
    use ListTableTrait;
    protected $table = "admin_feature";
    protected $primaryKey = "feature_id";
    protected $fillable = [
        "feature_id",
        "feature_group_id",
        "feature_name_vi",
        "feature_name_en",
        "feature_code",
        "service_type",
        "platform_type",
        "description",
        "brand_action_id",
        "is_actived",
        "created_at",
        "created_by",
        "updated_at",
        "updated_by"
    ];
    CONST IS_ACTIVE = 1;

    public function getListFeatureByGroupId($id)
    {
        $oSelect = $this->select(
            "feature_id",
            "feature_group_id",
            "feature_name_vi as feature_name",
            "feature_name_en",
            "feature_code",
            "service_type",
            "platform_type",
            "description",
            "brand_action_id",
            "is_actived",
            "created_at",
            "created_by",
            "updated_at",
            "updated_by")
            ->where('feature_group_id',$id)
            ->where('is_actived',self::IS_ACTIVE)->get();
        return $oSelect;
    }
    public function getListIdFeatureByIdGroup($id)
    {
        $oSelect = $this->select(
            "feature_id")
            ->where('feature_group_id',$id)
            ->where('is_actived',self::IS_ACTIVE)->get();
        return $oSelect;
    }
    public function getFeatureCodeByFeatureId($id)
    {
        $oSelect = $this->select(
            "feature_code")
            ->where('feature_id',$id)
            ->where('is_actived',self::IS_ACTIVE)->first();
        return $oSelect;
    }
}