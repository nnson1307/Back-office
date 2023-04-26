<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 4/18/2020
 * Time: 10:15 AM
 */

namespace Modules\BrandApi\Repositories\CampaignSampling;


interface CampaignSamplingRepoInterface
{
    /**
     * Lấy danh sách chương trình sampling
     *
     * @param $input
     * @return mixed
     */
    public function getSamplings($input);

    /**
     * Thêm chương trình sampling
     *
     * @param $input
     * @return mixed
     */
    public function store($input);

    /**
     * Thêm sản phẩm sampling
     *
     * @param $input
     * @return mixed
     */
    public function storeProduct($input);

    /**
     * Lấy chi tiết chương trình sampling
     *
     * @param $campaignId
     * @return mixed
     */
    public function getDetail($campaignId);

    /**
     * Chỉnh sửa chương trình sampling
     *
     * @param $input
     * @return mixed
     */
    public function update($input);

    /**
     * Chỉnh sửa sản phẩm sampling
     *
     * @param $input
     * @return mixed
     */
    public function updateProduct($input);
}