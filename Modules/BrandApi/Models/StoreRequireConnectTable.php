<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 9/19/2019
 * Time: 10:10 AM
 */

namespace Modules\BrandApi\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class StoreRequireConnectTable extends Model
{
    use ListTableTrait;
    protected $table = 'store';
    protected $primaryKey = 'store_id';
    protected $fillable
        = [
            'store_id',
            'user_id',
            'store_name',
            'store_avatar',
            'store_address',
            'country_id',
            'province_id',
            'district_id',
            'ward_id',
            'is_deleted',
            'created_at',
            'updated_at'
        ];

    /**
     * Danh sách cửa hàng yêu cầu kết nối.
     *
     * @param array $filters
     *
     * @return mixed
     */
    public function getListCore(&$filters = [])
    {
        $select = $this->select(
            $this->table . '.store_id',
            $this->table . '.user_id',
            $this->table . '.store_name',
            $this->table . '.store_avatar',
            $this->table . '.store_address',
            $this->table . '.country_id',
            $this->table . '.province_id',
            $this->table . '.district_id',
            $this->table . '.ward_id',
            $this->table . '.ward_id',
            'brand_subscription.brand_subscription_id',
            'brand_subscription.brand_customer_code',
            'brand_subscription.brand_ship_to_code',
            'brand_subscription.connect_type',
            'brand_subscription.connect_status',
            'brand_subscription.is_approved',
            'brand.company_name',
            'brand.company_code',
            'user.phone',
            'user.fullname',
            'ward.name as ward_name',
            'district.name as district_name',
            'province.name as province_name',
            'country.country_name',
            'brand_subscription.updated_at'

        )
            ->leftJoin(
                'brand_subscription',
                'brand_subscription.store_id',
                $this->table . '.store_id'
            )
            ->join('brand', 'brand.brand_id', 'brand_subscription.brand_id')
            ->join('user', 'user.user_id', 'brand_subscription.user_id')
            ->leftJoin(
                'country',
                'country.country_id',
                $this->table . '.country_id'
            )
            ->leftJoin('province', 'province.province_id', $this->table . '.province_id')
            ->leftJoin('district', 'district.district_id', $this->table . '.district_id')
            ->leftJoin('ward', 'ward.ward_id', $this->table . '.ward_id')
            ->where($this->table . '.is_deleted', 0)
            ->where('user.is_deleted', 0)
            ->where('brand.is_deleted', 0);
        if (isset($filters['brand_subscription$updated_at'])) {
            $select->whereBetween(
                'brand_subscription.updated_at',
                $filters['brand_subscription$updated_at']
            );
            unset($filters['brand_subscription$updated_at']);
        }
        if (isset($filters['tenant_id'])) {
            $select->where('brand.tenant_id', $filters['tenant_id']);
            unset($filters['tenant_id']);
        }
        $select->orderBy('brand_subscription.created_at', 'desc');
        return $select;
    }
}