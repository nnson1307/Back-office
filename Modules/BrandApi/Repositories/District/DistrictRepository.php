<?php


namespace Modules\BrandApi\Repositories\District;


use Modules\BrandApi\Models\DistrictTable;
use MyCore\Repository\PagingTrait;

class DistrictRepository implements DistrictRepositoryInterface
{
    use PagingTrait;
    protected $district;

    public function __construct(DistrictTable $district)
    {
        $this->district = $district;
    }

    public function getDistrictOption($id_province)
    {
        $array = array();
        foreach ($this->district->getDistrictOption($id_province) as $item) {
            $array[$item['district_id']] = $item['type'] . ' ' . $item['name'];
        }
        return $array;
    }

    /**
     * Danh sách quận huyện
     *
     * @param $input
     * @return array|mixed
     * @throws DistrictRepoException
     */
    public function getDistricts($input)
    {
        try {
            $data = $this->toPagingData($this->district->getDistricts($input));

            return $data;
        } catch (\Exception $exception) {
            throw new DistrictRepoException(DistrictRepoException::GET_DISTRICT_LIST_FAILED);
        }
    }

    /**
     * Chi tiết quận huyện
     *
     * @param $districtId
     * @return mixed
     * @throws DistrictRepoException
     */
    public function getDetail($districtId)
    {
        try {
            $data = $this->district->getInfo($districtId);

            return $data;
        } catch (\Exception $exception) {
            throw new DistrictRepoException(DistrictRepoException::GET_DISTRICT_DETAIL_FAILED);
        }
    }

    /**
     * Kiểm tra quận huyện
     *
     * @param $input
     * @return mixed
     * @throws DistrictRepoException
     */
    public function checkDistrict($input)
    {
        try {
            $data = $this->district->checkDistrict($input['country_name'], $input['province_name'], $input['district_name']);

            return $data;
        } catch (\Exception $exception) {
            throw new DistrictRepoException(DistrictRepoException::CHECK_DISTRICT_FAILED);
        }
    }
}