<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 8/13/2019
 * Time: 1:43 PM
 */

namespace Modules\BrandApi\Repositories\Brand;

use Illuminate\Support\Facades\Auth;
use Modules\BrandApi\Models\BrandConfigTable;
use Modules\BrandApi\Models\BrandSubscriptionTable;
use Modules\BrandApi\Models\BrandTable;
use Modules\BrandApi\Models\StoreTable;
use MyCore\Http\Response\ResponseFormatTrait;

class BrandRepository implements BrandRepositoryInterface
{
    use ResponseFormatTrait;

    protected $brand;

    public function __construct(BrandTable $brand)
    {
        $this->brand = $brand;
    }

    /**
     * Tìm kiếm brand theo tên công ty hoặc mã công ty
     * @param array $filters
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(array $filters = [])
    {
        $result = $this->brand->search($filters);
        return $this->responseJson(CODE_SUCCESS, null, $result);
    }

    /**
     * lấy thông tin brand config
     *
     * @param $brandId
     * @return mixed
     * @throws BrandRepoException
     */
    public function getConfig($brandId)
    {
        try {
            $mBrandConfig = new BrandConfigTable();

            $data = $mBrandConfig->getInfo($brandId);

            return $data;
        } catch (\Exception $e) {
            throw new BrandRepoException(BrandRepoException::GET_BRAND_CONFIG_FAILED);
        }
    }

    /**
     * Chỉnh sửa brand config
     *
     * @param $input
     * @return mixed|void
     * @throws BrandRepoException
     */
    public function updateConfig($input)
    {
        try {
            $mBrandConfig = new BrandConfigTable();

            $mBrandConfig->edit($input, $input['brand_id']);

        } catch (\Exception $e) {
            throw new BrandRepoException(BrandRepoException::UPDATE_BRAND_CONFIG_FAILED);
        }
    }

    /**
     * Thêm brand config
     *
     * @param $input
     * @return mixed|void
     * @throws BrandRepoException
     */
    public function storeConfig($input)
    {
        try {
            $mBrandConfig = new BrandConfigTable();

            $brandId = $mBrandConfig->add($input);

        } catch (\Exception $e) {
            throw new BrandRepoException(BrandRepoException::STORE_BRAND_CONFIG_FAILED);
        }
    }

    /**
     * Lấy thông tin brand
     *
     * @param $tenantId
     * @return mixed|void
     * @throws BrandRepoException
     */
    public function getBrand($tenantId)
    {
        try {
            $info = $this->brand->getBrandByTenant($tenantId);

            return $info;
        } catch (\Exception $e) {
            throw new BrandRepoException(BrandRepoException::GET_BRAND_FAILED);
        }
    }

    public function updateBrand($data)
    {
        try {
            $id = $data['brand_id'];
            unset($data['brand_id']);
            $edit = $this->brand->editBrand($data,$id);

            return $edit;
        } catch (\Exception $e) {
            throw new BrandRepoException(BrandRepoException::GET_BRAND_FAILED);
        }
    }

    public function checkUpdateBrand($data)
    {
        try {
            $id = $data['brand_id'];
            unset($data['brand_id']);
            $checkNameBrand = $this->brand->checkBrand(['brand_name' => $data['brand_name']],$id);
            $checkDisplayName = $this->brand->checkBrand(['display_name' => $data['display_name']],$id);
            $checkHotline = $this->brand->checkBrand(['hotline' => $data['hotline']],$id);

            return [
                'brand_name' => $checkNameBrand,
                'display_name' => $checkDisplayName,
                'hotline' => $checkHotline,
            ];
        } catch (\Exception $e) {
            throw new BrandRepoException(BrandRepoException::GET_BRAND_FAILED);
        }
    }
}