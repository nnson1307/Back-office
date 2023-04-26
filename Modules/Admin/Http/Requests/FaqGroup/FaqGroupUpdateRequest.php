<?php

namespace Modules\Admin\Http\Requests\FaqGroup;

use Illuminate\Foundation\Http\FormRequest;

class FaqGroupUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $faqGroupId = $this->input('faq_group_id');
        $parent = $this->input('parent_id');
        return [
            'faq_group_title' => 'required|max:250|unique:faq_group,faq_group_title,'.$faqGroupId.',faq_group_id,is_deleted,0',
            'faq_group_position' => 'integer|max:1000000|numeric|unique:faq_group,faq_group_position,'
                .$faqGroupId.
                ',faq_group_id,parent_id,'.$parent.',is_deleted,0',
        ];
    }

    public function messages()
    {
        return [
            'faq_group_title.required' => __('admin::validation.faq_group.faq_group_title_required'),
            'faq_group_title.max' => __('admin::validation.faq_group.faq_group_title_max'),
            'faq_group_title.unique' => __('admin::validation.faq_group.faq_group_title_unique'),
            'faq_group_position.numeric' => __('admin::validation.faq_group.faq_group_position_number'),
            'faq_group_position.max' => __('admin::validation.faq_group.faq_group_position_max'),
            'faq_group_position.integer' => __('admin::validation.faq_group.faq_group_position_number'),
            'faq_group_position.unique' => __('admin::validation.faq_group.faq_group_position_unique')
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
