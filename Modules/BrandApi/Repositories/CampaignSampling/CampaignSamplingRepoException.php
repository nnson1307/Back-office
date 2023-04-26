<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 4/18/2020
 * Time: 10:15 AM
 */

namespace Modules\BrandApi\Repositories\CampaignSampling;


use MyCore\Repository\RepositoryExceptionAbstract;

class CampaignSamplingRepoException extends RepositoryExceptionAbstract
{
    const GET_CAMPAIGN_SAMPLING_LIST_FAILED = 0;
    const STORE_CAMPAIGN_SAMPLING_FAILED = 1;
    const GET_CAMPAIGN_SAMPLING_DETAIL_FAILED = 2;
    const UPDATE_CAMPAIGN_SAMPLING_FAILED = 3;
    const STORE_CAMPAIGN_SAMPLING_PRODUCT_FAILED = 4;
    const UPDATE_CAMPAIGN_SAMPLING_PRODUCT_FAILED = 5;

    public function __construct(int $code = 0, string $message = "")
    {
        parent::__construct($message ? : $this->transMessage($code), $code);
    }

    protected function transMessage($code)
    {
        switch ($code)
        {
            case self::GET_CAMPAIGN_SAMPLING_LIST_FAILED :
                return __('Lấy danh sách chương trình Sampling thất bại.');

            case self::STORE_CAMPAIGN_SAMPLING_FAILED :
                return __('Thêm chương trình Sampling thất bại.');

            case self::GET_CAMPAIGN_SAMPLING_DETAIL_FAILED :
                return __('Lấy chi tiết chương trình Sampling thất bại.');

            case self::UPDATE_CAMPAIGN_SAMPLING_FAILED :
                return __('Chỉnh sửa chương trình Sampling thất bại.');

            case self::STORE_CAMPAIGN_SAMPLING_PRODUCT_FAILED :
                return __('Thêm sản phẩm Sampling thất bại.');

            case self::UPDATE_CAMPAIGN_SAMPLING_PRODUCT_FAILED :
                return __('Chỉnh sửa sản phẩm Sampling thất bại.');

            default:
                return null;
        }
    }
}