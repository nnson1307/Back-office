@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('service::service_feature.index.manager_feature')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            @include('helpers.breadcrumb', [
                'menuName' => __('service::service_feature.index.feature'),
                'route' => 'service.service-feature.index',
                'pageName' => __('service::service_feature.index.manager_feature')
            ])
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
{{--            @include('helpers.button', ['button' => [--}}
{{--                'route' => 'service.service-feature.create',--}}
{{--                'html' => '<a href="'.route('service.service-feature.create').'" class="btn btn-label-brand btn-bold">'--}}
{{--                .__('service::service_feature.index.CREATE_FEATURE_SERVICE').--}}
{{--            '</a>'--}}
{{--            ]])--}}
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <form id="form-filter" action="{{route('service.service-feature.index')}}">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_admin_feature_group$feature_group_name_vi" name="keyword_admin_feature_group$feature_group_name_vi"
                                   placeholder="@lang('service::service_feature.index.feature_name_vi')" value="{{isset($filter['keyword_admin_feature_group$feature_group_name_vi']) ? $filter['keyword_admin_feature_group$feature_group_name_vi'] : ""}}">
                        </div>

                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_admin_feature_group$feature_group_name_en" name="keyword_admin_feature_group$feature_group_name_en"
                                   placeholder="@lang('service::service_feature.index.feature_name_en')" value="{{isset($filter['keyword_admin_feature_group$feature_group_name_en']) ? $filter['keyword_admin_feature_group$feature_group_name_en'] : ""}}">
                        </div>

                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_admin_feature_group$feature_group_name_redefine" name="keyword_admin_feature_group$feature_group_name_redefine"
                                   placeholder="@lang('service::service_feature.index.feature_name_redefine')" value="{{isset($filter['keyword_admin_feature_group$feature_group_name_redefine']) ? $filter['keyword_admin_feature_group$feature_group_name_redefine'] : ""}}">
                        </div>

                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_admin_feature_group$description_short" name="keyword_admin_feature_group$description_short"
                                   placeholder="@lang('service::service_feature.index.des_short')" value="{{isset($filter['keyword_admin_feature_group$description_short']) ? $filter['keyword_admin_feature_group$description_short'] : ""}}">
                        </div>

                        <div class="form-group col-lg-3">
                            <select class="form-control --select2 ss--width-100 select_fix" id="is_actived" name="keyword_admin_feature_group$is_actived">
                                <option value="">@lang('service::service.index.action')</option>
                                <option value="1" {{isset($filter['keyword_admin_feature_group$is_actived']) && $filter['keyword_admin_feature_group$is_actived'] == 1 ? "selected" : ""}}>@lang('service::service.index.active')</option>
                                <option value="0" {{isset($filter['keyword_admin_feature_group$is_actived']) && $filter['keyword_admin_feature_group$is_actived'] == 0 ? "selected" : ""}}>@lang('service::service.index.inactive')</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-3">
                            <a class="btn btn-secondary" href="{{route('service.service-feature.index')}}">
                                @lang('admin::country.index.REMOVE')
                            </a>
                            <button type="submit"
                                    class="btn btn-primary btn-hover-brand">
                                @lang('admin::country.index.SEARCH')
                            </button>
                        </div>
                    </div>
                    <div class="kt-section">
                        @include('service::service-feature.list')
                        {{ $list->appends($filter)->links('helpers.paging') }}
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('after_script')
    <script src="{{asset('static/backend/js/service-feature/script.js?v='.time())}}" type="text/javascript"></script>
    <script>
        $('.select_fix').select2();
    </script>
@stop
