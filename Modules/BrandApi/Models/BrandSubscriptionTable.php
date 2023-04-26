<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 9/19/2019
 * Time: 11:56 AM
 */

namespace Modules\BrandApi\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class BrandSubscriptionTable extends Model
{
    use ListTableTrait;
    protected $table = 'brand_subscription';
    protected $primaryKey = 'brand_subscription_id';
    public $timestamps = false;
    protected $fillable = [
        'brand_subscription_id', 'brand_id', 'user_id', 'store_id', 'sale_id',
        'brand_customer_code', 'brand_ship_to_code', 'connect_type',
        'connect_status', 'is_approved', 'approved_at', 'approved_by','is_actived',
        'latitude', 'longitude', 'is_disconnected', 'created_at', 'updated_at'
    ];

    public function getMyStoreDetail($filters)
    {
        $select = $this->select(
            'brand_subscription.brand_subscription_id',
            'brand.brand_name as brand_name',
            'brand.brand_code as brand_code',
            'brand.brand_url as brand_url',
            'brand.brand_avatar as brand_avatar',
            'brand.brand_banner as brand_banner',
            'brand.company_name as company_name',
            'brand.company_code as company_code',
            'brand.display_name as display_name',
            'brand.is_published as is_published',
            'brand.created_at as created_at',
            'brand_subscription.brand_customer_code as brand_customer_code',
            'brand_subscription.brand_ship_to_code as brand_ship_to_code',
            'store.store_name as store_name',
            'store.store_avatar as store_avatar',
            'store.store_address as store_address',
            'user.user_code as user_code',
            'user.user_code as user_code',
            'user.fullname as fullname',
            'user.email as email',
            'user.phone as phone',
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
            'ward.name as ward_name',
            'brand_subscription.latitude',
            'brand_subscription.longitude',
            'brand_subscription.created_at',
            'brand_subscription.updated_at',
            'brand_subscription.connect_status',
            'brand_subscription.brand_id',
            'brand_subscription.user_id',
            'brand_subscription.store_id',
            'brand_subscription.sale_id',
            'brand_subscription.is_approved',
            'brand_subscription.approved_at',
            'brand_subscription.approved_by'
        )
            ->leftJoin('brand', 'brand.brand_id', '=', 'brand_subscription.brand_id')
            ->leftJoin('user', 'user.user_id', '=', 'brand_subscription.user_id')
            ->leftJoin('store', 'store.store_id', '=', 'brand_subscription.store_id')
            ->leftJoin('country', 'country.country_id', '=', 'store.country_id')
            ->leftJoin('province', 'province.province_id', '=', 'store.province_id')
            ->leftJoin('district', 'district.district_id', '=', 'store.district_id')
            ->leftJoin('ward', 'ward.ward_id', '=', 'store.ward_id')
            ->where('brand.is_deleted', 0)
            ->where('store.is_deleted', 0)
//            ->where('country.is_deleted', 0)
//            ->where('country.is_actived', 1)
            ->where('brand.tenant_id', $filters['tenant_id'])
            ->where('brand_subscription.brand_customer_code', $filters['brand_customer_code'])
            ->where('brand_subscription.brand_ship_to_code', $filters['brand_ship_to_code']);
        //Lấy danh sách các brand sub theo tenant_id và cặp code.
        if (isset($filters['get_list_brand_sub_by_code'])) {
            return $select->get();
        }
        return $select->first();
    }

    public function searchMyStore($filters)
    {
        $oSelect = $this
            ->join('brand', 'brand.brand_id', '=', 'brand_subscription.brand_id')
            ->where('brand.tenant_id', $filters['tenant_id'])
            ->where('brand_subscription.brand_customer_code', $filters['brand_customer_code'])
            ->where('brand_subscription.brand_ship_to_code', $filters['brand_ship_to_code'])
            ->select('brand_subscription.*');
        return $oSelect->get();
    }

    public function deleteBrand($filter)
    {
        $oSelect = $this
            ->where('brand_subscription_id', $filter['brand_subscription_id'])
            ->where('brand_id', $filter['brand_id'])
            ->where('user_id', $filter['user_id'])
            ->where('store_id', $filter['store_id'])
            ->where('brand_customer_code', $filter['brand_customer_code'])
            ->where('brand_ship_to_code', $filter['brand_ship_to_code'])
            ->delete();
        return $oSelect;
    }

    /**
     * Lấy danh sách store theo tenant_id
     *
     * @param int $tenant_id
     * @param null $filter
     * @param null $group
     * @return mixed
     */
    public function getListStoreByTenantId($tenant_id, $filter = null, $group = false)
    {
        $page = (int)($filter['page'] ?? 1);
        $display = (int)($filter['perpage'] ?? PAGING_ITEM_PER_PAGE);
        unset($filter['perpage']);
        unset($filter['page']);
        $select = $this->join('brand', function ($join) use ($tenant_id) {
            $join->on('brand.brand_id', '=', 'brand_subscription.brand_id')
                ->where('brand.tenant_id', $tenant_id)
                ->where('brand.is_deleted', 0);
        })
            ->join('store', 'store.store_id', '=', 'brand_subscription.store_id')
            ->join('user', 'user.user_id', '=', 'store.user_id')
            ->where('store.is_deleted', 0)
            ->select(
                'brand.brand_name as brand_name',
                'brand.brand_code as brand_code',
                'brand.brand_url as brand_url',
                'brand.brand_avatar as brand_avatar',
                'brand.brand_banner as brand_banner',
                'brand.company_name as company_name',
                'brand.company_code as company_code',
                'brand.display_name as display_name',
                'brand.is_published as is_published',
                'brand.created_at as created_at',
                'brand_subscription.brand_customer_code as brand_customer_code',
                'brand_subscription.brand_ship_to_code as brand_ship_to_code',
                'brand_subscription.is_approved as is_approved',
                'brand_subscription.is_actived as brand_subscription_is_actived',
                'store.store_id',
                'store.store_name as store_name',
                'store.store_avatar as store_avatar',
                'store.store_address as store_address',
                'user.user_code as user_code',
                'user.user_id as user_id',
                'user.phone as phone'
            );

        if ($filter) {
            foreach ($filter as $key => $val) {
                if (strpos($key, 'keyword_') !== false) {
                    $select->where(str_replace('$', '.', str_replace('keyword_', '', $key)), 'like', '%' . $val . '%');
                } elseif (strpos($key, 'sort_') !== false) {
                    $select->orderBy(str_replace('$', '.', str_replace('sort_', '', $key)), $val);
                } elseif (strpos($key, 'where_in_') !== false) {
                    $select->whereIn(str_replace('$', '.', str_replace('where_in_', '', $key)), $val);
                } else {
                    $select->where(str_replace('$', '.', $key), $val);
                }
            }
        }

        if ($group == true) {
            $select->groupBy('brand_subscription.brand_ship_to_code');
        }

        return $select->paginate($display, $columns = ['*'], $pageName = 'page', $page);
    }

    /**
     * Kiểm tra data excel để lấy danh sách số điện thoại chủ cửa hàng
     *
     * @param $tenant_id
     * @param null $data
     * @return mixed
     */
    public function checkExcel($tenant_id, $data = null)
    {
        $data = array_map(function (array $value) {
            return "('" . implode($value, "', '") . "')";
        }, $data);

        return $this->join('brand', function ($join) use ($tenant_id) {
            $join->on('brand.brand_id', '=', 'brand_subscription.brand_id')
                ->where('brand.tenant_id', $tenant_id)
                ->where('brand.is_deleted', 0);
        })
            ->join('store', 'store.store_id', '=', 'brand_subscription.store_id')
            ->join('user', 'user.user_id', '=', 'store.user_id')
            ->where('store.is_deleted', 0)
            ->whereRaw(
                "(brand_customer_code, brand_ship_to_code) in (" . implode($data, ', ') . ')'
            )
            ->select('user.phone')
            ->get();
    }


//    public function updateConnectMyStore($filters)
//    {
//        $oSelect = $this
//            ->leftJoin('brand', 'brand.brand_id', '=', 'brand_subscription.brand_id')
//            ->where('brand.tenant_id', $filters['tenant_id'])
//            ->where('brand_subscription.brand_customer_code', $filters['brand_customer_code'])
//            ->where('brand_subscription.brand_ship_to_code', $filters['brand_ship_to_code']);
//        if ($filters['status'] == 'duyet') {
//            $oSelect = $oSelect
//                ->update(['brand_subscription.is_approved' => 1 , 'brand_subscription.updated_at' => now()]);
//        } elseif ($filters['status'] == 'huy') {
//            $oSelect = $oSelect
//                ->update(['brand_subscription.is_approved' => 0,'brand_subscription.updated_at' => now()]);
//        }
//        return $oSelect;
//    }

    public function getMyStorePhone($filters)
    {
        $select = $this->select(
            'brand.brand_name as brand_name',
            'brand.brand_code as brand_code',
            'brand.brand_url as brand_url',
            'brand.brand_avatar as brand_avatar',
            'brand.brand_banner as brand_banner',
            'brand.company_name as company_name',
            'brand.company_code as company_code',
            'brand.display_name as display_name',
            'brand.is_published as is_published',
            'brand.created_at as created_at',
            'brand_subscription.brand_customer_code as brand_customer_code',
            'brand_subscription.brand_ship_to_code as brand_ship_to_code',
            'store.store_name as store_name',
            'store.store_avatar as store_avatar',
            'store.store_address as store_address',
            'user.user_code as user_code',
            'user.user_code as user_code',
            'user.fullname as fullname',
            'user.email as email',
            'user.phone as phone',
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
            ->leftJoin('brand', 'brand.brand_id', '=', 'brand_subscription.brand_id')
            ->leftJoin('user', 'user.user_id', '=', 'brand_subscription.user_id')
            ->leftJoin('store', 'store.store_id', '=', 'brand_subscription.store_id')
            ->leftJoin('country', 'country.country_id', '=', 'store.country_id')
            ->leftJoin('province', 'province.province_id', '=', 'store.province_id')
            ->leftJoin('district', 'district.district_id', '=', 'store.district_id')
            ->leftJoin('ward', 'ward.ward_id', '=', 'store.ward_id')
            ->where('brand.is_deleted', 0)
            ->where('store.is_deleted', 0)
//            ->where('country.is_deleted', 0)
//            ->where('country.is_actived', 1)
            ->where('brand.tenant_id', $filters['tenant_id'])
            ->whereIn('brand_subscription.brand_customer_code', $filters['brand_customer_code'])
            ->whereIn('brand_subscription.brand_ship_to_code', $filters['brand_ship_to_code'])
            ->groupBy('brand_subscription.brand_ship_to_code')
            ->orderBy('brand_subscription.brand_customer_code', 'asc');
        return $select->get();
    }

    /**
     * Lấy ds all store không phân trang
     *
     * @param $tenant_id
     * @return mixed
     */
    public function getAllStore($tenant_id)
    {
        $select = $this->join('brand', function ($join) use ($tenant_id) {
            $join->on('brand.brand_id', '=', 'brand_subscription.brand_id')
                ->where('brand.tenant_id', $tenant_id)
                ->where('brand.is_deleted', 0);
        })
            ->join('store', 'store.store_id', '=', 'brand_subscription.store_id')
            ->join('user', 'user.user_id', '=', 'store.user_id')
            ->where('store.is_deleted', 0)
            ->select(
                'brand.brand_name as brand_name',
                'brand.brand_code as brand_code',
                'brand.brand_url as brand_url',
                'brand.brand_avatar as brand_avatar',
                'brand.brand_banner as brand_banner',
                'brand.company_name as company_name',
                'brand.company_code as company_code',
                'brand.display_name as display_name',
                'brand.is_published as is_published',
                'brand.created_at as created_at',
                'brand_subscription.brand_customer_code as brand_customer_code',
                'brand_subscription.brand_ship_to_code as brand_ship_to_code',
                'brand_subscription.is_approved as is_approved',
                'store.store_name as store_name',
                'store.store_avatar as store_avatar',
                'store.store_address as store_address',
                'user.user_code as user_code',
                'user.user_id as user_id',
                'user.phone as phone'
            )
            ->groupBy('brand_subscription.brand_ship_to_code');

        return $select->get();
    }

    /**
     * Update
     *
     * @param array $data
     * @param       $id
     */
    public function edit(array $data, $id)
    {
        $this->where($this->primaryKey, $id)->update($data);
    }

    /**
     * Chi tiết
     * @param $id
     *
     * @return mixed
     */
    public function getItem($id)
    {
        $select = $this->select(
            'brand_subscription.brand_subscription_id',
            'brand.brand_name as brand_name',
            'brand.brand_code as brand_code',
            'brand.brand_url as brand_url',
            'brand.brand_avatar as brand_avatar',
            'brand.brand_banner as brand_banner',
            'brand.company_name as company_name',
            'brand.company_code as company_code',
            'brand.display_name as display_name',
            'brand.is_published as is_published',
            'brand.created_at as created_at',
            'brand_subscription.brand_customer_code as brand_customer_code',
            'brand_subscription.brand_ship_to_code as brand_ship_to_code',
            'store.store_name as store_name',
            'store.store_avatar as store_avatar',
            'store.store_address as store_address',
            'user.user_code as user_code',
            'user.user_code as user_code',
            'user.fullname as fullname',
            'user.email as email',
            'user.phone as phone',
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
            'ward.name as ward_name',
            'brand_subscription.latitude',
            'brand_subscription.longitude',
            'brand_subscription.created_at',
            'brand_subscription.updated_at',
            'brand_subscription.connect_status',
            'brand_subscription.brand_id',
            'brand_subscription.user_id',
            'brand_subscription.store_id',
            'brand_subscription.sale_id',
            'brand_subscription.is_approved',
            'brand_subscription.approved_at',
            'brand_subscription.approved_by'
        )
            ->leftJoin('brand', 'brand.brand_id', '=', 'brand_subscription.brand_id')
            ->leftJoin('user', 'user.user_id', '=', 'brand_subscription.user_id')
            ->leftJoin('store', 'store.store_id', '=', 'brand_subscription.store_id')
            ->leftJoin('country', 'country.country_id', '=', 'store.country_id')
            ->leftJoin('province', 'province.province_id', '=', 'store.province_id')
            ->leftJoin('district', 'district.district_id', '=', 'store.district_id')
            ->leftJoin('ward', 'ward.ward_id', '=', 'store.ward_id')
            ->where('brand.is_deleted', 0)
            ->where('store.is_deleted', 0)
//            ->where('country.is_deleted', 0)
//            ->where('country.is_actived', 1)
//            ->where('brand.tenant_id', $filters['tenant_id'])
//            ->where('brand_subscription.brand_customer_code', $filters['brand_customer_code'])
//            ->where('brand_subscription.brand_ship_to_code', $filters['brand_ship_to_code']);
            ->where('brand_subscription.brand_subscription_id', $id);
        return $select->first();
    }

    /**
     * Chi tiết brand sub by tenant_id, brand_customer_code, brand_ship_to_code
     * @param $filters
     *
     * @return mixed
     */
    public function getBrandSubDetailByCode($filters)
    {
        $select = $this->select('brand_subscription.*')
            ->leftJoin('brand', 'brand.brand_id', '=', 'brand_subscription.brand_id')
            ->where('brand.tenant_id', $filters['tenant_id'])
            ->where(
                'brand_subscription.brand_customer_code',
                $filters['brand_customer_code']
            )
            ->where(
                'brand_subscription.brand_ship_to_code',
                $filters['brand_ship_to_code']
            );
        return $select->first();
    }

    /**
     * Lấy danh sách store của user.
     * @param $phone
     * @return mixed
     */
    public function getStoreReferenceUser($phone)
    {
        $select = $this->select(
            'brand.brand_name',
            'store.store_name',
            'store.store_address',
            'country.country_name as country_name',
            'province.type as province_type',
            'province.name as province_name',
            'district.type as district_type',
            'district.name as district_name',
            'ward.type as ward_type',
            'ward.name as ward_name',
            'brand_subscription.is_approved'
        )
            ->join('user','user.user_id','brand_subscription.user_id')
            ->join('store', 'store.store_id', '=', 'brand_subscription.store_id')
            ->join('brand','brand.brand_id','brand_subscription.brand_id')
            ->leftJoin('country', 'country.country_id', '=', 'store.country_id')
            ->leftJoin('province', 'province.province_id', '=', 'store.province_id')
            ->leftJoin('district', 'district.district_id', '=', 'store.district_id')
            ->leftJoin('ward', 'ward.ward_id', '=', 'store.ward_id')
            ->where('user.phone', $phone)
            ->get();
        return $select;
    }

    public function getCodeByphone($data,$tenant_id)
    {
        $oSelect = $this
            ->join('brand','brand.brand_id','brand_subscription.brand_id')
            ->join('user','user.user_id','brand_subscription.user_id')
            ->where('brand_subscription.is_approved',1)
            ->where('brand_subscription.is_actived',1)
            ->whereIn('user.phone',$data)
            ->where('brand.tenant_id',$tenant_id)
            ->select('brand_subscription.brand_customer_code','brand_subscription.brand_ship_to_code')
            ->get();
        return $oSelect;
    }
}
