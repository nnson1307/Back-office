<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\District\DistrictStoreRequest;
use Modules\Admin\Http\Requests\District\DistrictUpdateRequest;
use Modules\Admin\Repositories\Country\CountryRepositoryInterface;
use Modules\Admin\Repositories\District\DistrictRepositoryInterface;
use Modules\Admin\Repositories\Province\ProvinceRepositoryInterface;

class DistrictController extends Controller
{
    /**
     * @var DistrictRepositoryInterface
     */
    protected $district;
    protected $province;
    protected $country;

    public function __construct(
        DistrictRepositoryInterface $district,
        ProvinceRepositoryInterface $province,
        CountryRepositoryInterface $country
    ) {
        $this->district = $district;
        $this->province = $province;
        $this->country = $country;
    }

    /**
     *  Hiển thị danh sách quận huyện
     *
     * @return Response
     */
    public function index()
    {
        $filter = request()->all();

        $data = $this->district->list($filter);

        return view('admin::district.index', [
            'LIST' => $data['data'],
            'filter' => $data['filter']
        ]);
    }

    /**
     * Hiển thị form tạo quận huyện
     *
     * @return Response
     */
    public function create()
    {
        $optionCountry = $this->country->getCountryOption();
        return view('admin::district.create', [
            'optionCountry' => $optionCountry,
        ]);
    }

    /**
     * Thay đổi quốc gia load tỉnh thành
     *
     * @param Request $request
     * @return Response
     */
    public function changeCountryAction(Request $request)
    {
        $province = $this->province->getProvinceOption($request->country_id);
        return response()->json([
            'province' => $province
        ]);
    }

    /**
     * Xử lý lưu thông tin tạo quận huyện
     *
     * @param Request $request
     * @return Response
     */
    public function store(DistrictStoreRequest $request)
    {
        $param = $request->all();
        unset($param['country_id']);
        //insert country
        $this->district->add($param);

        return response()->json([
            'error' => false,
            'message' => __('admin::district.create.create_success')
        ]);
    }


    /**
     * Hiển thị form chỉnh sửa quận huyện
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $getItem = $this->district->getItem($id);
        $optionCountry = $this->country->getCountryOption();
        return view('admin::district.edit', [
            'district' => $getItem,
            'optionCountry' => $optionCountry,
        ]);
    }

    /**
     * Xử lý lưu thông tin chỉnh sửa quận huyện
     *
     * @param Request $request
     * @return Response
     */
    public function update(DistrictUpdateRequest $request)
    {
        $param = $request->all();
        unset($param['country_id']);
        //update country
        $this->district->edit($param, $param['district_id']);

        return response()->json([
            'error' => false,
            'message' => __('admin::district.edit.update_success')
        ]);
    }

    /**
     * Xử lý đánh dấu xóa quận huyện
     *
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $this->district->remove($request->id);

        return response()->json([
            'error' => 0,
            'message' => 'Remove success',
            'url' => 'admin.district'
        ]);
    }

    /**
     * Chỉnh sửa quận huyện
     *
     * @param Request $request
     * @return Response
     */
    public function changeStatusAction(Request $request)
    {
        $data = [
            'is_actived' => $request->is_actived
        ];

        $this->district->changeStatus($data, $request->district_id);

        return response()->json([
            'error' => false,
            'message' => __('admin::district.index.CHANGE_STATUS_SUCCESS')
        ]);
    }

    /**
     * Hiển thị form chỉnh sửa quận huyện
     *
     * @param $id
     * @return Response
     */
    public function detail($id)
    {
        $getItem = $this->district->getItem($id);
        $optionCountry = $this->country->getCountryOption();
        if ($getItem != null) {
            return view('admin::district.detail', [
                'district' => $getItem,
                'optionCountry' => $optionCountry,
            ]);
        } else {
            return redirect()->route('admin.district');
        }
    }
}
