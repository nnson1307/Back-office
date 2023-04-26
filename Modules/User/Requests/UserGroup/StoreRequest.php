<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 26/03/2018
 * Time: 6:27 CH
 */

namespace Modules\User\Requests\UserGroup;

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
            'name' => 'required|max:255|unique:mystore_filter_group,name,NULL,id,is_brand,0',
        ];
    }

    /*
     * function custom messages
     */
    public function messages()
    {
        return [
            'name.required' => __('user::validation.user_group.PLEASE_ENTER_NAME'),
            'name.max' => __('user::validation.user_group.NAME_LENGTH'),
            'name.unique' => __('user::validation.user_group.NAME_EXIST'),
        ];
    }
}
