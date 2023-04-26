<?php

namespace Modules\Service\Repositories\ServiceFeature;

interface ServiceFeatureRepositoryInterface
{
//    Lấy danh sách tính năng có phân trang
    public function getList(array $filters = []);

//    lấy chi tiết tính năng
    public function getDetail($id);

//    Lấy danh sách dịch vụ sử dụng tính năng
    public function getListService($id);

//    Lấy danh sách thương hiệu theo tính năng
    public function getListBrand($id);

//    Cập nhật tính năng tên định nghĩa lại
    public function updateFeature($data);

//    lấy danh sách feature dựa theo danh sách id feature
    public function getListFeature($data);
}