<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 26/03/2018
 * Time: 6:27 CH
 */

namespace Modules\Admin\Requests;


use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'default_menu' => 'required',
            'is_actived' => 'required',
            'password' => ['required', 'min:6'],
        ];
    }

    /*
     * function custom messages
     */
    public function messages()
    {
        return [
            'full_name.required' => __('user::validation.edit.PLEASE_ENTER_NAME'),
            'is_actived.required' => __('user::validation.edit.PLEASE_ACTIVE'),
            'default_menu.required' => __('user::validation.store.PLEASE_ENTER_ADMIN_MENU'),
            'password.required' => __('user::validation.store.PLEASE_ENTER_PASSWORD'),
            'password.min' => __('user::validation.store.PASSWORD_LENGTH'),
        ];
    }
}