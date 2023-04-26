<?php


namespace Modules\NotificationApi\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Admin\Repositories\ConfigNotification\ConfigNotificationRepositoryInterface;

class ConfigNotificationApiController extends Controller
{
    protected $configNoti;
    protected $request;
    public function __construct(ConfigNotificationRepositoryInterface $configNoti , Request $request)
    {
        $this->configNoti = $configNoti;
        $this->request = $request;
    }

    public function index(){
        $data['listNotiBrandPortal'] = $this->configNoti->getListNotiBrandPortalApi();
        $data['listNotiBrandPortalSchedule'] = $this->configNoti->getListNotiBrandPortalScheduleApi();
        return $this->responseJson(CODE_SUCCESS, 'Success', $data);

    }

    public function updateConfigNoti(){
        $param = $this->request->only
        (
            [
                'order_pending',
                'order_update_waiting_delivery',
                'order_update_delivery',
                'order_update_return',
                'order_update_reject',
                'connect_waiting_approved',
                'connect_approved',
                'connect_reject',
                'register_waiting_approved',
                'register_approved',
                'register_reject',
            ]
        );

        $paramSchedule = $this->request->only
        (
            [
                'send_order_flash_update',
                'send_order_flash_update_value',
                'send_order_flash_update_time_type',
                'send_cart_not_order',
                'send_cart_not_order_value',
                'send_cart_not_order_time_type',
            ]
        );

        $data['updateListNotiBrandPortal'] = $this->configNoti->updateNotiApi($param);
        $data['updateListNotiBrandPortalSchedule']  = $this->configNoti->updateNotiScheduleApi($paramSchedule);
        return $this->responseJson(CODE_SUCCESS, 'Success', $data['updateListNotiBrandPortalSchedule']);
    }

}
