@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::district.index.DISTRICT')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            @include('helpers.breadcrumb', [
                'menuName' => 'Địa chỉ',
                'route' => 'admin.district',
                'pageName' => __('admin::district.index.DISTRICT')
            ])
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            @include('helpers.button', ['button' => [
                'route' => 'admin.district.create',
                'html' => '<a href="'.route('admin.district.create').'" class="btn btn-label-brand btn-bold">'
                .__('admin::district.index.CREATE_DISTRICT').
            '</a>'
            ]])
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <form id="form-filter" action="{{route('admin.district')}}">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_country_name" name="keyword_country$country_name"
                                   placeholder="@lang('admin::district.index.COUNTRY_NAME')" value="{{$filter['keyword_country$country_name']}}">
                        </div>
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_province_name" name="keyword_province$name"
                                   placeholder="@lang('admin::district.index.PROVINCE_NAME')" value="{{$filter['keyword_province$name']}}">
                        </div>
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_name" name="keyword_district$name"
                                   placeholder="@lang('admin::district.index.DISTRICT_NAME')" value="{{$filter['keyword_district$name']}}">
                        </div>
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_district_code" name="keyword_district$district_code"
                                   placeholder="@lang('admin::district.index.DISTRICT_CODE')" value="{{$filter['keyword_district$district_code']}}">
                        </div>
                        <div class="form-group col-lg-3">
                            <select class="form-control" id="is_actived" name="district$is_actived">
                                <option></option>
                                <option value="1" @if(isset($filter['district$is_actived']) && $filter['district$is_actived'] == 1) selected @endif>
                                    @lang('admin::province.index.ACTIVE')</option>
                                <option value="0" @if(isset($filter['district$is_actived']) && $filter['district$is_actived'] == 0) selected @endif>
                                    @lang('admin::province.index.NOT_ACTIVE')</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <a class="btn btn-secondary" href="{{route('admin.district')}}">
                                @lang('admin::district.index.REMOVE')
                            </a>
                            <button type="submit"
                                    class="btn btn-primary btn-hover-brand">
                                @lang('admin::district.index.SEARCH')
                            </button>
                        </div>
                    </div>
                    <div class="kt-section">
                        @include('admin::district.list')
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
            placeholder: '@lang('admin::district.index.CHOOSE_STATUS')',
            allowClear: true
        });
    </script>
    <script src="{{asset('static/backend/js/admin/district/script.js?v='.time())}}" type="text/javascript"></script>
@stop
