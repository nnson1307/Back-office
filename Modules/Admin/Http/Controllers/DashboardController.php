<?php


namespace Modules\Admin\Http\Controllers;

use App\Helpers\Curl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\Admin\Http\Api\DashboardApi;

class DashboardController extends Controller
{
    public function indexAction()
    {
        return view('admin::dashboard.index');
    }
}
