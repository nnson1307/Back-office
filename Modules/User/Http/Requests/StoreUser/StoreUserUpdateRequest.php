<?php

namespace Modules\User\Http\Requests\StoreUser;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fullname' => 'required|max:50'
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => __('user::validation.store-user.fullname_required'),
            'fullname.max' => __('user::validation.store-user.fullname_maxlength')
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
