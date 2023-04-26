<?php


namespace Modules\BrandApi\Repositories\Brand;


interface BrandRepositoryInterface
{
    public function search(array $filters = []);

    /**
     * Lấy thông tin brand config
     *
     * @param $brandId
     * @return mixed
     */
    public function getConfig($brandId);

    /**
     * Chỉnh sửa brand config
     *
     * @param $input
     * @return mixed
     */
    public function updateConfig($input);

    /**
     * Thêm brand config
     *
     * @param $input
     * @return mixed
     */
    public function storeConfig($input);

    /**
     * Lấy thông tin brand
     *
     * @param $tenantId
     * @return mixed
     */
    public function getBrand($tenantId);

    public function updateBrand($data);

    public function checkUpdateBrand($data);
}
