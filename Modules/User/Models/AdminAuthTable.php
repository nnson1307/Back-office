<?php
namespace Modules\User\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class UserTable
 * @package Modules\User\Models
 * @author DaiDP
 * @since Aug, 2019
 */
class AdminAuthTable extends Authenticatable implements JWTSubject
{
    protected $table = 'admin';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'admin_code', 'name', 'username', 'email', 'password', 'is_actived', 'default_menu'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'created_at', 'updated_at'
    ];


    /**
     * Lấy thông tin user by phone
     *
     * @param $email
     * @return mixed
     */
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)
            ->first();
    }

    /**
     * Create user
     *
     * @param $data
     * @return mixed
     */
    public function createUser($data)
    {
        //$data['user_code'] = uniqid();
        $data['password']  = Hash::make($data['password']);

        return self::create($data);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        // TODO: Implement getJWTIdentifier() method.
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        // TODO: Implement getJWTCustomClaims() method.
        return [];
    }

    /**
     * Lấy thông tin user đang login
     *
     * @param $id
     * @return mixed
     */
    public function getUserById($id)
    {
        return $this->where('id', $id)
            ->first();
    }

    /**
     * Update tên user.
     *
     * @param $id
     * @param $data
     * @return array
     */
    public function updateFullName($id, $data)
    {
        return $this->where('id', $id)
            ->update(['name' => $data['name']]);
    }

    /**
     * Set thời gian cập nhật profile
     *
     * @param $phone
     * @return mixed
     */
    public function setLastUpdate($phone)
    {
        return $this->where('phone', $phone)
            ->update([
                'updated_at'   =>  Carbon::now(),
                'last_updated' =>  Carbon::now()
            ]);
    }
}
