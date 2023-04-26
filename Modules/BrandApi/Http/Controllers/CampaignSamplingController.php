<?php


namespace Modules\BrandApi\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\BrandApi\Http\Requests\CampaignSampling\ListRequest;
use Modules\BrandApi\Http\Requests\CampaignSampling\StoreRequest;
use Modules\BrandApi\Repositories\CampaignSampling\CampaignSamplingRepoException;
use Modules\BrandApi\Repositories\CampaignSampling\CampaignSamplingRepoInterface;

class CampaignSamplingController extends Controller
{
    protected $campaignSampling;

    public function __construct(
        CampaignSamplingRepoInterface $campaignSampling
    ) {
        $this->campaignSampling = $campaignSampling;
    }

    /**
     * Danh sách chương trình sampling
     *
     * @param ListRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCampaignSamplings(ListRequest $request)
    {
        try {
            $data = $this->campaignSampling->getSamplings($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (CampaignSamplingRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Thêm chương trình sampling
     *
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $param = Validator::make($request->all(), [
                'campaign_name' => 'required|max:200|unique:mysql2.campaign,campaign_name,' . ',campaign_id',
                'campaign_start' => 'required',
                'campaign_end' => 'required',
                'campaign_code' => 'required|max:50|unique:mysql2.campaign,campaign_code,' . ',campaign_id',
                'partner_campaign_id' => 'required|max:50',
                'quota' => 'required|integer'
            ], [
                'campaign_name.required' => __('Hãy nhập tên chương trình'),
                'campaign_name.max' => __('Tên chương trình tối đa 200 kí tự'),
                'campaign_name.unique' => __('Tên chương trình đã tồn tại'),
                'campaign_start.required' => __('Hãy nhập ngày bắt đầu'),
                'campaign_end.required' => __('Hãy nhập ngày kết thúc'),
                'campaign_code.required' => __('Hãy nhập mã tham chiếu'),
                'campaign_code.max' => __('Mã tham chiếu tối đa 50 kí tự'),
                'campaign_code.unique' => __('Mã tham chiếu đã tồn tại'),
                'partner_campaign_id.required' => __('Hãy nhập mã tham chiếu'),
                'partner_campaign_id.max' => __('Mã đối tác tối đa 50 kí tự'),
                'quota.required' => __('Hãy nhập số lượng giới hạn'),
                'quota.integer' => __('Số lượng giới hạn không hợp lệ')
            ]);

            if ($param->fails()) {
                return $this->responseJson(CODE_FAILED, $param->errors()->all(), []);
            }

            $data = $this->campaignSampling->store($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (CampaignSamplingRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Thêm sản phẩm sampling
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeProduct(Request $request)
    {
        try {
            $param = Validator::make($request->all(), [
                'campaign_id' => 'required|integer',
                'product_id' => 'required|integer',
                'product_uom_id' => 'required|integer'
            ], [
                'campaign_id.required' => __('Hãy nhập campaign_id'),
                'campaign_id.integer' => __('Kiểu dữ liệu không hợp lệ'),
                'product_id.required' => __('Hãy nhập product_id'),
                'product_id.integer' => __('Kiểu dữ liệu không hợp lệ'),
                'product_uom_id.required' => __('Hãy nhập product_uom_id'),
                'product_uom_id.integer' => __('Kiểu dữ liệu không hợp lệ')
            ]);

            $data = $this->campaignSampling->storeProduct($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (CampaignSamplingRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Chi tiết chương trinh sampling
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDetail(Request $request)
    {
        try {
            $param = Validator::make($request->all(), [
                'campaign_id' => 'required|integer'
            ], [
                'campaign_id.required' => __('Hãy nhập campaign_id'),
                'campaign_id.integer' => __('Kiểu dữ liệu không hợp lệ')
            ]);

            if ($param->fails()) {
                return $this->responseJson(CODE_FAILED, $param->errors()->all(), []);
            }

            $data = $this->campaignSampling->getDetail($request->campaign_id);

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (CampaignSamplingRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Chỉnh sửa chương trình sampling
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        try {
            $param = $request->all();

            $validator = Validator::make($param, [
                'campaign_name' => 'required|max:200|unique:mysql2.campaign,campaign_name,' . $param['campaign_id'] .  ',campaign_id',
                'campaign_start' => 'required',
                'campaign_end' => 'required',
                'campaign_code' => 'required|max:50|unique:mysql2.campaign,campaign_code,' . $param['campaign_id'] . ',campaign_id',
                'partner_campaign_id' => 'required|max:50',
                'quota' => 'required|integer',
                'campaign_id' => 'required|integer'
            ], [
                'campaign_name.required' => __('Hãy nhập tên chương trình'),
                'campaign_name.max' => __('Tên chương trình tối đa 200 kí tự'),
                'campaign_name.unique' => __('Tên chương trình đã tồn tại'),
                'campaign_start.required' => __('Hãy nhập ngày bắt đầu'),
                'campaign_end.required' => __('Hãy nhập ngày kết thúc'),
                'campaign_code.required' => __('Hãy nhập mã tham chiếu'),
                'campaign_code.max' => __('Mã tham chiếu tối đa 50 kí tự'),
                'campaign_code.unique' => __('Mã tham chiếu đã tồn tại'),
                'partner_campaign_id.required' => __('Hãy nhập mã tham chiếu'),
                'partner_campaign_id.max' => __('Mã đối tác tối đa 50 kí tự'),
                'quota.required' => __('Hãy nhập số lượng giới hạn'),
                'quota.integer' => __('Số lượng giới hạn không hợp lệ'),
                'campaign_id.required' => __('Hãy nhập campaign_id'),
                'campaign_id.integer' => __('Kiểu dữ liệu không hợp lệ'),
            ]);

            if ($validator->fails()) {
                return $this->responseJson(CODE_FAILED, $validator->errors()->all(), []);
            }

            $data = $this->campaignSampling->update($param);

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (CampaignSamplingRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }

    /**
     * Chỉnh sửa sản phẩm sampling
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProduct(Request $request)
    {
        try {
            $param = Validator::make($request->all(), [
                'campaign_id' => 'required|integer',
                'product_id' => 'required|integer',
                'product_uom_id' => 'required|integer',
            ], [
                'campaign_id.required' => __('Hãy nhập campaign_id'),
                'campaign_id.integer' => __('Kiểu dữ liệu không hợp lệ'),
                'product_id.required' => __('Hãy nhập product_id'),
                'product_id.integer' => __('Kiểu dữ liệu không hợp lệ'),
                'product_uom_id.required' => __('Hãy nhập product_uom_id'),
                'product_uom_id.integer' => __('Kiểu dữ liệu không hợp lệ')
            ]);

            $data = $this->campaignSampling->updateProduct($request->all());

            return $this->responseJson(CODE_SUCCESS, null, $data);
        } catch (CampaignSamplingRepoException $ex) {
            return $this->responseJson(CODE_FAILED, $ex->getMessage());
        }
    }
}