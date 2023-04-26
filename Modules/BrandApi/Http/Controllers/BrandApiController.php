<?php

namespace Modules\BrandApi\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\BrandApi\Http\Requests\brand\ConfigRequest;
use Modules\BrandApi\Http\Requests\brand\GetBrandRequest;
use Modules\BrandApi\Http\Requests\brand\StoreConfigRequest;
use Modules\BrandApi\Http\Requests\brand\UpdateBrandRequest;
use Modules\BrandApi\Http\Requests\brand\UpdateConfigRequest;
use Modules\BrandApi\Models\BrandApiTable;
use Modules\BrandApi\Repositories\Brand\BrandRepoException;
use Modules\BrandApi\Repositories\Brand\BrandRepositoryInterface;

use MyCore\Http\Response\ResponseFormatTrait;

class BrandApiController extends Controller
{
    protected $brand;

    public function __construct(BrandRepositoryInterface $brand)
    {
        $this->brand = $brand;
    }

    public function index(Request $request)
    {
        $param = $request->all();
        $mBrand = new BrandApiTable();
        $data = $mBrand->getAll();

        return $this->responseJson(CODE_SUCCESS, 'Thành Công', $data);
    }

    /**
     * Tìm kiếm brand theo tên công ty hoặc mã công ty
     * @param Request $request
     *
     * @return mixed
     */
    public function search(Request $request)
    {
        $filters = $this->validate($request, [
            'company_name_code' => 'nullable'
        ]);
        return $this->brand->search($filters);
    }

    /**
     * Lấy thông tin brand config
     *
     * @param ConfigRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getConfig(ConfigRequest $request)
    {
        try {
            $data = $this->brand->getConfig($request->brand_id);

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (BrandRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Chỉnh sửa brand config
     *
     * @param UpdateConfigRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateConfig(UpdateConfigRequest $request)
    {
        try {
            $data = $this->brand->updateConfig($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (BrandRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Thêm brand config
     *
     * @param StoreConfigRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeConfig(StoreConfigRequest $request)
    {
        try {
            $data = $this->brand->storeConfig($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (BrandRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Lấy thông tin brand
     *
     * @param GetBrandRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBrand(GetBrandRequest $request)
    {
        try {
            $data = $this->brand->getBrand($request->tenant_id);

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (BrandRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Cập nhật brand
     *
     * @param GetBrandRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateBrand(Request $request)
    {
        try {
            $data = $this->brand->updateBrand($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (BrandRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Kiểm tra các biến
     *
     * @param GetBrandRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkUpdateBrand(Request $request)
    {
        try {
            $data = $this->brand->checkUpdateBrand($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (BrandRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }
}
