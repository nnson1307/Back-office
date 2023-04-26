<?php


namespace Modules\BrandApi\Http\Controllers;

use Illuminate\Http\Request;
use Modules\BrandApi\Repositories\Country\CountryRepositoryInterface;
use Modules\BrandApi\Repositories\District\DistrictRepositoryInterface;
use Modules\BrandApi\Repositories\Province\ProvinceRepositoryInterface;
use Modules\BrandApi\Repositories\Ward\WardRepositoryInterface;

class AddressController extends Controller
{
    protected $country;
    protected $province;
    protected $district;
    protected $ward;

    public function __construct(
        CountryRepositoryInterface $country,
        ProvinceRepositoryInterface $province,
        DistrictRepositoryInterface $district,
        WardRepositoryInterface $ward
    ) {
        $this->country = $country;
        $this->province = $province;
        $this->district = $district;
        $this->ward = $ward;
    }

    /**
     * Option Tỉnh thành
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProvinceAction(Request $request)
    {
        $country_id = $request->country_id;
        $data = $this->province->getProvinceOption($country_id);
        return $this->responseJson(CODE_SUCCESS, 'Thành Công', $data);
    }

    /**
     * Option quận huyện
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDistrictAction(Request $request)
    {
        $province_id = $request->province_id;
        $data = $this->district->getDistrictOption($province_id);
        return $this->responseJson(CODE_SUCCESS, 'Thành Công', $data);
    }

    /**
     * Option phường xã
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWardAction(Request $request)
    {
        $district_id = $request->district_id;
        $data = $this->ward->getWardOption($district_id);
        return $this->responseJson(CODE_SUCCESS, 'Thành Công', $data);
    }

    /**
     * Option quốc gia
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCountryAction()
    {
        $data = $this->country->getCountryOption();
        return $this->responseJson(CODE_SUCCESS, 'Thành Công', $data);
    }

    /**
     * Option Tỉnh thành
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProvinceCountryAction(Request $request)
    {
        $country_id = $request->country_id;
        $data = $this->province->getProvinceCountry($country_id);
        return $this->responseJson(CODE_SUCCESS, 'Thành Công', $data);
    }

    /**
     * Option Tỉnh thành theo area
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProvinceAreaAction(Request $request)
    {
        $province_id = $request->all();
        $data = $this->province->getProvinceArea($province_id['province_id']);
        return $this->responseJson(CODE_SUCCESS, 'Thành Công', $data);
    }

}
