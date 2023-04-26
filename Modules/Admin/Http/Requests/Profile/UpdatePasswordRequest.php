<?php
/**
 * Created by PhpStorm   .
 * User: Mr Son
 * Date: 2020-02-12
 * Time: 5:10 PM
 * @author SonDepTrai
 */

namespace Modules\Admin\Http\Requests\Profile;


use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'current_pass' => 'required',
            'new_pass' => 'required|required_with:pass_confirm|same:pass_confirm|min:6',
        ];
    }

    public function messages()
    {
        return [
            'current_pass.required' => __('admin::validation.change_pass.CURRENT_PASS_REQUIRED'),
            'new_pass.required' => __('admin::validation.change_pass.NEW_PASS_REQUIRED'),
            'new_pass.required_with' => __('admin::validation.change_pass.CONFIRM_PASS_REQUIRED'),
            'new_pass.same' => __('admin::validation.change_pass.CONFIRM_PASS_NOT_SAME'),
            'new_pass.min' => __('admin::validation.change_pass.NEW_PASS_MIN')
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
            'current_pass' => 'strip_tags|trim',
            'new_pass' => 'strip_tags|trim',
            'pass_confirm' => 'strip_tags|trim',
        ];
    }
}