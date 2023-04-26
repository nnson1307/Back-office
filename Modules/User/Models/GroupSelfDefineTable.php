<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class GroupSelfDefineTable extends Model
{
    protected $table = 'group_self_define';
    protected $primaryKey = 'id';

    protected $fillable
        = [
            'id',
            'phone',
            'user_group_id',
            'created_at',
            'updated_at'
        ];

    /**
     * Thêm mới.
     * @param array $data
     *
     * @return mixed
     */
    public function store(array $data)
    {
        $oUser = $this->create($data);
        return $oUser->id;
    }

    /**
     * Lấy danh sách tk theo id nhóm.
     * @param array $data
     * @return mixed
     */
    public function getDetail($id)
    {
        $oUser = $this->select('id', 'phone', 'user_group_id')
            ->where('user_group_id', $id)
            ->get();
        return $oUser;
    }

    /**
     * Xóa tất cả user của user group.
     * @param $id
     * @return mixed
     */
    public function removeByUserGroupId($id)
    {
        $oUser = $this->where('user_group_id', $id)->delete();
        return $oUser;
    }

    /**
     * Lấy danh sách tk theo id nhóm.
     * @param array $data
     * @return mixed
     */
    public function getDetail2($id)
    {
        $oUser = $this->select('phone')
            ->where('user_group_id', $id)
//            ->join('user', 'user.phone', '=', 'group_self_define.phone')
            ->get();
        return $oUser;
    }
}