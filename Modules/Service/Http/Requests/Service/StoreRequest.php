<?php


namespace Modules\Service\Http\Requests\Service;


use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'service_name_vi' => 'required|max:250|unique:admin_service,service_name_vi,' . ',service_id',
            'service_name_en' => 'required|max:250|unique:admin_service,service_name_en,' . ',service_id',
            'description' => 'required|max:300',
        ];
    }

    public function messages()
    {
        return [

            'service_name_vi.required' => __('service::validation.service.service_name_required_vi'),
            'service_name_vi.max' => __('service::validation.service.service_name_max_vi'),
            'service_name_vi.unique' => __('service::validation.service.service_name_unique_vi'),
            'service_name_en.required' => __('service::validation.service.service_name_required_en'),
            'service_name_en.max' => __('service::validation.service.service_name_max_en'),
            'service_name_en.unique' => __('service::validation.service.service_name_unique_en'),
            'description.required' => __('service::validation.service.des_short_required'),
            'description.max' => __('service::validation.service.description_max'),
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