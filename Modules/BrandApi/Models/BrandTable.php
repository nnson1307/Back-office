<?php


namespace Modules\BrandApi\Models;


use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class BrandTable extends Model
{

    use ListTableTrait;
    protected $table = "brand";
    protected $primaryKey = "brand_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable
        = [
            "brand_id",
            "parent_id",
            "tenant_id",
            "brand_name",
            "brand_code",
            "brand_url",
            "brand_avatar",
            "brand_banner",
            "brand_about",
            "company_name",
            "company_code",
            "hotline",
            "position",
            "display_name",
            "is_published",
            "is_activated",
            "is_deleted",
            "created_at",
            "updated_at",
            "created_by",
            "updated_by"
        ];

    /**
     * Tìm kiếm brand theo tên công ty hoặc mã công ty
     * @param $filters
     *
     * @return mixed
     */
    public function search($filters)
    {
        $select = $this
            ->where("brand.company_name", "like", "%" . $filters["company_name_code"] . "%")
            ->orWhere("brand.company_code", "like", "%" . $filters["company_name_code"] . "%")
            ->get();
        return $select;
    }

    /**
     * Lấy thông tin brand by tenant_id
     *
     * @param $tenantId
     * @return mixed
     */
    public function getBrandByTenant($tenantId)
    {
        return $this
            ->select(
                "brand_id",
                "parent_id",
                "tenant_id",
                "brand_name",
                "brand_code",
                "brand_url",
                "brand_avatar",
                "brand_banner",
                "brand_about",
                "company_name",
                "company_code",
                "hotline",
                "position",
                "display_name",
                "is_published",
                "is_activated",
                "is_deleted"
            )
            ->where("tenant_id", $tenantId)
            ->first();
    }

    public function editBrand($data,$id)
    {
        $oSelect = $this->where('brand_id',$id)->update($data);
        return $data;
    }

    public function checkBrand($data,$id)
    {
        $oSelect = $this->where($data)->where('brand_id','<>',$id)->count();
        return $oSelect;
    }

}