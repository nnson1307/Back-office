@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <form id="form-register">
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('admin::country.create.CREATE_COUNTRY')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="register.submit_load()">
                    @lang('admin::country.create.CREATE_LOAD')
                </button>
                <button type="button" class="btn btn-info btn-bold" onclick="register.submit_index()">
                    @lang('admin::country.create.CREATE_INDEX')
                </button>
                <a href="{{route('admin.country')}}" class="btn btn-secondary btn-bold">
                    @lang('admin::country.create.CANCEL')
                </a>
            </div>
        </div>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::country.create.COUNTRY_NAME')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control" id="country_name" name="country_name" type="text"
                                   placeholder="@lang('admin::country.create.PLACEHOLDER_COUNTRY_NAME')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::country.create.COUNTRY_CODE')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control" type="text" id="country_code" name="country_code"
                                   placeholder="@lang('admin::country.create.PLACEHOLDER_COUNTRY_CODE')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::country.create.STATUS')</label>
                        <div class="col-lg-9 col-xl-9">
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox" class="switch-status"
                                           id="is_actived" name="is_actived">
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop
@section('after_script')
    <script>
        //Thông báo
        var create_success = '@lang('admin::country.create.create_success')';
        var create_fail = '@lang('admin::country.create.create_fail')';

    </script>
    <script src="{{asset('static/backend/js/admin/country/script.js?v='.time())}}" type="text/javascript"></script>
@stop
