<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 8/13/2019
 * Time: 1:43 PM
 */

namespace Modules\BrandApi\Repositories\BrandSubscription;

use Modules\BrandApi\Models\BrandSubscriptionHistoryTable;
use Modules\BrandApi\Models\BrandSubscriptionTable;
use Modules\BrandApi\Models\StoreTable;
use MyCore\Http\Response\ResponseFormatTrait;

class BrandSubscriptionRepository implements
    BrandSubscriptionRepositoryInterface
{
    use ResponseFormatTrait;

    protected $brandSubscription;
    protected $brandSubHistory;

    public function __construct(
        BrandSubscriptionTable $brandSubscription,
        BrandSubscriptionHistoryTable $brandSubHistory
    ) {
        $this->brandSubscription = $brandSubscription;
        $this->brandSubHistory = $brandSubHistory;
    }

    public function getMyStoreDetail($filters)
    {
        $result = $this->brandSubscription->getMyStoreDetail($filters);
        return $this->responseJson('', null, $result);
    }

    public function deleteConnectMyStore($filters)
    {
        $searchMyStore = $this->brandSubscription->searchMyStore($filters);
        if ($searchMyStore->count() == 0) {
            return $this->responseJson('', 'error', $filters);
        } else {
            $brandSubHistory = $this->brandSubHistory->addHistory($searchMyStore->first());
            $brandSub = $this->brandSubscription->deleteBrand($searchMyStore->first());
            return $this->responseJson('', 'true', null);
        }
    }

    public function getMyStorePhone($filters)
    {
        return $this->brandSubscription->getMyStorePhone($filters);
    }

    /**
     * Update brand sub
     * @param $filters
     * @param $brandSubId
     */
    public function updateBrandSub($filters, $brandSubId)
    {
        return $this->brandSubscription->edit($filters, $brandSubId);
    }

    /**
     * Add brand sub
     * @param $data
     *
     * @return mixed
     */
    public function addBrandSubHistory($data)
    {
        return $this->brandSubHistory->add($data);
    }

    /**
     * Detail brand sub
     * @param $id
     *
     * @return mixed
     */
    public function getDetailBrandSub($id)
    {
        return $this->brandSubscription->getItem($id);
    }

    public function getBrandSubDetailByCode($filters)
    {
        return $this->brandSubscription->getBrandSubDetailByCode($filters);
    }
}
