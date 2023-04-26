<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 01-04-02020
 * Time: 10:11 AM
 */

namespace Modules\BrandApi\Models;


use Illuminate\Database\Eloquent\Model;

class BrandConfigTable extends Model
{
    protected $table = "brand_config";
    protected $primaryKey = "brand_id";
    protected $fillable = [
        "brand_id",
        "connect_code_active",
        "connect_code_check_phone",
        "connect_phone_active",
        "connect_approve_auto",
        "connect_required_location",
        "connect_allow_update_location",
        "connect_show_policy",
        "policy_title",
        "policy_content",
        "created_at",
        "created_by",
        "updated_at",
        "updated_by"
    ];

    /**
     * Lấy thông tin brand config
     *
     * @param $brandId
     * @return mixed
     */
    public function getInfo($brandId)
    {
        return $this
            ->select(
                "brand_id",
                "connect_code_active",
                "connect_code_check_phone",
                "connect_phone_active",
                "connect_approve_auto",
                "connect_required_location",
                "connect_allow_update_location",
                "connect_show_policy",
                "policy_title",
                "policy_content"
            )
            ->where("brand_id", $brandId)
            ->first();
    }

    /**
     * Chỉnh sửa brand config
     *
     * @param array $data
     * @param $brandId
     * @return mixed
     */
    public function edit(array $data, $brandId)
    {
        return $this->where("{$this->primaryKey}", $brandId)->update($data);
    }

    /**
     * Thêm brand config
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        return $this->create($data);
    }
}
