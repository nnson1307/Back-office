<?php


namespace Modules\BrandApi\Repositories\Country;

use Modules\BrandApi\Models\CountryTable;
use Modules\BrandApi\Models\DistrictTable;
use Modules\BrandApi\Models\ProvinceTable;
use Modules\BrandApi\Models\WardTable;
use MyCore\Repository\PagingTrait;

class CountryRepository implements CountryRepositoryInterface
{
    use PagingTrait;

    protected $country;

    /**
     * ProvinceRepository constructor.
     * @param ProvinceTable $province
     */
    public function __construct(
        CountryTable $country
    )
    {
        $this->country = $country;
    }

    /**
     * @return array|mixed
     */
    public function getCountryOption()
    {
        $array = array();
        foreach ($this->country->getOption() as $item) {
            $array[$item['country_id']] = $item['country_name'];
        }
        return $array;
    }

    /**
     * Danh sách quốc gia
     *
     * @param $input
     * @return array|mixed
     * @throws CountryRepoException
     */
    public function getCountries($input)
    {
        try {
            $data = $this->toPagingData($this->country->getCountries($input));

            return $data;
        } catch (\Exception $exception) {
            throw new CountryRepoException(CountryRepoException::GET_COUNTRY_LIST_FAILED);
        }
    }

    /**
     * Chi tiết quốc gia
     *
     * @param $countryId
     * @return mixed
     * @throws CountryRepoException
     */
    public function getDetail($countryId)
    {
        try {
            $data = $this->country->getInfo($countryId);

            return $data;
        } catch (\Exception $exception) {
            throw new CountryRepoException(CountryRepoException::GET_COUNTRY_DETAIL_FAILED);
        }
    }

    /**
     * Kiểm tra quốc gia
     *
     * @param $countryName
     * @return mixed
     * @throws CountryRepoException
     */
    public function checkCountry($countryName)
    {
        try {
            $data = $this->country->checkCountry($countryName);

            return $data;
        } catch (\Exception $exception) {
            throw new CountryRepoException(CountryRepoException::CHECK_COUNTRY_FAILED);
        }
    }

    /**
     * Kiểm tra địa chỉ
     *
     * @param $input
     * @return array|mixed
     * @throws CountryRepoException
     */
    public function checkAddress($input)
    {
        try {
            $mProvince = new ProvinceTable();
            $mDistrict = new DistrictTable();
            $mWard = new WardTable();
            $message = '';

            //Check quốc gia
            $country = $this->checkCountry($input['country_name']);
            if ($country == null) {
                return [
                    'error' => 1,
                    'message' => 'Quốc gia không tồn tại;'
                ];
            }
            //Check tỉnh thành
            $province = $mProvince->checkProvince($input['country_name'], $input['province_name']);
            if ($province == null) {
                return [
                    'error' => 1,
                    'message' => 'Tỉnh thành không tồn tại;'
                ];
            }
            //Check quận huyện
            $district = $mDistrict->checkDistrict($input['country_name'], $input['province_name'], $input['district_name']);
            if ($district == null) {
                return [
                    'error' => 1,
                    'message' => 'Quận huyện không tồn tại;'
                ];
            }
            //Check phường xã
            $ward = $mWard->checkWard($input['country_name'], $input['province_name'], $input['district_name'], $input['ward_name']);
            if ($ward == null) {
                return [
                    'error' => 1,
                    'message' => 'Phường xã không tồn tại;'
                ];
            }

            return [
                'error' => 0,
                'data' => [
                    'country_id' => $country['country_id'],
                    'province_id' => $province['province_id'],
                    'district_id' => $district['district_id'],
                    'ward_id' => $ward['ward_id']
                ]
            ];
        } catch (\Exception $exception) {
            throw new CountryRepoException(CountryRepoException::CHECK_ADDRESS_FAILED);
        }
    }
}