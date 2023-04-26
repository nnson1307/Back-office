<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 03-04-02020
 * Time: 4:44 PM
 */

namespace Modules\BrandApi\Http\Requests\Province;


use Illuminate\Foundation\Http\FormRequest;

class CheckProvinceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'country_name' => 'required',
            'province_name' => 'required'
        ];
    }

    /**
     * Customize message
     *
     * @return array
     */
    public function messages()
    {
        return [
            'country_name.required'     => __('Hãy nhập tên quốc gia.'),
            'province_name.required'     => __('Hãy nhập tên tỉnh thành.')
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
            'country_name' => 'strip_tags|trim',
            'province_name' => 'strip_tags|trim'
        ];
    }
}