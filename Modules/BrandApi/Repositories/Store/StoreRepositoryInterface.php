<?php


namespace Modules\BrandApi\Repositories\Store;


interface StoreRepositoryInterface
{
    public function list(array $filter = []);

    public function searchStore($storeName);

    public function filterStore(array $filters = []);

    public function storeRequireConnect(array $filters = []);
}
