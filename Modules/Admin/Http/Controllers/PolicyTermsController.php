<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\PolicyTerms\PolicyTermsStoreRequest;
use Modules\Admin\Http\Requests\PolicyTerms\PolicyTermsUpdateRequest;
use Modules\Admin\Repositories\Faq\FaqRepositoryInterface;

class PolicyTermsController extends Controller
{
    /**
     * @var FaqRepositoryInterface
     */
    protected $faq;

    /**
     * @var array
     */
    protected $faqType = [
        'privacy_policy' => 'Chính sách bảo mật',
        'terms_use' => 'Điều khoản sử dụng'
    ];

    public function __construct(FaqRepositoryInterface $faq)
    {
        $this->faq = $faq;
    }

    /**
     * Trang chính
     *
     * @return Response
     */
    public function index()
    {
        $filter = request()->all();
        $data = $this->faq->getListPolicyTerms($filter);

        return view('admin::faq.policy-terms.index', [
            'list' => $data['listFaq'],
            'filter' => $data['filter'],
            'faqType' => $this->faqType,
        ]);
    }

    public function show($id)
    {
        $detail = $this->faq->detail($id);

        if ($detail == null) {
            return redirect()->route('admin.policy-terms.index');
        }

        return view('admin::faq.policy-terms.detail', [
            'detail' => $detail,
            'faqType' => $this->faqType,
        ]);
    }

    /**
     * Hiển thị trang thêm
     *
     * @return Response
     */
    public function create()
    {
        return view('admin::faq.policy-terms.create', [
            'faqType' => $this->faqType,
        ]);
    }

    /**
     * Xử lý thêm chính sách bảo mật và điều khoản sử dụng
     *
     * @param  PolicyTermsStoreRequest $request
     * @return Response
     */
    public function store(PolicyTermsStoreRequest $request)
    {
        $data = $request->all();
        $check = $this->checkFaqType($data['faq_type']);

        if ($check) {
            return response()->json([
                'error' => 1,
                'message' => __('admin::validation.faq.faq_type_only')
            ]);
        }
        $data['is_actived'] = 1;
        $result = $this->faq->add($data, $data['faq_type']);

        return response()->json($result);
    }

    /**
     * Hiển thị thông tin ra form chỉnh sửa
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $detail = $this->faq->detail($id);

        if ($detail == null) {
            return redirect()->route('admin.policy-terms.index');
        }

        return view('admin::faq.policy-terms.edit', [
            'detail' => $detail,
            'faqType' => $this->faqType,
        ]);
    }

    /**
     * Cập nhật thông tin
     * @param  PolicyTermsUpdateRequest $request
     * @return Response
     */
    public function update(PolicyTermsUpdateRequest $request)
    {
        $data = $request->all();
        $data['is_actived'] = 1;
        $result = $this->faq->edit($data);

        return response()->json($result);
    }

    /**
     * Đánh dấu xóa
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
     * Kiểm tra chính sách bảo mật và điều khoản sử dụng đã tồn tại chưa
     *
     * @param $faqType
     * @return bool
     */
    private function checkFaqType($faqType)
    {
        $result = $this->faq->checkFaqType($faqType);

        return $result;
    }
}
