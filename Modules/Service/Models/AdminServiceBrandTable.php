<?php
namespace Modules\Service\Models;


use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class AdminServiceBrandTable extends Model
{
    use ListTableTrait;
    protected $table = "admin_service_brand";
    protected $primaryKey = "service_brand_id";
    protected $fillable = [
        "service_brand_id",
        "service_id",
        "brand_id",
        "is_deleted",
        "is_actived",
        "created_by",
        "created_at",
        "updated_by",
        "updated_at"
    ];

    public function createBrand($data)
    {
        $oSelect = $this->insert($data);
        return $oSelect;
    }

    public function getListServiceByBrandId($id)
    {
        $oSelect = $this->where('brand_id',$id)->get();
        return $oSelect;
    }

    public function deleteByBrandId($id)
    {
        $oSelect = $this->where('brand_id',$id)->delete();
        return $oSelect;
    }

    public function getServiceBrand($id)
    {
        $oSelect = $this->where('brand_id',$id)->get();
        return $oSelect;
    }

    public function checkService($idService)
    {
        $oSelect = $this->where('service_id',$idService)->count();
        return $oSelect;
    }
}