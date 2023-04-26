<?php


namespace Modules\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use MyCore\Models\Traits\ListTableTrait;

class FeedbackFormTable extends Model
{
    use ListTableTrait;
    public $timestamps = false;
    protected $table = 'feedback_form';
    protected $primaryKey = 'feedback_form_id';
    protected $fillable = [
        'feedback_form_id',
        'feedback_form_name',
        'feedback_form_description',
        'feedback_form_rating_min',
        'feedback_form_rating_max',
        'feedback_form_active',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    public function getListCore(&$filter = [])
    {
        $oSelect = $this;
        if (isset($filter['feedback_form_name']) && $filter['feedback_form_name']) {
            $oSelect = $oSelect->where('feedback_form_name', 'like', '%'.$filter['feedback_form_name'].'%');
        }
        if (isset($filter['feedback_form_description']) && $filter['feedback_form_description']) {
            $oSelect = $oSelect
                ->where('feedback_form_description', 'like', '%'.$filter['feedback_form_description'].'%');
        }
        if (isset($filter['feedback_form_rating_min']) && $filter['feedback_form_rating_min']) {
            $oSelect = $oSelect->where('feedback_form_rating_min', $filter['feedback_form_rating_min']);
        }
        if (isset($filter['feedback_form_rating_max']) && $filter['feedback_form_rating_max']) {
            $oSelect = $oSelect->where('feedback_form_rating_max', $filter['feedback_form_rating_max']);
        }
        if (isset($filter['feedback_form_active'])) {
            $oSelect = $oSelect->where('feedback_form_active', $filter['feedback_form_active']);
        }
        unset($filter['feedback_form_name']);
        unset($filter['feedback_form_description']);
        unset($filter['feedback_form_rating_min']);
        unset($filter['feedback_form_rating_max']);
        unset($filter['feedback_form_active']);
        $oSelect = $oSelect->orderBy('updated_at', 'DESC');
        return $oSelect;
    }

    public function checkName($data)
    {
        $oSelect = $this
            ->where('feedback_form_name', $data['feedback_form_name'])
            ->count();
        return $oSelect;
    }

    public function checkNameEdit($id, $data)
    {
        $oSelect = $this
            ->where('feedback_form_name', $data['feedback_form_name'])
            ->where('feedback_form_id', '<>', $id)
            ->count();
        return $oSelect;
    }

    public function createForm($data)
    {
        $oSelect = $this->insert($data);
        return $oSelect;
    }

    public function editForm($id, $data)
    {
        $oSelect = $this
            ->where('feedback_form_id', $id)
            ->update($data);
        return $oSelect;
    }

    public function getDetail($id)
    {
        $oSelect = $this->where('feedback_form_id', $id)->first();
        return $oSelect;
    }

    public function getAll()
    {
        $oSelect = $this
            ->where('feedback_form_active', '1')
            ->get();
        return $oSelect;
    }
}
