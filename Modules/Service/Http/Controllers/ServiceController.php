<?php

namespace Modules\Service\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Service\Http\Requests\Service\StoreRequest;
use Modules\Service\Http\Requests\Service\UpdateRequest;
use Modules\Service\Repositories\Service\ServiceRepositoryInterface;
use Modules\User\Http\Controllers\Controller;
use phpDocumentor\Reflection\DocBlock\Description;

class ServiceController extends Controller
{
    protected $service;
    protected $request;

    public function __construct(
        ServiceRepositoryInterface $service,
        Request $request
    ) {
        $this->service = $service;
        $this->request = $request;
    }

    /**
     * Display a listing of the service.
     * @return Response
    */
    public function index()
    {
        $filter = $this->request->all();
        $list = $this->service->getList($filter);
        return view('service::service.index', [
            'list' => $list,
            'filter' => $filter
        ]);
    }

    /**
     * display form create service
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {

        if ($request->session()->has('feature_group')) {
            $request->session()->forget('feature_group');
        }
        return view('service::service.create');
    }

    /**
     * store service
     * @param Request $request
     */
    public function store(StoreRequest $request)
    {
        $param = $this->request->all();
        $store = $this->service->storeService($param);
        return $store;
    }

    public function update(UpdateRequest $request)
    {
        $param = $this->request->all();
        $store = $this->service->updateService($param);
        return $store;
    }

    /**
     * list feature service
    */
    public function listFeature()
    {
        if (request()->session()->has('feature_group')) {
            $arrayFeature = session()->get('feature_group');
            $list = $this->service->getListFeatureBySession($arrayFeature);
            $view = view('service::feature_service.list-feature', [
                'list' => $list
            ]);

            return response()->json($view->render());
        }
    }
    public function listFeatureChild(Request $request)
    {
        $list = $this->service->getListFeatureChild($request->feature_group_id);
        $view = view('service::feature_service.modal.modal-create-feature-child', [
            'LIST' => $list,
            'feature_group_id' => $request->feature_group_id
        ]);

        return response()->json($view->render());
    }

    /**
     * show popup create feature
    */
    public function showModalFeature()
    {
//        return view('service::feature_service.popup.popup-create-feature');
        $arrayFeature = session()->get('feature_group');
        if ($arrayFeature == null){
            $arrayFeature = [];
        }
        $list = $this->service->getListFeature($arrayFeature);
        return view('service::feature_service.popup.popup-list-feature',[
            'list' => $list
        ]);
    }

    /**
     * store feature service
     * @param Request $request
     * @return array
     */
    public function storeFeatureService(Request $request)
    {
        $result = $this->service->storeFeature($request->all());

        return $result;
    }
    public function storeFeatureChildService(Request $request)
    {
        $result = $this->service->storeFeatureChild($request->all());

        return $result;
    }

    /**
     * function destroy feature
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyFeature(Request $request)
    {
        $result = $this->service->removeFeature($request->id);
        return response()->json($result);
    }

    /**
     * view edit feature
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPopupEditFeature(Request $request)
    {
        $id = $request->id;
        $data = $this->service->getDetailFeature($id);
        return view('service::feature_service.popup.popup-edit-feature', [
            'data' => $data,
            'id' => $id
        ]);
    }

    /**
     * function update feature
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateFeatureService(Request $request)
    {
        $result = $this->service->updateFeature($request->all());
        return response()->json($result);
    }

    /**
     * change status feature
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeStatusFeature(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        $result = $this->service->changeStatusFeature($id, $data);
        return response()->json($result);
    }

//    Lấy chi tiết dịch vụ
//    Lấy danh sách tính năng theo id service
    public function detail($id)
    {
        $detail = $this->service->getDetail($id);

        $listServiceFeature = $this->service->listServiceFeatureById($id);
        return view('service::service.show',[
            'list' => $listServiceFeature,
            'detail' => $detail
        ]);
    }

//    Chỉnh sửa dịch vụ
//    Lấy danh sách tính năng theo dịch vụ bằng session
    public function edit($id)
    {
        if ($this->request->session()->has('feature_group')) {
            $this->request->session()->forget('feature_group');
        }
        if ($this->request->session()->has('feature_child')) {
            $this->request->session()->forget('feature_child');
        }
        $detail = $this->service->getDetail($id);
        $listServiceFeature = $this->service->listServiceFeatureByIdSession($id);
        $listServiceFeatureChild = $this->service->listServiceFeatureChildByIdSession($id);
        return view('service::service.edit',[
            'detail' => $detail
        ]);
    }
}
