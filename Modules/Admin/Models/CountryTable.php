<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class CountryTable extends Model
{
    use ListTableTrait;
    protected $table = 'country';
    protected $primaryKey = 'country_id';
    protected $fillable=[
        'country_id','country_name','country_code','is_actived',
        'is_deleted','created_at','updated_at','created_by','updated_by'
    ];

    /**
     * @param array $filter
     * @return mixed
     */
    public function getListCore(&$filter = [])
    {

        $ds = $this->select('country_id', 'country_name', 'country_code', 'is_actived')
            ->where('is_deleted', 0);
//        if (isset($filter['country_name']) != "") {
//            $search = $filter['country_name'];
//
//            $ds->where(function ($query) use ($search) {
//                $query->where('country_name', 'like', '%' . $search . '%')
//                    ->where('is_deleted', 0);
//            });
//        }
        return $ds;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $add=$this->create($data);
        return $add->country_id;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->where('country_id', $id)->where('is_deleted', 0)->first();
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        return $this->where('country_id', $id)->update($data);
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
    public function getCountryOption()
    {
        $get_all= $this->select('country_id', 'country_name')->where('is_actived', 1)->where('is_deleted', 0)->get();
        $array = array();
        foreach ($get_all as $item) {
            $array[$item['country_id']] = $item['country_name'];
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
        return $this->where('country_id', $id)->update($data);
    }
}
