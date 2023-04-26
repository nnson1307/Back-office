<?php


namespace Modules\Service\Http\Controllers;


use Illuminate\Http\Request;
use Modules\Service\Repositories\ServiceFeature\ServiceFeatureRepositoryInterface;
use Modules\User\Http\Controllers\Controller;

class ServiceFeatureController extends Controller
{
    protected $request;
    protected $serviceFeature;
    public function __construct(
        ServiceFeatureRepositoryInterface $serviceFeature,
        Request $request
    ){
        $this->serviceFeature = $serviceFeature;
        $this->request = $request;
    }

    public function index()
    {
        $filter = $this->request->all();
        $list = $this->serviceFeature->getList($filter);
        return view('service::service-feature.index', [
            'list' => $list,
            'filter' => $filter
        ]);
    }

    public function show($id)
    {
        $detail = $this->serviceFeature->getDetail($id);
        $getListService = $this->serviceFeature->getListService($id);
        $getListBrand = $this->serviceFeature->getListBrand($id);
        return view('service::service-feature.show', [
            'detail'=> $detail,
            'getListService' => $getListService,
            'getListBrand' => $getListBrand,
        ]);
    }

    public function edit($id)
    {
        $detail = $this->serviceFeature->getDetail($id);
        $getListService = $this->serviceFeature->getListService($id);
        $getListBrand = $this->serviceFeature->getListBrand($id);
        return view('service::service-feature.edit', [
            'detail'=> $detail,
            'getListService' => $getListService,
            'getListBrand' => $getListBrand,
        ]);
    }

    public function editPost()
    {
        $param = $this->request->all();
        $update = $this->serviceFeature->updateFeature($param);
        return $update;
    }
}