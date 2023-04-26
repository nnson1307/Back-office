<?php


namespace Modules\BrandApi\Repositories\Province;

use Modules\BrandApi\Models\ProvinceTable;
use MyCore\Repository\PagingTrait;

class ProvinceRepository implements ProvinceRepositoryInterface
{
    use PagingTrait;
    protected $province;

    /**
     * ProvinceRepository constructor.
     * @param ProvinceTable $province
     */
    public function __construct(ProvinceTable $province)
    {
        $this->province = $province;
    }

    /**
     * @return array|mixed
     */
    public function getProvinceOption($country_id = null)
    {
        $array = array();
        foreach ($this->province->getProvinceOption($country_id) as $item) {
            $array[$item['province_id']] = $item['type'] . ' ' . $item['name'];
        }
        return $array;
    }

    /**
     * Danh sách tỉnh thành
     *
     * @param $input
     * @return array|mixed
     * @throws ProvinceRepoException
     */
    public function getProvinces($input)
    {
        try {
            $data = $this->toPagingData($this->province->getProvinces($input));

            return $data;
        } catch (\Exception $exception) {
            throw new ProvinceRepoException(ProvinceRepoException::GET_PROVINCE_LIST_FAILED);
        }
    }

    /**
     * Chi tiết tỉnh thành
     *
     * @param $provinceId
     * @return mixed
     * @throws ProvinceRepoException
     */
    public function getDetail($provinceId)
    {
        try {
            $data = $this->province->getInfo($provinceId);

            return $data;
        } catch (\Exception $exception) {
            throw new ProvinceRepoException(ProvinceRepoException::GET_PROVINCE_DETAIL_FAILED);
        }
    }

    /**
     * Kiểm tra tỉnh thành
     *
     * @param $input
     * @return mixed|void
     * @throws ProvinceRepoException
     */
    public function checkProvince($input)
    {
        try {
            $data = $this->province->checkProvince($input['country_name'], $input['province_name']);

            return $data;
        } catch (\Exception $exception) {
            throw new ProvinceRepoException(ProvinceRepoException::CHECK_PROVINCE_FAILED);
        }
    }

    /**
     * Option tỉnh thành phải có quốc gia
     * @param null $country_id
     *
     * @return array|mixed
     */
    public function getProvinceCountry($country_id = null)
    {
        $array = array();
        foreach ($this->province->getProvinceCountry($country_id) as $item) {
            $array[$item['province_id']] = $item['type'] . ' ' . $item['name'];
        }
        return $array;
    }

    /**
     * Option tỉnh thành phải có quốc gia
     * @param null $country_id
     *
     * @return array|mixed
     */
    public function getProvinceArea($area)
    {
        $array = array();
        foreach ($this->province->getProvinceArea($area) as $item) {
            $array[$item['province_id']] = $item;
        }
        return $array;
    }
}
