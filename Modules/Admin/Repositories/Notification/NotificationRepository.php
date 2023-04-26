<?php


namespace Modules\Admin\Repositories\Notification;

use Illuminate\Support\Facades\Auth;
use Modules\Admin\Models\NotificationTypeTable;
use Modules\Admin\Models\BrandTable;
use Modules\Admin\Models\FaqTable;
use Modules\Admin\Models\FaqGroupTable;
use Modules\Admin\Models\NotificationTemplateTable;
use Modules\Admin\Models\NotificationDetailTable;
use Modules\Admin\Models\NotificationQueueTable;
use Modules\Admin\Models\NotificationTable;
use Modules\Admin\Models\UserTable;
use Modules\User\Models\MyStoreFilterGroupTable;
use Modules\Admin\Http\Api\PushNotification;
use Carbon\Carbon;

class NotificationRepository implements NotificationRepositoryInterface
{
    /**
     * Khai báo biến
     */
    protected $notificationType;
    protected $notificationTemplate;
    protected $notificationDetail;
    protected $notificationQueue;
    protected $brand;
    protected $faq;
    protected $faqGroup;
    protected $user;
    protected $notification;
    protected $pushNotification;
    protected $filterGroup;

    /**
     * NotificationRepository constructor.
     * @param NotificationTypeTable $mNotificationType
     */
    public function __construct(
        UserTable $mUser,
        BrandTable $mBrand,
        FaqTable $mFaq,
        FaqGroupTable $mFaqGroup,
        NotificationTypeTable $mNotificationType,
        NotificationQueueTable $mNotificationQueue,
        NotificationDetailTable $mNotificationDetail,
        NotificationTemplateTable $mNotificationTemplate,
        NotificationTable $mNotification,
        PushNotification $apiPushNotification,
        MyStoreFilterGroupTable $mFilterGroup
    ) {
        $this->user = $mUser;
        $this->brand = $mBrand;
        $this->faq = $mFaq;
        $this->faqGroup = $mFaqGroup;
        $this->notificationType = $mNotificationType;
        $this->notificationQueue = $mNotificationQueue;
        $this->notificationDetail = $mNotificationDetail;
        $this->notificationTemplate = $mNotificationTemplate;
        $this->notification = $mNotification;
        $this->pushNotification = $apiPushNotification;
        $this->filterGroup = $mFilterGroup;
    }

    /**
     * Lấy dánh sách thông báo
     *
     * @param $filter
     * @return mixed
     */
    public function getNotiList($filter)
    {
        $notiList = $this->notificationTemplate->getList($filter);

        $arrListIdDetail = collect($notiList->items())->pluck('notification_detail_id');

        $arrCountNoti = $this->notification->getAllByDetailTemplate($arrListIdDetail);

        return [
            'noti_list' => $notiList,
            'noti_count' => $arrCountNoti
        ];
    }

    /**
     * Lấy danh sách notification type
     *
     * @return mixed
     */
    public function getNotificationTypeList($filter = [])
    {
        return $this->notificationType->getList($filter);
    }

    /**
     * Lấy danh sách chi tiết đích đến
     *
     * @param $data
     * @return mixed
     */
    public function getDetailEndPoint($data)
    {
//        isset($data['filter']) ? $filter = $data['filter'] : $filter = null;
        if ($data['detail_type'] == "brand") {
            return $this->brand->getList($data['filter']);
        } elseif ($data['detail_type'] == "faq") {
            return [
                'faqList' => $this->faq->getListModal($data['filter']),
                'groupList' => $this->faqGroup->getListAll()
            ];
        }
    }

    /**
     * Lấy danh sách nhóm
     *
     * @param $data
     */
    public function getGroupList($data)
    {
        return $this->filterGroup->getList($data['filter']);
    }

    public function storeOnlyDetail($data){
        try {
            $insertDetail = [
                'content' => $data['content'],
                'background' => $data['background'],
                'tenant_id' => $data['tenant_id']
            ];

            $insertDetail['is_brand'] = isset($data['is_brand']) ? $data['is_brand'] : 0;

            if (isset($data['action_name']) && $data['action_name'] != null) {
                $insertTemplate['action_name'] = strip_tags($data['action_name']);
                $insertDetail['action_name'] = strip_tags($data['action_name']);
                $insertDetail['action'] = $data['end_point'];

                if ($insertDetail['is_brand'] && $data['end_point'] == 'brand') {
                    $arrTenant = $this->brand->getDetailBy($insertDetail['tenant_id']);
                    $data['end_point_detail'] = $arrTenant['brand_id'];
                }
                $brand = $this->brand->getItemByTenantId($data['tenant_id']);
                $array = [
                    'brand_id' => $brand['brand_id'],
                    'brand_url' => $brand['brand_url'],
                    'brand_name' => $brand['brand_name']
                ];
                if (isset($data['end_point_detail']) && $data['end_point_detail'] != null) {
                    // nếu là brand
                    if ($data['end_point'] == 'brand' || $data['end_point'] == 'brand_info') {
                        $json = json_encode($array);
                        $insertDetail['action_params'] = $json;
                    } elseif ($data['end_point'] == 'faq') { // nếu là faq
                        $faq = $this->faq->detail($data['end_point_detail']);
                        $array['faq_id'] = (int)$faq['faq_id'];
                        $array['faq_type'] = $faq['faq_type'];
                        $array['faq_title'] = $faq['faq_title'];
                        $json = json_encode($array);
                        $insertDetail['action_params'] = $json;
                    } elseif ($data['end_point'] == 'faq_brand') { // nếu là faq
                        $array['faq_id'] = (int)$data['end_point_detail'];
                        $array['faq_type'] = $data['end_point_detail_click'];
                        $json = json_encode($array);
                        $insertDetail['action_params'] = $json;
                    } elseif ($data['end_point'] == 'market') { // nếu là marketing
                        $array['campaign_id'] = (int)$data['end_point_detail'];
                        $array['promo_name'] = $data['end_point_detail_click'];
                        $json = json_encode($array);
                        $insertDetail['action_params'] = $json;
                    }  elseif ($data['end_point'] == 'order_product') { // nếu là order_product
                        $json = json_encode($array);
                        $insertDetail['action_params'] = $json;
                    } else {
                        if($insertDetail['is_brand'] == 1){
                            $json = json_encode($array);
                            $insertDetail['action_params'] = $json;
                        }
                    }
                } else {
                    if($insertDetail['is_brand'] == 1){
                        $json = json_encode($array);
                        $insertDetail['action_params'] = $json;
                    }
                }
            }

            return $detail = $this->notificationDetail->createNotiDetail($insertDetail);
        } catch (\Exception $exception){

        }

    }

    /**
     * Lưu thông báo
     *
     * @param $data
     */
    public function store($data)
    {
        try {
            if ($data['send_to'] == 'all') {
                $fromType = 'all';
                $fromTypeObject = null;
            } else {
                $fromType = 'group';
                $fromTypeObject = $data['group_id'];
            }
            $insertTemplate = [
                'action_group' => $data['action_group'],
                'notification_type_id' => $data['notification_type_id'],
                'title' => strip_tags($data['title']),
                'title_short' => strip_tags($data['short_title']),
                'description' => strip_tags($data['feature']),
                'from_type' => $fromType,
                'from_type_object' => $fromTypeObject,
                'is_actived' => 1,
                'send_status' => 'pending'
            ];
            $insertDetail = [
                'content' => $data['content'],
                'background' => $data['background'],
                'tenant_id' => $data['tenant_id']
            ];

            $insertDetail['is_brand'] = isset($data['is_brand']) ? $data['is_brand'] : 0;

            if (isset($data['action_name']) && $data['action_name'] != null) {
                $insertTemplate['action_name'] = strip_tags($data['action_name']);
                $insertDetail['action_name'] = strip_tags($data['action_name']);
                $insertDetail['action'] = $data['end_point'];

                if ($insertDetail['is_brand'] && $data['end_point'] == 'brand') {
                    $arrTenant = $this->brand->getDetailBy($insertDetail['tenant_id']);
                    $data['end_point_detail'] = $arrTenant['brand_id'];
                }

                if (isset($data['end_point_detail']) && $data['end_point_detail'] != null) {
                    // nếu là brand
                    if ($data['end_point'] == 'brand') {
                        $brand = $this->brand->getItem($data['end_point_detail']);
                        $array = [
                            'brand_id' => $brand['brand_id'],
                            'brand_url' => $brand['brand_url'],
                            'brand_name' => $brand['brand_name']
                        ];
                        $json = json_encode($array);
                        $insertDetail['action_params'] = $json;
                    } elseif ($data['end_point'] == 'faq') { // nếu là faq
                        $faq = $this->faq->detail($data['end_point_detail']);
                        $brand = $this->brand->getItem($data['end_point_detail']);
                        $array = [
                            'faq_id' => (int)$faq['faq_id'],
                            'faq_type' => $faq['faq_type'],
                            'faq_title' => $faq['faq_title'],
                            'brand_id' => $brand['brand_id'],
                            'brand_url' => $brand['brand_url'],
                            'brand_name' => $brand['brand_name']
                        ];
                        $json = json_encode($array);
                        $insertDetail['action_params'] = $json;
                    } elseif ($data['end_point'] == 'faq_brand') { // nếu là faq
                        $brand = $this->brand->getItemByTenantId($data['tenant_id']);
                        $array = [
                            'faq_id' => (int)$data['end_point_detail'],
                            'faq_title' => $data['end_point_detail_click'],
                            'brand_id' => $brand['brand_id'],
                            'brand_url' => $brand['brand_url'],
                            'brand_name' => $brand['brand_name']
                        ];
                        $json = json_encode($array);
                        $insertDetail['action_params'] = $json;
                    } elseif ($data['end_point'] == 'market') { // nếu là marketing
                        $brand = $this->brand->getItemByTenantId($data['tenant_id']);
                        $array = [
                            'campaign_id' =>(int) $data['end_point_detail'],
                            'promo_name' => $data['end_point_detail_click'],
                            'brand_url' => $brand['brand_url'],
                            'brand_name' => $brand['brand_name'],
                            'brand_id' => $brand['brand_id'],
                        ];
                        $json = json_encode($array);
                        $insertDetail['action_params'] = $json;
                    }  elseif ($data['end_point'] == 'order_product') { // nếu là order_product
                        $brand = $this->brand->getItemByTenantId($data['tenant_id']);
                        $array = [
                            'brand_url' => $brand['brand_url'],
                            'brand_name' => $brand['brand_name'],
                            'brand_id' => $brand['brand_id'],
                        ];
                        $json = json_encode($array);
                        $insertDetail['action_params'] = $json;
                    } else {
                        if($insertDetail['is_brand'] == 1){
                            $brand = $this->brand->getItemByTenantId($data['tenant_id']);
                            $array = [
                                'brand_id' => $brand['brand_id'],
                                'brand_url' => $brand['brand_url'],
                                'brand_name' => $brand['brand_name']
                            ];
                            $json = json_encode($array);
                            $insertDetail['action_params'] = $json;
                        }
                    }
                } else {
                    if($insertDetail['is_brand'] == 1){
                        $brand = $this->brand->getItemByTenantId($data['tenant_id']);
                        $array = [
                            'brand_id' => $brand['brand_id'],
                            'brand_url' => $brand['brand_url'],
                            'brand_name' => $brand['brand_name']
                        ];
                        $json = json_encode($array);
                        $insertDetail['action_params'] = $json;
                    }
                }
            }
            if ($data['send_time_radio'] == 0) {
                $insertTemplate['send_type'] = 'immediately';
                $insertTemplate['send_at'] = Carbon::now()->toDateTimeString();
            } else {
                $insertTemplate['send_type'] = 'schedule';
                if ($data['schedule_time'] == 'specific_time') {
                    $insertTemplate['schedule_option'] = 'specific'; //
                    $insertTemplate['send_at'] = strip_tags($data['specific_time']);
                } else {
                    $insertTemplate['schedule_option'] = 'none'; //
//                $currentTime = Carbon::now();
                    if ($data['time_type'] == 'hour') {
//                    $currentTime->addHours($data['non_specific_time']);
                        $insertTemplate['schedule_value_type'] = 'hours';
                    } elseif ($data['time_type'] == 'minute') {
//                    $currentTime->addMinutes($data['non_specific_time']);
                        $insertTemplate['schedule_value_type'] = 'minute';
                    } elseif ($data['time_type'] == 'day') {
//                    $currentTime->addDays($data['non_specific_time']);
                        $insertTemplate['schedule_value_type'] = 'day';
                    }
                    $insertTemplate['schedule_value'] = $data['non_specific_time'];
                    $insertTemplate['is_actived'] = 0;
                    $insertTemplate['send_at'] = null;
                }
            }
            $detail = $this->notificationDetail->createNotiDetail($insertDetail);

            $insertTemplate['notification_detail_id'] = $detail->notification_detail_id;
            $this->notificationTemplate->createNotiTemplate($insertTemplate);
            $noti = $this->notificationTemplate->getOneByDetailId($insertTemplate['notification_detail_id']);

            if ($data['is_brand'] == 0) {
                if ($insertTemplate['send_at'] != null) {
                    if ($insertTemplate['from_type'] == 'all') { // gửi tất cả
                        $apiData = [
                            "title" => $insertTemplate['title'],
                            "message" => $insertTemplate['description'],
                            "avatar" => "",
                            "detail_id" => $insertTemplate['notification_detail_id'],
                            "schedule" => $noti['send_at']
                        ];

                        try {
                            $result = $this->pushNotification->pushAllMyStore($apiData);
                            if ($result) {
                                return 'success';
                            }
                        } catch (\Exception $e) {
                            return 'push_fail';
                        }
                    } else { // gửi nhóm
                        $apiData = [
                            "group_id" => $insertTemplate['from_type_object'],
                            "tenant_id" => null,
                            "title" => $insertTemplate['title'],
                            "message" => $insertTemplate['description'],
                            "avatar" => "",
                            "detail_id" => $insertTemplate['notification_detail_id'],
                            "schedule" => $noti['send_at']
                        ];

                        try {
                            $result = $this->pushNotification->pushGroupMyStore($apiData);
                            if ($result) {
                                return 'success';
                            }
                        } catch (\Exception $e) {
                            return 'push_fail';
                        }
                    }
                }

                return 'success';
            } else {
                return $noti;
            }
        } catch (\Exception $e) {
            return 'failed';
        }
    }

    /**
     * Lấy chi tiết thông báo
     *
     * @param $id
     * @return mixed
     */
    public function getNotiById($id)
    {
        return $this->notificationDetail->getOne($id);
    }

    /**
     * Cập nhật thông báo
     *
     * @param $id
     * @param $data
     * @return mixed
     */
    public function update($id, $data)
    {
        if ($data['send_to'] == 'all') {
            $fromType = 'all';
            $fromTypeObject = null;
        } else {
            $fromType = 'group';
            $fromTypeObject = $data['group_id'];
        }
        $insertTemplate = [
            'action_group' => $data['action_group'],
            'notification_type_id' => $data['notification_type_id'],
            'title' => strip_tags($data['title']),
            'title_short' => strip_tags($data['short_title']),
            'description' => strip_tags($data['feature']),
            'from_type' => $fromType,
            'from_type_object' => $fromTypeObject
        ];
        $insertDetail = [
            'content' => $data['content'],
            'background' => $data['background'],
        ];

        $insertDetail['is_brand'] = isset($data['is_brand']) ? $data['is_brand'] : 0;

        if (isset($data['action_name']) && $data['action_name'] != null) {
            $insertTemplate['action_name'] = strip_tags($data['action_name']);
            $insertDetail['action_name'] = strip_tags($data['action_name']);
            $insertDetail['action'] = $data['end_point'];
            if (isset($data['end_point_detail']) && $data['end_point_detail'] != null) {
                // nếu là brand
                if ($data['end_point'] == 'brand') {
                    $brand = $this->brand->getItem($data['end_point_detail']);
                    $array = [
                        'brand_id' => $brand['brand_id'],
                        'brand_url' => $brand['brand_url'],
                        'brand_name' => $brand['brand_name']
                    ];
                    $json = json_encode($array);
                    $insertDetail['action_params'] = $json;
                } elseif ($data['end_point'] == 'faq') { // nếu là faq
                    $faq = $this->faq->detail($data['end_point_detail']);
                    $array = [
                        'faq_id' => (int)$faq['faq_id'],
                        'faq_type' => $faq['faq_type'],
                        'faq_title' => $faq['faq_title']
                    ];
                    $json = json_encode($array);
                    $insertDetail['action_params'] = $json;
                } elseif ($data['end_point'] == 'faq_brand') { // nếu là faq
                    $brand = $this->brand->getItemByTenantId($data['tenant_id']);
                    $array = [
                        'faq_id' => (int)$data['end_point_detail'],
                        'faq_type' => 'faq',
                        'faq_title' => $data['end_point_detail_click'],
                        'brand_id' => $brand['brand_id'],
                        'brand_url' => $brand['brand_url'],
                        'brand_name' => $brand['brand_name']
                    ];
                    $json = json_encode($array);
                    $insertDetail['action_params'] = $json;
                } elseif ($data['end_point'] == 'market') { // nếu là marketing
                    $brand = $this->brand->getItemByTenantId($data['tenant_id']);
                    $array = [
                        'campaign_id' => (int)$data['end_point_detail'],
                        'promo_name' => $data['end_point_detail_click'],
                        'brand_url' => $brand['brand_url'],
                        'brand_name' => $brand['brand_name'],
                        'brand_id' => $brand['brand_id'],
                    ];
                    $json = json_encode($array);
                    $insertDetail['action_params'] = $json;
                }
            } else {
                if($insertDetail['is_brand'] == 1){
                    $brand = $this->brand->getItemByTenantId($data['tenant_id']);
                    $array = [
                        'brand_id' => $brand['brand_id'],
                        'brand_url' => $brand['brand_url'],
                        'brand_name' => $brand['brand_name']
                    ];
                    $json = json_encode($array);
                    $insertDetail['action_params'] = $json;
                }
            }
        }
        if ($data['send_time_radio'] == 0) {
            $insertTemplate['send_type'] = 'immediately';
            $insertTemplate['send_at'] = Carbon::now()->toDateTimeString();
            $insertTemplate['is_actived'] = 1;
        } else {
            $insertTemplate['send_type'] = 'schedule';
            if ($data['schedule_time'] == 'specific_time') {
                $insertTemplate['schedule_option'] = 'specific'; //
                $insertTemplate['send_at'] = strip_tags($data['specific_time']);
                $insertTemplate['is_actived'] = 1;
                $insertTemplate['schedule_value_type'] = null;
                $insertTemplate['schedule_value'] = null;
            } else {
                $insertTemplate['schedule_option'] = 'none'; //
//                $currentTime = Carbon::now();
                if ($data['time_type'] == 'hour') {
//                    $currentTime->addHours($data['non_specific_time']);
                    $insertTemplate['schedule_value_type'] = 'hours';
                } elseif ($data['time_type'] == 'minute') {
//                    $currentTime->addMinutes($data['non_specific_time']);
                    $insertTemplate['schedule_value_type'] = 'minute';
                } elseif ($data['time_type'] == 'day') {
//                    $currentTime->addDays($data['non_specific_time']);
                    $insertTemplate['schedule_value_type'] = 'day';
                }
                $insertTemplate['schedule_value'] = $data['non_specific_time'];
                $insertTemplate['is_actived'] = 0;
                $insertTemplate['send_at'] = null;
                $insertTemplate['send_status'] = 'not';
            }
        }

        $detail = $this->notificationDetail->updateNotiDetail($id, $insertDetail);
        $this->notificationTemplate->updateNotiTemplate($id, $insertTemplate);
        $noti = $this->notificationTemplate->getOneByDetailId($id);
        // xóa queue cũ nếu có
        $this->notificationQueue->deleteNotiQueue($id);

        if ($data['is_brand'] == 0) {
            if ($insertTemplate['from_type'] == 'all' && $noti['send_at'] != null) { // gửi tất cả
                $apiData = [
                    "title" => $insertTemplate['title'],
                    "message" => $insertTemplate['description'],
                    "avatar" => "",
                    "detail_id" => $id,
                    "schedule" => $noti['send_at']
                ];

                try {
                    $result = $this->pushNotification->pushAllMyStore($apiData);
                    if ($result) {
                        return 'success';
                    }
                } catch (\Exception $e) {
                    return 'push_fail';
                }
            } elseif ($insertTemplate['from_type'] == 'group' && $noti['send_at'] != null) { // gửi nhóm
                $apiData = [
                    "group_id" => $insertTemplate['from_type_object'],
                    "tenant_id" => null,
                    "title" => $insertTemplate['title'],
                    "message" => $insertTemplate['description'],
                    "avatar" => "",
                    "detail_id" => $id,
                    "schedule" => $noti['send_at']
                ];

                try {
                    $result = $this->pushNotification->pushGroupMyStore($apiData);
                    if ($result) {
                        return 'success';
                    }
                } catch (\Exception $e) {
                    return 'push_fail';
                }
            }
        } else {
            return $noti;
        }


        return 'success';
    }

    /**
     * Cập nhật hoạt động is_actived
     *
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updateIsActived($id, $data)
    {
        $sendAt = null;
        $noti = $this->notificationTemplate->getOneByDetailId($id);
        $notiLog = $this->notification->getFirst($id);
        $now = Carbon::now();

        function nonSpecificTime($type, $value)
        {
            $currentTime = Carbon::now();
            if ($type == 'hours') {
                $currentTime->addHours($value);
            } elseif ($type == 'minute') {
                $currentTime->addMinutes($value);
            } elseif ($type == 'day') {
                $currentTime->addDays($value);
            }
            return $currentTime;
        }

        // nếu giờ active nhỏ hơn giờ hiện tại
        if ($noti['send_at'] != null && $noti['send_at'] <= $now && $noti['is_actived'] == 0) {
            return [
                'status' => false,
                'message' => 'fail',
            ];
        }
        // nếu đã gửi và có log
        if ($notiLog) {
            return [
                'status' => false,
                'message' => 'sent',
            ];
        }

        if ($data['check'] == 1) {
            $isSend = 'pending';
            if ($data['non_specific_value'] != null && $data['non_specific_type'] != null) {
                $sendAt = nonSpecificTime($data['non_specific_type'], $data['non_specific_value'])
                    ->toDateTimeString();
                $arrUpdate = [
                    'is_actived' => $data['check'],
                    'send_status' => $isSend,
                    'send_at' => $sendAt
                ];
            } else {
                $arrUpdate = [
                    'is_actived' => $data['check'],
                    'send_status' => $isSend,
                    'send_at' => $noti['send_at']
                ];
            }
            $this->notificationTemplate->updateNotiTemplate($id, $arrUpdate);
            $noti = $this->notificationTemplate->getOneByDetailId($id);
            if ($data['is_brand'] == 0) {
                // push notification
                if ($arrUpdate['send_at'] != null) {
                    if ($noti['from_type'] == 'all') { // gửi tất cả
                        $apiData = [
                            "title" => $noti['title'],
                            "message" => $noti['description'],
                            "avatar" => "",
                            "detail_id" => $noti['notification_detail_id'],
                            "schedule" => $arrUpdate['send_at']
                        ];

                        try {
                            $result = $this->pushNotification->pushAllMyStore($apiData);
                        } catch (\Exception $e) {
                            return 'push_fail';
                        }
                    } else { // gửi nhóm
                        $apiData = [
                            "group_id" => $noti['from_type_object'],
                            "tenant_id" => null,
                            "title" => $noti['title'],
                            "message" => $noti['description'],
                            "avatar" => "",
                            "detail_id" => $noti['notification_detail_id'],
                            "schedule" => $noti['send_at']
                        ];

                        try {
                            $result = $this->pushNotification->pushGroupMyStore($apiData);
                        } catch (\Exception $e) {
                            return 'push_fail';
                        }
                    }
                }
                return [
                    'noti' => $noti,
                    'sendAt' => $sendAt,
                    'status' => true,
                    'message' => 'success'
                ];
            } else {
                return [
                    'noti' => $noti,
                    'sendAt' => $sendAt,
                    'status' => true,
                    'message' => 'success'
                ];
            }
        } else {
            $isSend = 'not';
            if ($data['non_specific_value'] != null && $data['non_specific_type'] != null) {
                $arrUpdate = [
                    'is_actived' => $data['check'],
                    'send_status' => $isSend,
                    'send_at' => null
                ];

                if ($noti['schedule_value_type'] == 'hours') {
                    $time_type = 'Giờ';
                } elseif ($noti['schedule_value_type'] == 'minute') {
                    $time_type = 'Phút';
                } elseif ($noti['schedule_value_type'] == 'day') {
                    $time_type = 'Ngày';
                }
                $sendAt = $noti['schedule_value'].' '.$time_type;
            } else {
                $arrUpdate = [
                    'is_actived' => $data['check'],
                    'send_status' => $isSend,
                    'send_at' => $noti['send_at']
                ];
            }
            $this->notificationQueue->deleteNotiQueue($id);
            $this->notificationTemplate->updateNotiTemplate($id, $arrUpdate);

            return [
                'noti' => [],
                'sendAt' => $sendAt,
                'status' => true,
                'message' => 'success'
            ];
        }
    }

    /**
     * Xóa theo detail id
     *
     * @param $id
     */
    public function destroy($id)
    {
        $detail = $this->notificationDetail->deleteNotiDetail($id);
        if ($detail == 1) {
            $this->notificationTemplate->deleteNotiTemplate($id);
            $this->notificationQueue->deleteNotiQueue($id);
        }

        return 'success';
    }

    /**
     * Lấy thông tin theo end point
     *
     * @param $data
     * @return array
     */
    public function getEndPointJson($data)
    {
        $brand = $this->brand->getItemByTenantId($data['tenant_id']);
        $array = [
            'brand_id' => $brand['brand_id'],
            'brand_url' => $brand['brand_url'],
            'brand_name' => $brand['brand_name']
        ];

        if ($data['end_point'] == 'faq_brand') { // nếu là faq
            $array['faq_type'] = 'faq';
            $array['faq_id'] = (int)$data['end_point_detail'];
            $array['faq_title'] = $data['end_point_detail_click'];
        } elseif ($data['end_point'] == 'market') { // nếu là marketing
            $array['campaign_id'] = (int)$data['end_point_detail'];
            $array['promo_name'] = $data['end_point_detail_click'];
        } elseif ($data['end_point'] == 'product') { // nếu là marketing
            $array['product_id'] = (int)$data['end_point_detail'];
            $array['product_name'] = $data['end_point_detail_click'];
        } elseif ($data['end_point'] == 'url') { // nếu là faq
            $array['url'] = $data['end_point_linkdetail_click'];
        } elseif ($data['end_point'] == 'brand_message_board') { // nếu là faq
            $array['page_card_content_id'] = (int)$data['end_point_detail'];
            $array['page_card_content_name'] = $data['end_point_detail_click'];
        }
        $json = json_encode($array);
        return [
            'json' => $json,
            'status' => true
        ];
    }
}
