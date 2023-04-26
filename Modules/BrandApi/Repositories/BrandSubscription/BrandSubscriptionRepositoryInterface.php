<?php


namespace Modules\BrandApi\Repositories\BrandSubscription;


interface BrandSubscriptionRepositoryInterface
{
    public function getMyStoreDetail($filters);

    public function deleteConnectMyStore($filters);

    public function getMyStorePhone($filters);

    public function updateBrandSub($filters, $brandSubId);

    public function addBrandSubHistory($data);

    public function getDetailBrandSub($id);

    public function getBrandSubDetailByCode($filters);
}
