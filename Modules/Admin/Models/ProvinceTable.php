<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class ProvinceTable extends Model
{
    use ListTableTrait;
    protected $table = 'province';
    protected $primaryKey = 'province_id';
    protected $fillable = [
        'province_id',
        'name',
        'province_code',
        'type',
        'location_id',
        'country_id',
        'sort',
        'is_actived',
        'created_by',
        'updated_by',
        'is_deleted'
    ];

    /**
     * @param array $filter
     * @return mixed
     */
    public function getListCore(&$filter = [])
    {
        $ds = $this->join('country', function ($join) {
            $join->on('country.country_id', '=', 'province.country_id')
                ->where('country.is_deleted', 0);
        })
            ->select(
                'province.province_id',
                'province.name',
                'province.province_code',
                'province.is_actived',
                'country.country_name'
            )
            ->where('province.is_deleted', 0);
        return $ds;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $add = $this->create($data);
        return $add->province_id;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->where('province_id', $id)->where('is_deleted', 0)->first();
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        return $this->where('province_id', $id)->update($data);
    }

    /**
     * @param $id
     */
    public function remove($id)
    {
        $this->where($this->primaryKey, $id)->update(['is_deleted' => 1]);
    }

    /**
     * @param $id_country
     * @return array
     */
    public function getProvinceOption($id_country)
    {
        $get_all = $this
            ->select('province_id', 'name', 'type')
            ->where('country_id', $id_country)
            ->where('is_actived', 1)
            ->where('is_deleted', 0)
            ->get();
        $array = array();
        foreach ($get_all as $item) {
            $array[$item['province_id']] = $item['type'] . ' ' . $item['name'];
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
        return $this->where('province_id', $id)->update($data);
    }


}