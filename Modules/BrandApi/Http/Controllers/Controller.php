<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 9/19/2019
 * Time: 10:09 AM
 */

namespace Modules\BrandApi\Http\Controllers;

use Illuminate\Routing\Controller as LaravelController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use MyCore\Http\Response\ResponseFormatTrait;

abstract class Controller extends LaravelController
{
    use ValidatesRequests, ResponseFormatTrait;
}
