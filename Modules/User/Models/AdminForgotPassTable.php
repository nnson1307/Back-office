<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 8/30/2019
 * Time: 6:21 PM
 */

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class AdminForgotPassTable extends Model
{
    use ListTableTrait;
    protected $table = 'admin_forgot_pass';
    protected $primaryKey = 'forgot_pass_id';

    protected $fillable
        = [
            'forgot_pass_id',
            'admin_id',
            'code',
            'expire',
            'is_actived',
            'created_at',
            'updated_at'
        ];

    public function store(array $data)
    {
        $oUser = $this->create($data);
        return $oUser->forgot_pass_id;
    }

    public function unActiveForgotPass($adminId)
    {
        $select = $this->where('admin_id', $adminId)
            ->update(['is_actived' => 0]);
        return $select;
    }

    public function getItem($code)
    {
        $select = $this->where('code', $code)
            ->where('is_actived', 1)
            ->where('expire', '>=', date('Y-m-d H:i:s'))
            ->first();
        return $select;
    }

    public function getItemCode($code)
    {
        $select = $this->select(
            'admin.id as id',
            'admin.email as email'
        )
            ->leftJoin('admin', 'admin.id', '=', 'admin_forgot_pass.admin_id')
            ->where('admin_forgot_pass.code', $code)
            ->first();
        return $select;
    }
}