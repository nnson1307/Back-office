<?php


namespace Modules\Admin\Repositories\Country;

use Illuminate\Support\Facades\Auth;
use Modules\Admin\Models\CountryTable;

class CountryRepository implements CountryRepositoryInterface
{
    protected $country;
    protected $timestamps = true;

    /**
     * CountryRepository constructor.
     * @param CountryTable $country
     */
    public function __construct(CountryTable $country)
    {
        $this->country = $country;
    }

    /**
     * @param array $filters
     * @return array|mixed
     */
    public function list(array $filters = [])
    {
        // TODO: Implement list() method.
        if (!isset($filters['sort_country$country_id'])) {
            $filters['sort_country$country_id'] = 'desc';
        }
        if (!isset($filters['sort_country$country_name'])) {
            $filters['sort_country$country_name'] = null;
        }
        if (!isset($filters['sort_country$country_code'])) {
            $filters['sort_country$country_code'] = null;
        }
        if (!isset($filters['sort_country$is_actived'])) {
            $filters['sort_country$is_actived'] = null;
        }
        if (!isset($filters['keyword_country_name'])) {
            $filters['keyword_country_name'] = null;
        }
        if (!isset($filters['keyword_country_code'])) {
            $filters['keyword_country_code'] = null;
        }
        if (!isset($filters['is_actived'])) {
            $filters['is_actived'] = null;
        }
//        dd($filters);
        $result = [
            'data' => $this->country->getListNew($filters),
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
        $data['country_name'] = strip_tags($data['country_name']);
        $data['country_code'] = strip_tags($data['country_code']);
        $data['created_by'] = Auth::id();
        $data['updated_by'] = Auth::id();

        return $this->country->add($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getItem($id)
    {
        // TODO: Implement getItem() method.
        return $this->country->getItem($id);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function edit(array $data, $id)
    {
        $data['country_name'] = strip_tags($data['country_name']);
        $data['country_code'] = strip_tags($data['country_code']);
        $data['updated_by'] = Auth::id();

        return $this->country->edit($data, $id);
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function remove($id)
    {
        // TODO: Implement remove() method.
        return $this->country->remove($id);
    }

    /**
     * @return array|mixed
     */
    public function getCountryOption()
    {
        // TODO: Implement getCountryOption() method.
        return $this->country->getCountryOption();
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function changeStatus(array $data, $id)
    {
        // TODO: Implement changeStatusAction() method.
        return $this->country->changeStatus($data, $id);
    }

}