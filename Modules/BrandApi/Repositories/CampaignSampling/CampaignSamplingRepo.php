<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 4/18/2020
 * Time: 10:15 AM
 */

namespace Modules\BrandApi\Repositories\CampaignSampling;


use Modules\BrandApi\Models\CampaignSamplingProductTable;
use Modules\BrandApi\Models\CampaignSamplingTable;
use MyCore\Repository\PagingTrait;

class CampaignSamplingRepo implements CampaignSamplingRepoInterface
{
    use PagingTrait;
    protected $campaignSampling;

    public function __construct(
        CampaignSamplingTable $campaignSampling
    ) {
        $this->campaignSampling = $campaignSampling;
    }

    /**
     * Danh sách chương trình sampling
     *
     * @param $input
     * @return array|mixed
     * @throws CampaignSamplingRepoException
     */
    public function getSamplings($input)
    {
        try {
            $data = $this->toPagingData($this->campaignSampling->getSamplings($input));

            return $data;
        } catch (\Exception $exception) {
            throw new CampaignSamplingRepoException(CampaignSamplingRepoException::GET_CAMPAIGN_SAMPLING_LIST_FAILED);
        }
    }

    /**
     * Thêm chương trình sampling
     *
     * @param $input
     * @return mixed
     * @throws CampaignSamplingRepoException
     */
    public function store($input)
    {
        try {
            $idCampaign = $this->campaignSampling->add($input);

            return [
                "campaign_id" => $idCampaign
            ];
        } catch (\Exception $exception) {
            throw new CampaignSamplingRepoException(CampaignSamplingRepoException::STORE_CAMPAIGN_SAMPLING_FAILED);
        }
    }

    /**
     * Thêm sản phẩm sampling
     *
     * @param $input
     * @return mixed|void
     * @throws CampaignSamplingRepoException
     */
    public function storeProduct($input)
    {
        try {
            $mCampaignProduct = new CampaignSamplingProductTable();

            $mCampaignProduct->add($input);
        } catch (\Exception $exception) {
            throw new CampaignSamplingRepoException(CampaignSamplingRepoException::STORE_CAMPAIGN_SAMPLING_PRODUCT_FAILED);
        }
    }

    /**
     * Lấy chi tiết chương trình sampling
     *
     * @param $campaignId
     * @return array|mixed
     * @throws CampaignSamplingRepoException
     */
    public function getDetail($campaignId)
    {
        try {
            //Thông tin campaign sampling
            $info = $this->campaignSampling->getItem($campaignId)->toArray();
            //Thông tin campaign product
            $mCampaignProduct = new CampaignSamplingProductTable();
            $product = $mCampaignProduct->getItem($campaignId)->toArray();

            return [
                'info' => $info,
                'product' => $product
            ];
        } catch (\Exception $exception) {
            throw new CampaignSamplingRepoException(CampaignSamplingRepoException::GET_CAMPAIGN_SAMPLING_DETAIL_FAILED);
        }
    }

    /**
     * Chỉnh sửa chương trình sampling
     *
     * @param $input
     * @return mixed|void
     * @throws CampaignSamplingRepoException
     */
    public function update($input)
    {
        try {
            $this->campaignSampling->edit($input, $input['campaign_id']);

        } catch (\Exception $exception) {
            throw new CampaignSamplingRepoException(CampaignSamplingRepoException::UPDATE_CAMPAIGN_SAMPLING_FAILED);
        }
    }

    /**
     * Chỉnh sửa sản phẩm sampling
     *
     * @param $input
     * @return mixed|void
     * @throws CampaignSamplingRepoException
     */
    public function updateProduct($input)
    {
        try {
            $mCampaignProduct = new CampaignSamplingProductTable();

            $mCampaignProduct->edit($input, $input['campaign_id']);
        } catch (\Exception $exception) {
            throw new CampaignSamplingRepoException(CampaignSamplingRepoException::UPDATE_CAMPAIGN_SAMPLING_PRODUCT_FAILED);
        }
    }
}