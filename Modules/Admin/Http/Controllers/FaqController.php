<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\Faq\FaqStoreRequest;
use Modules\Admin\Http\Requests\Faq\FaqUpdateRequest;
use Modules\Admin\Repositories\Faq\FaqRepositoryInterface;
use Modules\Admin\Repositories\FaqGroup\FaqGroupRepositoryInterface;

class FaqController extends Controller
{
    /**
     * @var FaqRepositoryInterface
     */
    protected $faq;

    /**
     * @var FaqGroupRepositoryInterface
     */
    protected $faqGroup;

    public function __construct(
        FaqRepositoryInterface $faq,
        FaqGroupRepositoryInterface $faqGroup
    ) {
        $this->faq = $faq;
        $this->faqGroup = $faqGroup;
    }

    /**
     * Trang chính
     *
     * @return Response
     */
    public function index()
    {
        $filter = request()->all();
        $data = $this->faq->getListNew($filter);
        $listFaqGroup = $this->faqGroup->getListAll();

        return view('admin::faq.index', [
            'list' => $data['listFaq'],
            'filter' => $data['filter'],
            'listFaqGroup' => $listFaqGroup
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
        $detail = $this->faq->detail($id);
        $listFaqGroup = $this->faqGroup->getListAll();

        if ($detail == null) {
            return redirect()->route('admin.faq.index');
        }

        return view('admin::faq.detail', [
            'detail' => $detail,
            'listFaqGroup' => $listFaqGroup,
        ]);
    }

    /**
     * Hiển thị form thêm câu hỏi hỗ trợ
     *
     * @return Response
     */
    public function create()
    {
        $listFaqGroup = $this->faqGroup->getListAll();

        return view('admin::faq.create', [
            'listFaqGroup' => $listFaqGroup,
        ]);
    }

    /**
     * Xử lý thêm câu hỏi hỗ trợ
     *
     * @param  FaqStoreRequest $request
     * @return Response
     */
    public function store(FaqStoreRequest $request)
    {
        $data = $request->all();
        $result = $this->faq->add($data);

        return response()->json($result);
    }

    /**
     * Hiển thị thông tin lên form chỉnh sửa
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $detail = $this->faq->detail($id);
        $listFaqGroup = $this->faqGroup->getListAll();

        if ($detail == null) {
            return redirect()->route('admin.faq.index');
        }

        return view('admin::faq.edit', [
            'detail' => $detail,
            'listFaqGroup' => $listFaqGroup,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param  FaqUpdateRequest $request
     * @return Response
     */
    public function update(FaqUpdateRequest $request)
    {
        $data = $request->all();
        $result = $this->faq->edit($data);

        return response()->json($result);
    }

    /**
     * Đánh dấu xóa nội dung
     *
     * @param Request $request
     * @return Response
     */
    public function destroy(Request $request)
    {
        $data = $request->only(['faq_id']);

        $result = $this->faq->remove($data['faq_id']);

        if ($result) {
            return response()->json([
                'error' => 0,
                'message' => __('admin::faq.popup.IS_DELETED'),
            ]);
        } else {
            return response()->json([
                'error' => 1,
                'message' => __('admin::faq.popup.ERROR'),
            ]);
        }
    }

    /**
     * Cập nhật trạng thái
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request)
    {
        $data = $request->only(['faq_id', 'is_actived']);

        $result = $this->faq->updateStatus($data['is_actived'], $data['faq_id']);

        if ($result) {
            return response()->json([
                'error' => 0,
                'message' => __('admin::faq.popup.UPDATED'),
            ]);
        } else {
            return response()->json([
                'error' => 1,
                'message' => __('admin::faq.popup.UPDATE_FAILED'),
            ]);
        }
    }
}
