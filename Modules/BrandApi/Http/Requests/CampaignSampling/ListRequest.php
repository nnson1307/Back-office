<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 4/18/2020
 * Time: 10:24 AM
 */

namespace Modules\BrandApi\Http\Requests\CampaignSampling;


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
            'campaign_name' => 'strip_tags|trim',
            'campaign_type' => 'strip_tags|trim',
            'adward_verify_type' => 'strip_tags|trim',
            'is_active' => 'strip_tags|trim'
        ];
    }
}