<?php
/**
 * Created by PhpStorm   .
 * User: Mr Son
 * Date: 2020-01-22
 * Time: 1:50 PM
 * @author SonDepTrai
 */

namespace Modules\BrandApi\Models;


use Illuminate\Database\Eloquent\Model;

class SamplingOutletTable extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'outlet';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'campaign_id',
        'tenant_id',
        'customer_code',
        'ship_to_code',
        'store_id',
        'quota',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    /**
     * Thêm Sampling Outlet
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $add = $this->create($data);
        return $add->id;
    }

    /**
     * Lấy dữ liệu Outlet By campaign_id
     *
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this
            ->select(
                'customer_code',
                'ship_to_code',
                'store_id',
                'quota'
            )
            ->where('campaign_id', $id)
            ->get();
    }

    /**
     * Xóa Outlet By campaign_id
     *
     * @param $id
     * @return mixed
     */
    public function remove($id)
    {
        return $this->where('campaign_id', $id)->delete();
    }
}