<?php

namespace Modules\User\Http\Requests\StoreUser;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserResetPasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'required|regex:/(^([0-9]+){10,10}?$)/u',
            'password' => 'required|min:8|max:20',
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => __('user::validation.store-user.account_required'),
            'phone.regex' => __('user::validation.store-user.account_invalid'),
            'password.required' => __('user::validation.store-user.password_required'),
            'password.min' => __('user::validation.store-user.password_length'),
            'password.max' => __('user::validation.store-user.password_length'),
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
