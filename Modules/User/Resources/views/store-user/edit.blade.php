@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <form id="form-update">
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('user::store-user.edit.EDIT_STORE_USER')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="update.submit()">
                    @lang('user::store-user.edit.SAVE')
                </button>
                <a href="{{route('user.store-user.create')}}" class="btn btn-secondary btn-bold">
                    @lang('user::store-user.edit.CREATE')
                </a>
                <a href="{{route('user.store-user')}}" class="btn btn-secondary btn-bold">
                    @lang('user::store-user.edit.CANCEL')
                </a>
            </div>
        </div>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('user::store-user.create.USER_ACCOUNT')</label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control" id="user_account" name="user_account" type="tel"
                                   placeholder="@lang('user::store-user.create.PLACEHOLDER_USER_ACCOUNT')"
                                   value="{{$item['phone']}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('user::store-user.create.USER_FULL_NAME')</label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control" type="text" id="fullname" name="fullname"
                                   placeholder="@lang('user::store-user.create.PLACEHOLDER_USER_FULL_NAME')"
                                   value="{{$item['fullname']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('user::store-user.create.USER_STATUS')</label>
                        <div class="col-lg-9 col-xl-9">
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox" id="is_activated"
                                           name="is_activated" {{$item['is_activated'] ? 'checked': ''}}>
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
        var loading_message = '@lang('user::store-user.create.LOADING_MESSAGE')';
        var update_success = '@lang('user::store-user.edit.UPDATE_SUCCESS')';
        var update_fail = '@lang('user::store-user.edit.UPDATE_FAIL')';
        //Validate
        var account_required='@lang('user::validation.store-user.account_required')';
        var account_invalid='@lang('user::validation.store-user.account_invalid')';
        var fullname_required='@lang('user::validation.store-user.fullname_required')';
        var fullname_maxlength='@lang('user::validation.store-user.fullname_maxlength')';
        var password_required='@lang('user::validation.store-user.password_required')';
        var password_length='@lang('user::validation.store-user.password_length')';
        var password_confirm_required='@lang('user::validation.store-user.password_required')';
        var password_confirm_eq_pwd='@lang('user::validation.store-user.password_confirm_eq_pwd')';
    </script>
    <script src="{{asset('static/backend/js/user/store-user/script.js?v='.time())}}" type="text/javascript"></script>
@stop
