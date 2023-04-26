<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 01-04-02020
 * Time: 5:23 PM
 */

namespace Modules\BrandApi\Repositories\District;


use MyCore\Repository\RepositoryExceptionAbstract;

class DistrictRepoException extends RepositoryExceptionAbstract
{
    const GET_DISTRICT_LIST_FAILED = 0;
    const GET_DISTRICT_DETAIL_FAILED = 1;
    const CHECK_DISTRICT_FAILED = 2;

    public function __construct(int $code = 0, string $message = "")
    {
        parent::__construct($message ? : $this->transMessage($code), $code);
    }

    protected function transMessage($code)
    {
        switch ($code)
        {
            case self::GET_DISTRICT_LIST_FAILED :
                return __('Lấy danh sách quận huyện thất bại.');

            case self::GET_DISTRICT_DETAIL_FAILED :
                return __('Lấy chi tiết quận huyện thất bại.');

            case self::CHECK_DISTRICT_FAILED :
                return __('Kiểm tra quận huyện thất bại.');

            default:
                return null;
        }
    }
}