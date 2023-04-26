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

class StoreTable extends Model
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

    public function getListCore(&$filters = [])
    {
        $select = $this->where('is_deleted', 0);
        return $select;
    }

    /**
     * Tìm kiếm store.
     *
     * @param $storeName
     *
     * @return mixed
     */
    public function searchStore($storeName)
    {
        $select = $this->select(
            'store.store_id as store_id',
            'store.store_name as store_name',
            'store.store_avatar as store_avatar',
            'store.store_address as store_address',
            'country.country_id as country_id',
            'country.country_name as country_name',
            'province.province_id as province_id',
            'province.type as province_type',
            'province.name as province_name',
            'district.district_id as district_id',
            'district.type as district_type',
            'district.name as district_name',
            'ward.ward_id as ward_id',
            'ward.type as ward_type',
            'ward.name as ward_name'
        )
            ->where('store.is_deleted', 0);
        if ($storeName != '') {
            $select->where('store_name', 'like', '%' . $storeName . '%');
        }
        $select->leftJoin('country', 'country.country_id', '=', 'store.country_id')
            ->leftJoin('province', 'province.province_id', '=', 'store.province_id')
            ->leftJoin('district', 'district.district_id', '=', 'store.district_id')
            ->leftJoin('ward', 'ward.ward_id', '=', 'store.ward_id');
//            ->where('country.is_deleted', 0)
//            ->where('country.is_actived', 1);
        return $select->get();
    }

    public function filterStore($filters)
    {
        $select = $this->select(
            'store.store_id as store_id',
            'store.store_name as store_name',
            'store.store_avatar as store_avatar',
            'store.store_address as store_address',
            'country.country_id as country_id',
            'country.country_name as country_name',
            'province.province_id as province_id',
            'province.type as province_type',
            'province.name as province_name',
            'district.district_id as district_id',
            'district.type as district_type',
            'district.name as district_name',
            'ward.ward_id as ward_id',
            'ward.type as ward_type',
            'ward.name as ward_name'
        )
            ->where('store.is_deleted', 0);

        if (isset($filters['province_id']) && $filters['province_id'] != null) {
            $select->where('store.province_id', $filters['province_id']);
        }
        if (isset($filters['district_id']) && $filters['district_id'] != null) {
            $select->where('store.district_id', $filters['district_id']);
        }

        if (isset($filters['store_address'])
            && $filters['store_address'] != null
        ) {
            $select->where('store.store_address', 'like', '%' . $filters['store_address'] . '%');
        }
        if (isset($filters['store_name'])
            && $filters['store_name'] != null
        ) {
            $select->where('store.store_name', 'like', '%' . $filters['store_name'] . '%');
        }
        $select->leftJoin('country', 'country.country_id', '=', 'store.country_id')
            ->leftJoin('province', 'province.province_id', '=', 'store.province_id')
            ->leftJoin('district', 'district.district_id', '=', 'store.district_id')
            ->leftJoin('ward', 'ward.ward_id', '=', 'store.ward_id');
//            ->where('country.is_deleted', 0)
//            ->where('country.is_actived', 1);
        if (isset($filters['user_id']) && $filters['user_id'] != null) {
            $select->where('store.user_id', $filters['user_id']);
        }
        if (isset($filters['store_id']) && $filters['store_id'] != null) {
            $select->where('store.store_id', $filters['store_id']);
            return $select->first();
        } else {
            if (isset($filters['store_in']) && count($filters['store_in']) > 0) {
                $select->whereIn('store.store_id', $filters['store_in']);
            }
            return $select->get();
        }
    }
}
