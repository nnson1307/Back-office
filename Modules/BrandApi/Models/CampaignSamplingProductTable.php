<?php
/**
 * Created by PhpStorm   .
 * User: Mr Son
 * Date: 2020-01-22
 * Time: 1:48 PM
 * @author SonDepTrai
 */

namespace Modules\BrandApi\Models;


use Illuminate\Database\Eloquent\Model;

class CampaignSamplingProductTable extends Model
{
    public $timestamps = false;
    protected $connection = 'mysql2';
    protected $table = 'campaign_product';
    protected $primaryKey = 'campaign_product_id';

    protected $fillable = [
        'campaign_product_id',
        'campaign_id',
        'product_id',
        'product_uom_id',
        'qty'
    ];

    /**
     * Thêm Campaign Product Sampling
     *
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $add = $this->create($data);
        return $add->campaign_product_id;
    }

    /**
     * Lấy dữ liệu Campaign Product Sampling By campaign_id
     *
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this
            ->select(
                'campaign_product_id',
                'product_id',
                'product_uom_id',
                'qty'
            )
            ->where('campaign_id', $id)
            ->first();
    }

    /**
     * Chỉnh sửa Campaign Product Sampling By campaign_id
     *
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        return $this->where('campaign_id', $id)->update($data);
    }
}