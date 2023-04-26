<?php


namespace Modules\BrandApi\Models;

use Illuminate\Database\Eloquent\Model;

class CountryTable extends Model
{
    protected $table = "country";
    protected $primaryKey = "country_id";
    protected $fillable
        = [
            "country_id", "country_name", "country_code", "is_actived",
            "is_deleted", "created_at", "updated_at", "created_by", "updated_by"
        ];

    const NOT_DELETED = 0;
    const ACTIVE = 1;

    /**
     * Option quốc gia
     * @return mixed
     */
    public function getOption()
    {
        $oSelect = $this->select("country_id", "country_name")
            ->where("is_deleted", self::NOT_DELETED)
            ->where("is_actived", self::ACTIVE)
            ->get();
        return $oSelect;
    }

    /**
     * Danh sách quốc gia
     *
     * @param $filter
     * @return mixed
     */
    public function getCountries($filter)
    {
        $ds = $this
            ->select(
                "country_id",
                "country_name",
                "country_code",
                "is_actived"
            )
            ->where("is_deleted", self::NOT_DELETED);

        // get số trang
        $page = (int)($filter['page'] ?? 1);
        $perPage = (int)($filter['perpage'] ?? PAGING_ITEM_PER_PAGE);

        // Filter country name
        if (isset($filter['country_name']) && $filter['country_name'] != "") {
            $ds->where("country_name", 'LIKE', '%' . $filter['country_name'] . '%');
        }

        // Filter country code
        if (isset($filter['country_code']) && $filter['country_code'] != "") {
            $ds->where("country_code", 'LIKE', '%' . $filter['country_code'] . '%');
        }

        // Filter trạng thái
        if (isset($filter['is_actived']) && $filter['is_actived'] != "") {
            $ds->where("is_actived", $filter['is_actived']);
        }

        return $ds->orderBy("country_id", "desc")->paginate($perPage, $columns = ["*"], $pageName = 'page', $page);
    }

    /**
     * Lấy chi tiết quốc gia
     *
     * @param $countryId
     * @return mixed
     */
    public function getInfo($countryId)
    {
        return $this
            ->select(
                "country_id",
                "country_name",
                "country_code",
                "is_actived"
            )
            ->where("country_id", $countryId)
            ->where("is_deleted", self::NOT_DELETED)
            ->first();
    }

    /**
     * Kiểm tra quốc gia
     * =
     * @param $countryName
     * @return mixed
     */
    public function checkCountry($countryName)
    {
        return $this
            ->select(
                "country_id",
                "country_name",
                "country_code",
                "is_actived"
            )
            ->where("country_name", $countryName)
            ->where("is_deleted", self::NOT_DELETED)
            ->first();
    }
}
