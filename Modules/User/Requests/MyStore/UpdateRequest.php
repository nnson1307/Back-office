<?php
/**
 * Created by PhpStorm.
 * User: WAO
 * Date: 26/03/2018
 * Time: 6:27 CH
 */

namespace Modules\User\Requests\MyStore;

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
//            'brand_id' => 'required',
        ];
    }

    /*
     * function custom messages
     */
    public function messages()
    {
        return [
            'full_name.required' => __('user::validation.store.PLEASE_ENTER_NAME'),
//            'brand_id.required' => __('user::validation.store.PLEASE_SELECT_BRAND')
        ];
    }
}
