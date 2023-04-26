@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <form id="form-register">
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('service::service_feature.index.SHOW_FEATURE_SERVICE')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                @include('helpers.button', ['button' => [
                        'route' => 'service.service-feature.edit',
                         'html' => '<a href="'.route('service.service-feature.edit', ['id' => $detail['feature_group_id']]).'" class="btn btn-info btn-bold">'
                         .__('service::service.index.EDIT').
                    '</a>'
                ]])
                <a href="{{route('service.service-feature.index')}}" class="btn btn-secondary btn-bold">
                    @lang('admin::brand.create.CANCEL')
                </a>
            </div>
        </div>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content" style="margin-bottom: 80px;">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service_feature.index.feature_name_vi')
                                    </label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" id="feature_group_name_vi" name="feature_group_name_vi" value="{{$detail['feature_group_name_vi']}}" type="text" maxlength="250"
                                           placeholder="@lang('service::service_feature.index.feature_name_vi')" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service_feature.index.feature_name_en')
                                    </label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" id="feature_group_name_en" name="feature_group_name_en" value="{{$detail['feature_group_name_en']}}" type="text" maxlength="250"
                                           placeholder="@lang('service::service_feature.index.feature_name_en')" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service_feature.index.feature_name_redefine')
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" id="feature_group_name_redefine" name="feature_group_name_redefine" value="{{$detail['feature_group_name_redefine']}}" type="text" maxlength="250"
                                           placeholder="@lang('service::service_feature.index.feature_name_redefine')" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.create.STATUS')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <span class="kt-switch kt-switch--success">
                                        <label>
                                            <input type="checkbox" class="switch-publish"
                                                   id="is_actived" name="is_actived" {{$detail['is_actived'] == 1 ? "checked" : ""}} disabled>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service_feature.index.start_date')
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <p>{{\Carbon\Carbon::parse($detail['created_at'])->format('d/m/Y')}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service_feature.index.update_date')
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <p>{{\Carbon\Carbon::parse($detail['updated_at'])->format('d/m/Y')}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.table.DES_FEATURE')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" type="text" id="description" name="description" value="{{$detail['description_short']}}" disabled
                                           placeholder="@lang('service::service.create.DES_PLACEHOLDER')">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.create.IMG_CONTENT')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <textarea class="form-control" rows="10" id="img_content" name="img_content" disabled>{{$detail['description']}}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <ul class="nav nav-pills" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#applicable_service">@lang('service::service_feature.index.applicable_service')</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#customer_use">@lang('service::service_feature.index.customer_use')</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        <div class="tab-pane active" id="applicable_service" role="tabpanel">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            @lang('service::service.index.SERVICE_NAME')
                                                        </th>
                                                        <th>
                                                            @lang('service::service.table.DESCRIPTION')
                                                        </th>
                                                        <th>@lang('service::service.index.STATUS')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($getListService) && count($getListService) != 0)
                                                        @foreach($getListService as $item)
                                                            <tr>
                                                                <td title="{{$item['service_name_vi']}}">{{subString($item['service_name_vi'])}}</td>
                                                                <td title="{{$item['description_short']}}">{{subString($item['description_short'])}}</td>
                                                                <td>
                                                                    <span class="kt-switch kt-switch--success">
                                                                        <label>
                                                                            <input type="checkbox"
                                                                                   disabled
                                                                                    {{ $item['is_actived'] == 1 ? 'checked' : '' }}>
                                                                            <span></span>
                                                                        </label>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr class="text-center">
                                                            <td colspan="2">@lang('service::service_feature.index.nodata')</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="customer_use" role="tabpanel">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>
                                                        @lang('admin::brand.index.BRAND_NAME')
                                                    </th>
                                                    <th>
                                                        @lang('admin::brand.index.BRAND_CODE')
                                                    </th>
                                                    <th>
                                                        @lang('admin::brand.index.COMPANY_NAME')
                                                    </th>
                                                    <th>
                                                        Hotline
                                                    </th>
                                                    <th>@lang('service::service.index.STATUS')</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @if(isset($getListBrand) && count($getListBrand) != 0)
                                                    @foreach($getListBrand as $item)
                                                        <tr>
                                                            <td title="{{$item['brand_name']}}">{{subString($item['brand_name'])}}</td>
                                                            <td title="{{$item['brand_code']}}">{{subString($item['brand_code'])}}</td>
                                                            <td title="{{$item['company_name']}}">{{subString($item['company_name'])}}</td>
                                                            <td title="{{$item['hotline']}}">{{subString($item['hotline'])}}</td>
                                                            <td>
                                                                <span class="kt-switch kt-switch--success">
                                                                    <label>
                                                                        <input type="checkbox"
                                                                               disabled
                                                                                {{ $item['feature_is_actived'] == 1 ? 'checked' : '' }}>
                                                                        <span></span>
                                                                    </label>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr class="text-center">
                                                        <td colspan="6">@lang('service::service_feature.index.nodata')</td>
                                                    </tr>
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


@stop
@section('after_script')
    <script src="{{asset('static/backend/js/service-feature/script.js?v='.time())}}" type="text/javascript"></script>
@stop
