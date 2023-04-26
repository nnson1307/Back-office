<?php


namespace Modules\Admin\Http\Api;


use MyCore\Api\ApiAbstract;

class BrandApi extends ApiAbstract
{
    public function createServiceBrand(array $data=[])
    {
        return $this->baseClient('/api/service-brand/store',$data, $stripTags = false);
    }

    public function deleteServiceBrand(array $data=[])
    {
        return $this->baseClient('/api/service-brand/delete',$data, $stripTags = false);
    }
}
