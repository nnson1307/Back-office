<?php


namespace Modules\Service\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use MyCore\Models\Traits\ListTableTrait;

class AdminServiceTable extends Model
{
    use ListTableTrait;
    protected $table = "admin_service";
    protected $primaryKey = "service_id";
    protected $fillable = [
        "service_id",
        "service_name_vi",
        "service_name_en",
        "description_short",
        "description",
        "is_actived",
        "created_at",
        "created_by",
        "updated_at",
        "updated_by"
    ];

    public function getListCore(array &$filters = [])
    {
        $oSelect = $this
            ->select('admin_service.*',
                DB::raw('(SELECT COUNT(*) FROM piospa_admin_service_feature where piospa_admin_service.service_id = piospa_admin_service_feature.service_id and piospa_admin_service_feature.is_deleted = 0 ) as service_feature'),
                DB::raw('(SELECT COUNT(*) FROM piospa_admin_service_brand where piospa_admin_service.service_id = piospa_admin_service_brand.service_id and piospa_admin_service_brand.is_deleted = 0 and piospa_admin_service_brand.is_actived = 1) as service_brand')
                );
        if (isset($filters['service_id'])){
            $oSelect = $oSelect->whereNotIn('admin_service.service_id',$filters['service_id']);
        }

        if (isset($filters['service_id_api'])) {
            $oSelect = $oSelect->whereIn('admin_service.service_id',$filters['service_id_api']);
        }
        $oSelect = $oSelect->orderBy('admin_service.updated_at','DESC');
        unset($filters['service_id']);
        unset($filters['service_id_api']);
        return $oSelect;
    }

//    Tạo mới thông tin dịch vụ
    public function createService($data)
    {
        $oSelect = $this->insertGetId($data);
        return $oSelect;
    }

//    Cập nhật thông tin dịch vụ
    public function updateService($id,$data)
    {
        $oSelect = $this->where('service_id',$id)->update($data);
        return $oSelect;
    }

//    lấy chi tiết thông tin dịch vụ
    public function getDetail($id)
    {
        $oSelect = $this->where('service_id',$id)->first();
        return $oSelect;
    }

//    lấy danh sách dịch vụ theo Sesstion
    public function getListServiceBySession($data)
    {
        $oSelect = $this->whereIn('service_id',$data)->orderBy('service_id','DESC')->get();
        return $oSelect;
    }

    public function getListServiceByBrandId($id)
    {
        $oSelect = $this
            ->join('admin_service_brand','admin_service_brand.service_id','admin_service.service_id')
            ->where('admin_service_brand.brand_id',$id)->orderBy('admin_service.service_id','DESC')
            ->select('admin_service.*')->get();
        return $oSelect;
    }
}