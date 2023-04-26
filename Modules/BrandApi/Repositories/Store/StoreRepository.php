<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 8/13/2019
 * Time: 1:43 PM
 */

namespace Modules\BrandApi\Repositories\Store;

use Modules\BrandApi\Models\StoreRequireConnectTable;
use Modules\BrandApi\Models\StoreTable;
use MyCore\Http\Response\ResponseFormatTrait;
use MyCore\Repository\PagingTrait;

class StoreRepository implements StoreRepositoryInterface
{
    use ResponseFormatTrait;
    use PagingTrait;

    protected $store;
    protected $storeRequire;

    public function __construct(StoreTable $store, StoreRequireConnectTable $storeRequire)
    {
        $this->store = $store;
        $this->storeRequire = $storeRequire;
    }

    public function list(array $filter = [])
    {
        return $this->store->getListNew($filter);
    }

    public function searchStore($storeName)
    {
        $result = $this->store->searchStore($storeName);
        return $this->responseJson(CODE_SUCCESS, null, $result);
    }

    public function filterStore(array $filters = [])
    {
        $result = $this->store->filterStore($filters);
        return $this->responseJson(CODE_SUCCESS, null, $result);
    }

    public function storeRequireConnect(array $filter = [])
    {
        $result = $this->storeRequire->getListNew($filter);
        return $this->toPagingData($result);
    }
}
