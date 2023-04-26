<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 01-04-02020
 * Time: 10:43 AM
 */

namespace Modules\BrandApi\Repositories\Brand;


use MyCore\Repository\RepositoryExceptionAbstract;

class BrandRepoException extends RepositoryExceptionAbstract
{
    const GET_BRAND_CONFIG_FAILED = 0;
    const UPDATE_BRAND_CONFIG_FAILED = 1;
    const STORE_BRAND_CONFIG_FAILED = 2;
    const GET_BRAND_FAILED = 0;

    public function __construct(int $code = 0, string $message = "")
    {
        parent::__construct($message ? : $this->transMessage($code), $code);
    }

    protected function transMessage($code)
    {
        switch ($code)
        {
            case self::GET_BRAND_CONFIG_FAILED :
                return __('Lấy thông tin cấu hình brand thất bại.');

            case self::UPDATE_BRAND_CONFIG_FAILED :
                return __('Chỉnh sửa cấu hình brand thất bại.');

            case self::STORE_BRAND_CONFIG_FAILED :
                return __('Thêm cấu hình brand thất bại.');

            case self::GET_BRAND_FAILED :
                return __('Lấy thông tin brand thất bại.');

            default:
                return null;
        }
    }
}