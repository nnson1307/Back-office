<?php

namespace Modules\Admin\Http\Requests\Faq;

use Illuminate\Foundation\Http\FormRequest;

class FaqStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $faqGroup = $this->input('faq_group');
        return [
            'faq_title' => 'required|max:250|unique:faq,faq_title,NULL,faq_id,faq_group,'.$faqGroup.',is_deleted,0',
            'faq_position' => 'integer|max:1000000|numeric|unique:faq,faq_position,NULL,faq_id,faq_group,'
                .$faqGroup.
                ',is_deleted,0',
            'faq_group' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'faq_title.required' => __('admin::validation.faq.faq_title_required'),
            'faq_title.max' => __('admin::validation.faq.faq_title_max'),
            'faq_title.unique' => __('admin::validation.faq.faq_title_unique'),
            'faq_position.integer' => __('admin::validation.faq.faq_position_number'),
            'faq_position.max' => __('admin::validation.faq.faq_group_position_max'),
            'faq_position.numeric' => __('admin::validation.faq.faq_position_number'),
            'faq_position.unique' => __('admin::validation.faq.faq_position_unique'),
            'faq_group.required' => __('admin::validation.faq.faq_group_required'),
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
