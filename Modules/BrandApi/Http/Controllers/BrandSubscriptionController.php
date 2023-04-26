<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 9/19/2019
 * Time: 10:07 AM
 */

namespace Modules\BrandApi\Http\Controllers;


use Matrix\Exception;
use Modules\BrandApi\Repositories\BrandSubscription\BrandSubscriptionRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandSubscriptionController extends Controller
{
    protected $brandSubscription;

    public function __construct(
        BrandSubscriptionRepositoryInterface $brandSubscription
    ) {
        $this->brandSubscription = $brandSubscription;
    }

    public function getMyStoreDetail(Request $request)
    {
        $filters = $this->validate($request, [
            'tenant_id' => 'required',
            'brand_customer_code' => 'required',
            'brand_ship_to_code' => 'required',
            'get_list_brand_sub_by_code' => 'nullable',
        ]);
        return $this->brandSubscription->getMyStoreDetail($filters);
    }

    public function deleteConnectMyStore(Request $request)
    {
        $filters = $this->validate($request, [
            'tenant_id' => 'required',
            'brand_customer_code' => 'required',
            'brand_ship_to_code' => 'required',
            'status' =>'required'
        ]);
        return $this->brandSubscription->deleteConnectMyStore($filters);
    }

    /**
     * Update brand sub.
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateBrandSub(Request $request)
    {
        try {
            $filters = $request->all();
            $data = $this->brandSubscription->updateBrandSub($filters, $filters['brand_subscription_id']);
            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (\Exception $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Add brand sub history.
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addBrandSubHistory(Request $request)
    {
        try {
            $filters = $request->all();
            $data = $this->brandSubscription->addBrandSubHistory($filters);
            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (\Exception $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    public function getDetailBrandSub(Request $request)
    {
        try {
            $filters = $this->validate($request, [
                'brand_subscription_id' => 'required',
            ]);

            $data = $this->brandSubscription->getDetailBrandSub($filters['brand_subscription_id']);
            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (\Exception $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    public function getBrandSubDetailByCode(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'tenant_id' => 'required',
                'brand_customer_code' => 'required',
                'brand_ship_to_code' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->responseJson(CODE_FAILED, $validator->errors()->all(), null);
            }
            $filters = $request->all();
            $data = $this->brandSubscription->getBrandSubDetailByCode($filters);
            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (\Exception $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }
}
