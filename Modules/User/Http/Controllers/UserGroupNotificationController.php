<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 9/30/2019
 * Time: 10:29 AM
 */

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Modules\User\Models\FilterConditionTypeTable;
use Modules\User\Models\MyStoreFilterDetailTable;
use Modules\User\Models\MyStoreFilterGroupTable;
use Modules\User\Repositories\UserGroup\UserGroupRepositoryInterface;
use Modules\User\Requests\UserGroup\StoreRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExample;
use Modules\User\Requests\UserGroup\UpdateRequest;

class UserGroupNotificationController extends Controller
{
    protected $filterConditionType;
    protected $myStoreFilterGroup;
    protected $userGroup;
    protected $userGroupDetail;

    public function __construct(
        FilterConditionTypeTable $filterConditionType,
        MyStoreFilterGroupTable $myStoreFilterGroup,
        UserGroupRepositoryInterface $userGroup,
        MyStoreFilterDetailTable $userGroupDetail
    ) {
        $this->filterConditionType = $filterConditionType;
        $this->myStoreFilterGroup = $myStoreFilterGroup;
        $this->userGroup = $userGroup;
        $this->userGroupDetail = $userGroupDetail;
    }

    /**
     * Index
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $filter = request()->all();
        $data = $this->userGroup->list($filter);
        return view('user::user-group-notification.index', [
            'list'   => $data['list'],
            'filter' => $data['filter'],
        ]);
    }

    /**
     * Tạo nhóm khách hàng động
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createAuto()
    {
        $user = $this->userGroup->getAllUser();
        //Danh sách điều kiện.
        $filterConditionType = $this->filterConditionType->getList();
        //Danh sách nhóm đã tạo.
        $myStoreFilterGroup = $this->myStoreFilterGroup->getOption();
        return view('user::user-group-notification.auto.create', [
            'filterConditionType' => $filterConditionType,
            'myStoreFilterGroup'  => $myStoreFilterGroup,
            'user'                => $user,
        ]);
    }

    /**
     * Tạo nhóm khách hàng tự định nghĩa.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createUserDefine()
    {
        $user = $this->userGroup->getAllUser();
        //Danh sách điều kiện.
        $filterConditionType = $this->filterConditionType->getList();
        //Danh sách nhóm đã tạo.
        $myStoreFilterGroup = $this->myStoreFilterGroup->getOption();
        return view('user::user-group-notification.user-define.create', [
            'filterConditionType' => $filterConditionType,
            'myStoreFilterGroup'  => $myStoreFilterGroup,
            'user'                => $user,
        ]);
    }

    /**
     * Tìm kiếm tất cả user.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function searchAllUser(Request $request)
    {
        $filters = $request->all();

        $result = $this->userGroup->searchAllUser($filters);

        return $result;
    }

    /**
     * Lấy danh sách các điều kiện(4).
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function getCondition(Request $request)
    {
        $arrayCondition = $request->arrayCondition;
        $getCondition = $this->userGroup->getCondition($arrayCondition);
        return $getCondition;
    }

    /**
     * Danh sách nhóm đã tạo.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserGroup()
    {
        //Danh sách nhóm đã tạo.
        $myStoreFilterGroup = $this->myStoreFilterGroup->getOption();
        return response()->json($myStoreFilterGroup);
    }

    /**
     * Thêm nhóm khách hàng động
     *
     * @param StoreRequest $request
     *
     * @return mixed
     */
    public function storeAuto(StoreRequest $request)
    {
        $resq = $request->all();

        $flag = true;
        if (isset($resq['arrayResultA']) && isset($resq['arrayResultB'])) {
            if (
                $resq['arrayResultA'][0]['condition_id'] == null
                && $resq['arrayResultB'][0]['condition_id'] == null
            ) {
                $flag = false;
            } elseif (
                $resq['arrayResultA'][0]['condition_id'] == null
                && count($resq['arrayResultB']) == 1
                && $resq['arrayResultB'][0]['condition_id'] == 1
                && $resq['arrayResultB'][0]['value1'] == null
            ) {
                $flag = false;
            } elseif (
                $resq['arrayResultB'][0]['condition_id'] == null
                && count($resq['arrayResultA']) == 1
                && $resq['arrayResultA'][0]['condition_id'] == 1
                && $resq['arrayResultA'][0]['value1'] == null
            ) {
                $flag = false;
            } elseif (
                count($resq['arrayResultA']) == 1
                && $resq['arrayResultA'][0]['condition_id'] == 1
                && $resq['arrayResultA'][0]['value1'] == null
                && count($resq['arrayResultB']) == 1
                && $resq['arrayResultB'][0]['condition_id'] == 1
                && $resq['arrayResultB'][0]['value1'] == null
            ) {
                $flag = false;
            }
        } elseif (isset($resq['arrayResultA']) && !isset($resq['arrayResultB'])) {
            if (
                $resq['arrayResultA'][0]['condition_id'] == null
            ) {
                $flag = false;
            } elseif (count($resq['arrayResultA']) == 1
                && $resq['arrayResultA'][0]['condition_id'] == 1
                && $resq['arrayResultA'][0]['value1'] == null) {
                $flag = false;
            }
        } elseif (isset($resq['arrayResultB']) && !isset($resq['arrayResultA'])) {
            if (
                $resq['arrayResultB'][0]['condition_id'] == null
            ) {
                $flag = false;
            } elseif (count($resq['arrayResultB']) == 1
                && $resq['arrayResultB'][0]['condition_id'] == 1
                && $resq['arrayResultB'][0]['value1'] == null) {
                $flag = false;
            }
        }
        if ($flag == false) {
            return response()->json(
                [
                    'errors' => true,
                    'message' => __(
                        'user::validation.user_group.PLEASE_ENTER_CONDITION'
                    )
                ]
            );
        }
        if (!isset($resq['arrayResultA'])) {
            $resq['arrayResultA'] = [
                'condition_id' => null,
                'value1' => null,
                'value2' => null,
            ];
        }
        if (!isset($resq['arrayResultB'])) {
            $resq['arrayResultB'] = [
                'condition_id' => null,
                'value1' => null,
                'value2' => null,
            ];
        }

        $data=[
            'name'=>strip_tags($resq['name']),
            'andOrA'=>$resq['andOrA'],
            'andOrB'=>$resq['andOrB'],
            'arrayResultA'=>$resq['arrayResultA'],
            'arrayResultB'=>$resq['arrayResultB'],
        ];
        $result = $this->userGroup->storeAuto($data);
        return $result;
    }

    /**
     * Download file excel mẫu.
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportExcelExample()
    {
        if (ob_get_level() > 0) {
            ob_end_clean();
        }
        return Excel::download(new UserExample(), 'customer_example.xlsx');
    }

    /**
     * Import excel
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function importExcel(Request $request)
    {
        $file = $request->file('file');
        $arrayPhoneExist = [];
        $result = $this->userGroup->importExcel($file, $arrayPhoneExist);
        return $result;
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editAuto($id)
    {
        $data = $this->userGroup->getItem($id);
        if ($data != null ) {
            $userGroupDetail = $this->userGroupDetail->getUserGroupDetail($id);
            //Danh sách điều kiện.
            $filterConditionType = $this->filterConditionType->getList();

            //Danh sách nhóm đã tạo.
            $myStoreFilterGroup = $this->myStoreFilterGroup->getOption();

            $result = $this->userGroup->computeUserInUserGroupAuto(['id'=>$id]);
            return view('user::user-group-notification.auto.edit', [
                'data'                => $data,
                'filterConditionType' => $filterConditionType,
                'myStoreFilterGroup'  => $myStoreFilterGroup,
                'userGroupDetail'     => $userGroupDetail,
                'id'=>$id,
                'userInvalid'         => $result['totalUser']
            ]);
        } else {
            return redirect('error-404');
        }

    }

    /**
     * Update user group auto.
     * @param Request $request
     * @return mixed
     */
    public function updateAuto(UpdateRequest $request)
    {
        $resq = $request->all();
        $flag = true;
        if (isset($resq['arrayResultA']) && isset($resq['arrayResultB'])) {
            if (
                $resq['arrayResultA'][0]['condition_id'] == null
                && $resq['arrayResultB'][0]['condition_id'] == null
            ) {
                $flag = false;
            } elseif (
                $resq['arrayResultA'][0]['condition_id'] == null
                && count($resq['arrayResultB']) == 1
                && $resq['arrayResultB'][0]['condition_id'] == 1
                && $resq['arrayResultB'][0]['value1'] == null
            ) {
                $flag = false;
            } elseif (
                $resq['arrayResultB'][0]['condition_id'] == null
                && count($resq['arrayResultA']) == 1
                && $resq['arrayResultA'][0]['condition_id'] == 1
                && $resq['arrayResultA'][0]['value1'] == null
            ) {
                $flag = false;
            } elseif (
                count($resq['arrayResultA']) == 1
                && $resq['arrayResultA'][0]['condition_id'] == 1
                && $resq['arrayResultA'][0]['value1'] == null
                && count($resq['arrayResultB']) == 1
                && $resq['arrayResultB'][0]['condition_id'] == 1
                && $resq['arrayResultB'][0]['value1'] == null
            ) {
                $flag = false;
            }
        } elseif (isset($resq['arrayResultA']) && !isset($resq['arrayResultB'])) {
            if (
                $resq['arrayResultA'][0]['condition_id'] == null
            ) {
                $flag = false;
            } elseif (count($resq['arrayResultA']) == 1
                && $resq['arrayResultA'][0]['condition_id'] == 1
                && $resq['arrayResultA'][0]['value1'] == null) {
                $flag = false;
            }
        } elseif (isset($resq['arrayResultB']) && !isset($resq['arrayResultA'])) {
            if (
                $resq['arrayResultB'][0]['condition_id'] == null
            ) {
                $flag = false;
            } elseif (count($resq['arrayResultB']) == 1
                && $resq['arrayResultB'][0]['condition_id'] == 1
                && $resq['arrayResultB'][0]['value1'] == null) {
                $flag = false;
            }
        }
        if ($flag == false) {
            return response()->json(
                [
                    'errors' => true,
                    'message' => __(
                        'user::validation.user_group.PLEASE_ENTER_CONDITION'
                    )
                ]
            );
        }
        if (!isset($resq['arrayResultA'])) {
            $resq['arrayResultA'] = [
                'condition_id' => null,
                'value1' => null,
                'value2' => null,
            ];
        }
        if (!isset($resq['arrayResultB'])) {
            $resq['arrayResultB'] = [
                'condition_id' => null,
                'value1' => null,
                'value2' => null,
            ];
        }

        $result = $this->userGroup->updateAuto($resq);
        return $result;
    }

    /**
     * Tìm kiếm user có trong mảng.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function searchWhereInUser(Request $request)
    {
        $data = $request->all();
        return $this->userGroup->searchWhereInUser($data);
    }

    /**
     * Thêm user đã chọn cho group.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function addUserGroupDefine(Request $request)
    {
        $data = ($request->all());
        return $this->userGroup->addUserGroupDefine($data);
    }

    /**
     * Thêm nhóm định nghĩa
     *
     * @param StoreRequest $request
     *
     * @return mixed
     */
    public function storeUserGroupDefine(StoreRequest $request)
    {
        $data = $request->all();
        return $this->userGroup->storeUserGroupDefine($data);
    }

    /**
     * Load sang trang edit nhóm động.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editUserDefine($id)
    {
        $data = $this->userGroup->getItem($id);
        if ($data != null) {
            $user = $this->userGroup->userGroupDefineDetail($id);
            return view('user::user-group-notification.user-define.edit', [
                'id'   => $id,
                'user' => $user,
                'data' => $data
            ]);
        } else {
            return redirect('error-404');
        }
    }

    /**
     * Danh sách user của nhóm động.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserByGroupDefine(Request $request)
    {
        $id = $request->id;
        $user = $this->userGroup->userGroupDefineDetail($id);
        return response()->json($user);
    }

    /**
     * Cập nhật nhóm tự định nghĩa.
     * @param UpdateRequest $request
     * @return mixed
     */
    public function updateUserGroupDefine(UpdateRequest $request)
    {
        $data = $request->all();
        return $this->userGroup->updateUserGroupDefine($data);
    }

    /**
     * Tính số lượng user trong nhóm động.
     * @param Request $request
     */
    public function computeUserInUserGroupAuto(Request $request)
    {
        $data = $request->all();
        $result = $this->userGroup->computeUserInvalid($data);
        return $result;
    }

    /**
     * Chi tiết nhóm auto.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function detailAuto($id)
    {
        $data = $this->userGroup->getItem($id);
        if ($data != null ) {
            $userGroupDetail = $this->userGroupDetail->getUserGroupDetail($id);
            //Danh sách điều kiện.
            $filterConditionType = $this->filterConditionType->getList();

            //Danh sách nhóm đã tạo.
            $myStoreFilterGroup = $this->myStoreFilterGroup->getOption();

            $result = $this->userGroup->computeUserInUserGroupAuto(['id'=>$id]);
            return view('user::user-group-notification.auto.detail', [
                'data'                => $data,
                'filterConditionType' => $filterConditionType,
                'myStoreFilterGroup'  => $myStoreFilterGroup,
                'userGroupDetail'     => $userGroupDetail,
                'id'=>$id,
                'userInvalid'         => $result['totalUser']
            ]);
        } else {
            return redirect('error-404');
        }
    }

    /**
     * Chi tiết nhóm tự định nghĩa.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detailUserDefine($id)
    {
        $data = $this->userGroup->getItem($id);
        if ($data != null) {
            $user = $this->userGroup->userGroupDefineDetail($id);
            return view('user::user-group-notification.user-define.detail', [
                'id'   => $id,
                'user' => $user,
                'data' => $data
            ]);
        } else {
            return redirect('error-404');
        }
    }
}