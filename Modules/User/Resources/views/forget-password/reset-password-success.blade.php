@extends('layout-login')
@section('title')
    @lang('Login')
@stop
@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
        <div class="kt-login__container">
            <div class="kt-login__logo">
                <a href="#">
                    <img src="{{asset('static/backend/images/icon-epoints.png')}}"
                         style="max-width:150px;border-radius: 30px;">
                </a>
            </div>
            <div class="kt-login__signin remove-class">
                <div class="kt-login__head">
                    <h6 class="kt-login__title" style="font-size: 1.3rem !important;">
                        @lang('user::forget-password.index.CHANGE_PASSWORD_SUCCESS')
                    </h6>
                    <div class="kt-login__desc">
                        @lang('user::forget-password.index.CHANGE_PASSWORD_LOGIN_NEW')
                    </div>
                </div>
            </div>
            <div class="kt-login__actions form-group text-center remove-class">
                <button id="kt_login_forgot_cancel" onclick="forgetPassword.proceedToLogin()"
                        class="btn btn-brand btn-elevate kt-login__btn-primary">
                    @lang('user::forget-password.index.LOGIN')
                </button>
            </div>
        </div>
    </div>
@stop
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/login/forget-password.js?v='.time()) }}">
    </script>
@stop

