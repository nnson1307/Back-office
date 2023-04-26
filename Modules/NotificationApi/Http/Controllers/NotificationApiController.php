<?php

namespace Modules\NotificationApi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Repositories\Brand\BrandRepositoryInterface;
use Modules\Admin\Repositories\Notification\NotificationRepositoryInterface;

class NotificationApiController extends Controller
{
    protected $notification;

    protected $brand;

    public function __construct(
        NotificationRepositoryInterface $notification,
        BrandRepositoryInterface $brand
    ) {
        $this->notification = $notification;
        $this->brand = $brand;
    }

    /**
     * Lấy danh sách notification detail
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $filter = $this->validate($request, [
            'is_brand' => 'required',
            'tenant_id' => 'required',
            'page' => 'nullable',
            'perpage' => 'nullable',
            'title' => 'nullable',
            'is_send' => 'nullable',
            'is_actived' => 'nullable',
            'send_time' => 'nullable',
        ]);
        $list = $this->notification->getNotiList($filter);
        $data = [
            'filter' => $filter,
            'notiList' => $list['noti_list'],
            'notiCount' => $list['noti_count']
        ];

        return $this->responseJson(CODE_SUCCESS, 'Success', $data);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function getNotiTypeList(Request $request)
    {
        $filter = $this->validate($request, [
            'is_banner' => 'nullable',
        ]);
        $notiTypeList = $this->notification->getNotificationTypeList($filter);

        return $this->responseJson(CODE_SUCCESS, 'Success', $notiTypeList);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function getListEndPoint(Request $request)
    {
        $data = $request->only(['filter', 'detail_type']);
        $detailList = $this->notification->getDetailEndPoint($data);

        return $this->responseJson(
            CODE_SUCCESS,
            __('notificationapi::validation.notification.success'),
            $detailList
        );
    }

    /**
     * Lấy thông tin chi tiết thông báo
     *
     * @param Request $request
     * @return Response
     */
    public function getDetail(Request $request)
    {
        $data = $this->validate($request, [
            'notification_detail_id' => 'required'
        ]);
        $noti = $this->notification->getNotiById($data['notification_detail_id']);

        if ($noti) {
            return $this->responseJson(CODE_SUCCESS, __('notificationapi::validation.notification.success'), $noti);
        }

        return $this->responseJson(CODE_FAILED, __('notificationapi::validation.notification.error'), []);
    }

    /**
     * Xử lý tạo thông báo
     *
     * @param Request $request
     * @return Response
     */
    public function storeOnlyDetail(Request $request)
    {
        $data = $this->validate($request, [
            'tenant_id'              => 'required',
            'background'             => 'nullable',
            'content'                => 'required',
            'action_name'            => 'nullable',
            'end_point'              => 'nullable',
            'end_point_detail'       => 'nullable',
            'end_point_detail_click' => 'nullable',
            'is_brand'               => 'required',
        ]);

        $result = $this->notification->storeOnlyDetail($data);

        if ($result == 'failed') {
            return $this->responseJson(
                CODE_FAILED,
                __('notificationapi::validation.notification.failed'),
                []
            );
        }

        return $this->responseJson(
            CODE_SUCCESS,
            __('notificationapi::validation.notification.success'),
            $result
        );
    }

    /**
     * Xử lý tạo thông báo
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title'                  => 'required|max:255',
            'short_title'            => 'required|max:255',
            'feature'                => 'required',
            'send_to'                => 'required',
            'action_group'           => 'required',
            'action_name'            => 'nullable',
            'end_point'              => 'nullable',
            'end_point_detail'       => 'nullable',
            'end_point_detail_click' => 'nullable',
            'send_time_radio'        => 'required',
            'schedule_time'          => 'required',
            'specific_time'          => 'nullable',
            'time_type'              => 'nullable',
            'non_specific_time'      => 'nullable',
            'content'                => 'required',
            'background'             => 'nullable',
            'is_brand'               => 'required',
            'tenant_id'              => 'required',
            'group_id'               => 'nullable',
            'notification_type_id'  => 'nullable',
        ]);

        $result = $this->notification->store($data);

        if ($result == 'failed') {
            return $this->responseJson(
                CODE_FAILED,
                __('notificationapi::validation.notification.failed'),
                []
            );
        }

        return $this->responseJson(
            CODE_SUCCESS,
            __('notificationapi::validation.notification.success'),
            $result
        );
    }

    /**
     * Xử lý cập nhật thông tin
     *
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'notification_detail_id' => 'required',
            'title'                  => 'required|max:255',
            'short_title'            => 'required|max:255',
            'feature'                => 'required',
            'send_to'                => 'required',
            'action_group'           => 'required',
            'action_name'            => 'nullable',
            'end_point'              => 'nullable',
            'end_point_detail'       => 'nullable',
            'end_point_detail_click' => 'nullable',
            'send_time_radio'        => 'required',
            'schedule_time'          => 'required',
            'specific_time'          => 'nullable',
            'time_type'              => 'nullable',
            'non_specific_time'      => 'nullable',
            'content'                => 'required',
            'background'             => 'nullable',
            'is_brand'               => 'required',
            'group_id'               => 'nullable',
            'tenant_id'              => 'required',
            'notification_type_id'  => 'nullable',
        ]);

        $id = $data['notification_detail_id'];
        unset($data['notification_detail_id']);

        $result = $this->notification->update($id, $data);

        if ($result == 'failed') {
            return $this->responseJson(
                CODE_FAILED,
                __('notificationapi::validation.notification.failed'),
                []
            );
        }

        return $this->responseJson(
            CODE_SUCCESS,
            __('notificationapi::validation.notification.success'),
            $result
        );
    }

    /**
     * Xóa thông báo
     *
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $data = $this->validate($request, [
            'notification_detail_id' => 'required'
        ]);

        $result = $this->notification->destroy($data['notification_detail_id']);

        if ($result == 'success') {
            return $this->responseJson(
                CODE_SUCCESS,
                __('notificationapi::validation.notification.success'),
                []
            );
        } else {
            return $this->responseJson(
                CODE_FAILED,
                __('notificationapi::validation.notification.failed'),
                []
            );
        }
    }

    /**
     * Cập nhật trạng thái
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateIsActived(Request $request)
    {
        $data = $this->validate($request, [
            'notification_detail_id' => 'required',
            'check'                  => 'required',
            'non_specific_value'     => 'nullable',
            'non_specific_type'      => 'nullable',
        ]);
        $data['is_brand'] = 1;
        $id = $data['notification_detail_id'];
        unset($data['notification_detail_id']);
        $result = $this->notification->updateIsActived($id, $data);

        if ($result['status'] == false) {
            return $this->responseJson(
                CODE_FAILED,
                __('notificationapi::validation.notification.failed'),
                $result
            );
        }

        return $this->responseJson(
            CODE_SUCCESS,
            __('notificationapi::validation.notification.success'),
            $result
        );
    }

    /**
     * Lấy thông tin brand theo tenant id
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBrandByTenantId(Request $request)
    {
        $data = $request->only(['tenant_id']);

        $result = $this->brand->getDetailBy($data['tenant_id']);

        if ($result) {
            return $this->responseJson(
                CODE_SUCCESS,
                __('notificationapi::validation.notification.success'),
                $result
            );
        }

        return $this->responseJson(
            CODE_FAILED,
            __('notificationapi::validation.notification.failed'),
            []
        );
    }

    public function getEndPointJson(Request $request)
    {
        $data = $this->validate($request, [
            'end_point'              => 'nullable',
            'end_point_detail'       => 'nullable',
            'end_point_detail_click' => 'nullable',
            'end_point_linkdetail_click' => 'nullable',
            'tenant_id'              => 'nullable',
        ]);

        $result = $this->notification->getEndPointJson($data);

        if ($result['status'] == false) {
            return $this->responseJson(
                CODE_FAILED,
                __('notificationapi::validation.notification.failed'),
                $result
            );
        }

        return $this->responseJson(
            CODE_SUCCESS,
            __('notificationapi::validation.notification.success'),
            $result
        );
    }
}
