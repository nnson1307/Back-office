<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 02-04-02020
 * Time: 2:04 PM
 */

namespace Modules\BrandApi\Http\Requests\Ward;


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
            'ward_id' => 'integer|required'
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
            'ward_id.required'     => __('Hãy nhập id quận huyện.'),
            'ward_id.integer'     => __('Kiểu dữ liệu không hợp lệ.'),
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
            'ward_id' => 'strip_tags|trim'
        ];
    }
}