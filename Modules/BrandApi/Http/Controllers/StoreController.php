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
use Modules\BrandApi\Repositories\Store\StoreRepositoryInterface;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    protected $store;

    public function __construct(
        StoreRepositoryInterface $store
    ) {
        $this->store = $store;
    }

    /**
     * Tìm kiếm cửa hàng theo tên.
     * @param Request $request
     *
     * @return mixed
     */
    public function searchStore(Request $request)
    {
        $filters = $this->validate($request, [
            'store_name' => 'nullable'
        ]);
        return $this->store->searchStore($filters['store_name']);
    }

    public function filterStore(Request $request)
    {
        $filters = $this->validate($request, [
            'province_id' => 'nullable',
            'district_id' => 'nullable',
            'store_address' => 'nullable',
            'store_id' => 'nullable',
            'user_id' => 'nullable',
            'store_name' => 'nullable',
            'store_in' => 'nullable'
        ]);

        return $this->store->filterStore($filters);
    }

    /**
     * Danh sách cửa hàng yêu cầu kết nối.
     * @param Request $request
     *
     * @return mixed
     */
    public function storeRequireConnect(Request $request)
    {
        try {
            $filter = $request->all();
            $data = $this->store->storeRequireConnect($filter);

            return $this->responseJson(CODE_SUCCESS, __('Lấy danh sách thành công.'), $data);
        } catch (Exception $ex) {
            return $this->responseJson(CODE_ERROR, $ex->getMessage());
        }
    }
}
