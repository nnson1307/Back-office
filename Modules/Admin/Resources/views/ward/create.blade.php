@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <form id="form-register">
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('admin::ward.create.TITLE_CREATE_WARD')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="register.submit_load()">
                    @lang('admin::ward.create.CREATE_LOAD')
                </button>
                <button type="button" class="btn btn-info btn-bold" onclick="register.submit_index()">
                    @lang('admin::ward.create.CREATE_INDEX')
                </button>
                <a href="{{route('admin.ward')}}" class="btn btn-secondary btn-bold">
                    @lang('admin::ward.create.CANCEL')
                </a>
            </div>
        </div>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::ward.create.COUNTRY')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control" id="country_id" name="country_id" style="width: 100%;">
                                <option></option>
                                @foreach($optionCountry as $key=>$item)
                                    <option value="{{$key}}">{{$item}}</option>
                                @endforeach
                            </select>
                            <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::ward.create.PROVINCE')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control" id="province_id" name="province_id" style="width: 100%;">
                                <option></option>
                            </select>
                            <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::ward.create.DISTRICT')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control" id="district_id" name="district_id" style="width: 100%;">
                                <option></option>
                            </select>
                            <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::ward.create.WARD_NAME')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control" id="name" name="name" type="text"
                                   placeholder="@lang('admin::ward.create.PLACE_HOLDER_WARD_NAME')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::ward.create.WARD_CODE')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control" type="text" id="ward_code" name="ward_code"
                                   placeholder="@lang('admin::ward.create.PLACE_HOLDER_WARD_CODE')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::ward.create.TYPE')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control" id="type" name="type" style="width: 100%;">
                                <option></option>
                                <option value="Phường">@lang('admin::ward.create.PHUONG')</option>
                                <option value="Xã">@lang('admin::ward.create.XA')</option>
                                <option value="Thị trấn">@lang('admin::ward.create.THI_TRAN')</option>
                            </select>
                            <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::ward.create.STATUS')
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox" id="is_actived"
                                           name="is_actived">
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
        $('#country_id').select2({
            placeholder:'@lang('admin::ward.create.CHOOSE_COUNTRY')'
        });
        $('#province_id').select2({
            placeholder:'@lang('admin::ward.create.CHOOSE_PROVINCE')'
        });
        $('#district_id').select2({
            placeholder:'@lang('admin::ward.create.CHOOSE_DISTRICT')'
        });
        $('#type').select2({
            placeholder:'@lang('admin::ward.create.CHOOSE_TYPE')'
        });
        //Thông báo
        var create_success = '@lang('admin::ward.create.create_success')';
        var create_fail = '@lang('admin::ward.create.create_fail')';
    </script>
    <script src="{{asset('static/backend/js/admin/ward/script.js?v='.time())}}" type="text/javascript"></script>

@stop
