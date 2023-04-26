<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\Province\ProvinceStoreRequest;
use Modules\Admin\Http\Requests\Province\ProvinceUpdateRequest;
use Modules\Admin\Repositories\Country\CountryRepositoryInterface;
use Modules\Admin\Repositories\Province\ProvinceRepositoryInterface;

class ProvinceController extends Controller
{
    protected $province;
    protected $country;

    public function __construct(ProvinceRepositoryInterface $province, CountryRepositoryInterface $country)
    {
        $this->province = $province;
        $this->country = $country;
    }

    /**
     * Hiển thị danh sách tỉnh thành
     *
     * @return Response
     */
    public function index()
    {
        $filter = request()->all();

        $data = $this->province->list($filter);

        return view('admin::province.index', [
            'LIST' => $data['data'],
            'filter' => $data['filter']
        ]);
    }

    /**
     * Hiển thị form tạo tỉnh thành
     *
     * @return Response
     */
    public function create()
    {
        $optionCountry = $this->country->getCountryOption();

        return view('admin::province.create', [
            'optionCountry' => $optionCountry
        ]);
    }

    /**
     * Xử lý lưu thông tin tạo tỉnh thành
     *
     * @param ProvinceStoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProvinceStoreRequest $request)
    {
        $param = $request->all();
        //insert country
        $this->province->add($param);

        return response()->json([
            'error' => false,
            'message' => __('admin::province.create.create_success')
        ]);
    }


    /**
     * Hiển thị form chỉnh sửa tỉnh thành
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $getItem = $this->province->getItem($id);
        $optionCountry = $this->country->getCountryOption();
        return view('admin::province.edit', [
            'province' => $getItem,
            'optionCountry' => $optionCountry
        ]);
    }

    /**
     * Xử lý lưu thông tin chỉnh sửa tỉnh thành
     *
     * @param ProvinceUpdateRequest $request
     * @return Response
     */
    public function update(ProvinceUpdateRequest $request)
    {
        $param = $request->all();
        //insert country
        $this->province->edit($param, $param['province_id']);

        return response()->json([
            'error' => false,
            'message' => __('admin::province.edit.update_success')
        ]);
    }

    /**
     * Xử lý đánh dấu xóa tỉnh thành
     *
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $this->province->remove(intval($request->id));
        return response()->json([
            'error' => 0,
            'message' => 'Remove success',
            'url' => 'admin.province'
        ]);
    }

    /**
     * Chỉnh sửa trạng thái tỉnh thành
     *
     * @param Request $request
     * @return Response
     */
    public function changeStatusAction(Request $request)
    {

        $data=[
            'is_actived' => $request->is_actived
        ];

        $this->province->changeStatus($data, $request->province_id);

        return response()->json([
            'error' => false,
            'message' => __('admin::province.index.CHANGE_STATUS_SUCCESS')
        ]);
    }

    /**
     * Hiển thị form chi tiết tỉnh thành
     *
     * @param $id
     * @return Response
     */
    public function detail($id)
    {
        $getItem = $this->province->getItem($id);
        $optionCountry = $this->country->getCountryOption();

        if ($getItem != null) {
            return view('admin::province.detail', [
                'province' => $getItem,
                'optionCountry' => $optionCountry
            ]);
        } else {
            return redirect('admin.province');
        }
    }
}
