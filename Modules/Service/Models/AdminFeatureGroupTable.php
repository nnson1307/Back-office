<?php


namespace Modules\Service\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use MyCore\Models\Traits\ListTableTrait;

class AdminFeatureGroupTable extends Model
{
    use ListTableTrait;
    protected $table = "admin_feature_group";
    protected $primaryKey = "feature_group_id";
    protected $fillable = [
        "feature_group_id",
        "feature_group_name_vi",
        "feature_group_name_en",
        "feature_group_name_redefine",
        "description_short",
        "description",
        "is_actived",
        "created_at",
        "created_by",
        "updated_at",
        "updated_by"
    ];

    public function getListCore(array $filters = [])
    {
        $oSelect = $this->orderBy('updated_at','DESC');
        return $oSelect;
    }

    public function getListAll($filters)
    {
        $oSelect = $this->whereNotIn('feature_group_id',$filters)->orderBy('feature_group_id','DESC')->get();
        return $oSelect;
    }

    public function getListFeatureBySesstion($data)
    {
        $oSelect = $this->whereIn('feature_group_id',$data)->orderBy('feature_group_id','DESC')->get();
        return $oSelect;
    }

    public function getListFeatureByIdSessionService($data)
    {
        $oSelect = $this
            ->join('admin_service_feature', 'admin_service_feature.feature_group_id','admin_feature_group.feature_group_id')
            ->whereIn('admin_service_feature.service_id',$data)
            ->select('admin_feature_group.*','admin_service_feature.service_id as service_id')
            ->get();
        return $oSelect;
    }

    public function getListFeatureByIdBrand($id)
    {
        $oSelect = $this
            ->join('admin_service_brand_feature', 'admin_service_brand_feature.feature_group_id','admin_feature_group.feature_group_id')
            ->where('admin_service_brand_feature.brand_id',$id)
            ->select('admin_feature_group.*','admin_service_brand_feature.service_id as service_id')
            ->get();
        return $oSelect;
    }

    public function getDetail($id)
    {
        $oSelect = $this->where('feature_group_id',$id)->first();
        return $oSelect;
    }

    public function checkName($id,$name)
    {
        $oSelect = $this->where('feature_group_id','<>',$id)->where('feature_group_name_redefine',$name)->count();
        return $oSelect;
    }

    public function updateNameRedefine($id,$name)
    {
        $oSelect = $this->where('feature_group_id',$id)->update(['feature_group_name_redefine' => $name]);
        return $oSelect;
    }

    public function updateFeatureGroup($id,$data) {
        unset($data['feature_group_id']);
        $oSelect = $this->where('feature_group_id',$id)->update($data);
        return $oSelect;
    }

    public function getListFeatureById($data)
    {
        $oSelect = $this->whereIn('feature_group_id',$data)->get();
        return $oSelect;
    }
}