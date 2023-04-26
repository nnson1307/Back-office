<?php


namespace Modules\Admin\Http\Api;


use MyCore\Api\ApiAbstract;

class AverageData extends ApiAbstract
{
    public function filterAverageData(array $data=[])
    {
        return $this->baseClient('/data/average',$data,false);
    }
}