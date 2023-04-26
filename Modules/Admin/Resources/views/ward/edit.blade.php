@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <form id="form-update">
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('admin::ward.edit.TITLE_EDIT_WARD')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="update.submit('{{$ward['ward_id']}}')">
                    @lang('admin::ward.edit.UPDATE')
                </button>
                <a href="{{route('admin.ward')}}" class="btn btn-secondary btn-bold">
                    @lang('admin::ward.edit.CANCEL')
                </a>
            </div>
        </div>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::ward.edit.COUNTRY')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control" id="country_id" name="country_id" style="width: 100%;">
                                <option></option>
                                @foreach($optionCountry as $key=>$item)
                                    <option value="{{$key}}" {{$ward['country_id']==$key ? 'selected':''}}>{{$item}}</option>
                                @endforeach
                            </select>
                            <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::ward.edit.PROVINCE')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control" id="province_id" name="province_id" style="width: 100%;">
                                <option></option>
                            </select>
                            <span class="form-text text-muted"></span>
                        </div>
                        <input type="hidden" name="province_load" id="province_load" value="{{$ward['province_id']}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::ward.edit.DISTRICT')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control" id="district_id" name="district_id" style="width: 100%;">
                                <option></option>
{{--                                @foreach($optionDistrict as $key=>$item)--}}
{{--                                    <option value="{{$key}}" {{$ward['district_id']==$key ? 'selected':''}}>{{$item}}</option>--}}
{{--                                @endforeach--}}
                            </select>
                            <span class="form-text text-muted"></span>
                        </div>
                        <input type="hidden" name="district_load" id="district_load" value="{{$ward['district_id']}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::ward.edit.WARD_NAME')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control" id="name" name="name" type="text"
                                   placeholder="@lang('admin::ward.edit.PLACE_HOLDER_WARD_NAME')" value="{{$ward['name']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::ward.edit.WARD_CODE')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control" type="text" id="ward_code" name="ward_code"
                                   placeholder="@lang('admin::ward.edit.PLACE_HOLDER_WARD_CODE')" value="{{$ward['ward_code']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::ward.edit.TYPE')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control" id="type" name="type" style="width: 100%;">
                                <option></option>
                                @if($ward['type']=='Phường')
                                    <option value="Phường" selected>@lang('admin::ward.edit.PHUONG')</option>
                                    <option value="Xã">@lang('admin::ward.edit.XA')</option>
                                    <option value="Thị trấn">@lang('admin::ward.edit.THI_TRAN')</option>
                                @elseif($ward['type']=='Xã')
                                    <option value="Phường">@lang('admin::ward.edit.PHUONG')</option>
                                    <option value="Xã" selected>@lang('admin::ward.edit.XA')</option>
                                    <option value="Thị trấn">@lang('admin::ward.edit.THI_TRAN')</option>
                                @else
                                    <option value="Phường">@lang('admin::ward.edit.PHUONG')</option>
                                    <option value="Xã">@lang('admin::ward.edit.XA')</option>
                                    <option value="Thị trấn" selected>@lang('admin::ward.edit.THI_TRAN')</option>
                                @endif
                            </select>
                            <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::ward.edit.STATUS')</label>
                        <div class="col-lg-9 col-xl-9">
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox" id="is_actived"
                                           name="is_actived" {{$ward['is_actived'] ? 'checked': ''}}>
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
            placeholder:'@lang('admin::ward.edit.CHOOSE_COUNTRY')'
        });
        $('#province_id').select2({
            placeholder:'@lang('admin::ward.edit.CHOOSE_PROVINCE')'
        });
        $('#district_id').select2({
            placeholder: '@lang('admin::ward.edit.CHOOSE_DISTRICT')'
        });
        $('#type').select2({
            placeholder: '@lang('admin::ward.edit.CHOOSE_TYPE')'
        });
        //Thông báo
        var update_success = '@lang('admin::ward.edit.update_success')';
        var update_fail = '@lang('admin::ward.edit.update_fail')';
    </script>
    <script src="{{asset('static/backend/js/admin/ward/script.js?v='.time())}}" type="text/javascript"></script>

@stop
