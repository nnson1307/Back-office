<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 01-04-02020
 * Time: 5:25 PM
 */

namespace Modules\BrandApi\Http\Requests\District;


use Illuminate\Foundation\Http\FormRequest;

class DetailRequest extends FormRequest
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
            'district_id' => 'integer|required'
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
            'district_id.required'     => __('Hãy nhập id quận huyện.'),
            'district_id.integer'     => __('Kiểu dữ liệu không hợp lệ.'),
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
            'district_id' => 'strip_tags|trim'
        ];
    }
}