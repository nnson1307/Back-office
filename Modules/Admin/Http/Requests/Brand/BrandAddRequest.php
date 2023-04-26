<?php

namespace Modules\Admin\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class BrandAddRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'brand_name' => 'required|max:250|unique:brand,brand_name,' . ',brand_id,is_deleted,0',
            'brand_code' => 'required|max:50|regex:/^[a-zA-Z0-9]+$/i|unique:brand,brand_code,'
                .'NULL,brand_id,is_deleted,0',
            'company_name' => 'required|max:250|unique:brand,company_name,NULL,brand_id,is_deleted,0',
            'display_name' => 'required|max:250|unique:brand,display_name,NULL,brand_id,is_deleted,0',
            'hotline' => 'numeric|unique:brand,hotline,NULL,brand_id,is_deleted,0',
            'brand_url' => 'nullable|max:250|regex:/^[a-zA-Z0-9_\-\.]{0,50}$/i|unique:brand,brand_url,NULL,brand_id,is_deleted,0',
            'firebase_key' => 'nullable|max:250'
        ];
    }

    public function messages()
    {
        return [

            'brand_name.required' => __('admin::validation.brand.brand_name_required'),
            'brand_name.unique' => __('admin::validation.brand.brand_name_unique'),
            'brand_name.max' => __('admin::validation.brand.brand_name_max'),
            'brand_code.required' => __('admin::validation.brand.brand_code_required'),
            'brand_code.unique' => __('admin::validation.brand.brand_code_unique'),
            'brand_code.max' => __('admin::validation.brand.brand_code_max'),
            'brand_code.regex' => __('admin::validation.brand.brand_code_regex'),
            'company_name.required' => __('admin::validation.brand.company_name_required'),
            'company_name.unique' => __('admin::validation.brand.company_name_unique'),
            'company_name.max' => __('admin::validation.brand.company_name_max'),
            'display_name.required' => __('admin::validation.brand.display_name_required'),
            'display_name.unique' => __('admin::validation.brand.display_name_unique'),
            'display_name.max' => __('admin::validation.brand.display_name_max'),
            'brand_url.unique' => __('admin::validation.brand.brand_url_unique'),
            'brand_url.max' => __('admin::validation.brand.brand_url_max'),
            'brand_url.regex' => __('admin::validation.brand.brand_url_regex'),
            'hotline.numeric' => __('admin::validation.brand.input_hotline'),
            'hotline.unique' => __('admin::validation.brand.hotline_using'),
            'hotline.max' => __('admin::validation.brand.max_size_hotline'),
            'firebase_key.max' => __('admin::validation.brand.max_firebase_key'),
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
