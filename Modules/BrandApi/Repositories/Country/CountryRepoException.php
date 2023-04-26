<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 01-04-02020
 * Time: 4:15 PM
 */

namespace Modules\BrandApi\Repositories\Country;


use MyCore\Repository\RepositoryExceptionAbstract;

class CountryRepoException extends RepositoryExceptionAbstract
{
    const GET_COUNTRY_LIST_FAILED = 0;
    const GET_COUNTRY_DETAIL_FAILED = 1;
    const CHECK_COUNTRY_FAILED = 2;
    const CHECK_ADDRESS_FAILED = 3;

    public function __construct(int $code = 0, string $message = "")
    {
        parent::__construct($message ? : $this->transMessage($code), $code);
    }

    protected function transMessage($code)
    {
        switch ($code)
        {
            case self::GET_COUNTRY_LIST_FAILED :
                return __('Lấy danh sách quốc gia thất bại.');

            case self::GET_COUNTRY_DETAIL_FAILED :
                return __('Lấy chi tiết quốc gia thất bại.');

            case self::CHECK_COUNTRY_FAILED :
                return __('Kiểm tra quốc gia thất bại.');

            case self::CHECK_ADDRESS_FAILED :
                return __('Kiểm tra địa chỉ thất bại.');

            default:
                return null;
        }
    }
}