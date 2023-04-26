<?php

namespace Modules\Admin\Repositories\Form;

use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Models\FeedbackAnswerTable;
use Modules\Admin\Models\FeedbackFormTable;
use Modules\Admin\Models\FeedbackQuestionTable;
use Modules\Admin\Repositories\Form\FormRepositoryInterface;

class FormRepository implements FormRepositoryInterface
{
    protected $formFeedBack;
    protected $answerFeedBack;
    protected $questionFeedBack;

    public function __construct(
        FeedbackAnswerTable $answerFeedBack,
        FeedbackFormTable $formFeedBack,
        FeedbackQuestionTable $questionFeedBack
    ) {
        $this->answerFeedBack = $answerFeedBack;
        $this->formFeedBack = $formFeedBack;
        $this->questionFeedBack = $questionFeedBack;
    }
//    Lấy danh sách form
    public function getListForm(array $filter = [])
    {
        $getList = $this->formFeedBack->getListNew($filter);
        return $getList;
    }

//    Kiểm tra tên trùng
//    Kiểm tra giá trị max lớn hơn min
//    Tạo form mới
    public function createForm($data)
    {
        $arr = [];
        $arr['feedback_form_name'] = strip_tags($data['feedback_form_name']);
        $arr['feedback_form_description'] = strip_tags($data['feedback_form_description']);
        $arr['feedback_form_rating_min'] = strip_tags($data['feedback_form_rating_min']);
        $arr['feedback_form_rating_max'] = strip_tags($data['feedback_form_rating_max']);
        $arr['feedback_form_active'] = strip_tags($data['feedback_form_active']);
        $arr['created_at'] = Carbon::now();
        $arr['updated_at'] = Carbon::now();
        $arr['created_by'] = Auth::id();
        $arr['updated_by'] = Auth::id();

        $checkName = $this->formFeedBack->checkName($arr);
        if ($checkName != 0) {
            return response()->json([
                'error' => true,
                'data' => __('admin::form.form.index.same_as_name')
            ]);
        }

        if ($arr['feedback_form_rating_max'] <= $arr['feedback_form_rating_min']) {
            return response()->json([
                'error' => true,
                'data' => __('admin::form.form.index.rating_min_max')
            ]);
        }

        $this->formFeedBack->createForm($arr);
        return response()->json([
            'error' => false,
            'data' => __('admin::form.form.index.create-form-success')
        ]);
    }

//    lấy chi tiết form
    public function getDetail($id)
    {
        $getDetail = $this->formFeedBack->getDetail($id);
        return $getDetail;
    }

    //    Kiểm tra tên trùng
//    Kiểm tra giá trị max lớn hơn min
//    Tạo form mới
    public function editForm($data)
    {
        $arr = [];
        $id = strip_tags($data['feedback_form_id']);
        $arr['feedback_form_name'] = strip_tags($data['feedback_form_name']);
        $arr['feedback_form_description'] = strip_tags($data['feedback_form_description']);
        $arr['feedback_form_rating_min'] = strip_tags($data['feedback_form_rating_min']);
        $arr['feedback_form_rating_max'] = strip_tags($data['feedback_form_rating_max']);
        $arr['feedback_form_active'] = strip_tags($data['feedback_form_active']);
        $arr['updated_at'] = Carbon::now();
        $arr['updated_by'] = Auth::id();

        $checkName = $this->formFeedBack->checkNameEdit($id, $arr);
        if ($checkName != 0) {
            return response()->json([
                'error' => true,
                'data' => __('admin::form.form.index.same_as_name')
            ]);
        }

        if ($arr['feedback_form_rating_max'] <= $arr['feedback_form_rating_min']) {
            return response()->json([
                'error' => true,
                'data' => __('admin::form.form.index.rating_min_max')
            ]);
        }

        $this->formFeedBack->editForm($id, $arr);
        return response()->json([
            'error' => false,
            'data' => __('admin::form.form.index.edit-form-success')
        ]);
    }

    public function getAll()
    {
        $getAll = $this->formFeedBack->getAll();
        return $getAll;
    }
}
