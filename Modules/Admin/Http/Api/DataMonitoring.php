<?php


namespace Modules\Admin\Http\Api;


use MyCore\Api\ApiAbstract;

class DataMonitoring extends ApiAbstract
{
    public function filterDataMonitoring(array $data = [])
    {
        return $this->baseClient('/data/data-monitoring', $data, false);
    }

    public function getStationCamera(array $data = [])
    {
        return $this->baseClient('/data/get-station-camera', $data, false);
    }
}