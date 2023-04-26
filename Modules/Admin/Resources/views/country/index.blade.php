@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::country.index.COUNTRY')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            @include('helpers.breadcrumb', [
                'menuName' => 'Địa chỉ',
                'route' => 'admin.country',
                'pageName' => __('admin::country.index.COUNTRY')
            ])
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            @include('helpers.button', ['button' => [
                'route' => 'admin.country.create',
                'html' => '<a href="'.route('admin.country.create').'" class="btn btn-label-brand btn-bold">'
                .__('admin::country.index.CREATE_COUNTRY').
            '</a>'
            ]])
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <form id="form-filter" action="{{route('admin.country')}}">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_country_name" name="keyword_country_name"
                                   placeholder="@lang('admin::country.index.PLACEHOLDER_COUNTRY_NAME')" value="{{$filter['keyword_country_name']}}">
                        </div>
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_country_code" name="keyword_country_code"
                                   placeholder="@lang('admin::country.index.PLACEHOLDER_COUNTRY_CODE')" value="{{$filter['keyword_country_code']}}">
                        </div>
                        <div class="form-group col-lg-3">
                            <select class="form-control" id="is_actived" name="is_actived" style="width:100%;">
                                <option></option>
                                <option value="1" @if(isset($filter['is_actived']) && $filter['is_actived'] == 1) selected @endif>
                                    @lang('admin::country.index.ACTIVE')
                                </option>
                                <option value="0" @if(isset($filter['is_actived']) && $filter['is_actived'] == 0) selected @endif>
                                    @lang('admin::country.index.NOT_ACTIVE')
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <a class="btn btn-secondary" href="{{route('admin.country')}}">
                                @lang('admin::country.index.REMOVE')
                            </a>
                            <button type="submit"
                                    class="btn btn-primary btn-hover-brand">
                                @lang('admin::country.index.SEARCH')
                            </button>
                        </div>
                    </div>
                    <div class="kt-section">
                        @include('admin::country.list')
                        {{ $LIST->appends($filter)->links('helpers.paging') }}
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('after_script')
    <script src="{{asset('static/backend/js/admin/country/script.js?v='.time())}}" type="text/javascript"></script>
    <script>
        $('#is_actived').select2({
            placeholder: '@lang('admin::country.index.PLACEHOLDER_CHOOSE_STATUS')',
            allowClear: true
        });
    </script>
@stop
