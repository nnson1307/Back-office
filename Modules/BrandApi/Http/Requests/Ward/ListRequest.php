<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 02-04-02020
 * Time: 2:04 PM
 */

namespace Modules\BrandApi\Http\Requests\Ward;


use Illuminate\Foundation\Http\FormRequest;

class ListRequest extends FormRequest
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
            'page' => 'integer'
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
            'page.integer'     => __('Kiểu dữ liệu không hợp lệ.'),
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
            'province_name' => 'strip_tags|trim',
            'district_name' => 'strip_tags|trim',
            'ward_name' => 'strip_tags|trim',
            'ward_code' => 'strip_tags|trim',
            'is_actived' => 'strip_tags|trim',
        ];
    }
}