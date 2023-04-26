<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Http\Requests\AdminGroupAction\AdminGroupActionUpdateRequest;
use Modules\User\Repositories\AdminAction\AdminActionRepositoryInterface;
use Modules\User\Repositories\AdminGroupAction\AdminGroupActionRepositoryInterface;
use Modules\User\Repositories\AdminGroup\AdminGroupRepositoryInterface;
use Modules\User\Repositories\AdminMenu\AdminMenuRepositoryInterface;

class AdminGroupActionController extends Controller
{
    /**
     * @var AdminGroupActionRepositoryInterface
     */
    protected $adminGroupAction;

    /**
     * @var AdminActionRepositoryInterface
     */
    protected $adminAction;

    /**
     * @var AdminGroupRepositoryInterface
     */
    protected $adminGroup;

    /**
     * @var AdminMenuRepositoryInterface
     */
    protected $adminMenu;

    public function __construct(
        AdminGroupActionRepositoryInterface $adminGroupAction,
        AdminActionRepositoryInterface $adminAction,
        AdminGroupRepositoryInterface $adminGroup,
        AdminMenuRepositoryInterface $adminMenu
    ) {
        $this->adminGroupAction = $adminGroupAction;
        $this->adminAction = $adminAction;
        $this->adminGroup = $adminGroup;
        $this->adminMenu = $adminMenu;
    }

    /**
     * Hiển thị danh sách quyền truy cập
     *
     * @return Response
     */
    public function index()
    {
        $filter = request()->all();

        $list = $this->adminAction->getListNew($filter);

        return view('user::admin-group-action.index', [
            'list' => $list['listAdminAction'],
            'filter' => $list['filter'],
        ]);
    }

    /**
     * Hiển thị thông tin chi tiết
     *
     * @param int $action_id
     * @return Response
     */
    public function show($action_id)
    {
        $detail = $this->adminAction->getDetail($action_id);
        $listGroup = $this->adminGroupAction->getListGroupByAction($action_id);

        if ($detail == null) {
            return redirect()->route('user.admin-group-action.index');
        }

        return view('user::admin-group-action.detail', [
            'detail' => $detail,
            'list_group' => $listGroup,
        ]);
    }

    /**
     * Hiển thị form chỉnh sửa quyền truy cập
     *
     * @param int $action_id
     * @return Response
     */
    public function edit($action_id)
    {
        $detail = $this->adminAction->getDetail($action_id);
        $listGroup = $this->adminGroupAction->getListGroupByAction($action_id);

        if ($detail == null) {
            return redirect()->route('user.admin-group-action.index');
        }

        return view('user::admin-group-action.edit', [
            'detail' => $detail,
            'list_group' => $listGroup,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  AdminGroupActionUpdateRequest $request
     * @return Response
     */
    public function update(AdminGroupActionUpdateRequest $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $result = $this->adminGroupAction->edit($data);

        return response()->json($result);
    }

    /**
     * Ajax lấy danh sách nhóm quyền cho popup
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getListGroup(Request $request)
    {
        $listChildId = $request->only(['group_id_list']);
        $listChild = $this->adminGroup->getListGroupChildForPopup($listChildId);

        return view('user::admin-group-action.popup.popup-list-group', [
            'list_group' => $listChild
        ]);
    }

    /**
     * Ajax thêm danh sách vào table
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addCollectionListGroup(Request $request)
    {
        $dataRequest = $request->only(['collection']);

        if (isset($dataRequest['collection']) && count($dataRequest['collection']) > 0) {
            $listChild = $this->adminGroup->getListAll(['in' => $dataRequest['collection']]);
        } else {
            $listChild = [];
        }

        return view('user::admin-group-action.partial.list-tr-group', [
            'list_group' => $listChild,
        ]);
    }
}
