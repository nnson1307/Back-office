<?php

namespace Modules\BrandApi\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class BrandSubscriptionHistoryTable extends Model
{
    protected $table = 'brand_subscription_history';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
            'id',
            'brand_subscription_id',
            'brand_id',
            'user_id',
            'store_id',
            'sale_id',
            'brand_customer_code',
            'brand_ship_to_code',
            'is_approved',
            'approved_at',
            'approved_by',
            'subscription_at',
            'created_at',
            'updated_at'
        ];

    public function addHistory($filter)
    {
        return $this->insert(
            [
                'brand_subscription_id' => $filter['brand_subscription_id'],
                'brand_id' => $filter['brand_id'],
                'user_id' => $filter['user_id'],
                'store_id' => $filter['store_id'],
                'sale_id' => $filter['sale_id'],
                'brand_customer_code' => $filter['brand_customer_code'],
                'brand_ship_to_code' => $filter['brand_ship_to_code'],
                'is_approved' => $filter['is_approved'],
                'approved_at' => $filter['approved_at'],
                'approved_by' => $filter['approved_by'],
                'subscription_at' => $filter['subscription_at'],
                'created_at' => $filter['created_at'],
                'updated_at' => $filter['updated_at'],
            ]
        );
    }
    /**
     * Thêm thuộc tính sản phẩm.
     *
     * @param array $data
     *
     * @return mixed
     */
    public function add(array $data)
    {
        return $this->create($data)->{$this->primaryKey};
    }
}
