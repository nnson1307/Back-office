<?php

namespace Modules\Admin\Repositories\FormAnswer;

use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Modules\Admin\Models\FeedbackAnswerTable;
use Modules\Admin\Models\FeedbackFormTable;
use Modules\Admin\Models\FeedbackQuestionTable;

class FormAnswerRepository implements FormAnswerRepositoryInterface
{
    protected $answerFeedBack;

    public function __construct(
        FeedbackAnswerTable $answerFeedBack
    ) {
        $this->answerFeedBack = $answerFeedBack;
    }

    /**
     * Lấy danh sách form
     * @param $param
     *
     * @return mixed
     */
    public function getListAnswer($param)
    {
        $getList = $this->answerFeedBack->getListNew($param);
        return $getList;
    }

    public function showAnswer($formId, $userId)
    {
        $answer = $this->answerFeedBack->getDetail($formId, $userId);
        $feedbackFormTable = new FeedbackFormTable();
        $form = $feedbackFormTable->getDetail($formId);
        $result = [
            'answer' => $answer,
            'form' => $form,
        ];
        return $result;
    }
}
