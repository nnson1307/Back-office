<?php


namespace Modules\Admin\Repositories\Brand;

use Carbon\Carbon;
use DaiDP\StsSDK\TenantUserManagement\TenantUserManagementInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Http\Api\BrandApi;
use Modules\Admin\Models\BrandConfigTable;
use Modules\Admin\Models\BrandTable;
use Modules\Admin\Models\NotificationDetailTable;
use Modules\Admin\Models\UserAdminTable;
use Modules\Admin\Models\ConfigNotificationTable;
use \DaiDP\StsSDK\TenantManagement\TenantManagementInterface;
use Modules\Admin\Http\Api\PushNotification;
use Modules\Service\Models\AdminServiceBrandFeatureChildTable;
use Modules\Service\Models\AdminServiceBrandFeatureTable;
use Modules\Service\Models\AdminServiceBrandTable;
use Modules\Service\Models\AdminServiceFeatureChildTable;
use Modules\Service\Models\AdminServiceFeatureTable;
use MyCore\Helper\OpensslCrypt;

class BrandRepository implements BrandRepositoryInterface
{
    protected $brand;
    protected $apiBrand;
    protected $timestamps = true;
    protected $pushNotification;
    protected $configNotification;
    protected $notiDetail;
    protected $adminServiceBrandTable;
    protected $adminServiceBrandFeatureTable;
    protected $adminServiceFeatureTable;
    protected $adminServiceBrandFeatureChildTable;
    protected $adminServiceFeatureChild;

    public function __construct(
        BrandTable $brand,
        PushNotification $aPushNotification,
        ConfigNotificationTable $mConfigNotification,
        NotificationDetailTable $notificationDetailTable,
        AdminServiceBrandTable $adminServiceBrandTable,
        AdminServiceBrandFeatureTable $adminServiceBrandFeatureTable,
        BrandApi $apiBrand,
        AdminServiceFeatureTable $adminServiceFeatureTable,
        AdminServiceBrandFeatureChildTable $adminServiceBrandFeatureChildTable,
        AdminServiceFeatureChildTable $adminServiceFeatureChild
    )
    {
        $this->adminServiceFeatureChild = $adminServiceFeatureChild;
        $this->adminServiceBrandFeatureChildTable = $adminServiceBrandFeatureChildTable;
        $this->brand = $brand;
        $this->pushNotification = $aPushNotification;
        $this->configNotification = $mConfigNotification;
        $this->notiDetail = $notificationDetailTable;
        $this->adminServiceBrandTable = $adminServiceBrandTable;
        $this->adminServiceBrandFeatureTable = $adminServiceBrandFeatureTable;
        $this->apiBrand = $apiBrand;
        $this->adminServiceFeatureTable = $adminServiceFeatureTable;
    }

    public function getList(array $filters = [])
    {
        if (!isset($filters['sort_brand$brand_name'])) {
            $filters['sort_brand$brand_name'] = null;
        }

        if (!isset($filters['sort_brand$brand_code'])) {
            $filters['sort_brand$brand_code'] = null;
        }

        if (!isset($filters['sort_brand$company_name'])) {
            $filters['sort_brand$company_name'] = null;
        }

        if (!isset($filters['sort_brand$is_published'])) {
            $filters['sort_brand$is_published'] = null;
        }

        if (!isset($filters['sort_brand$is_activated'])) {
            $filters['sort_brand$is_activated'] = null;
        }

        if (!isset($filters['keyword_brand$brand_name'])) {
            $filters['keyword_brand$brand_name'] = null;
        }

        if (!isset($filters['keyword_brand$brand_code'])) {
            $filters['keyword_brand$brand_code'] = null;
        }

        if (!isset($filters['keyword_brand$company_name'])) {
            $filters['keyword_brand$company_name'] = null;
        }

        if (!isset($filters['brand$is_activated'])) {
            $filters['brand$is_activated'] = null;
        }

        if (!isset($filters['brand$is_published'])) {
            $filters['brand$is_published'] = null;
        }

        $check = $filters;
        $check = array_filter($check);

        if (count($check) == 0) {
            $filters['sort_brand$brand_name'] = 'asc';
        }

        $list = $this->brand->getListNew($filters);

        return [
            'list' => $list,
            'filters' => $filters
        ];
    }

    /**
     * Lấy danh sách thương hiệu không phân trang
     *
     * @param array $filters
     * @return array
     */
    public function listAll(array $filters = [])
    {
        return $this->brand->getListAll($filters)->toArray();
    }

    /**
     * Xử lý thêm brand
     *
     * @param array $param
     * @return array
     */
    public function add(array $param)
    {
        set_time_limit(10000);

//        $tenantSDK = app()->get(TenantManagementInterface::class);
//        $mBrandConfig = new BrandConfigTable();
//
//        $result = $tenantSDK->createTenant($param['brand_code']);

        $arr = [];
        $is_activated = 0;
        $is_published = 0;
        if (isset($param['is_activated'])) {
            $is_activated = 1;
        }
        if (isset($param['is_published'])) {
            $is_published = 1;
        }
//            $brand_url = env('BASE_BRAND_API').'/'.$result->data['id'];

        $arr = [
            'brand_name' => strip_tags($param['brand_name']),
            'brand_code' => strip_tags($param['brand_code']),
            'company_name' => strip_tags($param['company_name']),
            'display_name' => strip_tags($param['display_name']),
            'hotline' => strip_tags($param['hotline']),
            'is_activated' => $is_activated,
            'is_published' => $is_published,
            'tenant_id' => md5(uniqid()),
            'created_by' => Auth()->id(),
            'updated_by' => Auth()->id(),
            'brand_avatar' => strip_tags($param['brand_avatar']),
            'brand_banner' => strip_tags($param['brand_banner']),
            'brand_url' => sprintf(env('BRAND_URL'), strip_tags($param['brand_code'])),
            'brand_api_url' => sprintf(env('BRAND_API_URL'), strip_tags($param['brand_code'])),
            'brand_noti_url' => sprintf(env('BRAND_NOTI_URL'), strip_tags($param['brand_code'])),
            'sns_firebase_key' => isset($param['firebase_key']) ? strip_tags($param['firebase_key']) : null,
            'sns_p12' => $param['p_file'] != null ? strip_tags($param['p_file']) : null,
            'brand_favicon' => $param['favicon_file'] != null ? strip_tags($param['favicon_file']) : null
        ];

        //Tạo brand
        $brand_id = $this->brand->add($arr);

        $snsSuccess = 0;
        if ($arr['sns_firebase_key'] != null && $arr['sns_p12'] != null) {
            $dataSns = [
                'project_name' => $arr['brand_code'],
                'firebase_key' => $arr['sns_firebase_key'],
                'p12' => $arr['sns_p12'],
                'tenant_id' => $arr['tenant_id']
            ];
            $resultSns = $this->pushNotification->callApiGenerationAwsSns($dataSns);
            if ($resultSns != null && $resultSns['ErrorCode'] == 0) {
                $snsSuccess = 1;
            }
        }

        $config = [
            'database' => env('PIOSPA_DB', 'epoints_s%s') . '_' . $arr['brand_code'],
            'server' => env('PIOSPA_DB_SV', 'rtdevdb02.mysql.database.azure.com'),
            'port' => env('PIOSPA_DB_PORT', '3306'),
            'user' => env('PIOSPA_DB_USER', 'adrtdevdb02@rtdevdb02'),
            'pass' => env('PIOSPA_DB_PASS', '^qs9%9#9yL3^C68SbpV#')
        ];

        $oConstr = new OpensslCrypt(env('OP_SECRET'), env('OP_SALT'));

        $connectionString = 'Server=' . $config['server'] . ';port=' . $config['port'] . ';Database=' . sprintf($config['database'], $brand_id) .
            ';user=' . $config['user'] . ';password=' . $config['pass'];
        //update lại connection string vào brand
        $this->brand->editBrand($brand_id, [
            'brand_contr' => $oConstr->encode($connectionString),
            'sns_success' => $snsSuccess,
            'brand_customer_code' => 'CRB'.sprintf("%06d", $brand_id)
        ]);

        // tạo function khởi tạo DB
        $this->createBrand($connectionString);

        return [
            'brand_id' => $brand_id,
            'status' => true,
            'message' => __('Tạo thành công'),
        ];

    }

    public function createBrand($connectionString)
    {
        // khởi tạo DB
        try {
            $arrParams = $this->parseConnStr($connectionString);
            $query = "CREATE DATABASE IF NOT EXISTS " . $arrParams['database'] . " CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";

            DB::statement($query);
            config([
                'database.connections.brand' => [
                    'driver' => 'mysql',
                    'host' => $arrParams['server'],
                    'port' => $arrParams['port'] ?? 3306,
                    'database' => $arrParams['database'],
                    'username' => $arrParams['user'],
                    'password' => $arrParams['password'] ?? '',
                    'unix_socket' => env('DB_SOCKET', ''),
                    'charset' => env('DB_CHARSET', 'utf8mb4'),
                    'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
                    'prefix' => env('DB_PREFIX', 'piospa_'),
                    'strict' => env('DB_STRICT_MODE', true),
                    'engine' => env('DB_ENGINE', null),
                    'timezone' => env('DB_TIMEZONE', '+07:00')
                ]
            ]);
            \DB::purge('brand'); // Clear cache config. See: https://stackoverflow.com/a/37705096

            // tạo mirgate
            DB::connection('brand')->unprepared(file_get_contents('../database/migrations/piospa_clear_data.sql'));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    /**
     * Parse connect string to array
     *
     * @param $str
     * @return array
     */
    protected function parseConnStr($str)
    {
        $arrPart = explode(';', $str);
        $arrParams = [];

        foreach ($arrPart as $item) {
            list($key, $val) = explode('=', $item, 2);
            $key = strtolower($key);

            $arrParams[$key] = $val;
        }

        return $arrParams;
    }

    /**
     * Lấy chi tiết brand
     *
     * @param int $id
     * @return mixed
     */
    public function getItem($id)
    {
        return $this->brand->getItem($id);
    }

    public function getServiceBrand($id)
    {
        $arr = [];
        $list = $this->adminServiceBrandTable->getServiceBrand($id);
        if (isset($list[0])) {
            foreach ($list as $item) {
                $arr[$item['service_id']] = $item;
            }
        }
        return $arr;
    }

    public function getServiceBrandFeature($id)
    {
        $arr = [];
        $list = $this->adminServiceBrandFeatureTable->getServiceBrandFeature($id);
        if (isset($list[0])) {
            foreach ($list as $item) {
                $arr[$item['service_id'] . '-' . $item['feature_group_id']] = $item;
            }
        }
        return $arr;
    }

//    Lấy danh sách id dịch vụ theo brand
    public function getListService($id)
    {
        $getList = $this->adminServiceBrandTable->getListServiceByBrandId($id);
        $getListId = collect($getList)->pluck('service_id')->toArray();
        return $getListId;
    }

    public function edit(array $param, $id)
    {
        try {

//        $brand_url = (isset($param['brand_url']) && strip_tags($param['brand_url']) != '')
//            ? strip_tags($param['brand_url'])
//            : $param['brand_code'].'.mystore.io';
//
//        if ($this->checkBrandUrl($brand_url, $id)) {
//            return [
//                'status' => false,
//                'message' => __('admin::validation.brand.brand_url_unique'),
//            ];
//        }
            $is_activated = 0;
            $is_published = 0;
            if (isset($param['is_activated'])) {
                $is_activated = 1;
            }
            if (isset($param['is_published'])) {
                $is_published = 1;
            }
            $arr_data = [
                'brand_id' => strip_tags($param['brand_id']),
                'brand_name' => strip_tags($param['brand_name']),
                'brand_url' => sprintf(env('BRAND_URL'), strip_tags($param['brand_name'])),
                'brand_api_url' => sprintf(env('BRAND_API_URL'), strip_tags($param['brand_name'])),
                'brand_noti_url' => sprintf(env('BRAND_NOTI_URL'), strip_tags($param['brand_name'])),
                'company_name' => strip_tags($param['company_name']),
                'brand_about' => $param['brand_about'],
                'display_name' => strip_tags($param['display_name']),
                'brand_avatar' => strip_tags($param['brand_avatar']),
                'brand_banner' => strip_tags($param['brand_banner']),
                'hotline' => strip_tags($param['hotline']),
                'is_activated' => $is_activated,
                'is_published' => $is_published,
                'updated_by' => Auth::id(),
                'sns_firebase_key' => isset($param['firebase_key']) ? strip_tags($param['firebase_key']) : null,
                'sns_p12' => $param['p_file'] != null ? strip_tags($param['p_file']) : null,
                'brand_favicon' => $param['favicon_file'] != null ? strip_tags($param['favicon_file']) : null
            ];

            $result = $this->brand->edit($arr_data, $param['brand_id']);

            $arrService = [];
            $arrFeature = [];
            $arrDetailBrand = $this->brand->getItem($param['brand_id'])->toArray();
            // update 30/03
//            $snsSuccess = 0;
//            if ($arrDetailBrand != null) {
//                if ($arrDetailBrand['sns_success'] == 0) {
//                    $dataSns = [
//                        'project_name' => $arrDetailBrand['brand_code'],
//                        'firebase_key' => $param['firebase_key'],
//                        'p12' => $param['p_file'],
//                        'tenant_id' => $arrDetailBrand['tenant_id']
//                    ];
//                    $resultSns = $this->pushNotification->callApiGenerationAwsSns($dataSns);
//                    if ($resultSns != null && $resultSns['ErrorCode'] == 0) {
//                        $snsSuccess = 1;
//                        // update sns_success
//                        $this->brand->edit([
//                            'sns_success' => $snsSuccess
//                        ], $param['brand_id']);
//                    }
//                }
//            }
            // insert brand feature child
            $arrFeatureChild = [];

            // clear db cũ
            $this->adminServiceBrandTable->deleteByBrandId($param['brand_id']);
            $this->adminServiceBrandFeatureTable->deleteByBrandId($param['brand_id']);
            $this->adminServiceBrandFeatureChildTable->deleteBrandFeatureChildByBrand((int)$param['brand_id']);

            $domainBrandPortal = $this->getDomainByBrand($arrDetailBrand['brand_code']);
            $oApi = new BrandApi();
            $oApi->baseBrandPortalApi = $domainBrandPortal;
            
            if (isset($param['service'])) {
                foreach ($param['service'] as $key => $item) {
                    $arrService['service'][$key] = [
                        'service_id' => (int)$key,
                        'brand_id' => (int)$param['brand_id'],
                        'is_deleted' => 0,
                        'created_by' => Auth::id(),
                        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                        'updated_by' => Auth::id(),
                        'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    ];
                    if (isset($item['is_actived'])) {
                        $arrService['service'][$key]['is_actived'] = 1;
                    } else {
                        $arrService['service'][$key]['is_actived'] = 0;
                    }

                    foreach ($item['feature'] as $keyFeature => $itemFeature) {
                        // insert one service_brand_feature
                        $arrServiceBrandFeature = [
                            'brand_id' => (int)$param['brand_id'],
                            'service_id' => (int)$key,
                            'feature_group_id' => (int)$keyFeature,
                            'is_actived' => isset($itemFeature['is_actived']) ? 1 : 0,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            'created_by' => Auth::id(),
                            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            'updated_by' => Auth::id(),
                            'brand_update_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            'brand_update_by' => Auth::id(),
                        ];
                        $idServiceBrandFeature = $this->adminServiceBrandFeatureTable->create1BrandFeature($arrServiceBrandFeature);
                        // data return api
                        $arrService['feature'][$key . '_' . $keyFeature] = [
                            'service_brand_feature_id' => $idServiceBrandFeature,
                            'brand_id' => (int)$param['brand_id'],
                            'service_id' => (int)$key,
                            'feature_group_id' => (int)$keyFeature,
                            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            'created_by' => Auth::id(),
                            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            'updated_by' => Auth::id(),
                            'brand_update_at' => Carbon::now()->format('Y-m-d H:i:s'),
                            'brand_update_by' => Auth::id(),
                        ];
                        if (isset($itemFeature['is_actived'])) {
                            $arrService['feature'][$key . '_' . $keyFeature]['is_actived'] = 1;
                        } else {
                            $arrService['feature'][$key . '_' . $keyFeature]['is_actived'] = 0;
                        }
                        $lstServiceFeatureChild = $this->adminServiceFeatureChild->getListFeatureByServiceAndGroupId($key, $keyFeature);
                        foreach ($lstServiceFeatureChild as $value) {
                            $featureChild = [
                                'service_brand_feature_id' => $idServiceBrandFeature,
                                'brand_id' => $param['brand_id'],
                                'service_id' => $key,
                                'feature_group_id' => $keyFeature,
                                'feature_id' => $value['feature_id'],
                                'feature_code' => $value['feature_code'],
                                'is_actived' => isset($itemFeature['is_actived']) ? 1 : 0,
                                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                                'created_by' => Auth::id(),
                                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                                'updated_by' => Auth::id(),
                                'brand_update_at' => Carbon::now()->format('Y-m-d H:i:s'),
                                'brand_update_by' => Auth::id()
                            ];
                            // data array insert service_brand_feature_child
                            $arrFeatureChild[] = $featureChild;
                            // data return api
                            $arrService['feature_child'][$key . '_' . $keyFeature . '_' . $value['feature_id']] = $featureChild;

                            if (isset($itemFeature['is_actived'])) {
                                $arrService['feature_child'][$key . '_' . $keyFeature . '_' . $value['feature_id']]['is_actived'] = 1;
                            } else {
                                $arrService['feature_child'][$key . '_' . $keyFeature . '_' . $value['feature_id']]['is_actived'] = 0;
                            }
                        }
                    }
                }

                $this->adminServiceBrandTable->createBrand($arrService['service']);
//                $this->adminServiceBrandFeatureTable->createBrandFeature($arrService['feature']);
                $this->adminServiceBrandFeatureChildTable->insertBrandFeatureChild($arrFeatureChild);

                $result = $oApi->deleteServiceBrand(['brand_id' => $param['brand_id']]);
                $result1 = $oApi->createServiceBrand($arrService);
            } else {
                $this->adminServiceBrandTable->deleteByBrandId($param['brand_id']);
                $this->adminServiceBrandFeatureTable->deleteByBrandId($param['brand_id']);
                $this->adminServiceBrandFeatureChildTable->deleteBrandFeatureChildByBrand((int)$param['brand_id']);
                $result = $oApi->deleteServiceBrand(['brand_id' => $param['brand_id']]);
            }

            if ($result) {
                return [
                    'status' => true,
                    'message' => __('admin::brand.edit.UPDATE_SUCCESS')
                ];
            }

            return [
                'status' => false,
                'message' => __('admin::brand.edit.UPDATE_FAIL'),
                '_message' => 'Không có result'
            ];
        } catch (\Exception $e) {
            return [
                'status' => true,
                'message' => $e->getMessage(),
                '_message' => 'lỗi'
            ];
        }
    }

    public function remove($id)
    {
        return $this->brand->remove($id);
    }

    public function getListUserAdmin($brand_id)
    {
        $userTable = app(UserAdminTable::class);
        return $userTable->getList($brand_id);
    }

    public function addUserAdmin(array $data)
    {
        $userTable = app(UserAdminTable::class);
        return $userTable->add($data);
    }

    public function removeUserAdmin(array $data, $id)
    {
        $userTable = app(UserAdminTable::class);
        return $userTable->edit($data, $id);
    }

    public function activeUserAdmin(array $data, $id)
    {
        $userTable = app(UserAdminTable::class);
        return $userTable->edit($data, $id);
    }

    public function changePassword(array $data, $id)
    {
        $userTable = app(UserAdminTable::class);
        return $userTable->changePassword($data, $id);
    }

    /**
     * Thay đổi trang thái hoặc trạng thái hiển thị
     *
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function changeStaus(array $data, $id)
    {
        $result = $this->brand->edit($data, $id);

        return $result;
    }

    /**
     * Kiểm tra brand url đã tồn tại chưa
     *
     * @param string $brandUrl
     * @param int $id
     * @return bool
     */
    private function checkBrandUrl($brandUrl, $id = 0)
    {
        $result = $this->brand->checkBrandUrl($brandUrl, $id)->count();

        return ($result > 0);
    }

    /**
     * Lấy thông tin brand theo tenant id
     *
     * @param int $tenant_id
     * @return mixed
     */
    public function getDetailBy($tenant_id)
    {
        $result = $this->brand->getDetailBy($tenant_id);

        return $result;
    }

//    add session chọn dịch vụ
    public function storeService($data)
    {
        try {
            $arrServiceGroup = [];
//                Chuyển string sang int
            foreach ($data['service_group'] as $item) {
                $arrServiceGroup[] = (int)$item;
            }
            $featureNew = $this->adminServiceFeatureTable->getAllBrandFeatureById($arrServiceGroup);
            $arrFeatureNew = [];
            foreach ($featureNew as $item) {
                $arrFeatureNew[] = $item['feature_group_id'];
            }

//            check service nhập vào có bị trùng tính năng
            $checkItem = 0;
            foreach ($arrFeatureNew as $item) {
                if (in_array($item, $arrFeatureNew)) {
                    $checkItem++;
                }
                if ($checkItem > count($arrFeatureNew)) {
                    return [
                        'error' => 'true',
                        'message' => __('admin::brand.validate.feature_same'),
                    ];
                }
            }
            $session = session()->get('service_group');
            if ($session == null || count($session) == 0) {
                request()->session()->put('service_group', $data['service_group']);
            } else {
                $tmp = 0;
                $featureSession = $this->adminServiceFeatureTable->getAllBrandFeatureById($session);
                $arrFeatureSession = [];
                if ($featureSession) {
                    foreach ($featureSession as $item) {
                        $arrFeatureSession[] = $item['feature_group_id'];
                    }
                }

//                kiểm tra giá trị feature mới có trong mảng dịch vụ đã thêm hay chưa
                foreach ($featureNew as $item) {
                    if (in_array($item['feature_group_id'], $arrFeatureSession)) {
                        $tmp = 1;
                    }
                    if ($tmp == 1) {
                        return [
                            'error' => 'true',
                            'message' => __('admin::brand.validate.feature_same'),
                        ];
                    }
                }
                foreach ($data['service_group'] as $item) {
                    request()->session()->push('service_group', (int)$item);
                }
            }
            return [
                'error' => false,
                'message' => __('admin::brand.index.check_add_service_success'),
                'data' => '',
            ];
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'message' => __('Thêm dịch vụ thất bại')
            ];
        }
    }

    /**
     * Gửi notification
     *
     * @param $config
     * @param $brand
     * @return array
     */
    private function sendNotification($config, $brand, $brand_id)
    {
        if (isset($config['is_active']) && $config['is_active'] == 1) {
            $currentTime = Carbon::now();
            if ($config['notify_type'] == 'schedule') {
                if ($config['option_type'] == 'hours') {
                    $currentTime->addHours($config['option_value']);
                } elseif ($config['option_type'] == 'minute') {
                    $currentTime->addMinutes($config['option_value']);
                } elseif ($config['option_type'] == 'day') {
                    $currentTime->addDays($config['option_value']);
                }
            }
            $title = str_replace("[BRAND_NAME]", $brand['brand_name'], $config['message_title']);
            $desc = str_replace("[BRAND_NAME]", $brand['brand_name'], $config['message_desc']);

            $arrParams = [
                'brand_id' => $brand_id,
                'brand_url' => $brand['brand_url'],
                'brand_name' => $brand['brand_name']
            ];

            $arrNotiDetail = [
                'content' => $desc,
                'action_name' => 'Kết nối ngay',
                'action' => 'brand_info',
                'action_params' => json_encode($arrParams),
                'created_at' => Carbon::now(),
                'created_by' => Auth::id(),
                'updated_at' => Carbon::now(),
                'updated_by' => Auth::id(),
            ];

            $idDetail = $this->notiDetail->createNotiDetailGetId($arrNotiDetail);

            $apiData = [
                "title" => $title,
                "message" => $desc,
                "avatar" => "",
                "detail_id" => $idDetail,
                "schedule" => $currentTime->format('Y-m-d H:i:s')
            ];

            try {
                $result = $this->pushNotification->pushAllMyStore($apiData);
                return [
                    'status' => true,
                    'brand_id' => $brand_id,
                    'message' => __('admin::brand.create.PUSH_NOTI.SUCCESS'),
                ];
            } catch (\Exception $e) {
                return [
                    'status' => false,
                    'message' => __('admin::brand.create.PUSH_NOTI.FAIL'),
                ];
            }
        }

        return [
            'status' => true,
            'brand_id' => $brand_id,
            'message' => __('admin::brand.create.CREATE_SUCCESS'),
        ];
    }

    public function removeFeature($id)
    {
        try {
            if (request()->session()->has('service_group')) {
                $arrayFeature = session()->get('service_group');
                foreach ($arrayFeature as $key => $item) {
                    if ($item == $id) {
                        unset($arrayFeature[$key]);
                    }
                }
                session()->put('service_group', $arrayFeature);
                return [
                    'error' => false,
                    'message' => __('Đã gỡ bỏ dịch vụ thành công')
                ];
            }
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'message' => __('Đã gỡ bỏ dịch vụ thất bại')
            ];
        }
    }

    protected function getDomainByBrand($brandCode)
    {
        return sprintf(env('BASE_BRANDPORTAL_API'), $brandCode);
    }
}
