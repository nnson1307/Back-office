<?php


namespace Modules\BrandApi\Repositories\Province;


interface ProvinceRepositoryInterface
{
    /**
     * @return mixed
     */
    public function getProvinceOption($country_id = null);

    /**
     * Danh sách tỉnh thành
     *
     * @param $input
     * @return mixed
     */
    public function getProvinces($input);

    /**
     * Chi tiết tỉnh thành
     *
     * @param $provinceId
     * @return mixed
     */
    public function getDetail($provinceId);

    /**
     * Kiểm tra tỉnh thành
     *
     * @param $input
     * @return mixed
     */
    public function checkProvince($input);

    public function getProvinceCountry($country_id = null);

    public function getProvinceArea($area);
}
