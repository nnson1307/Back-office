<?php

namespace Modules\Admin\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Http\Requests\Brand\BrandAddRequest;
use Modules\Admin\Http\Requests\Brand\BrandEditRequest;
use Modules\Admin\Repositories\Brand\BrandRepositoryInterface;
use Modules\Service\Repositories\Service\ServiceRepositoryInterface;

class BrandController extends Controller
{
    protected $brand;
    protected $service;

    public function __construct(
        BrandRepositoryInterface $brand,
        ServiceRepositoryInterface $service
    ) {
        $this->brand = $brand;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $filter = request()->all();

        $data = $this->brand->getList($filter);

        return view('admin::brand.index', [
            'LIST' => $data['list'],
            'filter' => $data['filters'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Request $request)
    {
        if ($request->session()->has('service_group')) {
            $request->session()->forget('service_group');
        }
        if ($request->session()->has('brand_id')) {
            $request->session()->forget('brand_id');
        }
        return view('admin::brand.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(BrandAddRequest $request)
//    public function store(Request $request)
    {
        $param = $request->all();
        $result = $this->brand->add($param);

        if ($result['status']) {
            return response()->json([
                'error' => false,
                'brand_id' => $result['brand_id'],
                'message' => $result['message']
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => $result['messages']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id,Request $request)
    {
        if ($request->session()->has('service_group')) {
            $request->session()->forget('service_group');
        }
        $listService = $this->brand->getListService($id);
        $request->session()->put('service_group',$listService);
        $request->session()->put('brand_id',$id);
//        chi tiết brand
        $getItem = $this->brand->getItem($id);

        return view('admin::brand.edit', [
            'brand' => $getItem,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param BrandEditRequest $request
     * @return Response
     */
    public function update(BrandEditRequest $request)
    {
        $param = $request->all();
        $result = $this->brand->edit($param, $param['brand_id']);

        if ($result['status']) {
            return response()->json([
                'error' => false,
                'brand_id' => $param['brand_id'],
                'message' => $result['message']
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => $result['message']
        ]);
    }

    /**
     * Cập nhật trạng thái brand
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request)
    {
        $data = $request->only(['brand_id', 'is_activated']);
        $result = $this->brand->changeStaus(['is_activated' => $data['is_activated']], $data['brand_id']);

        if ($result) {
            return response()->json([
                'error' => 0,
                'message' => __('admin::brand.popup.UPDATED'),
            ]);
        } else {
            return response()->json([
                'error' => 1,
                'message' => __('admin::brand.popup.UPDATE_FAILED'),
            ]);
        }
    }

    /**
     * Cập nhật trạng thái hiển thị
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePublish(Request $request)
    {
        $data = $request->only(['brand_id', 'is_published']);
        if (isset($data['brand_id'])) {
            $result = $this->brand->changeStaus(['is_published' => $data['is_published']], $data['brand_id']);

            if ($result) {
                return response()->json([
                    'error' => 0,
                    'message' => __('admin::brand.popup.UPDATED'),
                ]);
            } else {
                return response()->json([
                    'error' => 1,
                    'message' => __('admin::brand.popup.UPDATE_FAILED'),
                ]);
            }
        }
    }

    public function userAdminAdd()
    {
        return view('admin::brand.modal.adduseradmin');
    }

    public function userAdminChangePass()
    {
        return view('admin::brand.modal.changepassuseradmin');
    }

    /**
     * Xoá user admin
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function removeUser(Request $request)
    {
        $param = $request->all();
        $param['is_deleted'] = 1;
        $item = $this->brand->removeUserAdmin($param, $param['id']);
        $isError = true;
        if ($item > 0) {
            $isError = false;
        }
        return response()->json([
            'error' => $isError,
            'message' => 'Remove success'
        ]);
    }

    /**
     * Active và unactive useradmin
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function activeUser(Request $request)
    {
        $param = $request->all();
        $item = $this->brand->activeUserAdmin($param, $param['id']);
        $isError = true;
        if ($item > 0) {
            $isError = false;
        }
        return response()->json([
            'error' => $isError,
            'message' => 'Remove success'
        ]);
    }

    /**
     * Thêm mói user admin
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitUserAdminAdd(Request $request)
    {
        $param = $request->all();
        $filters  = $request->only([
            'user_brand_id',
            'full_name',
            'email',
            'password',
        ]);
        $is_activated  = 0;
        $is_require_change_pass  = 0;
        if (isset($param['is_actived'])) {
            $is_activated = 1;
        }
        if (isset($param['is_require_change_pass'])) {
            $is_require_change_pass = 1;
        }
        $oBrand = $this->brand->getItem($param['user_brand_id']);
        $tenantId = $oBrand->tenant_id;
        $tenantSDK = app()->get(\DaiDP\StsSDK\TenantUserManagement\TenantUserManagementInterface::class);
        $result = $tenantSDK->setTenantId($tenantId)->register($data_register = [
            "username"             =>   "",
            "fullname"             =>  strip_tags($param['full_name']),
            "email"                =>  strip_tags($param['email']),
            "password"             =>  strip_tags($param['password']),
            "confirmpassword"      =>  strip_tags($param['password']),
        ]);
        if (!$result->error) {
            $filters['brand_id'] = strip_tags($param['user_brand_id']);
            $filters['full_name'] = strip_tags($param['full_name']);
            $filters['password'] = strip_tags($param['password']);
            $filters['admin_code'] = $result->data['id'];
            $filters['email'] = strip_tags($param['email']);
            $filters['is_deleted'] = 0;
            $filters['is_admin'] = 0;
            $filters['is_actived'] = $is_activated;
            $filters['is_change_pass'] = $is_require_change_pass;
            $filters['created_by'] = Auth::id();
            $filters['updated_by'] = Auth::id();
            $item = $this->brand->addUserAdmin($filters);
            $isError = true;
            if ($item > 0) {
                $isError = false;
            }
            return response()->json([
                'error' => $isError,
            ]);
        } else {
            return response()->json([
                'error' => false,
            ]);
        }
    }

    /**
     * change password
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitChangePassUserAdmin(Request $request)
    {
        $param = $request->all();
        $is_require_change_pass = 0;
        if (isset($param['is_require_change_pass'])) {
            $is_require_change_pass = 1;
        }
        $tenantSDK = app()->get(\DaiDP\StsSDK\SystemUserManagement\SystemUserManagementInterface::class);
        $result = $tenantSDK->resetPassword($data_register = [
            "email"                =>  strip_tags($param['email']),
            "newpassword"             =>  strip_tags($param['password']),
            "confirmpassword"      =>  strip_tags($param['password']),
        ]);
        if (!$result->error) {
            $param['is_require_change_pass'] = $is_require_change_pass;
            $item = $this->brand->changePassword($param, $param['user_id']);
            $isError = true;
            if ($item > 0) {
                $isError = false;
            }
            return response()->json([
                'error' => $isError,
                'message' => 'Remove success'
            ]);
        } else {
            return response()->json([
                'error' => false,
            ]);
        }

    }
    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        $this->brand->remove($request->id);

        return response()->json([
            'error' => 0,
            'message' => 'Remove success',
            'url'=> 'admin.brand'
        ]);
    }

    public function uploadAction(Request $request)
    {
//        $this->validate($request, [
//            "avatar" => "mimes:jpg,jpeg,png,gif|max:10000"
//        ], [
//            "avatar.mimes" => "File này không phải file hình",
//            "avatar.max" => "File quá lớn"
//        ]);
//        if ($request->file('file') != null) {
//            $file = $this->uploadImageTemp($request->file('file'));
//            return response()->json(["file" => $file, "success" => "1"]);
//        }
        $result = $this->uploadManager->doUpload($request->file('file'));

        return response()->json([
            'success' => 1,
            'file' => $result['public_path']
        ]);
    }

    //Lưu file image vào folder temp
    private function uploadImageTemp($file)
    {
        $time = Carbon::now();
        $file_name = rand(0, 9).time().
            date_format($time, 'd').
            date_format($time, 'm').
            date_format($time, 'Y'). "_brand.". $file->getClientOriginalExtension();

        $file->move(TEMP_PATH, $file_name);
        return $file_name;
    }

    //Chuyển file từ folder temp sang folder chính
    private function transferTempfileToAdminfile($filename)
    {

        $old_path = TEMP_PATH . '/' . $filename;
        $new_path = BRAND_PATH . date('Ymd') . '/' . $filename;
        Storage::disk('public')->makeDirectory(BRAND_PATH . date('Ymd'));
        Storage::disk('public')->move($old_path, $new_path);
        return $new_path;
    }

    /**
     * Chi tiết
     * @return Response
     */
    public function detail($id)
    {
        $getItem=$this->brand->getItem($id);
        if ($getItem != null) {
            $list = $this->service->getListServiceByBrandId($id);
            $listFeature = $this->service->getListFeatureByIdBrand($id);
//        danh sách brand - service
            $getServiceBrand = $this->brand->getServiceBrand($id);
//        danh sách brand-service-feature
            $getServiceBrandFeature = $this->brand->getServiceBrandFeature($id);
            return view('admin::brand.detail', [
                'brand' => $getItem,
                'list' => $list,
                'listFeature' => $listFeature,
                'getServiceBrand' => $getServiceBrand,
                'getServiceBrandFeature' => $getServiceBrandFeature
            ]);
        } else {
            return redirect('error-404');
        }
    }

//    Hiển thị model danh sách dịch vụ
    public function showModel(Request $request)
    {
        $filter = $request->all();
        $check = [];
        if ($request->session()->has('service_group')) {
            $check = $request->session()->get('service_group');
        }
        if ($check || count($check) != 0) {
            $filter['service_id'] = $check;
        }
        $filter['is_actived'] = 1;
        $list = $this->service->getList($filter);
        return view('service::service.list-ajax', [
            'list' => $list,
            'filter' => $filter,
            'check' => $check
        ]);
    }

    /**
     * store feature service
     * @param Request $request
     * @return array
     */
    public function storeService(Request $request)
    {
//        if ($request->session()->has('service_group')) {
//            $request->session()->forget('service_group');
//        }
        $result = $this->brand->storeService($request->all());

        return $result;
    }

    /**
     * list service
     */
    public function listService()
    {
        if (request()->session()->has('service_group')) {
            $arrayFeature = session()->get('service_group');
            $list = $this->service->getListServiceBySession($arrayFeature);
            $listFeature = $this->service->getListFeatureByIdSessionService($arrayFeature);
            $getServiceBrand = [];
            $getServiceBrandFeature = [];
            if (request()->session()->has('brand_id')) {
                $brand_id = session()->get('brand_id');
//        danh sách brand - service
                $getServiceBrand = $this->brand->getServiceBrand($brand_id);
//        danh sách brand-service-feature
                $getServiceBrandFeature = $this->brand->getServiceBrandFeature($brand_id);
            }

            $view = view('admin::brand.list-feature', [
                'list' => $list,
                'listFeature' => $listFeature,
                'getServiceBrand' => $getServiceBrand,
                'getServiceBrandFeature' => $getServiceBrandFeature
            ]);

            return response()->json($view->render());
        }
    }

    public function destroyFeature(Request $request)
    {
        $result = $this->brand->removeFeature($request->id);
        return response()->json($result);
    }

    /**
     * Show modal qr code
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function showPopQrCodeAction(Request $request)
    {
        $html = \View::make('admin::brand.modal.qr-code', [
            'brand_customer_code' => $request->brand_customer_code
        ])->render();

        return response()->json([
            'html' => $html
        ]);
    }
}
