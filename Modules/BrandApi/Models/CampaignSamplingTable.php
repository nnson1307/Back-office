<?php
/**
 * Created by PhpStorm   .
 * User: Mr Son
 * Date: 2020-01-20
 * Time: 4:27 PM
 * @author SonDepTrai
 */

namespace Modules\BrandApi\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class CampaignSamplingTable extends Model
{
    protected $connection = "mysql2";
    protected $table = "campaign";
    protected $primaryKey = "campaign_id";
    protected $fillable = [
        "campaign_id",
        "campaign_name",
        "campaign_code",
        "campaign_start",
        "campaign_end",
        "campaign_description",
        "tenant_id",
        "adward_verify_type",
        "partner_endpoint",
        "partner_campaign_id",
        "partner_code",
        "quota",
        "is_active",
        "created_at",
        "updated_at",
        "created_by",
        "updated_by"
    ];


    /**
     * Danh sách chương trình sampling
     *
     * @param $filter
     * @return mixed
     */
    public function getSamplings($filter)
    {
        $ds = $this
            ->select(
                "campaign_id",
                "campaign_name",
                "campaign_start",
                "campaign_end",
                "adward_verify_type",
                "is_active"
            );

        // get số trang
        $page = (int)($filter['page'] ?? 1);
        $perPage = (int)($filter['perpage'] ?? PAGING_ITEM_PER_PAGE);

        //Filter time marketing
        if (isset($filter["time_marketing"]) != "") {
            $arr_filter = explode(" - ", $filter["time_marketing"]);
            $startTime = Carbon::createFromFormat("d/m/Y", $arr_filter[0])->format("Y-m-d");
            $endTime = Carbon::createFromFormat("d/m/Y", $arr_filter[1])->format("Y-m-d");
            $ds->where(function ($query) use ($startTime) {
                $query->where("campaign_start", ">=", $startTime)
                    ->orWhere("campaign_end", ">=", $startTime);
            })->where(function ($query) use ($endTime) {
                $query->where("campaign_start", "<=", $endTime)
                    ->orWhere("campaign_end", "<=", $endTime);
            });
        }

        // Filter campaign name
        if (isset($filter['campaign_name']) && $filter['campaign_name'] != "") {
            $ds->where("campaign_name", 'LIKE', '%' . $filter['campaign_name'] . '%');
        }
        // Filter campaign type
        if (isset($filter['campaign_type']) && $filter['campaign_type'] != "") {
            $ds->where("campaign_type", $filter['campaign_type']);
        }
        // Filter adward_verify_type
        if (isset($filter['adward_verify_type']) && $filter['adward_verify_type'] != "") {
            $ds->where("adward_verify_type", $filter['adward_verify_type']);
        }
        // Filter is_active
        if (isset($filter['is_active']) && $filter['is_active'] != "") {
            $ds->where("is_active", $filter['is_active']);
        }
        // Sort campaign name
        if (isset($filter['sort_campaign$campaign_name']) && $filter['sort_campaign$campaign_name'] != "") {
            $ds->orderBy("campaign_name", $filter['sort_campaign$campaign_name']);
        }
        // Sort campaign start
        if (isset($filter['sort_campaign$campaign_start']) && $filter['sort_campaign$campaign_start'] != "") {
            $ds->orderBy("campaign_start", $filter['sort_campaign$campaign_start']);
        }
        // Sort campaign end
        if (isset($filter['sort_campaign$campaign_end']) && $filter['sort_campaign$campaign_end'] != "") {
            $ds->orderBy("campaign_end", $filter['sort_campaign$campaign_end']);
        }
        // Sort is_actived
        if (isset($filter['sort_campaign$is_active']) && $filter['sort_campaign$is_active'] != "") {
            $ds->orderBy("is_active", $filter['sort_campaign$is_active']);
        }
        // Sort adward_verify_type
        if (isset($filter['sort_campaign$adward_verify_type']) && $filter['sort_campaign$adward_verify_type'] != "") {
            $ds->orderBy("adward_verify_type", $filter['sort_campaign$adward_verify_type']);
        }
        // Sort created_at
        if (isset($filter['sort_campaign$created_at']) && $filter['sort_campaign$created_at'] != "") {
            $ds->orderBy("created_at", $filter['sort_campaign$created_at']);
        }

        return $ds->paginate($perPage, $columns = ["*"], $pageName = 'page', $page);
    }

    /**
     * Thêm Campaign Sampling
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $add = $this->create($data);
        return $add->campaign_id;
    }

    /**
     * Lấy dữ liệu campaign sampling
     *
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this
            ->select(
                "campaign_id",
                "campaign_name",
                "campaign_code",
                "campaign_start",
                "campaign_end",
                "campaign_description",
                "adward_verify_type",
                "partner_campaign_id",
                "is_active",
                "quota"
            )
            ->where("campaign_id", $id)
            ->first();
    }

    /**
     * Chỉnh sửa Campaign Sampling
     *
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        return $this->where("campaign_id", $id)->update($data);
    }
}