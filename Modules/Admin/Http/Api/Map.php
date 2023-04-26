<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/12/2019
 * Time: 10:14 AM
 */

namespace Modules\Admin\Http\Api;

use MyCore\Api\ApiAbstract;

class Map extends ApiAbstract
{
    public function getDataIndex(array $data=[])
    {
        return $this->baseClient('/maps',$data,false);
    }

    public function detailStationES(array $data=[])
    {
        return $this->baseClient('/maps/detail-station-map',$data,false);
    }
}