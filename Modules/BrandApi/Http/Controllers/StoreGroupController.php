<?php

namespace Modules\BrandApi\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\BrandApi\Repositories\BrandSubscription\BrandSubscriptionRepositoryInterface;
use Modules\BrandApi\Repositories\StoreGroup\StoreGroupRepositoryInterface;

class StoreGroupController extends Controller
{
    protected $storeGroup;
    protected $brandSubscription;

    public function __construct(
        StoreGroupRepositoryInterface $storeGroup,
        BrandSubscriptionRepositoryInterface $brandSubscription
    )
    {
        $this->storeGroup = $storeGroup;
        $this->brandSubscription = $brandSubscription;
    }

    /**
     * Lấy danh sách nhóm cửa hàng
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tenant_id' => 'required'
        ], [
            'tenant_id.required' => 'Chưa có tenant id',
        ]);

        if ($validator->fails()) {
            return $this->responseJson(CODE_FAILED, $validator->errors()->all(), null);
        }

        $data = $request->all();

        $result = $this->storeGroup->getList($data);

        return $this->responseJson(CODE_SUCCESS, 'Success', $result);
    }

    /**
     * Lấy danh sách toàn bộ cửa hàng đã tạo
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getOption(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tenant_id' => 'required'
        ], [
            'tenant_id.required' => 'Chưa có tenant id',
        ]);

        if ($validator->fails()) {
            return $this->responseJson(CODE_FAILED, $validator->errors()->all(), null);
        }

        $data = $request->all();

        $result = $this->storeGroup->getOption($data['tenant_id']);

        return $this->responseJson(CODE_SUCCESS, 'Success', $result);
    }

    /**
     * Thêm nhóm cửa hàng tự động
     *
     * @param Request $request
     * @return Response
     */
    public function storeAuto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tenant_id' => 'required',
            'name' => 'required|unique:mystore_filter_group,name,NULL,id,is_brand,1,tenant_id,'.$request->input('tenant_id'),
            'created_by' => 'required',
            'updated_by' => 'required'
        ], [
            'tenant_id.required' => 'Chưa có tenant id',
            'name.required' => 'Vui lòng nhập tên nhóm cửa hàng',
            'name.unique' => 'Tên nhóm cửa hàng đã tồn tại',
            'created_by.required' => 'Chưa có người tạo',
            'updated_by.required' => 'Chưa có người cập nhật',
        ]);

        if ($validator->fails()) {
            return $this->responseJson(CODE_FAILED, $validator->errors()->all(), null);
        }

        $data = $request->all();

        $result = $this->storeGroup->storeAuto($data);

        if ($result['error']) {
            return $this->responseJson(CODE_FAILED, $result['message'], null);
        }

        return $this->responseJson(CODE_SUCCESS, $result['message'], $result['data']);
    }

    /**
     * Thêm nhóm cửa hàng tự định nghĩa
     *
     * @param Request $request
     * @return Response
     */
    public function storeDefine(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tenant_id' => 'required',
            'name' => 'required|unique:mystore_filter_group,name,NULL,id,is_brand,1,tenant_id,'.$request->input('tenant_id'),
            'created_by' => 'required',
            'updated_by' => 'required'
        ], [
            'tenant_id.required' => 'Chưa có tenant id',
            'name.required' => 'Vui lòng nhập tên nhóm cửa hàng',
            'name.unique' => 'Tên nhóm cửa hàng đã tồn tại',
            'created_by.required' => 'Chưa có người tạo',
            'updated_by.required' => 'Chưa có người cập nhật',
        ]);

        if ($validator->fails()) {
            return $this->responseJson(CODE_FAILED, $validator->errors()->all(), null);
        }

        $data = $request->all();

        $result = $this->storeGroup->storeDefine($data);

        if ($result['error']) {
            return $this->responseJson(CODE_FAILED, $result['message'], null);
        }

        return $this->responseJson(CODE_SUCCESS, $result['message'], $result['data']);
    }

    /**
     * Lấy chi tiết nhóm
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tenant_id' => 'required',
            'id' => 'required',
        ], [
            'tenant_id.required' => 'Chưa có tenant id',
            'id.required' => 'Chưa có id',
        ]);

        if ($validator->fails()) {
            return $this->responseJson(CODE_FAILED, $validator->errors()->all(), null);
        }

        $data = $request->all();

        $result = $this->storeGroup->getDetail($data);

        if ($result['error']) {
            return $this->responseJson(CODE_FAILED, $result['message'], null);
        }

        return $this->responseJson(CODE_SUCCESS, $result['message'], $result['data']);
    }

    /**
     * Lấy danh sách chi tiết nhóm cửa hàng
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStoreGroupDetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ], [
            'id.required' => 'Chưa có id',
        ]);

        if ($validator->fails()) {
            return $this->responseJson(CODE_FAILED, $validator->errors()->all(), null);
        }

        $data = $request->all();

        $result = $this->storeGroup->getStoreGroupDetail($data);

        if ($result['error']) {
            return $this->responseJson(CODE_FAILED, $result['message'], null);
        }

        return $this->responseJson(CODE_SUCCESS, $result['message'], $result['data']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return Response
     */
    public function editAuto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tenant_id' => 'required',
            'id' => 'required',
            'name' => 'required|unique:mystore_filter_group,name,' . $request->id . ',id,is_brand,1',
            'updated_by' => 'required'
        ], [
            'tenant_id.required' => 'Chưa có tenant id',
            'id.required' => 'Chưa có id',
            'name.required' => 'Vui lòng nhập tên nhóm cửa hàng',
            'name.unique' => 'Tên nhóm cửa hàng đã tồn tại',
            'updated_by.required' => 'Chưa có người cập nhật',
        ]);

        if ($validator->fails()) {
            return $this->responseJson(CODE_FAILED, $validator->errors()->all(), 'error');
        }

        $data = $request->all();

        $result = $this->storeGroup->updateAuto($data);

        if ($result['error']) {
            return $this->responseJson(CODE_FAILED, $result['message'], null);
        }

        return $this->responseJson(CODE_SUCCESS, $result['message'], $result['data']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @return Response
     */
    public function editDefine(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tenant_id' => 'required',
            'id' => 'required',
            'name' => 'required|unique:mystore_filter_group,name,' . $request->id . ',id,is_brand,1',
            'updated_by' => 'required'
        ], [
            'tenant_id.required' => 'Chưa có tenant id',
            'id.required' => 'Chưa có id',
            'name.required' => 'Vui lòng nhập tên nhóm cửa hàng',
            'name.unique' => 'Tên nhóm cửa hàng đã tồn tại',
            'updated_by.required' => 'Chưa có người cập nhật',
        ]);

        if ($validator->fails()) {
            return $this->responseJson(CODE_FAILED, $validator->errors()->all(), null);
        }

        $data = $request->all();
        $result = $this->storeGroup->updateDefine($data);

        if ($result['error']) {
            return $this->responseJson(CODE_FAILED, $result['message'], null);
        }

        return $this->responseJson(CODE_SUCCESS, $result, []);
    }

    /**
     * Danh sách sdt của nhóm
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetailDefine(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ], [
            'id.required' => 'Chưa có id',
        ]);

        if ($validator->fails()) {
            return $this->responseJson(CODE_FAILED, $validator->errors()->all(), null);
        }
        $id = intval($request->id);
        $result = $this->storeGroup->getDetailDefine($id);
        if ($result['error']) {
            return $this->responseJson(CODE_FAILED, $result['message'], null);
        }
        return $this->responseJson(CODE_SUCCESS, '', $result['data']);
    }

    /**
     * Lấy danh sách store
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getListStore(Request $request)
    {
        $data = $this->validate($request, [
            'tenant_id' => 'required',
            'filter' => 'array|nullable',
            'group' => 'nullable'
        ], [
            'tenant_id.required' => 'Chưa có tenant_id',
            'filter.array' => 'filter phải là 1 mảng',
        ]);

        $result = $this->storeGroup->getListStore($data);

        return $this->responseJson(CODE_SUCCESS, '', $result);
    }

    /**
     * Kiểm tra data excel để lấy danh sách sđt của chủ cửa hàng
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkExcel(Request $request)
    {
        $data = $this->validate($request, [
            'tenant_id' => 'required',
            'data' => 'array|nullable'
        ], [
            'tenant_id.required' => 'Chưa có tenant_id',
            'data.array' => 'data phải là 1 mảng',
        ]);

        $result = $this->storeGroup->getPhoneNumberListByDataExcel($data);

        return $this->responseJson(CODE_SUCCESS, '', $result);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMyStoreDetail(Request $request)
    {
        $filters = $this->validate($request, [
            'tenant_id' => 'required',
            'brand_customer_code' => 'required',
            'brand_ship_to_code' => 'required',
        ]);

        $result = $this->brandSubscription->getMyStorePhone($filters);

        return $this->responseJson(CODE_SUCCESS, '', $result);
    }

    /**
     * Lấy ds all store không phân trang
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllStore(Request $request)
    {
        try {
            $filters = $this->validate($request, [
                'tenant_id' => 'required'
            ]);
            $data = $this->storeGroup->getAllStore($filters);

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (\Exception $ex) {
            return $this->responseJson(CODE_FAILED, 'Lấy danh sách store thất bại');
        }
    }

    public function getStoreGroup(Request $request)
    {
        try {
            $filters = $this->validate($request, [
                'id' => 'required',
                'tenant_id' => 'nullable',
            ]);
            $data = $this->storeGroup->storeGroup($filters);

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (\Exception $ex) {
            return $this->responseJson(CODE_FAILED, 'Lấy danh sách store thất bại');
        }
    }
}
