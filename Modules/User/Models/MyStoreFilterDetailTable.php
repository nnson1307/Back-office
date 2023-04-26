<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class MyStoreFilterDetailTable extends Model
{
    protected $table = 'mystore_filter_detail';
    protected $primaryKey = 'id';

    protected $fillable
        = [
            'id',
            'mystore_filter_group_id',
            'mystore_filter_group_detail_type',
            'filter_condition_rule',
            'filter_condition_type_id',
            'user_group_id',
            'group_self_open_app',
            'group_self_not_open_app',
            'group_most_active',
            'user_group_define_id',
            'created_at',
            'updated_at'
        ];

    /**
     * Thêm mới.
     *
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
     * Get user group detail.
     * @param $id
     * @return mixed
     */
    public function getUserGroupDetail($id)
    {
        $select = $this->select(
            'mystore_filter_group_detail_type',
            'filter_condition_type_id',
            'user_group_id',
            'group_self_open_app',
            'group_self_not_open_app',
            'group_most_active',
            'user_group_define_id'
        )
            ->join('mystore_filter_group as m', function ($join) {
                $join->on('m.id', '=', $this->table . '.mystore_filter_group_id');
            })
            ->join('filter_condition_type as f', function ($join) {
                $join->on('f.id', '=', $this->table . '.filter_condition_type_id');
            })
            ->where('mystore_filter_group_id', $id)
            ->get();
        return $select;
    }

    /**
     * Xóa hết điều kiện của nhóm use với id user group.
     * @param $id
     * @return mixed
     */
    public function removeByUserGroupId($id)
    {
        return $this->where('mystore_filter_group_id', $id)->delete();
    }

    public function computeUserGroupDetail($id)
    {
        $select = $this->select(
            'mystore_filter_group_detail_type',
            'filter_condition_type_id',
            'user_group_id',
            'group_self_open_app',
            'group_self_not_open_app',
            'group_most_active',
            'user_group_define_id'
        )
            ->join('mystore_filter_group as m', function ($join) {
                $join->on('m.id', '=', $this->table . '.mystore_filter_group_id');
            })
            ->join('filter_condition_type as f', function ($join) {
                $join->on('f.id', '=', $this->table . '.filter_condition_type_id');
            })
            ->where('mystore_filter_group_id', $id)
            ->get();
        return $select;
    }

    public function getUserGroupDetailByType($id,$type)
    {
        $rule = '';
        if ($type == 'A') {
            $rule = 'm.filter_condition_rule_A as filter_condition_rule';
        } else if ($type == 'B') {
            $rule = 'm.filter_condition_rule_B as filter_condition_rule';
        }

        $select = $this->select(
            'mystore_filter_group_detail_type',
            'filter_condition_type_id',
            'user_group_id',
            'group_self_open_app',
            'group_self_not_open_app',
            'group_most_active',
            'user_group_define_id',
            $rule
        )

            ->join('mystore_filter_group as m', function ($join) {
                $join->on('m.id', '=', $this->table . '.mystore_filter_group_id');
            })
            ->join('filter_condition_type as f', function ($join) {
                $join->on('f.id', '=', $this->table . '.filter_condition_type_id');
            })
            ->where('mystore_filter_group_id', $id)
            ->where('mystore_filter_group_detail_type', $type)
            ->get();
        return $select;
    }
}