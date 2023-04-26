<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Modules\Admin\Repositories\ConfigNotification\ConfigNotificationRepositoryInterface;

class ConfigNotificationController extends Controller
{
    /**
     * Khai báo biến
     *
     */
    protected $confignotification;
    protected $request;

    /**
     * Hàm khởi tạo Interface
     *
     */
    public function __construct(
        ConfigNotificationRepositoryInterface $confignotification,
        Request $request
    ) {
        $this->confignotification = $confignotification;
        $this->request = $request;
    }

    /**
     * Hiển thị Danh Sách Config Notification
     *
     */
    public function getIndex()
    {
        $data = $this->confignotification->getConfigNotificationList();
        return view(
            'admin::config-notification.index',
            [
                'data' => $data
            ]
        );
    }

    public function update()
    {
        $param = $this->request->all();
        $data = $this->confignotification->updateNotification($param);
        return $data;
    }
}
