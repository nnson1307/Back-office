<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 02-04-02020
 * Time: 2:03 PM
 */

namespace Modules\BrandApi\Repositories\Ward;


use MyCore\Repository\RepositoryExceptionAbstract;

class WardRepoException extends RepositoryExceptionAbstract
{
    const GET_WARD_LIST_FAILED = 0;
    const GET_WARD_DETAIL_FAILED = 1;
    const CHECK_WARD_FAILED = 2;

    public function __construct(int $code = 0, string $message = "")
    {
        parent::__construct($message ? : $this->transMessage($code), $code);
    }

    protected function transMessage($code)
    {
        switch ($code)
        {
            case self::GET_WARD_LIST_FAILED :
                return __('Lấy danh sách phường xã thất bại.');

            case self::GET_WARD_DETAIL_FAILED :
                return __('Lấy chi tiết phường xã thất bại.');

            case self::CHECK_WARD_FAILED :
                return __('Kiểm tra phường xã thất bại.');

            default:
                return null;
        }
    }
}