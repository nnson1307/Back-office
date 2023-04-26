<?php

namespace Modules\NotificationApi\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use MyCore\Http\Response\ResponseFormatTrait;

class Controller extends BaseController
{
    use ValidatesRequests, ResponseFormatTrait;
}
