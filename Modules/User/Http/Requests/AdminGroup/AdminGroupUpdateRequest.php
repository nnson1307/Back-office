<?php

namespace Modules\User\Http\Requests\AdminGroup;

use Illuminate\Foundation\Http\FormRequest;

class AdminGroupUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $group_id = $this->input('group_id');
        return [
            'group_name' => 'required|unique:admin_group,group_name,'.$group_id.',group_id,is_deleted,0',
        ];
    }

    public function messages()
    {
        return [
            'group_name.required' => __('user::validation.admin_group.PLEASE_ENTER_NAME'),
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
