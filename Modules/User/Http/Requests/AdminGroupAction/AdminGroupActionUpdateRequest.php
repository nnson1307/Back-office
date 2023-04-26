<?php

namespace Modules\User\Http\Requests\AdminGroupAction;

use Illuminate\Foundation\Http\FormRequest;

class AdminGroupActionUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $action_id = $this->input('action_id');
        return [
            'action_name' => 'required|unique:admin_action,action_name,'.$action_id.',action_id,is_deleted,0',
        ];
    }

    public function messages()
    {
        return [
            'action_name.required' => __('user::validation.admin_group_action.PLEASE_ENTER_NAME'),
            'action_name.unique' => __('user::validation.admin_group_action.NAME_EXIST')
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
