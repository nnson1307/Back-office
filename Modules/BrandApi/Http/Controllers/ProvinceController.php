<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 01-04-02020
 * Time: 4:45 PM
 */

namespace Modules\BrandApi\Http\Controllers;


use Modules\BrandApi\Http\Requests\Province\CheckProvinceRequest;
use Modules\BrandApi\Http\Requests\Province\DetailRequest;
use Modules\BrandApi\Http\Requests\Province\ListRequest;
use Modules\BrandApi\Repositories\Province\ProvinceRepoException;
use Modules\BrandApi\Repositories\Province\ProvinceRepositoryInterface;

class ProvinceController extends Controller
{
    protected $province;

    public function __construct(
        ProvinceRepositoryInterface $province
    ) {
        $this->province = $province;
    }

    /**
     * Danh sách tỉnh thành
     *
     * @param ListRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProvinces(ListRequest $request)
    {
        try {
            $data = $this->province->getProvinces($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (ProvinceRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Chi tiết tỉnh thành
     *
     * @param DetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(DetailRequest $request)
    {
        try {
            $data = $this->province->getDetail($request->province_id);

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (ProvinceRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Kiểm tra tỉnh thành
     *
     * @param CheckProvinceRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkProvince(CheckProvinceRequest $request)
    {
        try {
            $data = $this->province->checkProvince($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (ProvinceRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }
}