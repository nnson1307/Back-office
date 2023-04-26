<?php
/**
 * Created by PhpStorm   .
 * User: Mr Son
 * Date: 2020-02-12
 * Time: 5:09 PM
 * @author SonDepTrai
 */

namespace Modules\Admin\Http\Requests\Profile;


use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
        $id = Auth()->id();

        return [
            'full_name' => 'required|max:190',
            'phone' => 'required|max:10|unique:admin,phone,' . $id . ',id',
        ];
    }

    public function messages()
    {
        return [
            'full_name.required' => __('admin::validation.profile.FULL_NAME_REQUIRED'),
            'full_name.max' => __('admin::validation.profile.FULL_NAME_MAX'),
            'email.required' => __('admin::validation.profile.EMAIL_REQUIRED'),
            'email.email' => __('admin::validation.profile.NOT_EMAIL'),
            'email.max' => __('admin::validation.profile.EMAIL_MAX'),
            'email.unique' => __('admin::validation.profile.EMAIL_UNIQUE'),
            'phone.required' => __('admin::validation.profile.PHONE_REQUIRED'),
            'phone.max' => __('admin::validation.profile.PHONE_MAX'),
            'phone.unique' => __('admin::validation.profile.PHONE_UNIQUE')
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'full_name' => 'strip_tags|trim',
            'phone' => 'strip_tags|trim',
            'email' => 'strip_tags|trim',
        ];
    }
}