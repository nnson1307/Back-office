<?php

namespace Modules\User\Http\Requests\AdminGroup;

use Illuminate\Foundation\Http\FormRequest;

class AdminGroupStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'group_name' => 'required|max:100|unique:admin_group,group_name,NULL,group_id,is_deleted,0'
        ];
    }

    public function messages()
    {
        return [
            'group_name.required' => __('user::validation.admin_group.PLEASE_ENTER_NAME'),
            'group_name.max' => __('user::validation.admin_group.NAME_MAXIMUM'),
            'group_name.unique' => __('user::validation.admin_group.NAME_EXIST')
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
