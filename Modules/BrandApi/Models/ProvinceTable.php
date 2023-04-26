<?php


namespace Modules\BrandApi\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProvinceTable extends Model
{
    protected $table = 'province';
    protected $primaryKey = 'province_id';
    protected $fillable = [
        'province_id',
        'name',
        'province_code',
        'type',
        'location_id',
        'country_id',
        'sort',
        'is_actived',
        'is_deleted',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    const NOT_DELETED = 0;
    const ACTIVE = 1;

    /**
     * Option tỉnh thành
     * @param null $country_id
     *
     * @return mixed
     */
    public function getProvinceOption($country_id = null)
    {
        $get_all = $this
            ->leftJoin('country', function ($join) {
                $join->on('country.country_id', '=', 'province.country_id')
                    ->where('country.is_actived', self::ACTIVE)
                    ->where('country.is_deleted', self::NOT_DELETED);
            })
            ->select('province.province_id', 'province.name', 'province.type')
            ->where('province.is_actived', self::ACTIVE)
            ->where('province.is_deleted', self::NOT_DELETED);
        if ($country_id != null) {
            $get_all->where('province.country_id', $country_id);
        }
        return $get_all->get();
    }

    /**
     * Danh sách tỉnh thành
     *
     * @param $filter
     * @return mixed
     */
    public function getProvinces($filter)
    {
        $ds = $this
            ->select(
                "country.country_name",
                "{$this->table}.province_id",
                "{$this->table}.name as province_name",
                "{$this->table}.province_code",
                "{$this->table}.is_actived",
                "{$this->table}.type"
            )
            ->join("country", "country.country_id", "=", "{$this->table}.country_id")
            ->where("country.is_deleted", self::NOT_DELETED)
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
            $ds->where("{$this->table}.name", 'LIKE', '%' . $filter['province_name'] . '%');
        }

        // Filter province code
        if (isset($filter['province_code']) && $filter['province_code'] != "") {
            $ds->where("{$this->table}.province_code", 'LIKE', '%' . $filter['province_code'] . '%');
        }

        // Filter trạng thái
        if (isset($filter['is_actived']) && $filter['is_actived'] != "") {
            $ds->where("{$this->table}.is_actived", $filter['is_actived']);
        }

        // Filter trạng thái
        if (isset($filter['country_is_actived']) && $filter['country_is_actived'] != "") {
            $ds->where("country.is_actived", $filter['country_is_actived']);
        }

        // Filter theo countruy_id
        if (isset($filter['country_id']) && $filter['country_id'] != "") {
            $ds->where("{$this->table}.country_id", $filter['country_id']);
        }

        // Filter theo countruy_id
        if (isset($filter['array_province_id'])) {
            $ds->whereIn("{$this->table}.province_id", $filter['array_province_id']);
        }
        return $ds->orderBy("{$this->table}.province_id", "desc")->paginate($perPage, $columns = ["*"], $pageName = 'page', $page);
    }

    /**
     * Chi tiết tỉnh thành
     *
     * @param $provinceId
     * @return mixed
     */
    public function getInfo($provinceId)
    {
        return $this
            ->select(
                "country.country_name",
                "{$this->table}.province_id",
                "{$this->table}.name as province_name",
                "{$this->table}.province_code",
                "{$this->table}.is_actived",
                "{$this->table}.type"
            )
            ->join("country", "country.country_id", "=", "{$this->table}.country_id")
            ->where("{$this->table}.province_id", $provinceId)
            ->where("country.is_deleted", self::NOT_DELETED)
            ->where("{$this->table}.is_deleted", self::NOT_DELETED)
            ->first();
    }

    /**
     * Kiểm tra tỉnh thành
     *
     * @param $countryName
     * @param $provinceName
     * @return mixed
     */
    public function checkProvince($countryName, $provinceName)
    {
        return $this
            ->select(
                "country.country_name",
                "{$this->table}.province_id",
                "{$this->table}.name as province_name",
                "{$this->table}.province_code",
                "{$this->table}.is_actived",
                "{$this->table}.type"
            )
            ->join("country", "country.country_id", "=", "{$this->table}.country_id")
            ->where("country.country_name", $countryName)
            ->where("{$this->table}.name", $provinceName)
            ->where("country.is_deleted", self::NOT_DELETED)
            ->where("{$this->table}.is_deleted", self::NOT_DELETED)
            ->first();
    }

    /**
     * Option tỉnh thành phải có quốc gia
     * @param null $country_id
     *
     * @return mixed
     */
    public function getProvinceCountry($country_id)
    {

        $get_all = $this->leftJoin('country', function ($join) {
                $join->on('country.country_id', '=', 'province.country_id')
                    ->on(DB::raw('dmspro_mys_country.is_actived'), '=', DB::raw("'1'"))
                    ->on(DB::raw('dmspro_mys_country.is_deleted'), '=', DB::raw("'0'"));
            })
            ->select('province.province_id', 'province.name', 'province.type')
            ->where('province.is_actived', 1)
            ->where('province.is_deleted', 0)
            ->where('country.is_deleted', 0)
            ->where('country.is_actived', 1)
            ->where('province.country_id', $country_id);
        return $get_all->get();
    }

    /**
     * Option tỉnh thành phải có quốc gia
     * @param null $country_id
     *
     * @return mixed
     */
    public function getProvinceArea($area)
    {
        $get_all = $this
            ->select('province.province_id', 'province.name', 'province.type')
            ->where('province.is_actived', 1)
            ->where('province.is_deleted', 0)
            ->whereIn('province_id', $area);

        return $get_all->get();
    }
}
