<?php
/**
 * Created by PhpStorm   .
 * User: Mr Son
 * Date: 2020-02-12
 * Time: 2:18 PM
 * @author SonDepTrai
 */

namespace Modules\Admin\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\Profile\UpdatePasswordRequest;
use Modules\Admin\Http\Requests\Profile\UpdateProfileRequest;
use Modules\Admin\Repositories\Profile\ProfileRepoInterface;

class ProfileController extends Controller
{
    protected $profile;

    public function __construct(
        ProfileRepoInterface $profile
    ) {
        $this->profile = $profile;
    }

    /**
     * View thông tin tài khoản
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function profileAction()
    {
        $id = Auth()->id();
        $result = $this->profile->getInfo($id);

        return view('admin::profile.profile', $result);
    }

    /**
     * Upload hình ảnh
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadAvatarAction(Request $request)
    {
        if ($request->file('file') != null) {
            $result = $this->profile->uploadAvatar($request->file('file'));

            return response()->json(["file" => $result, "success" => "1"]);
        }
    }

    /**
     * Chỉnh sửa thông tin tài khoản
     *
     * @param UpdateProfileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function editProfileAction(UpdateProfileRequest $request)
    {
        $result = $this->profile->editProfile($request->all());

        return response()->json($result);
    }

    /**
     * View chỉnh sửa mật khẩu
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function changePasswordAction()
    {
        $id = Auth()->id();
        $result = $this->profile->getInfo($id);

        return view('admin::profile.change-password', $result);
    }

    /**
     * Chỉnh sửa mật khẩu
     *
     * @param UpdatePasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitChangePassAction(UpdatePasswordRequest $request)
    {
        $result = $this->profile->submitChangePass($request->all());

        return response()->json($result);
    }
}