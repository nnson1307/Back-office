@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <form id="form-update">
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('admin::province.edit.edit_province')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="update.submit({{$province['province_id']}})">
                    @lang('admin::province.edit.SAVE')
                </button>
                <a href="{{route('admin.province')}}" class="btn btn-secondary btn-bold">
                    @lang('admin::province.edit.CANCEL')
                </a>
            </div>
        </div>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::province.edit.COUNTRY')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control" id="country_id" name="country_id" style="width: 100%;">
                                <option></option>
                                @foreach($optionCountry as $key=>$item)
                                    <option value="{{$key}}" {{$province['country_id']==$key ? 'selected':''}}>{{$item}}</option>
                                @endforeach
                            </select>
                            <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::province.edit.PROVINCE_NAME')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control" id="name" name="name" type="text"
                                   placeholder="@lang('admin::province.edit.PLACE_HOLDER_PROVINCE_NAME')" value="{{$province['name']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::province.edit.PROVINCE_CODE')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control" type="text" id="province_code" name="province_code"
                                   placeholder="@lang('admin::province.edit.PLACE_HOLDER_PROVINCE_CODE')" value="{{$province['province_code']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::province.edit.TYPE')<span class="color_red">*</span>
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control" id="type" name="type" style="width: 100%;">
                                <option></option>
                                @if($province['type']=='Tỉnh')
                                    <option value="Tỉnh" selected>@lang('admin::province.edit.TYPE_TOWN')</option>
                                    <option value="Thành phố">@lang('admin::province.edit.TYPE_CITY')</option>
                                @else
                                    <option value="Tỉnh">@lang('admin::province.edit.TYPE_TOWN')</option>
                                    <option value="Thành phố" selected>@lang('admin::province.edit.TYPE_CITY')</option>
                                @endif
                            </select>
                            <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::province.edit.STATUS')</label>
                        <div class="col-lg-9 col-xl-9">
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox" id="is_actived"
                                           name="is_actived" {{$province['is_actived'] ? 'checked': ''}}>
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
            placeholder: '@lang('admin::province.create.CHOOSE_COUNTRY')'
        });
        $('#type').select2({
            placeholder: '@lang('admin::province.create.CHOOSE_TYPE')'
        });
        //Thông báo
        var update_success = '@lang('admin::province.edit.update_success')';
        var update_fail = '@lang('admin::province.edit.update_fail')';
        //Valid
        var name_required = '@lang('admin::validation.province.name_required')';
        var code_required = '@lang('admin::validation.province.code_required')';
        var country_required = '@lang('admin::validation.province.country_required')';
        var type_required = '@lang('admin::validation.province.type_required')';
    </script>
    <script src="{{asset('static/backend/js/admin/province/script.js?v='.time())}}" type="text/javascript"></script>

@stop
