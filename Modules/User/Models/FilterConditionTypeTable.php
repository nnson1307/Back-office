<?php


namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;

class FilterConditionTypeTable extends Model
{
    protected $table = 'filter_condition_type';
    protected $primaryKey = 'id';

    protected $fillable =['id', 'name', 'description', 'created_at', 'updated_at'];

    /**
     * Lấy danh sách điều kiện
     * @return mixed
     */
    public function getList()
    {
        return $this->get();
    }

    /**
     * @return mixed
     */
    public function getCondition($arrayCondition)
    {
        $select = $this->whereNotIn('id', $arrayCondition)->get();
        return $select;
    }
}