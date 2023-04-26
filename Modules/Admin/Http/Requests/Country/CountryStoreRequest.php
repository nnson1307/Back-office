<?php

namespace Modules\Admin\Http\Requests\Country;


use Illuminate\Foundation\Http\FormRequest;

class CountryStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'country_name' => 'required|unique:country,country_name,' . ',country_id,is_deleted,0',
            'country_code' => 'required|unique:country,country_code,' . ',country_id,is_deleted,0',
        ];
    }

    /**
     * Get the message validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'country_name.required' => __('admin::validation.country.name_required'),
            'country_name.unique' => __('admin::validation.country.name_unique'),
            'country_code.required' => __('admin::validation.country.code_required'),
            'country_code.unique' => __('admin::validation.country.code_unique'),
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
