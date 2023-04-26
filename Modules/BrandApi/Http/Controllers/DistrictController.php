<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 01-04-02020
 * Time: 5:25 PM
 */

namespace Modules\BrandApi\Http\Controllers;


use Modules\BrandApi\Http\Requests\District\CheckDistrictRequest;
use Modules\BrandApi\Http\Requests\District\DetailRequest;
use Modules\BrandApi\Http\Requests\District\ListRequest;
use Modules\BrandApi\Repositories\District\DistrictRepoException;
use Modules\BrandApi\Repositories\District\DistrictRepositoryInterface;

class DistrictController extends Controller
{
    protected $district;

    public function __construct(
        DistrictRepositoryInterface $district
    ) {
        $this->district = $district;
    }

    /**
     * Danh sách quận huyện
     *
     * @param ListRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDistricts(ListRequest $request)
    {
        try {
            $data = $this->district->getDistricts($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (DistrictRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Chi tiết quận huyện
     *
     * @param DetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(DetailRequest $request)
    {
        try {
            $data = $this->district->getDetail($request->district_id);

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (DistrictRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Kiểm tra quận huyện
     *
     * @param CheckDistrictRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkDistrict(CheckDistrictRequest $request)
    {
        try {
            $data = $this->district->checkDistrict($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (DistrictRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }
}