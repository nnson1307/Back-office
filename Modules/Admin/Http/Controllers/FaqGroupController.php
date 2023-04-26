<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\FaqGroup\FaqGroupStoreRequest;
use Modules\Admin\Http\Requests\FaqGroup\FaqGroupUpdateRequest;
use Modules\Admin\Repositories\FaqGroup\FaqGroupRepositoryInterface;

class FaqGroupController extends Controller
{
    /**
     * @var FaqGroupRepositoryInterface
     */
    protected $faqGroup;

    public function __construct(FaqGroupRepositoryInterface $faqGroup)
    {
        $this->faqGroup = $faqGroup;
    }

    /**
     * Trang chính
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $filter = request()->all();
        $data = $this->faqGroup->getListNew($filter);

        return view('admin::faq-group.index', [
            'list' => $data['listFaqGroup'],
            'filter' => $data['filter'],
        ]);
    }

    /**
     * Hiển thị thông tin chi tiết
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $detail = $this->faqGroup->detail($id);
        $parentList = $this->faqGroup->getListAll(['notin' => [$id]]);

        return view('admin::faq-group.detail', [
            'detail' => $detail,
            'parentList' => $parentList
        ]);
    }

    /**
     * Hiển thị form thêm nhóm nội dung
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $parentList = $this->faqGroup->getListAll();
        return view('admin::faq-group.create', [
            'parentList' => $parentList
        ]);
    }

    /**
     * Xử lý thêm nhóm nội dung
     *
     * @param  FaqGroupStoreRequest $request
     * @return Response
     */
    public function store(FaqGroupStoreRequest $request)
    {
        $data = $request->all();
        $result = $this->faqGroup->add($data);

        return response()->json($result);
    }

    /**
     * Hiển thị form chỉnh sửa nhóm nội dung
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $detail = $this->faqGroup->detail($id);
        $parentList = $this->faqGroup->getListAll(['notin' => [$id]]);

        return view('admin::faq-group.edit', [
            'detail' => $detail,
            'parentList' => $parentList
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  FaqGroupUpdateRequest $request
     * @return Response
     */
    public function update(FaqGroupUpdateRequest $request)
    {
        $data = $request->all();
        $result = $this->faqGroup->edit($data, $data['faq_group_id']);

        return response()->json($result);
    }

    /**
     * Đánh dấu xóa nhóm nội dung
     *
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $data = $request->only(['faq_group_id']);

        $result = $this->faqGroup->remove($data['faq_group_id']);

        if ($result) {
            return response()->json([
                'error' => 0,
                'message' => __('admin::faq-group.popup.IS_DELETED'),
            ]);
        } else {
            return response()->json([
                'error' => 1,
                'message' => __('admin::faq-group.popup.ERROR'),
            ]);
        }
    }

    /**
     * Ajax cập nhật trang thái
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request)
    {
        $data = $request->only(['faq_group_id', 'is_actived']);

        $result = $this->faqGroup->updateStatus($data['is_actived'], $data['faq_group_id']);

        if ($result) {
            return response()->json([
                'error' => 0,
                'message' => __('admin::faq-group.popup.UPDATED'),
            ]);
        } else {
            return response()->json([
                'error' => 1,
                'message' => __('admin::faq-group.popup.UPDATE_FAILED'),
            ]);
        }
    }
}
