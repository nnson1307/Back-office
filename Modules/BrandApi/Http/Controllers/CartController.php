<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 9/19/2019
 * Time: 10:07 AM
 */

namespace Modules\BrandApi\Http\Controllers;

use Modules\BrandApi\Repositories\Store\StoreRepositoryInterface;
use MyCore\Http\Response\ResponseFormatTrait;

class CartController extends Controller
{
    use ResponseFormatTrait;
    protected $store;
    public function __construct(StoreRepositoryInterface $store)
    {
        $this->store = $store;
    }

    public function listStore()
    {
        return $this->store->list();
    }
}