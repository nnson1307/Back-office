<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 01-04-02020
 * Time: 9:41 AM
 */

namespace Modules\Admin\Models;


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
        "created_at",
        "created_by",
        "updated_at",
        "updated_by"
    ];

    /**
     * Thêm cấu hình brand
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        return $this->create($data);
    }

    /**
     * Chỉnh sửa cấu hình brand
     *
     * @param array $data
     * @param $brandId
     * @return mixed
     */
    public function edit(array $data, $brandId)
    {
        return $this->where("{$this->primaryKey}", $brandId)->update($data);
    }
}