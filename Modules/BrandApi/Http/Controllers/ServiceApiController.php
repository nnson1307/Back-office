<?php

namespace Modules\BrandApi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Service\Repositories\Service\ServiceRepositoryInterface;
use Modules\Service\Repositories\ServiceFeature\ServiceFeatureRepositoryInterface;

class ServiceApiController extends Controller
{
    protected $service;
    protected $serviceFeature;

    public function __construct(ServiceRepositoryInterface $service, ServiceFeatureRepositoryInterface $serviceFeature)
    {
        $this->service = $service;
        $this->serviceFeature = $serviceFeature;
    }

    /**
     * Danh sách dịch vụ
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $filter = $request->all();
        $data = $this->service->getList($filter);
        return $this->responseJson(CODE_SUCCESS, 'Thành Công', $data);
    }

    public function detail(Request $request)
    {
        $filter = $request->all();
        $detailService = $this->service->getDetail($filter['service_id']);
        $detailFeature = $this->serviceFeature->getListFeature($filter['feature_list']);
        $arr['service'] = $detailService;
        $arr['feature'] = $detailFeature;
        return $this->responseJson(CODE_SUCCESS, 'Thành Công', $arr);
    }

    public function detailFeature(Request $request)
    {
        $filter = $request->all();
        $detail = $this->serviceFeature->getDetail($filter['feature_group_id']);
        return $this->responseJson(CODE_SUCCESS, 'Thành Công', $detail);
    }
}
