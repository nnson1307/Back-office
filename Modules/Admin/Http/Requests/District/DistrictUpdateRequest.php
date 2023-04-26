<?php

namespace Modules\Admin\Http\Requests\District;

use Illuminate\Foundation\Http\FormRequest;

class DistrictUpdateRequest extends FormRequest
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
            'name' => 'required|unique:district,name,' . $param['district_id'] . ',district_id,province_id,'
                . $param['province_id'] . ',is_deleted,0',
            'district_code' => 'required|unique:district,district_code,'
                . $param['district_id'] . ',district_id,is_deleted,0',
            'province_id' => 'required',
            'type' => 'required',
            'country_id' => 'required'
        ];
    }

    /**
     * Get the message validation rules that apply to the request .
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => __('admin::validation.district.name_required'),
            'name.unique' => __('admin::validation.district.name_unique'),
            'district_code.required' => __('admin::validation.district.code_required'),
            'district_code.unique' => __('admin::validation.district.code_unique'),
            'province_id.required' => __('admin::validation.district.province_required'),
            'type.required' => __('admin::validation.district.type_required'),
            'country_id.required' => __('admin::validation.district.country_required')
        ];
    }

    /**
     * Determine if the user is authorized to make this request .
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
