<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class WardTable extends Model
{
    use ListTableTrait;
    protected $table = 'ward';
    protected $primaryKey = 'ward_id';
    protected $fillable = [
        'ward_id',
        'name',
        'type',
        'location',
        'district_id',
        'ward_code',
        'is_actived',
        'is_deleted',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];

    /**
     * @param array $filter
     * @return mixed
     */
    public function getListCore(&$filter = [])
    {
        $ds = $this
            ->join('district', function ($join) {
                $join->on('district.district_id', '=', 'ward.district_id')
                    ->where('district.is_deleted', 0);
            })
            ->join('province', function ($join) {
                $join->on('province.province_id', '=', 'district.province_id')
                    ->where('province.is_deleted', 0);
            })->join('country', function ($join) {
                $join->on('country.country_id', '=', 'province.country_id')
                    ->where('country.is_deleted', 0);
            })
            ->select(
                'country.country_name',
                'province.name as province_name',
                'district.name as district_name',
                'ward.name as ward_name',
                'ward.ward_code',
                'ward.is_actived',
                'ward.ward_id'
            )->where('ward.is_deleted', 0);
        return $ds;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $add = $this->create($data);
        return $add->ward_id;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        $ds = $this
            ->leftJoin('district', 'district.district_id', '=', 'ward.district_id')
            ->leftJoin('province', 'province.province_id', '=', 'district.province_id')
            ->leftJoin('country', 'country.country_id', '=', 'province.country_id')
            ->select(
                'country.country_id',
                'province.province_id',
                'district.district_id',
                'ward.name',
                'ward.ward_code',
                'ward.is_actived',
                'ward.type',
                'ward.ward_id'
            )
            ->where('ward.ward_id', $id)
            ->where('ward.is_deleted', 0)
            ->first();
        return $ds;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        return $this->where('ward_id', $id)->update($data);
    }

    /**
     * @param $id
     */
    public function remove($id)
    {
        $this->where($this->primaryKey, $id)->update(['is_deleted' => 1]);
    }

    /**
     * @return array
     */
    public function getWardOption()
    {
        $get_all = $this->select('ward_id', 'name')->where('is_actived', 1)->where('is_deleted', 0)->get();
        $array = array();
        foreach ($get_all as $item) {
            $array[$item['ward_id']] = $item['name'];
        }
        return $array;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function changeStatus(array $data, $id)
    {
        return $this->where('ward_id', $id)->update($data);
    }
}