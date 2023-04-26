<?php


namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\User\Http\Requests\StoreUser\StoreUserRegisterRequest;
use Modules\User\Http\Requests\StoreUser\StoreUserResetPasswordRequest;
use Modules\User\Http\Requests\StoreUser\StoreUserUpdateRequest;
use Modules\User\Repositories\StoreUser\StoreUserRepositoryInterface;

/**
 * StoreUserController
 *
 * @author isc-daidp
 * @since Feb 23, 2018
 */
class StoreUserController extends Controller
{
    protected $user;


    /**
     * StoreUserController constructor.
     * @param StoreUserRepositoryInterface $user
     */
    public function __construct(StoreUserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Hiển thị danh sách tài khoản Store user theo filter
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $filter = request()->all();

        $data = $this->user->list($filter);

        return view('user::store-user.index', [
            'LIST' => $data['data'],
            'filter' => $data['filter']
        ]);
    }

    /**
     * Hiện thị giao diện tạo tài khoản store user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('user::store-user.create');
    }

    /**
     * Tạo tài khoản store user
     *
     * @param StoreUserRegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreUserRegisterRequest $request)
    {
        $param = $request->all();

        $data = $this->user->add($param);

        return $data;
    }

    /**
     * Hiện thị thông tin tài khoản Store user theo user_id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $getItem = $this->user->getItem($id);
        return view('user::store-user.edit', [
            'item' => $getItem
        ]);
    }

    /**
     * Cập nhật thông tin tài khoản Store user
     *
     * @param StoreUserUpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StoreUserUpdateRequest $request)
    {
        $param = $request->all();
        $this->user->edit($param);

        return response()->json([
            'error' => false,
            'message' => __('user::store-user.edit.UPDATE_SUCCESS')
        ]);
    }

    /**
     * Xóa Store user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $input = $request->all();

        $data = $this->user->remove($input['user_id']);

        return $data;
    }

    /**
     * Cập nhật trạng thái của store user
     *
     * @param Request $request
     * @return mixed
     */
    public function updateStatus(Request $request)
    {
        $data = $request->all();

        $result = $this->user->updateStatus($data['user_id'], $data['is_activated']);

        return $result;
    }

    /**
     * Hiển thị popup reset mật khẩu
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetPassword(Request $request)
    {
        $data = $request->all();
        $result = $this->user->getItem($data['user_id']);
        return view('user::store-user.popup.popup-reset-password', [
            'item' => $result
        ]);
    }

    /**
     * Reset mật khẩu tài khỏa store user
     * @param Request $request
     * @return mixed
     */
    public function resetPassword(StoreUserResetPasswordRequest $request)
    {
        $data = $request->all();
        $result = $this->user->resetPasswordStoreUser($data);

        return $result;
    }

    /**
     * Hiện thị thông tin tài khoản Store user theo user_id
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($id)
    {
        $getItem = $this->user->getItem($id);

        $store = $this->user->getStoreReferenceUser($getItem['phone']);

        return view('user::store-user.detail', [
            'item' => $getItem,
            'store' => $store,
        ]);
    }
}
