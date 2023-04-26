@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('service::service.index.SERVICE_DETAIL')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
{{--                <a href="{{route('admin.service.edit',['id' => $detail['service_id']])}}" class="btn btn-info btn-bold">--}}
{{--                    @lang('service::service.index.EDIT')--}}
{{--                </a>--}}
                @include('helpers.button', ['button' => [
                        'route' => 'admin.service.edit',
                         'html' => '<a href="'.route('admin.service.edit', ['id' => $detail['service_id']]).'" class="btn btn-info btn-bold">'
                         .__('service::service.index.EDIT').
                    '</a>'
                ]])
                <a href="{{route('admin.service')}}" class="btn btn-secondary btn-bold">
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
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.create.SERVICE_NAME') VI
                                    <span class="color_red"> *</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" id="service_name_vi" name="service_name_vi" type="text" maxlength="250"
                                           placeholder="@lang('service::service.create.SERVICE_NAME_PLACEHOLDER') VI" value="{{$detail['service_name_vi']}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.create.SERVICE_NAME') EN
                                    <span class="color_red"> *</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" id="service_name_en" name="service_name_en" type="text" maxlength="250"
                                           placeholder="@lang('service::service.create.SERVICE_NAME_PLACEHOLDER') EN" value="{{$detail['service_name_en']}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.create.STATUS')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <span class="kt-switch kt-switch--success">
                                        <label>
                                            <input type="checkbox" class="switch-publish"
                                                   id="is_actived" name="is_actived" {{$detail['is_actived'] == 1 ? "checked" :""}} disabled>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.table.DES_FEATURE')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" type="text" id="description" name="description"
                                           placeholder="@lang('service::service.create.DES_PLACEHOLDER')" value="{{$detail['description_short']}}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.create.NAME_SYSTEM')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <p>VisibilityPRO</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.create.IMG_CONTENT')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <textarea class="form-control" rows="10" id="img_content" name="img_content" disabled>{!! $detail['description'] !!}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <ul class="nav nav-tabs  nav-tabs-line nav-tabs-line-success" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_tabs_7_1" role="tab">
                                <i class=""></i> @lang('service::service.index.feature')</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" data-toggle="tab" href="#kt_tabs_7_2" role="tab">--}}
{{--                                <i class=""></i> @lang('service::service.index.customer')</a>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_tabs_7_1" role="tabpanel">
                            <div class="kt-section__content kt-portlet__body">
                                <table class="table table-striped table-bordered hy-table">
                                    <thead>
                                    <tr>
                                        <th>
                                            @lang('service::feature_service.index.NAME_FEATURE')
                                        </th>
                                        <th>
                                            @lang('service::feature_service.index.des')
                                        </th>
                                        <th>
                                            @lang('service::service.table.CREATE_DATE')
                                        </th>
                                        <th>
                                            @lang('service::service.table.UPDATE_DATE')
                                        </th>
                                        <th>@lang('service::service.index.STATUS')</th>
{{--                                        <th><p>@lang('admin::country.index.ACTION')</p></th>--}}
                                    </tr>
                                    </thead>
                                    <tbody id="table-list-feature">
                                    @if(isset($list))
                                        @foreach($list as $key => $item)
                                            <tr>
                                                <td>
                                                    @if($item['feature_group_name_redefine'] == null)
                                                        <p title="{{$item['feature_group_name_vi']}}">
                                                            {{subString($item['feature_group_name_vi'])}}
                                                        </p>
                                                    @else
                                                        <p title="{{$item['feature_group_name_redefine']}}">
                                                            {{subString($item['feature_group_name_redefine'])}}
                                                        </p>
                                                    @endif

                                                </td>
                                                <td>
                                                    <p title="">{{$item['description_short']}}</p>
                                                </td>
                                                <td>
                                                    {{  \Carbon\Carbon::parse($item['created_at'])->format('d-m-Y') }}
                                                </td>
                                                <td>
                                                    {{  \Carbon\Carbon::parse($item['updated_at'])->format('d-m-Y') }}
                                                </td>
                                                <td>
                                                    <span class="kt-switch kt-switch--success">
                                                        <label>
                                                            <input type="checkbox"
                                                                   disabled
                                                                    {{ ($item['is_actived'] == 1) ? 'checked' : '' }}>
                                                            <span></span>
                                                        </label>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



@stop
@section('after_script')
    <script type="text/javascript">
        Summernote.generate('img_content');
        $('#img_content').summernote('disable');
    </script>
    <script src="{{asset('static/backend/js/service/script.js?v='.time())}}" type="text/javascript"></script>
@stop
