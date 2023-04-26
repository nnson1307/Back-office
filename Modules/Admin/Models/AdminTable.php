<?php
/**
 * Created by PhpStorm   .
 * User: Mr Son
 * Date: 2020-02-12
 * Time: 2:25 PM
 * @author SonDepTrai
 */

namespace Modules\Admin\Models;


use Illuminate\Database\Eloquent\Model;

class AdminTable extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'admin_code',
        'brand_id',
        'full_name',
        'account',
        'phone',
        'avatar',
        'email',
        'remember_token',
        'default_menu',
        'is_admin',
        'is_change_pass',
        'is_deleted',
        'created_at',
        'updated_at',
        'deleted_at',
        'deleted_by'
    ];

    /**
     * Lấy thông tin cá nhân
     *
     * @param $id
     * @return mixed
     */
    public function getInfo($id)
    {
        return $this
            ->select(
                'id',
                'full_name',
                'phone',
                'avatar',
                'email'
            )
            ->where('id', $id)
            ->first();
    }

    /**
     * Chỉnh sửa thông tin cá nhân
     *
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        return $this->where('id', $id)->update($data);
    }

}