<?php

namespace Modules\Admin\Http\Api;

use MyCore\Api\ApiAbstract;

class PushNotification extends ApiAbstract
{
    /**
     * Gọi api push thông báo gửi tất cả
     *
     * @param array $data
     * @return mixed
     * @throws \MyCore\Api\ApiException
     */
    public function pushAllMyStore(array $data = [])
    {
        return $this->baseClientPushNotification('/push-noti/broadcast', $data);
    }

    /**
     * Gọi api push thông báo gửi nhóm
     *
     * @param array $data
     * @return mixed
     * @throws \MyCore\Api\ApiException
     */
    public function pushGroupMyStore(array $data = [])
    {
        return $this->baseClientPushNotification('/push-noti/group', $data);
    }

    /**
     * Gọi api generate sns
     *
     * @param array $data
     * @return mixed
     * @throws \MyCore\Api\ApiException
     */
    public function callApiGenerationAwsSns(array $data = [])
    {
        return $this->baseClientPushNotification('/deployment/generate-aws-sns', $data);
    }
}
