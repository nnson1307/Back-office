<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class FeedbackQuestionTable extends Model
{
    use ListTableTrait;
    public $timestamps = false;
    protected $table = 'feedback_question';
    protected $primaryKey = 'feedback_question_id';
    protected $fillable = [
        'feedback_question_id',
        'feedback_form_id',
        'feedback_question_type',
        'feedback_question_title',
        'feedback_question_position',
        'feedback_question_active',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    public function getListCore(&$filters = [])
    {
        $oSelect = $this
            ->leftJoin(
                'feedback_form',
                'feedback_form.feedback_form_id',
                'feedback_question.feedback_form_id'
            );
        if (isset($filters['feedback_form_name']) && $filters['feedback_form_name']) {
            $oSelect = $oSelect
                ->where('feedback_form.feedback_form_name', 'like', '%'.$filters['feedback_form_name'].'%');
        }
        if (isset($filters['feedback_question_type']) && $filters['feedback_question_type']) {
            $oSelect = $oSelect
                ->where('feedback_question.feedback_question_type', $filters['feedback_question_type']);
        }
        if (isset($filters['feedback_question_title']) && $filters['feedback_question_title']) {
            $oSelect = $oSelect
                ->where(
                    'feedback_question.feedback_question_title',
                    'like',
                    '%'.$filters['feedback_question_title'].'%'
                );
        }
        if (isset($filters['feedback_question_position'])) {
            $oSelect = $oSelect
                ->where('feedback_question.feedback_question_position', $filters['feedback_question_position']);
        }
        if (isset($filters['feedback_question_active']) && $filters['feedback_question_active']) {
            $oSelect = $oSelect
                ->where('feedback_question.feedback_question_active', $filters['feedback_question_active']);
        }
        $oSelect = $oSelect->select('feedback_question.*', 'feedback_form.feedback_form_name as feedback_form_name');
        $oSelect = $oSelect->orderBy('feedback_question_position', 'DESC')->orderBy('updated_at', 'DESC');
        unset($filters['feedback_form_name']);
        unset($filters['feedback_question_type']);
        unset($filters['feedback_question_title']);
        unset($filters['feedback_question_position']);
        unset($filters['feedback_question_active']);
        return $oSelect;
    }

    public function checkName($data)
    {
        $oSelect = $this
            ->where('feedback_question_type', $data['feedback_question_type'])
            ->where('feedback_question_title', $data['feedback_question_title'])
            ->count();
        return $oSelect;
    }

    public function checkNameEdit($id, $data)
    {
        $oSelect = $this
            ->where('feedback_question_type', $data['feedback_question_type'])
            ->where('feedback_question_title', $data['feedback_question_title'])
            ->where('feedback_question_id', '<>', $id)
            ->count();
        return $oSelect;
    }

    public function createQuestion($data)
    {
        $oSelect = $this->insert($data);
        return $oSelect;
    }

    public function getDetail($id)
    {
        $oSelect = $this
            ->where('feedback_question_id', $id)->first();
        return $oSelect;
    }

    public function editQuestion($id, $data)
    {
        $oSelect = $this
            ->where('feedback_question_id', $id)
            ->update($data);
        return $oSelect;
    }
}
