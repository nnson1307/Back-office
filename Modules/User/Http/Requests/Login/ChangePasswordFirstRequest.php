<?php

namespace Modules\User\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordFirstRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'currentpassword' => 'required',
            'newpassword' => 'required|max:20|min:8|regex:/^(?=.*\d)(?=.*[a-z])[0-9a-zA-Z]{8,20}$/i',
            'confirmpassword' => 'required|same:newpassword',
        ];
    }

    public function messages()
    {
        return [
            'currentpassword.required' => __('user::validation.change-password-first.CURRENTPASSWORD'),
            'newpassword.required' => __('user::validation.change-password-first.NEWPASSWORD'),
            'newpassword.max' => __('user::validation.change-password-first.MAX_LENGTH'),
            'newpassword.min' => __('user::validation.change-password-first.MIN_LENGTH'),
            'newpassword.regex' => __('user::validation.change-password-first.VALIDATE_PASSWORD'),
            'confirmpassword.same' => __('user::validation.change-password-first.CHECK_CONFIRMPASSWORD'),
            'confirmpassword.required' => __('user::validation.change-password-first.CONFIRMPASSWORD'),
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
