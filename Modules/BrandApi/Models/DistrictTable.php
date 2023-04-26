<?php


namespace Modules\BrandApi\Models;


use Illuminate\Database\Eloquent\Model;

class DistrictTable extends Model
{
    protected $table = 'district';
    protected $primaryKey = 'district_id';
    protected $fillable = [
        'district_id',
        'name',
        'district_code',
        'type',
        'location',
        'province_id',
        'is_actived',
        'is_deleted',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    const NOT_DELETED = 0;
    const ACTIVE = 1;

    public function getDistrictOption($id_province)
    {
        $get_all = $this->select('district.district_id', 'district.name', 'district.type')
            ->join("province", "province.province_id", "=", "{$this->table}.province_id")
            ->join("country", "country.country_id", "=", "province.country_id")
            ->where("country.is_deleted", self::NOT_DELETED)
            ->where("country.is_actived", self::ACTIVE)
            ->where("province.is_deleted", self::NOT_DELETED)
            ->where("province.is_actived", self::ACTIVE)
            ->where('district.province_id', $id_province)
            ->where('district.is_actived', self::ACTIVE)
            ->where('district.is_deleted', self::NOT_DELETED)
            ->get();
        return $get_all;
    }

    /**
     * Danh sách quận huyện
     *
     * @param $filter
     * @return mixed
     */
    public function getDistricts($filter)
    {
        $ds = $this
            ->select(
                "country.country_name",
                "province.name as province_name",
                "{$this->table}.district_id",
                "{$this->table}.name as district_name",
                "{$this->table}.district_code",
                "{$this->table}.is_actived",
                "{$this->table}.type"
            )
            ->join("province", "province.province_id", "=", "{$this->table}.province_id")
            ->join("country", "country.country_id", "=", "province.country_id")
            ->where("country.is_deleted", self::NOT_DELETED)
            ->where("province.is_deleted", self::NOT_DELETED)
            ->where("{$this->table}.is_deleted", self::NOT_DELETED);

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
            $ds->where("{$this->table}.name", 'LIKE', '%' . $filter['district_name'] . '%');
        }

        // Filter district code
        if (isset($filter['district_code']) && $filter['district_code'] != "") {
            $ds->where("{$this->table}.district_code", 'LIKE', '%' . $filter['district_code'] . '%');
        }

        // Filter trạng thái
        if (isset($filter['is_actived']) && $filter['is_actived'] != "") {
            $ds->where("{$this->table}.is_actived", $filter['is_actived']);
        }

        return $ds->orderBy("{$this->table}.district_id", "desc")->paginate($perPage, $columns = ["*"], $pageName = 'page', $page);
    }

    /**
     * Chi tiết quận huyện
     *
     * @param $districtId
     * @return mixed
     */
    public function getInfo($districtId)
    {
        return $this
            ->select(
                "country.country_name",
                "province.name as province_name",
                "{$this->table}.district_id",
                "{$this->table}.name as district_name",
                "{$this->table}.district_code",
                "{$this->table}.is_actived",
                "{$this->table}.type"
            )
            ->join("province", "province.province_id", "=", "{$this->table}.province_id")
            ->join("country", "country.country_id", "=", "province.country_id")
            ->where("{$this->table}.district_id", $districtId)
            ->where("country.is_deleted", self::NOT_DELETED)
            ->where("province.is_deleted", self::NOT_DELETED)
            ->where("{$this->table}.is_deleted", self::NOT_DELETED)
            ->first();
    }

    /**
     * Kiểm tra quận huyện
     *
     * @param $countryName
     * @param $provinceName
     * @param $districtName
     * @return mixed
     */
    public function checkDistrict($countryName, $provinceName, $districtName)
    {
        return $this
            ->select(
                "country.country_name",
                "province.name as province_name",
                "{$this->table}.district_id",
                "{$this->table}.name as district_name",
                "{$this->table}.district_code",
                "{$this->table}.is_actived",
                "{$this->table}.type"
            )
            ->join("province", "province.province_id", "=", "{$this->table}.province_id")
            ->join("country", "country.country_id", "=", "province.country_id")
            ->where("country.country_name", $countryName)
            ->where("province.name", $provinceName)
            ->where("{$this->table}.name", $districtName)
            ->where("country.is_deleted", self::NOT_DELETED)
            ->where("province.is_deleted", self::NOT_DELETED)
            ->where("{$this->table}.is_deleted", self::NOT_DELETED)
            ->first();
    }
}
