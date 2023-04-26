<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class FeedbackAnswerTable extends Model
{
    use ListTableTrait;
    public $timestamps = false;
    protected $table = 'feedback_answer';
    protected $primaryKey = 'feedback_answer_id';
    protected $fillable = [
        'feedback_answer_id',
        'feedback_question_id',
        'user_id',
        'feedback_answer_value',
        'created_at',
        'updated_at',
    ];

    public function getListCore(&$filters = [])
    {
        $oSelect = $this->join('user', 'user.user_id', 'feedback_answer.user_id')
            ->join(
                'feedback_question',
                'feedback_question.feedback_question_id',
                'feedback_answer.feedback_question_id'
            )
            ->join(
                'feedback_form',
                'feedback_form.feedback_form_id',
                'feedback_question.feedback_form_id'
            );

        if (isset($filters['keyword'])) {
            $oSelect = $oSelect->where(function ($query) use ($filters) {
                $query->where('user.fullname', 'like', '%' . $filters['keyword'] . '%');
                $query->orWhere('user.email', 'like', '%' . $filters['keyword'] . '%');
                $query->orWhere('user.phone', 'like', '%' . $filters['keyword'] . '%');
                $query->orWhere('feedback_question.feedback_question_title', 'like', '%' . $filters['keyword'] . '%');
            });
            unset($filters['keyword']);
        }

        $oSelect = $oSelect
            ->select(
                'user.*',
                'feedback_answer.*',
                'feedback_form.*',
                'feedback_question.feedback_question_title as feedback_question_title'
            )
            ->groupBy('feedback_form.feedback_form_id')
            ->orderBy($this->table . '.feedback_answer_id', 'DESC');
        return $oSelect;
    }

    public function getDetail($formId, $userId)
    {
        $oSelect = $this->join('user', 'user.user_id', 'feedback_answer.user_id')
            ->join(
                'feedback_question',
                'feedback_question.feedback_question_id',
                'feedback_answer.feedback_question_id'
            )
            ->join(
                'feedback_form',
                'feedback_form.feedback_form_id',
                'feedback_question.feedback_form_id'
            );

        $oSelect = $oSelect
            ->select(
                'user.*',
                'feedback_answer.*',
                'feedback_form.*',
                'feedback_question.feedback_question_title as feedback_question_title'
            )
            ->where('feedback_form.feedback_form_id', $formId)
            ->where('feedback_form.feedback_form_active', 1)
            ->where('feedback_question.feedback_question_active', 1)
            ->where($this->table . '.user_id', $userId)
//            ->orderBy($this->table . '.feedback_answer_id', 'DESC')
            ->get();
        return $oSelect;
    }
}
