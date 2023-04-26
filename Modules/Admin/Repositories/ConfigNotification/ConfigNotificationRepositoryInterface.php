<?php

namespace Modules\Admin\Repositories\ConfigNotification;

interface ConfigNotificationRepositoryInterface
{
    /**
     * Lấy danh sách Config notification
     *
     * @return mixed
     */
    public function getConfigNotificationList();
    public function updateNotification(array $filters = []);
    public function getListNotiBrandPortalApi();
    public function getListNotiBrandPortalScheduleApi();
    public function updateNotiApi(array $filters = []);
    public function updateNotiScheduleApi(array $filters = []);

}