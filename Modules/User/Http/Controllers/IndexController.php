<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Modules\User\Requests\MyStore\StoreRequest;
use Modules\User\Repositories\Admin\AdminRepositoryInterface;
use Modules\User\Repositories\User\UserRepositoryInterface;
use Modules\User\Models\AdminMenuTable;
use Modules\User\Repositories\AdminGroup\AdminGroupRepositoryInterface;
use Modules\User\Repositories\AdminHasGroup\AdminHasGroupRepositoryInterface;
use Modules\User\Requests\MyStore\UpdateRequest;

/**
 * User manager
 *
 * @author isc-daidp
 * @since Feb 23, 2018
 */
class IndexController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    protected $user;
    protected $adminStore;
    protected $adminMenu;
    protected $adminStaging;
    protected $adminGroup;
    protected $adminHasGroup;

    public function __construct(
        UserRepositoryInterface $user,
        AdminRepositoryInterface $adminStore,
        AdminGroupRepositoryInterface $adminGroup,
        AdminHasGroupRepositoryInterface $adminHasGroup
    ) {
        $this->user = $user;
        $this->adminMenu = new AdminMenuTable();
        $this->adminStore = $adminStore;
        $this->adminGroup = $adminGroup;
        $this->adminHasGroup = $adminHasGroup;
    }

    public function index()
    {
        $filter = request()->all();

        $data = $this->adminStore->getList($filter);

        return view('user::index.index', [
            'LIST' => $data['data'],
            'filter' => $data['filters']
        ]);
    }

    public function create()
    {
        $optionAdminMenu = $this->adminMenu->getOption();

        return view('user::index.create', ['optionAdminMenu' => $optionAdminMenu]);
    }

    public function store(StoreRequest $request)
    {
        $param = $request->all();
        return $this->adminStore->store($param);
    }

    public function destroy($id)
    {
        $this->adminStore->destroy($id);
        Session::flash('remove-user', 'true');
        return redirect()->route('user.my-store');
    }

    public function edit($id)
    {
        $userRoleGroup = $this->adminGroup->getListRoleGroupUser($id);

        $data = $this->adminStore->getItem($id);
        $optionAdminMenu = $this->adminMenu->getOption();
        return view('user::index.edit', [
            'data' => $data,
            'optionAdminMenu' => $optionAdminMenu,
            'list_group_child' => $userRoleGroup
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(UpdateRequest $request)
    {
        $data = $request->all();
        return $this->adminStore->edit($data, $data['id']);
    }

    public function changeStatusMyStoreUserAction(Request $request)
    {

        $data=[
            'is_actived' => $request->is_actived
        ];

        $this->adminStore->changeStatus($data, $request->id);

        return response()->json([
            'error' => false,
            'message' => __('user::user.index.CHANGE_STATUS_SUCCESS')
        ]);
    }

    public function showResetPassword(Request $request)
    {
        $data = $request->all();
        $result = $this->adminStore->getItem($data['user_id']);

        return view('user::index.popup.popup-reset-password', [
            'item' => $result
        ]);
    }

    public function updatePassword(Request $request)
    {
        $data = $request->all();
        $result = $this->adminStore->updatePassword($data, $data['userId']);
        return $result;
    }

    /**
     * Ajax lấy danh sách nhóm quyền con ra popup
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getListGroupChild(Request $request)
    {
        $listChildId = $request->only(['group_id_list', 'group_id']);
        $listChild = $this->adminStore->getListGroupChildForPopup($listChildId);

        return view('user::index.popup.popup-list-group-child', [
            'list_group_child' => $listChild
        ]);
    }

    public function addCollectionListGroupChild(Request $request)
    {
        $collection = $request->only(['collection']);

        if (count($collection) > 0) {
            $listChild
                = $this->adminGroup->getListAll(['in' => $collection['collection']]);
        } else {
            $listChild = [];
        }
        return view('user::index.include.list-tr-group-child', [
            'list_group_child' => $listChild
        ]);
    }
}
//
