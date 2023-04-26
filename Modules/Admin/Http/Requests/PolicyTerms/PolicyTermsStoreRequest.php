<?php

namespace Modules\Admin\Http\Requests\PolicyTerms;

use Illuminate\Foundation\Http\FormRequest;

class PolicyTermsStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $faqType = $this->input('faq_type');
        return [
            'faq_title' => 'required|max:250|unique:faq,faq_title,NULL,faq_id,faq_type,'.$faqType.',is_deleted,0',
        ];
    }

    public function messages()
    {
        return [
            'faq_title.required' => __('admin::validation.faq.faq_title_required'),
            'faq_title.max' => __('admin::validation.faq.faq_title_max'),
            'faq_title.unique' => __('admin::validation.faq.faq_title_unique'),
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
