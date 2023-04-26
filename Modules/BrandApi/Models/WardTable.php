<?php


namespace Modules\BrandApi\Models;


use Illuminate\Database\Eloquent\Model;

class WardTable extends Model
{
    protected $table = "ward";
    protected $primaryKey = "ward_id";
    protected $fillable = [
        "ward_id",
        "name",
        "type",
        "location",
        "district_id",
        "ward_code",
        "is_actived",
        "is_deleted",
        "created_at",
        "updated_at",
        "created_by",
        "updated_by"
    ];

    const NOT_DELETED = 0;
    const ACTIVE = 1;

    public function getWardOption($district_id)
    {
        $get_all = $this
            ->select("ward.ward_id", "ward.name", "ward.type")
            ->join("district", "district.district_id", "=", "{$this->table}.district_id")
            ->join("province", "province.province_id", "=", "district.province_id")
            ->join("country", "country.country_id", "=", "province.country_id")
            ->where("country.is_deleted", self::NOT_DELETED)
            ->where("country.is_actived", self::ACTIVE)
            ->where("province.is_deleted", self::NOT_DELETED)
            ->where("province.is_actived", self::ACTIVE)
            ->where("district.is_deleted", self::NOT_DELETED)
            ->where("district.is_actived", self::ACTIVE)
            ->where("ward.district_id", $district_id)
            ->where("ward.is_actived", self::ACTIVE)
            ->where("ward.is_deleted", self::NOT_DELETED)
            ->get();
        return $get_all;
    }

    /**
     * Danh sách phường xã
     *
     * @param $filter
     * @return mixed
     */
    public function getWards($filter)
    {
        $ds = $this
            ->select(
                "country.country_name",
                "province.name as province_name",
                "district.name as district_name",
                "{$this->table}.ward_id",
                "{$this->table}.name as ward_name",
                "{$this->table}.ward_code",
                "{$this->table}.is_actived",
                "{$this->table}.type"
            )
            ->join("district", "district.district_id", "=", "{$this->table}.district_id")
            ->join("province", "province.province_id", "=", "district.province_id")
            ->join("country", "country.country_id", "=", "province.country_id")
            ->where("country.is_deleted", 0)
            ->where("province.is_deleted", 0)
            ->where("district.is_deleted", 0)
            ->where("{$this->table}.is_deleted", 0);

        // get số trang
        $page = (int)($filter['page'] ?? 1);
        $perPage = (int)($filter['perpage'] ?? PAGING_ITEM_PER_PAGE);

        // Filter country name
        if (isset($filter['country_name']) && $filter['country_name'] != "") {
            $ds->where("country.country_name", 'LIKE', '%' . $filter['country_name'] . '%');
        }

        // Filter province name
        if (isset($filter['province_name']) && $filter['province_name'] != "") {
            $ds->where("province.name", 'LIKE', '%' . $filter['province_name'] . '%');
        }

        // Filter district name
        if (isset($filter['district_name']) && $filter['district_name'] != "") {
            $ds->where("district.name", 'LIKE', '%' . $filter['district_name'] . '%');
        }

        // Filter ward name
        if (isset($filter['ward_name']) && $filter['ward_name'] != "") {
            $ds->where("{$this->table}.name", 'LIKE', '%' . $filter['ward_name'] . '%');
        }

        // Filter ward code
        if (isset($filter['ward_code']) && $filter['ward_code'] != "") {
            $ds->where("{$this->table}.ward_code", 'LIKE', '%' . $filter['ward_code'] . '%');
        }

        // Filter trạng thái
        if (isset($filter['is_actived']) && $filter['is_actived'] != "") {
            $ds->where("{$this->table}.is_actived", $filter['is_actived']);
        }

        return $ds->orderBy("{$this->table}.ward_id", "desc")->paginate($perPage, $columns = ["*"], $pageName = 'page', $page);
    }

    /**
     * Chi tiết phường xã
     *
     * @param $wardId
     * @return mixed
     */
    public function getInfo($wardId)
    {
        return $this
            ->select(
                "country.country_name",
                "province.name as province_name",
                "district.name as district_name",
                "{$this->table}.ward_id",
                "{$this->table}.name as ward_name",
                "{$this->table}.ward_code",
                "{$this->table}.is_actived",
                "{$this->table}.type"
            )
            ->join("district", "district.district_id", "=", "{$this->table}.district_id")
            ->join("province", "province.province_id", "=", "district.province_id")
            ->join("country", "country.country_id", "=", "province.country_id")
            ->where("{$this->table}.ward_id", $wardId)
            ->where("country.is_deleted", 0)
            ->where("province.is_deleted", 0)
            ->where("district.is_deleted", 0)
            ->where("{$this->table}.is_deleted", 0)
            ->first();
    }

    /**
     * Kiểm tra phường xã
     *
     * @param $countryName
     * @param $provinceName
     * @param $districtName
     * @param $wardName
     * @return mixed
     */
    public function checkWard($countryName, $provinceName, $districtName, $wardName)
    {
        return $this
            ->select(
                "country.country_name",
                "province.name as province_name",
                "district.name as district_name",
                "{$this->table}.ward_id",
                "{$this->table}.name as ward_name",
                "{$this->table}.ward_code",
                "{$this->table}.is_actived",
                "{$this->table}.type"
            )
            ->join("district", "district.district_id", "=", "{$this->table}.district_id")
            ->join("province", "province.province_id", "=", "district.province_id")
            ->join("country", "country.country_id", "=", "province.country_id")
            ->where("country.country_name", $countryName)
            ->where("province.name", $provinceName)
            ->where("district.name", $districtName)
            ->where("{$this->table}.name", $wardName)
            ->where("country.is_deleted", 0)
            ->where("province.is_deleted", 0)
            ->where("district.is_deleted", 0)
            ->where("{$this->table}.is_deleted", 0)
            ->first();
    }
}
