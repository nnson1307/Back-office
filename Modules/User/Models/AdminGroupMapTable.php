<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class AdminGroupMapTable extends Model
{
    protected $table = 'admin_group_map';
    protected $primaryKey = 'group_map_id';
    protected $fillable = [
        'group_map_id',
        'group_parent_id',
        'group_child_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    /**
     * Thêm nhiều quan hệ nhóm quyền cha con
     *
     * @param array $data
     * @return void
     */
    public function addMultipleRecords(array $data)
    {
        $this->insert($data);
    }

    /**
     * Xóa quan hệ nhóm quyền cha con
     *
     * @param array|int $condition
     * @return mixed
     */
    public function remove($condition)
    {
        if (is_array($condition)) {
            return $this->where($condition)->delete();
        } else {
            return $this->where($this->primaryKey, $condition)->delete();
        }
    }
}
