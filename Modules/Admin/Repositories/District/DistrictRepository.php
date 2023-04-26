<?php


namespace Modules\Admin\Repositories\District;


use Illuminate\Support\Facades\Auth;
use Modules\Admin\Models\DistrictTable;

class DistrictRepository implements DistrictRepositoryInterface
{
    protected $district;
    protected $timestamps = true;

    /**
     * DistrictRepository constructor.
     * @param DistrictTable $district
     */
    public function __construct(DistrictTable $district)
    {
        $this->district = $district;
    }

    /**
     * @param array $filters
     * @return array|mixed
     */
    public function list(array $filters = [])
    {

        // TODO: Implement list() method.
        if (!isset($filters['keyword_country$country_name'])) {
            $filters['keyword_country$country_name'] = null;
        }
        if (!isset($filters['keyword_province$name'])) {
            $filters['keyword_province$name'] = null;
        }
        if (!isset($filters['keyword_district$name'])) {
            $filters['keyword_district$name'] = null;
        }
        if (!isset($filters['keyword_district$district_code'])) {
            $filters['keyword_district$district_code'] = null;
        }
        if (!isset($filters['district$is_actived'])) {
            $filters['district$is_actived'] = null;
        }
        if (!isset($filters['sort_country$country_name'])) {
            $filters['sort_country$country_name'] = null;
        }
        if (!isset($filters['sort_province$name'])) {
            $filters['sort_province$name'] = null;
        }
        if (!isset($filters['sort_district$name'])) {
            $filters['sort_district$name'] = null;
        }
        if (!isset($filters['sort_district$district_code'])) {
            $filters['sort_district$district_code'] = null;
        }
        if (!isset($filters['sort_district$is_actived'])) {
            $filters['sort_district$is_actived'] = null;
        }
        if (!isset($filters['sort_district$district_id'])) {
            $filters['sort_district$district_id'] = 'desc';
        }
//        dd($filters);
        $result = [
            'data' => $this->district->getListNew($filters),
            'filter' => $filters
        ];

        return $result;
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function add(array $data)
    {
        $data['name'] = strip_tags($data['name']);
        $data['district_code'] = strip_tags($data['district_code']);
        $data['type'] = strip_tags($data['type']);
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();

        return $this->district->add($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        // TODO: Implement getItem() method.
        return $this->district->getItem($id);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        $data['name'] = strip_tags($data['name']);
        $data['district_code'] = strip_tags($data['district_code']);
        $data['type'] = strip_tags($data['type']);
        $data['updated_by'] = Auth::id();

        return $this->district->edit($data, $id);
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function remove($id)
    {
        // TODO: Implement remove() method.
        return $this->district->remove($id);
    }


    /**
     * @param $id_province
     * @return array|mixed
     */
    public function getDistrictOption($id_province)
    {
        // TODO: Implement getDistrictOption() method.
        return $this->district->getDistrictOption($id_province);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function changeStatus(array $data, $id)
    {
        // TODO: Implement changeStatus() method.
        return $this->district->changeStatus($data, $id);
    }
}