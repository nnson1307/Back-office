<?php


namespace Modules\BrandApi\Repositories\Country;

interface CountryRepositoryInterface
{
    /**
     * Option quốc gia
     *
     * @return mixed
     */
    public function getCountryOption();

    /**
     * Lấy danh sách quốc gia
     *
     * @param $input
     * @return mixed
     */
    public function getCountries($input);

    /**
     * Chi tiết quốc gia
     *
     * @param $countryId
     * @return mixed
     */
    public function getDetail($countryId);

    /**
     * Kiểm tra quốc gia
     *
     * @param $countryName
     * @return mixed
     */
    public function checkCountry($countryName);

    /**
     * Kiểm tra địa chỉ
     *
     * @param $input
     * @return mixed
     */
    public function checkAddress($input);
}