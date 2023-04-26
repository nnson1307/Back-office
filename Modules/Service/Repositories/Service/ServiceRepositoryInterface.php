<?php

namespace Modules\Service\Repositories\Service;

interface ServiceRepositoryInterface
{
//    Lấy danh sách dịch vụ có phân trang
    public function getList(array $filters = []);

//    lấy danh sách tính năng (feature_group) để hiển thị cho popup
    public function getListFeature($filters);

//    lấy danh sách tính năng (feature_group) theo sesstion
    public function getListFeatureBySession($data);

    public function getListFeatureChild($id);

//    Lấy danh sách dịch vụ theo sesstion
    public function getListServiceBySession($data);

    public function getListServiceByBrandId($id);

    public function getListFeatureByIdSessionService($data);

    public function getListFeatureByIdBrand($id);
//    Tạo dịch vụ
    public function storeService($data);

//    Chỉnh sửa dịch vụ
    public function updateService($data);

    public function storeFeature($data);
    public function storeFeatureChild($data);

    /**
     *function destroy feature
     * @param int $id
     * @return mixed
     */
    public function removeFeature($id);

    /**
     * get detail feature
     * @param int $id
     * @return mixed
     */
    public function getDetailFeature($id);

    /**
     * update info feature
     * @param $data
     * @return mixed
     */
    public function updateFeature($data);

    /**
     *function change status job
     * @param int $id
     * @param string  $data
     * @return mixed
     */
    public function changeStatusFeature($id, $data);

//    Lấy chi tiết dịch vụ
    public function getDetail($id);

//    Lấy danh sách tính năng theo id dịch vụ
    public function listServiceFeatureById($id);

//    Lấy danh sách tính năng theo id dịch vụ gán vào session
    public function listServiceFeatureByIdSession($id);
    public function listServiceFeatureChildByIdSession($id);
}