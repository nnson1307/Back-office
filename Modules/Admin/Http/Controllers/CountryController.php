<?php


namespace Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\Country\CountryStoreRequest;
use Modules\Admin\Http\Requests\Country\CountryUpdateRequest;
use Modules\Admin\Repositories\Country\CountryRepositoryInterface;

class CountryController extends Controller
{
    /**
     * @var CountryRepositoryInterface
     */
    protected $country;

    /**
     * CountryController constructor.
     * @param CountryRepositoryInterface $country
     */
    public function __construct(CountryRepositoryInterface $country)
    {
        $this->country = $country;
    }

    /**
     * Hiển thị danh sách quốc gia
     *
     * @return Response
     */
    public function index()
    {
        $filter = request()->all();

        $data = $this->country->list($filter);

        return view('admin::country.index', [
            'LIST' => $data['data'],
            'filter' => $data['filter']
        ]);
    }

    /**
     * Hiển thị form tạo quốc gia
     *
     * @return Response
     */
    public function create()
    {
        return view('admin::country.create');
    }

    /**
     *  Xử lý lưu thông tin tạo nhóm quyền
     *
     * @param CountryStoreRequest $request
     * @return Response
     */
    public function store(CountryStoreRequest $request)
    {
        $param = $request->all();
        //insert country
        $this->country->add($param);

        return response()->json([
            'error' => false,
            'message' => __('admin::country.create.create_success')
        ]);
    }

    /**
     * Hiển thị form chỉnh sửa quốc gia
     *
     * @param $id
     * @return Response
     */
    public function edit($id)
    {
        $getItem = $this->country->getItem($id);

        return view('admin::country.edit', [
            'item' => $getItem
        ]);
    }

    /**
     * Xử lý lưu thông tin chỉnh sửa quốc gia
     *
     * @param CountryUpdateRequest $request
     * @return Response
     */
    public function update(CountryUpdateRequest $request)
    {
        $param = $request->all();

        //update country
        $this->country->edit($param, $param['country_id']);

        return response()->json([
            'error' => false,
            'message' => __('admin::country.edit.update_success')
        ]);
    }

    /**
     * Xử lý đánh dấu xóa nhóm quyền
     *
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $this->country->remove($request->id);

        return response()->json([
            'error' => 0,
            'message' => 'Remove success',
            'url' => 'admin.country'
        ]);
    }

    /**
     * Chỉnh sửa trạng thái quốc gia
     *
     * @param Request $request
     * @return Response
     */
    public function changeStatusAction(Request $request)
    {
        $data=[
            'is_actived' => $request->is_actived
        ];

        $this->country->changeStatus($data, $request->country_id);

        return response()->json([
            'error' => false,
            'message' => __('admin::country.index.CHANGE_STATUS_SUCCESS')
        ]);
    }

    /**
     * Hiển thị form chi tiết quốc gia
     *
     * @param $id
     * @return Response
     */
    public function detail($id)
    {
        $getItem = $this->country->getItem($id);
        if ($getItem != null) {
            return view('admin::country.detail', [
                'item' => $getItem
            ]);
        } else {
            return redirect()->route('admin.country');
        }
    }
}
