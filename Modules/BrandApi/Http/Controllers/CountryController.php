<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 01-04-02020
 * Time: 4:14 PM
 */

namespace Modules\BrandApi\Http\Controllers;


use Modules\BrandApi\Http\Requests\Country\CheckAddressRequest;
use Modules\BrandApi\Http\Requests\Country\CheckCountryRequest;
use Modules\BrandApi\Http\Requests\Country\DetailRequest;
use Modules\BrandApi\Http\Requests\Country\ListRequest;
use Modules\BrandApi\Repositories\Country\CountryRepoException;
use Modules\BrandApi\Repositories\Country\CountryRepositoryInterface;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    protected $country;

    public function __construct(
        CountryRepositoryInterface $country
    ) {
        $this->country = $country;
    }

    /**
     * Lấy danh sách quốc gia
     *
     * @param ListRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCountries(ListRequest $request)
    {
        try {
            $data = $this->country->getCountries($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (CountryRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Chi tiết quốc gia
     *
     * @param DetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(DetailRequest $request)
    {
        try {
            $data = $this->country->getDetail($request->country_id);

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (CountryRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Kiểm tra quốc gia
     *
     * @param CheckCountryRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkCountry(CheckCountryRequest $request)
    {
        try {
            $data = $this->country->checkCountry($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (CountryRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Kiểm tra địa chỉ
     *
     * @param CheckAddressRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkAddress(Request $request)
    {
        try {
            //Vì lỗi nên không dùng CheckAddressRequest
            $data = $this->country->checkAddress($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (CountryRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }
}