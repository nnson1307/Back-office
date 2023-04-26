<?php

namespace Modules\Admin\Http\Requests\Province;

use Illuminate\Foundation\Http\FormRequest;

class ProvinceUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $param=request()->all();

        return [
            'name' => 'required',
            'province_code' => 'required|unique:province,province_code,'
                . $param['province_id'] . ',province_id,is_deleted,0',
            'country_id' => 'required',
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
            'name.required' => __('admin::validation.province.name_required'),
            'province_code.required' => __('admin::validation.province.code_required'),
            'province_code.unique' => __('admin::validation.province.code_unique'),
            'country_id.required' => __('admin::validation.province.country_required')
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
