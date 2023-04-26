<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 01-04-02020
 * Time: 4:46 PM
 */

namespace Modules\BrandApi\Http\Requests\Province;


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
            'province_id' => 'integer|required'
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
            'province_id.required'     => __('Hãy nhập id tỉnh thành.'),
            'province_id.integer'     => __('Kiểu dữ liệu không hợp lệ.'),
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
            'province_id' => 'strip_tags|trim'
        ];
    }
}