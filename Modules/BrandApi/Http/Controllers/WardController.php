<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 02-04-02020
 * Time: 2:04 PM
 */

namespace Modules\BrandApi\Http\Controllers;


use Modules\BrandApi\Http\Requests\Ward\CheckWardRequest;
use Modules\BrandApi\Http\Requests\Ward\DetailRequest;
use Modules\BrandApi\Http\Requests\Ward\ListRequest;
use Modules\BrandApi\Repositories\Ward\WardRepoException;
use Modules\BrandApi\Repositories\Ward\WardRepositoryInterface;

class WardController extends Controller
{
    protected $ward;

    public function __construct(
        WardRepositoryInterface $ward
    ) {
        $this->ward = $ward;
    }

    /**
     * Danh sách phường xã
     *
     * @param ListRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getWards(ListRequest $request)
    {
        try {
            $data = $this->ward->getWards($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (WardRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Chi tiết phường xã
     *
     * @param DetailRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(DetailRequest $request)
    {
        try {
            $data = $this->ward->getDetail($request->ward_id);

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (WardRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Kiểm tra phường xã
     *
     * @param CheckWardRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkWard(CheckWardRequest $request)
    {
        try {
            $data = $this->ward->checkWard($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (WardRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }
}