<?php


namespace Modules\BrandApi\Models;

use Illuminate\Database\Eloquent\Model;

class UserTable extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $fillable
        = [
            'user_id',
            'user_code',
            'fullname',
            'email',
            'phone',
            'password',
            'avatar',
            'phone_verified',
            'phone_verified_at',
            'email_verified',
            'email_verified_at',
            'is_activated',
            'is_deleted',
            'last_login',
            'last_updated',
            'created_at',
            'updated_at'
        ];

    public function search($filters)
    {
        $select = $this->select(
            'user.user_id',
            'user_code',
            'fullname',
            'email',
            'phone',
            'password',
            'avatar',
            'phone_verified',
            'phone_verified_at',
            'email_verified',
            'email_verified_at',
            'user.is_activated',
            'user.is_deleted',
            'last_login',
            'last_updated',
            'user.created_at',
            'user.updated_at'
        )
            ->where('user.is_activated', 1)
            ->where('user.is_deleted', 0)
        ->join('brand_subscription','brand_subscription.user_id','user.user_id')
        ->join('brand','brand.brand_id','brand_subscription.brand_id');
        if (isset($filters['fullname'])
            && $filters['fullname'] != null
        ) {
            $select->where('user.fullname', 'like', '%' . $filters['fullname'] . '%');
        }
        if (isset($filters['phone'])
            && $filters['phone'] != null
        ) {
            $select->where('user.phone', 'like', '%' . $filters['phone'] . '%');
        }
        if (isset($filters['user_id']) && $filters['user_id'] != null) {
            return $select->where('user.user_id', $filters['user_id'])->first();
        } else {
            if (isset($filters['user_in']) && count($filters['user_in']) > 0) {
                $select->whereIn('user.user_id', $filters['user_in']);
            }
            return $select->get();
        }
    }
}
