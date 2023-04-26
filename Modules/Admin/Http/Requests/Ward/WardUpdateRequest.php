<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WardUpdateRequest extends FormRequest
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
            'name' => 'required|unique:ward,name,' . $param['ward_id'] . ',ward_id,district_id,'
                . $param['district_id'] . ',is_deleted,0',
            'ward_code' => 'required|unique:ward,ward_code,' . $param['ward_id'] . ',ward_id,is_deleted,0',
            'district_id' => 'required',
            'type' => 'required',
            'country_id' => 'required',
            'province_id' => 'required'
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
            'name.required' => __('admin::validation.ward.name_required'),
            'name.unique' => __('admin::validation.ward.name_unique'),
            'ward_code.required' => __('admin::validation.ward.code_required'),
            'ward_code.unique' => __('admin::validation.ward.code_unique'),
            'district_id.required' => __('admin::validation.ward.district_required'),
            'type.required' => __('admin::validation.ward.type_required'),
            'country_id.required' => __('admin::validation.ward.country_required'),
            'province_id.required' => __('admin::validation.ward.province_required')
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
