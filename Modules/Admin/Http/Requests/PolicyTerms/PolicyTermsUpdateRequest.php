<?php

namespace Modules\Admin\Http\Requests\PolicyTerms;

use Illuminate\Foundation\Http\FormRequest;

class PolicyTermsUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'faq_title' => 'required|max:250'
        ];
    }

    public function messages()
    {
        return [
            'faq_title.required' => __('admin::validation.faq.faq_title_required'),
            'faq_title.max' => __('admin::validation.faq.faq_title_max'),
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
