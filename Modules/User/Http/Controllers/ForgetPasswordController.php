<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 9/17/2019
 * Time: 11:59 AM
 */

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\User\Repositories\Admin\AdminRepositoryInterface;

class ForgetPasswordController extends Controller
{
    protected $admin;

    public function __construct(AdminRepositoryInterface $admin)
    {
        $this->admin = $admin;
    }

    public function index()
    {
        return view('user::forget-password.index', []);
    }

    public function sendEmailResetPassword(Request $request)
    {
        $email = strip_tags($request->email_reset);
        return $this->admin->getUserByEmail($email);
    }

    public function resetPassword($token)
    {
        $getUser = $this->admin->getUserToken($token);
        return view('user::forget-password.reset-password', [
            'user' => $getUser,
            'token' => $token
        ]);
    }

    public function submitResetPassword(Request $request)
    {
        $data = $request->all();
        return $this->admin->forgetPassword($data);
    }

    public function forgetPasswordSuccess()
    {
        $oUser = Auth::user();

        if (!$oUser) {
            return view('user::forget-password.reset-password-success');
        }
        return redirect('error-404');
    }
}