<?php


namespace Modules\BrandApi\Repositories\District;


interface DistrictRepositoryInterface
{
    /**
     * @param $id_province
     * @return mixed
     */
    public function getDistrictOption($id_province);

    /**
     * Danh sách quận huyện
     *
     * @param $input
     * @return mixed
     */
    public function getDistricts($input);

    /**
     * Chi tiết quận huyện
     *
     * @param $districtId
     * @return mixed
     */
    public function getDetail($districtId);

    /**
     * Kiểm tra quận huyện
     *
     * @param $input
     * @return mixed
     */
    public function checkDistrict($input);
}