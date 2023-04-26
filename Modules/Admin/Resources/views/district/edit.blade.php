@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <form id="form-update">
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('admin::district.edit.TITLE_UPDATE_DISTRICT')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="update.submit({{$district['district_id']}})">
                    @lang('admin::district.edit.UPDATE')
                </button>
                <a href="{{route('admin.district')}}" class="btn btn-secondary btn-bold">
                    @lang('admin::district.edit.CANCEL')
                </a>
            </div>
        </div>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::district.edit.COUNTRY')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control" id="country_id" name="country_id" style="width: 100%;">
                                <option></option>
                                @foreach($optionCountry as $key=>$item)
                                    <option value="{{$key}}" {{$district['country_id']==$key ? 'selected':''}}>{{$item}}</option>
                                @endforeach
                            </select>
                            <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::district.edit.PROVINCE')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control" id="province_id" name="province_id" style="width: 100%;">
                                <option></option>
                            </select>
                            <span class="form-text text-muted"></span>
                        </div>
                        <input type="hidden" name="province_load" id="province_load" value="{{$district['province_id']}}">
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::district.edit.DISTRICT_NAME')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control" id="name" name="name" type="text"
                                   placeholder="@lang('admin::district.edit.PLACE_HOLDER_DISTRICT_NAME')" value="{{$district['name']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::district.edit.DISTRICT_CODE')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control" type="text" id="district_code" name="district_code"
                                   placeholder="@lang('admin::district.edit.PLACE_HOLDER_DISTRICT_CODE')" value="{{$district['district_code']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::district.edit.TYPE')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control" id="type" name="type" style="width: 100%;">
                                <option></option>
                                @if($district['type']=='Quận')
                                    <option value="Quận" selected>@lang('admin::district.edit.QUAN')</option>
                                    <option value="Huyện">@lang('admin::district.edit.HUYEN')</option>
                                    <option value="Thị xã">@lang('admin::district.edit.THI_XA')</option>
                                @elseif($district['type']=='Huyện')
                                    <option value="Quận">@lang('admin::district.edit.QUAN')</option>
                                    <option value="Huyện" selected>@lang('admin::district.edit.HUYEN')</option>
                                    <option value="Thị xã">@lang('admin::district.edit.THI_XA')</option>
                                @else
                                    <option value="Quận">@lang('admin::district.edit.QUAN')</option>
                                    <option value="Huyện">@lang('admin::district.edit.HUYEN')</option>
                                    <option value="Thị xã" selected>@lang('admin::district.edit.THI_XA')</option>
                                @endif
                            </select>
                            <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::district.edit.STATUS')</label>
                        <div class="col-lg-9 col-xl-9">
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox" name="is_actived"
                                           id="is_actived" {{$district['is_actived'] ? 'checked': ''}}>
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
            placeholder:'@lang('admin::district.edit.CHOOSE_COUNTRY')'
        });
        $('#province_id').select2({
            placeholder: '@lang('admin::district.edit.CHOOSE_PROVINCE')'
        });
        $('#type').select2({
            placeholder: '@lang('admin::district.edit.CHOOSE_TYPE')'
        });
        //Thông báo
        var update_success = '@lang('admin::district.edit.update_success')';
        var update_fail = '@lang('admin::district.edit.update_fail')';
    </script>
    <script src="{{asset('static/backend/js/admin/district/script.js?v='.time())}}" type="text/javascript"></script>

@stop
