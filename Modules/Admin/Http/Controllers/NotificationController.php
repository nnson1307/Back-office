<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use MyCore\Storage\Azure\UploadFileToAzureManager;
use Modules\Admin\Repositories\Notification\NotificationRepositoryInterface;
use Illuminate\Http\Response;
use Modules\Admin\Requests\Notification\StoreRequest;
use Modules\Admin\Requests\Notification\UpdateRequest;
use function React\Promise\reject;

class NotificationController extends Controller
{
    /**
     * Khai báo biến
     *
     */
    protected $uploadManager;
    protected $notification;

    /**
     * Hàm khởi tạo Interface
     *
     */
    public function __construct(
        NotificationRepositoryInterface $iNotification,
        UploadFileToAzureManager $uploadManager
    ) {
        $this->notification = $iNotification;
        $this->uploadManager = $uploadManager;
    }

    /**
     * Show danh sách thông báo
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $filter = $request->all();
        $filter['page'] = (isset($_GET['page'])) ? $_GET['page'] : 1;
        $filter['perpage'] = (isset($_GET['perpage'])) ? $_GET['perpage'] : NOTIFICATION_PAGING;
        $filter['is_brand'] = 0;
        $list = $this->notification->getNotiList($filter);

        return view('admin::notification.index', [
            'filter' => $filter,
            'notiList' => $list['noti_list'],
            'notiCount' => $list['noti_count'],
        ]);
    }

    /**
     * Giao diện trang thêm
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $notiTypeList = $this->notification->getNotificationTypeList();

        return view('admin::notification.create', [
            'notiTypeList' => $notiTypeList
        ]);
    }

    /**
     * Lưu thông báo
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $data = $request->all();
        if ($data['send_to'] == 'group') {
            if (empty($data['group_id'])) {
                return response()->json([
                    'errors' => [
                        'content' => __('admin::validation.notification.group_id_required')
                    ],
                ], 422);
            }
        }
        if ($data['action_group'] == 1) {
            if ($data['action_name'] == null) {
                return response()->json([
                    'errors' => [
                        'action_name' => __('admin::validation.notification.action_name_required')
                    ],
                ], 422);
            }
            if (strlen($data['action_name']) > 20) {
                return response()->json([
                    'errors' => [
                        'action_name' => __('admin::validation.notification.action_name_max')
                    ],
                ], 422);
            }
            if (($data['end_point'] == 'brand' || $data['end_point'] == 'faq')
                && $data['end_point_detail_click'] == null) {
                return response()->json([
                    'errors' => [
                        'end_point_detail_click' => __('admin::validation.notification.param_action_name_required')
                    ],
                ], 422);
            } elseif ($data['end_point'] == 'brand' && strlen($data['end_point_detail_click']) > 300) {
                return response()->json([
                    'errors' => [
                        'end_point_detail_click' => __('admin::validation.notification.param_action_name_max')
                    ],
                ], 422);
            }
        }
        if ($data['send_time_radio'] == 1) {
            if ($data['schedule_time'] == 'specific_time') {
                if ($data['specific_time'] == null) {
                    return response()->json([
                        'errors' => [
                            'specific_time' => __('admin::validation.notification.specific_time_required')
                        ],
                    ], 422);
                }
                // nếu thời gian nhỏ hơn 5p
                $time = new Carbon($data['specific_time']);
                $minute = Carbon::parse($time)->minute;
                $hour = Carbon::parse($time)->hour;
                $specificTime = ($hour * 60) + $minute;
                $currentTime_minute = Carbon::now()->minute;
                $currentTime_hour = Carbon::now()->hour;
                $currentTime = ($currentTime_hour * 60) + $currentTime_minute;
                $checkTime = $specificTime - $currentTime;
                if ($data['specific_time'] != null && $data['specific_time'] <= Carbon::now() || $checkTime <= 5) {
                    return response()->json([
                        'errors' => [
                            'specific_time' => __('admin::validation.notification.specific_time_old')
                        ],
                    ], 422);
                }
            } else {
                if ($data['time_type'] == 'minute'
                    && $data['non_specific_time'] != null
                    && $data['non_specific_time'] <= 5
                ) {
                    return response()->json([
                        'errors' => [
                            'non_specific_time' => __('admin::validation.notification.greater_5_minute')
                        ],
                    ], 422);
                }
                if ($data['non_specific_time'] == null) {
                    return response()->json([
                        'errors' => [
                            'non_specific_time' => __('admin::validation.notification.non_specific_time_required')
                        ],
                    ], 422);
                }
                if ($data['non_specific_time'] != null
                    && preg_match('/^\d+$/', $data['non_specific_time']) == 0
                ) {
                    return response()->json([
                        'errors' => [
                            'non_specific_time' => __('admin::validation.notification.specific_time_valid')
                        ],
                    ], 422);
                }
                if ($data['non_specific_time'] != null
                    && strlen($data['non_specific_time']) > 4
                ) {
                    return response()->json([
                        'errors' => [
                            'non_specific_time' => __('admin::validation.notification.specific_time_numeric')
                        ],
                    ], 422);
                }
            }
        }

        $data['is_brand'] = 0;
        $data['tenant_id'] = null;
        $result = $this->notification->store($data);

        if ($result == 'success') {
            return response()->json([
                'error' => false,
                'message' => __('admin::validation.notification.create_success')
            ]);
        } elseif ($result == 'push_fail') {
            return response()->json([
                'error' => true,
                'message' => __('admin::validation.notification.push_api_fail')
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => __('admin::validation.notification.create_fail')
            ]);
        }
    }

    /**
     * Lấy chi tiết đích đến theo detail_type
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detailEndPoint(Request $request)
    {
        $data = $request->all();
        $data['filter']['page'] = (isset($_GET['page'])) ? $_GET['page'] : 1;
        $detailList = $this->notification->getDetailEndPoint($data);
        $trans = trans('admin::notification');
        if ($data['detail_type'] == "brand") {
            if ($data['view'] == "modal") {
                return view('admin::notification.component.brand-modal', [
                    'trans' => $trans,
//                    'detailList' => $detailList['non_paging'],
                    'detailListPaging' => $detailList['paging']
                ]);
            } else {
                return view('admin::notification.component.ajax-brand', [
                    'trans' => $trans,
//                    'detailList' => $detailList['non_paging'],
                    'detailListPaging' => $detailList['paging']
                ]);
            }
        } elseif ($data['detail_type'] == "faq") {
            if ($data['view'] == "modal") {
                return view('admin::notification.component.faq-modal', [
                    'trans' => $trans,
                    'groupList' => $detailList['groupList']
                ]);
            } else {
                return view('admin::notification.component.ajax-faq', [
                    'trans' => $trans,
                    'detailListPaging' => $detailList['faqList']['paging']
                ]);
            }
        }
    }

    /**
     * Lấy danh sách nhóm, phân trang
     *
     * @param Request $request
     */
    public function groupList(Request $request)
    {
        $data = $request->all();
        $data['filter']['page'] = (isset($_GET['page'])) ? $_GET['page'] : 1;
        $data['filter']['is_brand'] = 0;
        $list = $this->notification->getGroupList($data);
        $trans = trans('admin::notification');

        if ($data['view'] == "modal") {
            return view('admin::notification.component.group-modal', [
                'trans' => $trans
            ]);
        } else {
            return view('admin::notification.component.ajax-group', [
                'trans' => $trans,
//                    'detailList' => $detailList['non_paging'],
                'groupList' => $list['paging']
            ]);
        }
    }

    /**
     * Trang chi tiết
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        $notiTypeList = $this->notification->getNotificationTypeList();
        $noti = $this->notification->getNotiById($id);
        if ($noti['template']['from_type_object'] != null) {
            $group = \DB::table('mystore_filter_group')->where('id', $noti['template']['from_type_object'])->first();
        } else {
            $group = null;
        }

        return view('admin::notification.detail', [
            'notiTypeList' => $notiTypeList,
            'noti' => $noti,
            'group' => $group
        ]);
    }

    /**
     * Show giao diện chỉnh sửa thông báo
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $notiTypeList = $this->notification->getNotificationTypeList();
        $noti = $this->notification->getNotiById($id);
        if ($noti['queue']['id'] == null && $noti['template']['is_actived'] == 1) {
            return redirect()->route('admin.notification.detail', $id);
        }
        if ($noti == null || $noti['is_brand'] == 1) {
            return redirect()->route('error-404');
        }
        if ($noti['template']['from_type_object'] != null) {
            $group = \DB::table('mystore_filter_group')->where('id', $noti['template']['from_type_object'])->first();
        } else {
            $group = null;
        }

        return view('admin::notification.edit', [
            'notiTypeList' => $notiTypeList,
            'noti' => $noti,
            'group' => $group
        ]);
    }

    /**
     * Cập nhật thông báo
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, UpdateRequest $request)
    {
        $data = $request->all();
        if ($data['send_to'] == 'group') {
            if (empty($data['group_id'])) {
                return response()->json([
                    'errors' => [
                        'content' => __('admin::validation.notification.group_id_required')
                    ],
                ], 422);
            }
        }
        if ($data['action_group'] == 1) {
            if ($data['action_name'] == null) {
                return response()->json([
                    'errors' => [
                        'action_name' => __('admin::validation.notification.action_name_required')
                    ],
                ], 422);
            }
            if (strlen($data['action_name']) > 20) {
                return response()->json([
                    'errors' => [
                        'action_name' => __('admin::validation.notification.action_name_max')
                    ],
                ], 422);
            }
            if (($data['end_point'] == 'brand' || $data['end_point'] == 'faq')
                && $data['end_point_detail_click'] == null) {
                return response()->json([
                    'errors' => [
                        'end_point_detail_click' => __('admin::validation.notification.param_action_name_required')
                    ],
                ], 422);
            } elseif ($data['end_point'] == 'brand' && strlen($data['end_point_detail_click']) > 300) {
                return response()->json([
                    'errors' => [
                        'end_point_detail_click' => __('admin::validation.notification.param_action_name_max')
                    ],
                ], 422);
            }
        }
        if ($data['send_time_radio'] == 1) {
            if ($data['schedule_time'] == 'specific_time') {
                if ($data['specific_time'] == null) {
                    return response()->json([
                        'errors' => [
                            'specific_time' => __('admin::validation.notification.specific_time_required')
                        ],
                    ], 422);
                }
                // nếu thời gian nhỏ hơn 5p
                $time = new Carbon($data['specific_time']);
                $minute = Carbon::parse($time)->minute;
                $hour = Carbon::parse($time)->hour;
                $specificTime = ($hour * 60) + $minute;
                $currentTime_minute = Carbon::now()->minute;
                $currentTime_hour = Carbon::now()->hour;
                $currentTime = ($currentTime_hour * 60) + $currentTime_minute;
                $checkTime = $specificTime - $currentTime;
                if ($data['specific_time'] != null && $data['specific_time'] <= Carbon::now() || $checkTime <= 5) {
                    return response()->json([
                        'errors' => [
                            'specific_time' => __('admin::validation.notification.specific_time_old')
                        ],
                    ], 422);
                }
            } else {
                if ($data['time_type'] == 'minute'
                    && $data['non_specific_time'] != null
                    && $data['non_specific_time'] <= 5
                ) {
                    return response()->json([
                        'errors' => [
                            'non_specific_time' => __('admin::validation.notification.greater_5_minute')
                        ],
                    ], 422);
                }
                if ($data['non_specific_time'] == null) {
                    return response()->json([
                        'errors' => [
                            'non_specific_time' => __('admin::validation.notification.non_specific_time_required')
                        ],
                    ], 422);
                }
                if ($data['non_specific_time'] != null
                    && preg_match('/^\d+$/', $data['non_specific_time']) == 0
                ) {
                    return response()->json([
                        'errors' => [
                            'non_specific_time' => __('admin::validation.notification.specific_time_valid')
                        ],
                    ], 422);
                }
                if ($data['non_specific_time'] != null
                    && strlen($data['non_specific_time']) > 4
                ) {
                    return response()->json([
                        'errors' => [
                            'non_specific_time' => __('admin::validation.notification.specific_time_numeric')
                        ],
                    ], 422);
                }
            }
        }

        $data['is_brand'] = 0;
        $result = $this->notification->update($id, $data);

        if ($result == 'success') {
            return response()->json([
                'error' => false,
                'message' => __('admin::validation.notification.edit_success')
            ]);
        } elseif ($result == 'push_fail') {
            return response()->json([
                'error' => true,
                'message' => __('admin::validation.notification.push_api_fail')
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => __('admin::validation.notification.create_fail')
            ]);
        }
    }

    public function updateIsActived($id, Request $request)
    {
        $data = $request->all();
        $data['is_brand'] = 0;
        $result = $this->notification->updateIsActived($id, $data);

        if ($result['status'] == false) {
            if ($result['message'] == 'sent') {
                return response()->json(["success" => 0, "message" => __('admin::validation.notification.sent')]);
            } else {
                return response()
                    ->json(["success" => 0, "message" => __('admin::validation.notification.over_time')]);
            }
        } else {
            return response()->json(["success" => 1, "send_at" => $result['sendAt']]);
        }
    }

    /**
     * Kiểm tra có file hay không sau đó gọi hàm upload lên server
     *
     * @param Request $request
     * @return Response
     */
    public function upload(Request $request)
    {
        if ($request->file('file') != null) {
            $file = $this->uploadImageTemp($request->file('file'));

            return response()->json(["file" => $file, "success" => "1"]);
        }
    }

    /**
     * Lưu file lên server
     *
     * @param $file
     * @return string
     */
    private function uploadImageTemp($file)
    {
        $result = $this->uploadManager->doUpload($file);

        return $result['public_path'];
    }

    public function destroy($id)
    {
        $result = $this->notification->destroy($id);

        if ($result == 'success') {
            return response()->json([
                'error' => false
            ]);
        } else {
            return response()->json([
                'error' => false,
                'message' => __('admin::validation.notification.create_fail')
            ]);
        }
    }
}
