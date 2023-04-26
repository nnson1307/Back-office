<?php

namespace Modules\User\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

/**
 * User Model
 *
 * @author isc-daidp
 * @since Feb 23, 2018
 */
class UserTable extends Model
{
    use ListTableTrait;
    protected $table = 'user';
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'user_code', 'fullname', 'email', 'phone', 'password', 'avatar', 'phone_verified',
        'phone_verified_at','email_verified', 'email_verified_at', 'is_activated', 'is_deleted',
        'last_login', 'last_updated', 'created_at','updated_at'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'last_login', 'last_updated', 'created_at','updated_at'
    ];

    public function getListCore(&$filters = [])
    {
        $oSelect = $this->where('is_deleted', 0);
        if (isset($filters['arrayUser'])) {
            $oSelect->whereIn('phone', $filters['arrayUser']);
            unset($filters['arrayUser']);
        }
        return $oSelect;
    }

    /**
     * Remove user
     *
     * @param number $id
     */
    public function remove($id)
    {
        $this->where('user_id', $id)->update(['is_deleted' => 1]);
    }


    /**
     * Insert user to database
     *
     * @param array $data
     * @return number
     */
    public function add(array $data)
    {
        $oUser = $this->create($data);

        return $oUser->id;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->where('user_id', $id)->first();
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        return $this->where('user_id', $id)->update($data);
    }

    /**
     * @param $token
     * @return mixed
     */
    public function getUserToken($token)
    {
        return $this->where('password_reset', $token)->where('date_password_reset', date('Y-m-d'))->first();
    }

    /**
     * Cập nhật trạng thái của user
     * @param $user_id
     * @param $is_activated
     * @return
     */
    public function updateUserStatus($user_id, $is_activated)
    {
        return $this->where('user_id', $user_id)
                    ->update(['is_activated' => $is_activated]) ;
    }

    /**
     * Cập nhật trạng thái của user
     * @param $phone
     * @param $data
     * @return
     */
    public function updateUserInfo($phone, $data)
    {
        return $this->where('phone', $phone)
            ->update($data) ;
    }

    /**
     * Thêm mới store user
     *
     * @param $phone
     * @param array $data
     * @return
     */
    public function insertStoreUser(array $data)
    {
        $oUser = $this->create($data);
        return $oUser->id;
    }

    /**
     * Lấy user theo số điện thoại
     * @param $phone
     * @return
     */
    public function getUserByPhone($phone)
    {
        $select = $this->where('phone', $phone)
            ->where('is_deleted', 0)
                    ->first();
        return $select;
    }

    /**
     * Tìm kiếm user.
     *
     * @param $name
     * @param $phone
     * @param $code
     *
     * @return mixed
     */
    public function searchUser($name, $phone, $code)
    {
        $select = $this->where('is_deleted', 0);
        if ($name != '') {
            $select->where('fullname', 'like', '%' . $name . '%');
        }
        if ($phone != '') {
            $select->where('phone', 'like', '%' . $phone . '%');
        }
        if ($code != '') {
            $select->where('user_code', 'like', '%' . $code . '%');
        }
        return $select->get();
    }

    /**
     * Lấy tất cả user.
     *
     * @return mixed
     */
    public function getAll()
    {
        $oSelect = $this->where('is_deleted', 0)->get();
        return $oSelect;
    }

    /**
     * Danh sách user theo điều kiện.
     * @param array $arrayUser
     * @param       $operator
     * @param       $dateTime
     */
    public function getLastLoginOrWhere(array $arrayUser, $operator, $dateTime)
    {
        $select = $this->whereIn('phone', $arrayUser)
            ->orWhere('last_login', $operator, $dateTime)
            ->get();
        return $select;
    }

    public function getLastLoginOrWhere2(array $arrayUser, $operator, $dateTime)
    {
        $select = $this->whereIn('phone', $arrayUser)
            ->where('last_login', $operator, $dateTime)
            ->get();
        return $select;
    }

    /**
     * Danh sách user theo điều kiện.
     * @param array $arrayUser
     * @param       $operator
     * @param       $dateTime
     */
    public function getLastLoginWhere(array $arrayUser, $operator, $dateTime)
    {
        $select = $this->whereIn('phone', $arrayUser)
            ->where('last_login', $operator, $dateTime)
            ->get();
        return $select;
    }

    public function includeCondition($id)
    {
        $select = $this->getListCore();
        return true;
    }

    /**
     * Lấy danh sách store của user.
     * @param $phone
     * @return mixed
     */
    public function getStoreReferenceUser($phone)
    {
        $select = $this->select(
            'store.store_name',
            'store.store_address',
            'country.country_name as country_name',
            'province.type as province_type',
            'province.name as province_name',
            'district.type as district_type',
            'district.name as district_name',
            'ward.type as ward_type',
            'ward.name as ward_name',
            'b1.is_approved'
        )
            ->join('store', 'store.user_id', '=', 'user.user_id')
            ->leftJoin('country', 'country.country_id', '=', 'store.country_id')
            ->leftJoin('province', 'province.province_id', '=', 'store.province_id')
            ->leftJoin('district', 'district.district_id', '=', 'store.district_id')
            ->leftJoin('ward', 'ward.ward_id', '=', 'store.ward_id')
            ->leftJoin('brand_subscription as b1', 'b1.user_id', '=', 'user.user_id')
            ->leftJoin('brand_subscription as b2', 'b2.store_id', '=', 'store.store_id')
            ->where('user.phone', $phone)
            ->get();
        return $select;
    }
}
