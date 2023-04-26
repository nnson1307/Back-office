@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::brand.index.BRAND')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            @include('helpers.breadcrumb', [
                'pageName' => __('admin::brand.index.BRAND')
            ])
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <a href="{{route('admin.brand.create')}}" class="btn btn-label-brand btn-bold">
                @lang('admin::brand.index.ADD_BRAND')
            </a>
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <form action="{{route('admin.brand')}}" method="GET" id="form-filter">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text"
                                   id="keyword_brand$brand_name"
                                   name="keyword_brand$brand_name"
                                   value="{{ $filter['keyword_brand$brand_name'] != null?$filter['keyword_brand$brand_name'] : '' }}"
                                   placeholder="@lang('admin::brand.index.BRAND_NAME')">
                        </div>
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text"
                                   id="keyword_brand$brand_code"
                                   name="keyword_brand$brand_code"
                                   value="{{ $filter['keyword_brand$brand_code'] != null?$filter['keyword_brand$brand_code'] : '' }}"
                                   placeholder="@lang('admin::brand.index.BRAND_CODE')">
                        </div>
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text"
                                   id="keyword_brand$company_name"
                                   name="keyword_brand$company_name"
                                   value="{{ $filter['keyword_brand$company_name'] != null?$filter['keyword_brand$company_name'] : '' }}"
                                   placeholder="@lang('admin::brand.index.COMPANY_NAME')">
                        </div>
                        <div class="form-group col-lg-3">
                            <select class="form-control ss-select-2" id="brand$is_activated" name="brand$is_activated">
                                <option value="">@lang('admin::brand.index.ADMIN_USER_STATUS')</option>
                                <option value="1">@lang('admin::province.index.ACTIVE')</option>
                                <option value="0">@lang('admin::province.index.NOT_ACTIVE')</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <select class="form-control ss-select-2" id="brand$is_published" name="brand$is_published">
                                <option value="">@lang('admin::brand.index.DISPLAY_APP')</option>
                                <option value="1">@lang('admin::brand.index.DISPLAY')</option>
                                <option value="0">@lang('admin::brand.index.NOT_DISPLAY')</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <a class="btn btn-secondary btn-hover-brand" href="{{route('admin.brand')}}">
                                @lang('admin::province.index.REMOVE')
                            </a>
                            <button type="submit" class="btn btn-primary btn-hover-brand">
                                @lang('admin::province.index.SEARCH')
                            </button>
                        </div>
                    </div>
                    <div class="kt-section">
                        @include('admin::brand.list')
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="my-modal"></div>
@stop
@section('after_script')
    <script>
        $('#is_activated').select2({
            placeholder: '@lang('admin::province.index.PLACE_HOLDER_CHOOSE_STATUS')'
        });
        $('#is_published').select2({
            placeholder: '@lang('admin::brand.index.DISPLAY_APP')'
        });
        $('.ss-select-2').select2();
    </script>
    <script src="{{asset('static/backend/js/admin/brand/script.js?v='.time())}}" type="text/javascript"></script>
    <script type="text/javascript">
        brand.init();
    </script>
@stop
