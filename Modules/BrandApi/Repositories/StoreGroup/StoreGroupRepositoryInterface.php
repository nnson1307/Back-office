<?php

namespace Modules\BrandApi\Repositories\StoreGroup;

interface StoreGroupRepositoryInterface
{
    /**
     * Lấy danh sách nhóm cửa hàng
     *
     * @param array $filter
     * @return mixed
     */
    public function getList(array $filter = []);

    /**
     * Lấy danh sách toàn bộ nhóm cửa hàng đã tạo
     *
     * @param int $tenant_id
     * @return mixed
     */
    public function getOption($tenant_id);

    /**
     * Thêm nhóm cửa hàng tự động
     *
     * @param array $data
     * @return mixed
     */
    public function storeAuto(array $data);

    /**
     * Lấy chi tiết nhóm
     *
     * @param $data
     * @return mixed
     */
    public function getDetail($data);

    /**
     * Thêm nhóm cửa hàng tự định nghĩa
     *
     * @param array $data
     * @return mixed
     */
    public function storeDefine(array $data);

    /**
     * Lấy danh sách chi tiết nhóm cửa hàng
     *
     * @param $data
     * @return array
     */
    public function getStoreGroupDetail($data);

    /**
     * Cập nhật nhóm tự động
     *
     * @param $data
     * @return array
     */
    public function updateAuto($data);

    /**
     * Cập nhật nhóm tự định nghĩa
     *
     * @param $data
     * @return array
     */
    public function updateDefine($data);

    /**
     * Lấy danh sách store theo tenant_id
     *
     * @param array $data
     * @return mixed
     */
    public function getListStore($data);

    public function getDetailDefine($id);

    /**
     * Lấy danh sách số điện thoại theo customer_code và ship_to_code trong data excel
     *
     * @param array $data
     * @return mixed
     */
    public function getPhoneNumberListByDataExcel($data);

    /**
     * Lấy ds all store không phân trang
     *
     * @param $data
     * @return mixed
     */
    public function getAllStore($data);

    /**
     * Danh sách nhận thông báo của nhóm khách hàng
     * @return array
     */
    public function storeGroup(array $data = []);
}
