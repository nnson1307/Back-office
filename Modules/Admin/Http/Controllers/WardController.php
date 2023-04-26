<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\WardStoreRequest;
use Modules\Admin\Http\Requests\WardUpdateRequest;
use Modules\Admin\Repositories\Country\CountryRepositoryInterface;
use Modules\Admin\Repositories\District\DistrictRepositoryInterface;
use Modules\Admin\Repositories\Ward\WardRepositoryInterface;

class WardController extends Controller
{
    protected $ward;
    protected $district;
    protected $country;

    public function __construct(
        WardRepositoryInterface $ward,
        DistrictRepositoryInterface $district,
        CountryRepositoryInterface $countrty
    ) {
        $this->ward = $ward;
        $this->district = $district;
        $this->country = $countrty;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $filter = request()->all();

        if (!isset($filter['keyword_country$country_name'])) {
            $filter['keyword_country$country_name'] = null;
        }
        if (!isset($filter['keyword_province$name'])) {
            $filter['keyword_province$name'] = null;
        }
        if (!isset($filter['keyword_district$name'])) {
            $filter['keyword_district$name'] = null;
        }
        if (!isset($filter['keyword_ward$name'])) {
            $filter['keyword_ward$name'] = null;
        }
        if (!isset($filter['ward$is_actived'])) {
            $filter['ward$is_actived'] = null;
        }
        if (!isset($filter['keyword_ward$ward_code'])) {
            $filter['keyword_ward$ward_code'] = null;
        }
        if (!isset($filter['sort_country$country_name'])) {
            $filter['sort_country$country_name'] = null;
        }
        if (!isset($filter['sort_province$name'])) {
            $filter['sort_province$name'] = null;
        }
        if (!isset($filter['sort_district$name'])) {
            $filter['sort_district$name'] = null;
        }
        if (!isset($filter['sort_ward$name'])) {
            $filter['sort_ward$name'] = null;
        }
        if (!isset($filter['sort_ward$ward_code'])) {
            $filter['sort_ward$ward_code'] = null;
        }
        if (!isset($filter['sort_ward$is_actived'])) {
            $filter['sort_ward$is_actived'] = null;
        }
        if (!isset($filter['sort_ward$ward_id'])) {
            $filter['sort_ward$ward_id'] = 'desc';
        }
        $data = $this->ward->list($filter);

        return view('admin::ward.index', [
            'LIST' => $data,
            'filter' => $filter
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $optionCountry = $this->country->getCountryOption();

        return view('admin::ward.create', [
            'optionCountry' => $optionCountry,
        ]);
    }

    /**
     * Thay đổi tỉnh thành load quận huyện
     *
     * @param Request $request
     * @return Response
     */
    public function changeProvinceAction(Request $request)
    {
        $district = $this->district->getDistrictOption($request->province_id);
        return response()->json([
            'district' => $district
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(WardStoreRequest $request)
    {
        $param = $request->all();
        unset($param['country_id'], $param['province_id']);
        //insert country
        $this->ward->add($param);

        return response()->json([
            'error' => false,
            'message' => __('admin::ward.create.create_success')
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {

        $optionCountry = $this->country->getCountryOption();
        $getItem = $this->ward->getItem($id);

        return view('admin::ward.edit', [
            'ward' => $getItem,
            'optionCountry' => $optionCountry,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Response
     */
    public function update(WardUpdateRequest $request)
    {
        $param = $request->all();
        unset($param['country_id'], $param['province_id']);
        //insert country
        $this->ward->edit($param, $param['ward_id']);

        return response()->json([
            'error' => false,
            'message' => __('admin::ward.edit.update_success')
        ]);
    }

    /**
     * Xóa ward
     *
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $this->ward->remove($request->id);

        return response()->json([
            'error' => 0,
            'message' => 'Remove success',
            'url' => 'admin.ward'
        ]);
    }

    /**
     * Chỉnh sửa trạng thái phường xã
     *
     * @param Request $request
     * @return Response
     */
    public function changeStatusAction(Request $request)
    {

        $data = [
            'is_actived' => $request->is_actived
        ];

        $this->ward->changeStatus($data, $request->ward_id);

        return response()->json([
            'error' => false,
            'message' => __('admin::ward.index.CHANGE_STATUS_SUCCESS')
        ]);
    }

    /**
     * Chi tiết phường xã.
     * @return Response
     */
    public function detail($id)
    {
        $optionCountry = $this->country->getCountryOption();
        $getItem = $this->ward->getItem($id);
        if ($getItem != null) {
            return view('admin::ward.detail', [
                'ward' => $getItem,
                'optionCountry' => $optionCountry,
            ]);
        } else {
            return redirect()->route('admin.ward');
        }
    }
}
