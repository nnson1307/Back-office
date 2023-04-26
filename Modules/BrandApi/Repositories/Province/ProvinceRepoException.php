<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 01-04-02020
 * Time: 4:46 PM
 */

namespace Modules\BrandApi\Repositories\Province;


use MyCore\Repository\RepositoryExceptionAbstract;

class ProvinceRepoException extends RepositoryExceptionAbstract
{
    const GET_PROVINCE_LIST_FAILED = 0;
    const GET_PROVINCE_DETAIL_FAILED = 1;
    const CHECK_PROVINCE_FAILED = 2;

    public function __construct(int $code = 0, string $message = "")
    {
        parent::__construct($message ? : $this->transMessage($code), $code);
    }

    protected function transMessage($code)
    {
        switch ($code)
        {
            case self::GET_PROVINCE_LIST_FAILED :
                return __('Lấy danh sách tỉnh thành thất bại.');

            case self::GET_PROVINCE_DETAIL_FAILED :
                return __('Lấy chi tiết tỉnh thành thất bại.');

            case self::CHECK_PROVINCE_FAILED :
                return __('Kiểm tra tỉnh thành thất bại.');

            default:
                return null;
        }
    }
}