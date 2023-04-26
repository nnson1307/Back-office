<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class DistrictTable extends Model
{
    use ListTableTrait;
    protected $table = 'district';
    protected $primaryKey = 'district_id';
    protected $fillable = [
        'district_id',
        'name',
        'district_code',
        'type',
        'location',
        'province_id',
        'is_actived',
        'is_deleted',
        'created_by',
        'updated_by'
    ];

    /**
     * @param array $filter
     * @return mixed
     */
    public function getListCore(&$filter = [])
    {
        $ds = $this->join('province', function ($join) {
            $join->on('province.province_id', '=', 'district.province_id')
                ->where('province.is_deleted', 0);
        })->join('country', function ($join) {
            $join->on('country.country_id', '=', 'province.country_id')
                ->where('country.is_deleted', 0);
        })
            ->select(
                'district.district_id',
                'district.name as district_name',
                'district.district_code',
                'district.is_actived',
                'province.name as province_name',
                'country.country_name'
            )->where('district.is_deleted', 0);
        return $ds;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $add = $this->create($data);
        return $add->district_id;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        $ds = $this
            ->leftJoin('province', 'province.province_id', '=', 'district.province_id')
            ->leftJoin('country', 'country.country_id', '=', 'province.country_id')
            ->select(
                'district.district_id',
                'district.name',
                'district.type',
                'district.district_code',
                'district.is_actived',
                'country.country_id',
                'province.province_id'
            )
            ->where('district.district_id', $id)
            ->where('district.is_deleted', 0)
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
        return $this->where('district_id', $id)->update($data);
    }

    /**
     * @param $id
     */
    public function remove($id)
    {
        $this->where($this->primaryKey, $id)->update(['is_deleted' => 1]);
    }

    /**
     * Load quận huyện khi chọn tỉnh thành
     *
     * @param $id_province
     * @return array
     */
    public function getDistrictOption($id_province)
    {
        $get_all = $this
            ->select(
                'district_id',
                'name',
                'type'
            )
            ->where('province_id', $id_province)
            ->where('is_actived', 1)
            ->where('is_deleted', 0)
            ->get();

        $array = array();
        foreach ($get_all as $item) {
            $array[$item['district_id']] = $item['type'] . ' ' . $item['name'];
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
        return $this->where('district_id', $id)->update($data);
    }
}
