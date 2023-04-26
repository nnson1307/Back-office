<?php


namespace Modules\Admin\Repositories\Brand;


interface BrandRepositoryInterface
{
    public function getList(array $filters = []);

    /**
     * Lấy danh sách thương hiệu không phân trang
     *
     * @param array $filters
     * @return array
     */
    public function listAll(array $filters = []);

    public function add(array $data);

    public function getItem($id);

    public function getServiceBrand($id);

    public function getServiceBrandFeature($id);

    public function getListService($id);

    public function edit(array $data, $id);

    public function remove($id);

    public function addUserAdmin(array $data);

    public function getListUserAdmin($brand_id);

    public function removeUserAdmin(array $data, $id);

    public function activeUserAdmin(array $data, $id);

    public function changePassword(array $data, $id);

    /**
     * Thay đổi trang thái hoặc trạng thái hiển thị
     *
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function changeStaus(array $data, $id);

    /**
     * Lấy thông tin brand theo tenant id
     *
     * @param int $tenant_id
     * @return mixed
     */
    public function getDetailBy($tenant_id);

    public function storeService($data);

//    Xóa dịch vụ khi thêm trong brand
    public function removeFeature($id);
}
