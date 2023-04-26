<?php

namespace Modules\Admin\Repositories\ConfigNotification;

use Modules\Admin\Models\ConfigNotificationBackofficeTable;
use Modules\Admin\Models\NotificationBrandPortalScheduleTable;
use Modules\Admin\Models\NotificationBrandPortalTable;

class ConfigNotificationRepository implements ConfigNotificationRepositoryInterface
{
    protected $config_notification;
    protected $notification_brand_portal;
    protected $notification_brand_portal_schedule;
    protected $timestamps = true;

    /**
     * ConfigNotificationRepository constructor.
     * @param ConfigNotificationBackofficeTable $ConfigNotification
     */
    public function __construct(
        ConfigNotificationBackofficeTable $config_notification,
        NotificationBrandPortalTable $notification_brand_portal,
        NotificationBrandPortalScheduleTable $notification_brand_portal_schedule
    ) {
        $this->config_notification = $config_notification;
        $this->notification_brand_portal = $notification_brand_portal;
        $this->notification_brand_portal_schedule = $notification_brand_portal_schedule;
    }

    /**
     * @param array $filters
     * @return array|mixed
     */
    public function getConfigNotificationList()
    {
//        $type = 'send_notification';
        $data = $this->config_notification->getDetailSendNotification();
        return $data;
    }

    public function updateNotification(array $filter = [])
    {
        $data = $this->config_notification->getDetailSendNotification();
        foreach ($data as $value) {
//            Kiểm tra is_active của từng config nontification
            if (isset($filter[$value['type']])) {
//               Kiểm tra lựa chọn là theo giờ được đặt
                if ($filter[$value['type'] . "_radio"] == 'schedule') {
//                    Kiểm tra thời gian vào có là rỗng
                    if ($filter[$value['type'] . "_time"] == null) {
                        return response()->json([
                            'error' => true,
                            'message' => __('admin::confignotification.index.INPUT_CONTENT')
                        ]);
                    } else {
                        $validator = \Validator::make($filter, [
                            $value['type'] . "_time" => 'integer|numeric|min:0|max:99999',
                        ]);

                        if ($validator->fails()) {
                            return response()->json([
                                'error' => true,
                                'message' => __('admin::confignotification.index.ERROR_TIME')
                            ]);
                        } else {
                            $key = $value['type'];
                            $tmp['is_active'] = 1;
                            $tmp['notify_type'] = $filter[$value['type'] . "_radio"];
                            $tmp['option_value'] = $filter[$value['type'] . "_time"];
                            $tmp['option_type'] = $filter[$value['type'] . "_time_type"];
                            $this->config_notification->updateSendNoti($key, $tmp);
                        }
                    }
                } else {
                    $key = $value['type'];
                    $tmp['is_active'] = 1;
                    $tmp['notify_type'] = $filter[$value['type'] . "_radio"];
                    $this->config_notification->updateSendNoti($key, $tmp);
                }
            } else {
                $key = $value['type'];
                $tmp['is_active'] = 0;
//                $tmp['notify_type'] = 'immediately';
                $this->config_notification->updateSendNoti($key, $tmp);
            }
        }
        return response()->json();
    }

    public function getListNotiBrandPortalApi()
    {
        return $this->notification_brand_portal->getList();
    }

    public function getListNotiBrandPortalScheduleApi()
    {
        return $this->notification_brand_portal_schedule->getList();
    }

    public function updateNotiApi(array $filters = [])
    {
        return $this->notification_brand_portal->updateBrandPortal($filters);
    }

    public function updateNotiScheduleApi(array $filters = [])
    {
        return $this->notification_brand_portal_schedule->updateBrandPortalSchedule($filters);
    }
}


