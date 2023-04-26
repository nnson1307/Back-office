<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 26/03/2018
 * Time: 6:27 CH
 */

namespace Modules\User\Requests\MyStore;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'full_name' => 'required',
            'email' => 'required|email|unique:admin,email,' . ',id,is_deleted,0',
            'password' => ['required', 'min:8'],
        ];
    }

    /*
     * function custom messages
     */
    public function messages()
    {
        return [
            'full_name.required' => __('user::validation.store.PLEASE_ENTER_NAME'),
            'email.required' => __('user::validation.store.PLEASE_ENTER_EMAIL'),
            'email.email' => __('user::validation.store.PLEASE_ENTER_EMAIL'),
            'email.unique' => __('user::validation.store.EMAIL_EXIST'),
            'password.required' => __('user::validation.store.PLEASE_ENTER_PASSWORD'),
            'password.min' => __('user::validation.store.PASSWORD_LENGTH'),
        ];
    }
}
