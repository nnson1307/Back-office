<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/13/2019
 * Time: 11:20 AM
 */

namespace Modules\Admin\Http\Api;

use MyCore\Api\ApiAbstract;

class StationApi extends ApiAbstract
{
    public function getStationByUser(array $data = [])
    {
        return $this->baseClient('/dashboard/get-list-station', $data);
    }

    public function detailStation(array $data = [])
    {
        return $this->baseClient('/station/detail', $data);
    }

    public function getStationByCategory(array $data = [])
    {
        return $this->baseClient('/dashboard/category', $data);
    }

    public function getStationContact(array $data = [])
    {
        return $this->baseClient('/station/station-contract', $data);
    }
}