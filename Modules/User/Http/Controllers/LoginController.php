<?php

namespace Modules\User\Http\Controllers;

use App\Auth\MyUserModel;
use DaiDP\StsSDK\SystemUserManagement\SystemUserManagementInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Modules\User\Http\Requests\Login\ChangePasswordFirstRequest;
use Modules\User\Models\AdminLockOutTable;
use Modules\User\Models\AdminTable;
use Modules\User\Repositories\Admin\AdminRepositoryInterface;
use Modules\User\Repositories\User\UserRepositoryInterface;
use \Validator;

/**
 * Login page
 *
 * @author isc-daidp
 * @since Feb 23, 2018
 */
class LoginController extends Controller
{
    protected $user;

    protected $BLOCK_USER_TIMES = 5;

    protected $sysUserManage;

    public function __construct(
        UserRepositoryInterface $user,
        SystemUserManagementInterface $sysUserManage
    ) {
        $this->user = $user;
        $this->sysUserManage = $sysUserManage;
    }

    /**
     * Login process
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|unknown
     */
    public function indexAction()
    {
        $oUser = Auth::user();

        if ($oUser) {
            return redirect()->route(LOGIN_HOME_PAGE);
        }

        return view('user::login.index');
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'email.required' => __('validation.PLEASE_ENTER_EMAIL'),
            'email.email' => __('validation.PLEASE_ENTER_EMAIL'),
            'password.required' => __('validation.PLEASE_ENTER_PASSWORD'),
            'password.min' => __('validation.WRONG_PASSWORD'),
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 1,
                'message' => $validator->errors()->all()
            ]);
        }

        $mAdmin = new AdminTable();
        $oUserActive = $mAdmin->getAdmin($request->input('email'));
        if ($oUserActive->count()) {
            $oUser = $oUserActive->first();
            $mLockOut = new AdminLockOutTable();
            $totalLock = $mLockOut->where('email', $request->input('email'))->get()->count();

            if ($totalLock < $this->BLOCK_USER_TIMES) {
                $certifications = $request->only(['email', 'password']);

                if (Auth::attempt($certifications)) {
                    if ($oUser->is_actived == 1) {
                        // Authentication passed...
                        $listAction = $this->listActionById(Auth::id());
                        if (Auth::user()->is_admin == 1) {
                            $redirect = route(LOGIN_HOME_PAGE);
                        } else {
                            if (!$request->session()->has('user_menu')) {
                                $listMenu = $this->listMenu(Auth::id());
                                $request->session()->put('user_menu', $listMenu);
                            }
                            if (Auth::user()->is_change_pass == 0) {
                                $redirect = route('change-password-first');
                            } else {
                                $redirect = (count($listAction) > 0) ? route($listAction[0]) : route('nothing');
                            }
                        }
                        $mLockOut->remove([['email', '=', $request->input('email')]]);
                        return response()->json([
                            'error' => 0,
                            'message' => 'Đăng nhập thành công.',
                            'url' => $redirect
                        ]);
                    } else {
                        return response()->json([
                            'error' => 1,
                            'message' => __('validation.NOT_ACTIVED')
                        ]);
                    }
                }

                $mLockOut->insert([
                    'email' => $request->input('email'),
                    'admin_id' => $oUser->id,
                    'created_at' => Carbon::now()
                ]);
                return response()->json([
                    'error' => 1,
                    'message' => __('validation.LOGIN_FAILED')
                ]);
            } else {
                $mAdmin->where('email', $request->input('email'))
                    ->update(['is_actived' => 0, 'updated_at' => Carbon::now()]);
                return response()->json([
                    'error' => 1,
                    'message' => __('validation.ACCOUNT_LOCKED')
                ]);
            }
        } else {
            return response()->json([
                'error' => 1,
                'message' => __('validation.NOT_EXIST_ACCOUNT')
            ]);
        }
    }

    /**
     * Hiển thị form đổi mật khẩu
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse
     */
    public function changePasswordFirst()
    {
        if (Auth::user() && Auth::user()->is_change_pass == 0) {
            $data = [
                'username' => Auth::user()->email,
            ];
            return view('user::login.change-password-first', [
                'data' => $data
            ]);
        } else {
            return redirect('error-404');
        }
    }

    /**
     * Xử lý đổi mật khẩu
     *
     * @param ChangePasswordFirstRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postChangePassword(ChangePasswordFirstRequest $request)
    {
        $data = $request->only(['currentpassword', 'newpassword', 'confirmpassword']);

        $result = $this->sysUserManage->changePassword(
            Auth::user()->email,
            strip_tags($data['currentpassword']),
            strip_tags($data['newpassword'])
        );

        if (!$result->error) {
            DB::table('admin')->where('id', Auth::id())->update(['is_change_pass' => 1]);
            $listAction = $this->listActionById(Auth::id());
            if (Auth::user()->is_admin == 1) {
                $redirect = LOGIN_HOME_PAGE;
            } else {
                $redirect = (count($listAction) > 0) ? $listAction[0] : 'nothing';
            }

            return redirect()->route($redirect);
        }

        return back()->withErrors(['error' => [__('user::validation.change-password-first.ERROR')]]);
    }


    public function logoutAction(Request $request)
    {

        if ($request->session()->has('routeList')) {
            $request->session()->forget('routeList');
        }
        $request->session()->flush();
        Auth::logout();

        return redirect()->route('login');
    }

    /**
     * Lấy danh sách quyền truy cập của người dùng
     *
     * @param int $admin_id
     * @return array
     */
    private function listActionById($admin_id)
    {
        $admin = app(AdminRepositoryInterface::class);
        $listAction = $admin->getListActionById($admin_id);
        $result = [];

        if (count($listAction) > 0) {
            foreach ($listAction as $item) {
                if (!in_array($item['route'], $result)) {
                    $result[] = $item['route'];
                }
            }
        }

        return $result;
    }

    /**
     * Lấy danh sách menu theo admin id
     *
     * @param int $admin_id
     * @return array
     */
    private function listMenu($admin_id)
    {
        $admin = app(AdminRepositoryInterface::class);
        $listMenu = $admin->getListMenuByAdminId($admin_id);

        $result = [];
        if (count($listMenu) > 0) {
            foreach ($listMenu as $item) {
                $result[] = $item['menu_id'];
            }
        }

        return $result;
    }
}
