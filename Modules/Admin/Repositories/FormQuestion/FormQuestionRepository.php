<?php

namespace Modules\Admin\Repositories\FormQuestion;

use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Models\FeedbackQuestionTable;

class FormQuestionRepository implements FormQuestionRepositoryInterface
{
    protected $questionFeedBack;

    public function __construct(
        FeedbackQuestionTable $questionFeedBack
    ) {
        $this->questionFeedBack = $questionFeedBack;
    }
//    Lấy danh sách form
    public function getListQuestion($param)
    {
        $getList = $this->questionFeedBack->getListNew($param);
        return $getList;
    }

//    Kiểm tra tên trùng
//    Kiểm tra giá trị max lớn hơn min
//    Tạo form mới
    public function createQuestion($data)
    {
        $arr = [];
        $arr['feedback_form_id'] = strip_tags($data['feedback_form_id']);
        $arr['feedback_question_type'] = strip_tags($data['feedback_question_type']);
        $arr['feedback_question_title'] = strip_tags($data['feedback_question_title']);
        $arr['feedback_question_position'] = strip_tags($data['feedback_question_position']);
        $arr['feedback_question_active'] = strip_tags($data['feedback_question_active']);
        $arr['created_at'] = Carbon::now();
        $arr['updated_at'] = Carbon::now();
        $arr['created_by'] = Auth::id();
        $arr['updated_by'] = Auth::id();

        $checkName = $this->questionFeedBack->checkName($arr);
        if ($checkName != 0) {
            return response()->json([
                'error' => true,
                'data' => __('admin::form.question.index.same_as_title')
            ]);
        }

        if ($arr['feedback_question_position'] == null) {
            $arr['feedback_question_position'] = 0;
        }

        $this->questionFeedBack->createQuestion($arr);
        return response()->json([
            'error' => false,
            'data' => __('admin::form.question.index.create-question-success')
        ]);
    }

//    lấy chi tiết form
    public function getDetail($id)
    {
        $getDetail = $this->questionFeedBack->getDetail($id);
        return $getDetail;
    }

    //    Kiểm tra tên trùng
//    Kiểm tra giá trị max lớn hơn min
//    Tạo form mới
    public function editQuestion($data)
    {
        $arr = [];
        $id = strip_tags($data['feedback_question_id']);
        $arr['feedback_form_id'] = strip_tags($data['feedback_form_id']);
        $arr['feedback_question_type'] = strip_tags($data['feedback_question_type']);
        $arr['feedback_question_title'] = strip_tags($data['feedback_question_title']);
        $arr['feedback_question_position'] = strip_tags($data['feedback_question_position']);
        $arr['feedback_question_active'] = strip_tags($data['feedback_question_active']);
        $arr['updated_at'] = Carbon::now();
        $arr['updated_by'] = Auth::id();


        $checkName = $this->questionFeedBack->checkNameEdit($id, $arr);
        if ($checkName != 0) {
            return response()->json([
                'error' => true,
                'data' => __('admin::form.question.index.same_as_title')
            ]);
        }

        if ($arr['feedback_question_position'] == null) {
            $arr['feedback_question_position'] = 0;
        }

        $this->questionFeedBack->editQuestion($id, $arr);
        return response()->json([
            'error' => false,
            'data' => __('admin::form.question.index.edit-question-success')
        ]);
    }
}
