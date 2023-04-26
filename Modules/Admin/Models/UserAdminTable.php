<?php

namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use MyCore\Models\Traits\ListTableTrait;

class UserAdminTable extends Model
{
    use ListTableTrait;
    protected $connection = 'mysql2';
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'admin_code',
        'brand_id',
        'full_name',
        'account',
        'email',
        'password',
        'remember_token',
        'default_menu',
        'is_admin',
        'is_actived',
        'is_change_pass',
        'is_deleted',
        'is_admin',
        'created_at',
        'updated_at',
        'deleted_at',
        'deleted_by'
    ];

    public function getList($brand_id)
    {

        $ds = $this->select('id','brand_id', 'admin_code', 'full_name', 'email', 'is_actived')
            ->where('is_deleted', 0)
            ->where('brand_id', $brand_id)->get();

        return $ds;
    }

    public function add(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $add = $this->create($data);
        return $add->id;
    }

    public function edit(array $data, $id)
    {
        return $this->where('id', $id)->update($data);
    }

    public function changePassword(array $data, $id)
    {
        return $this->where('id', $id)
            ->update(['password' => Hash::make($data['password'])], ['is_change_pass' => $data['is_require_change_pass']]);
    }

}