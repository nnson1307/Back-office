<?php
/**
 * Created by PhpStorm
 * User: Mr Son
 * Date: 4/18/2020
 * Time: 11:08 AM
 */

namespace Modules\BrandApi\Http\Requests\CampaignSampling;


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
            'campaign_name' => 'required|max:200|unique:mysql2.campaign,campaign_name,' . ',campaign_id',
            'campaign_start' => 'required|date_format:d/m/Y',
            'campaign_end' => 'required|date_format:d/m/Y',
            'campaign_code' => 'required|max:50|unique:mysql2.campaign,campaign_code,' . ',campaign_id',
            'partner_campaign_id' => 'required|max:50',
            'qty' => 'required|integer',
            'qty_reward' => 'required|integer'
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
            'campaign_name.required' => __('Hãy nhập tên chương trình'),
            'campaign_name.max' => __('Tên chương trình tối đa 200 kí tự'),
            'campaign_name.unique' => __('Tên chương trình đã tồn tại'),
            'campaign_start.required' => __('Hãy nhập ngày bắt đầu'),
            'campaign_start.date_format' => __('Ngày bắt đầu không hợp lệ'),
            'campaign_end.required' => __('Hãy nhập ngày kết thúc'),
            'campaign_end.date_format' => __('Ngày kết thúc không hợp lệ'),
            'campaign_code.required' => __('Hãy nhập mã tham chiếu'),
            'campaign_code.max' => __('Mã tham chiếu tối đa 50 kí tự'),
            'campaign_code.unique' => __('Mã tham chiếu đã tồn tại'),
            'partner_campaign_id.required' => __('Hãy nhập mã tham chiếu'),
            'partner_campaign_id.max' => __('Mã đối tác tối đa 50 kí tự'),
            'qty.required' => __('Hãy nhập số lượng khuyến mại'),
            'qty.integer' => __('Số lượng khuyến mãi không hợp lệ'),
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
            'qty' => 'strip_tags|trim',
            'qty_adward' => 'strip_tags|trim',
            'campaign_code' => 'strip_tags|trim'
        ];
    }
}