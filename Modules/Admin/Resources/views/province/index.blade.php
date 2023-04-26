@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::province.index.PROVINCE')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            @include('helpers.breadcrumb', [
                'menuName' => 'Địa chỉ',
                'route' => 'admin.province',
                'pageName' => __('admin::province.index.PROVINCE')
            ])
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            @include('helpers.button', ['button' => [
                'route' => 'admin.province.create',
                'html' => '<a href="'.route('admin.province.create').'" class="btn btn-label-brand btn-bold">'
                .__('admin::province.index.CREATE_PROVINCE').
            '</a>'
            ]])
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <form id="form-filter" action="{{route('admin.province')}}">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_country_name"
                                   name="keyword_country$country_name"
                                   placeholder="@lang('admin::province.index.COUNTRY_NAME')"
                                   value="{{$filter['keyword_country$country_name']}}">
                        </div>
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_name" name="keyword_province$name"
                                   placeholder="@lang('admin::province.index.PROVINCE_NAME')"
                                   value="{{$filter['keyword_province$name']}}">
                        </div>
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_province_code"
                                   name="keyword_province$province_code"
                                   placeholder="@lang('admin::province.index.PROVINCE_CODE')"
                                   value="{{$filter['keyword_province$province_code']}}">
                        </div>
                        <div class="form-group col-lg-3">
                            <select class="form-control" id="is_actived" name="province$is_actived">
                                <option></option>
                                <option value="1" @if(isset($filter['province$is_actived']) && $filter['province$is_actived'] == 1) selected @endif>
                                    @lang('admin::province.index.ACTIVE')
                                </option>
                                <option value="0" @if(isset($filter['province$is_actived']) && $filter['province$is_actived'] == 0) selected @endif>
                                    @lang('admin::province.index.NOT_ACTIVE')
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <a class="btn btn-secondary" href="{{route('admin.province')}}">
                                @lang('admin::province.index.REMOVE')
                            </a>
                            <button type="submit" class="btn btn-primary btn-hover-brand">
                                @lang('admin::province.index.SEARCH')
                            </button>
                        </div>
                    </div>
                    <div class="kt-section">
                        @include('admin::province.list')
                        {{ $LIST->appends($filter)->links('helpers.paging') }}
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('after_script')
    <script>
        $('#is_actived').select2({
            placeholder: '@lang('admin::province.index.PLACE_HOLDER_CHOOSE_STATUS')',
            allowClear: true
        });
    </script>
    <script src="{{asset('static/backend/js/admin/province/script.js?v='.time())}}" type="text/javascript"></script>
@stop
