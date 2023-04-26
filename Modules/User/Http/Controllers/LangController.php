<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 6/20/2019
 * Time: 9:49 AM
 */

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LangController extends Controller
{
    private $langActive = [
        'vi',
        'en',
    ];

    public function changeLang(Request $request, $lang)
    {
        if (in_array($lang, $this->langActive)) {
            $request->session()->put(['locale' => $lang]);
            $request->session()->put(['lang' => $lang]);
            return redirect()->back();
        }
    }
}