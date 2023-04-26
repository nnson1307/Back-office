@extends('layout-login')
@section('title')
   @lang('Login')
@stop
@section('content')
    <!--begin::Content-->
    <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
        <div class="kt-login__container">
            <div class="kt-login__logo">
                <a href="#">
                    <img src="{{asset('static/backend/images/icon-epoints.png')}}" style="max-width:150px;border-radius: 30px;">
                </a>
            </div>
            <div class="kt-login__signin">
                <form class="kt-form" novalidate="novalidate" method="post">
                    {!! csrf_field() !!}
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="@lang('Email')" name="email" autocomplete="off">
                        @if ($errors->has('email'))
                            <div id="email-error" class="form-control-feedback">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="input-group">
                        <input class="form-control" type="password" placeholder="@lang('Password')" name="password">
                        @if ($errors->has('password'))
                            <div id="password-error"
                                 class="form-control-feedback">{{ $errors->first('password') }}</div>
                        @endif
                    </div>
                    <div class="row kt-login__extra">
                        <div class="col">
                            <label class="kt-checkbox">
                                <input type="checkbox" name="remember">
                                @lang('user::user.general.REMEMBER')
                                <span></span>
                            </label>
                        </div>
                        <div class="col kt-align-right">
                            <a href="javascript:void(0);" id="kt_login_forgot" class="kt-login__link">
                                @lang('user::forget-password.index.FORGET_PASSWORD')
                            </a>
                        </div>
                    </div>
                    <div class="kt-login__actions">
                        <button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">
                            @lang('shared.LOGIN')
                        </button>
                    </div>
                </form>
            </div>
            <div class="kt-login__signup">
                <div class="kt-login__head">
                    <h3 class="kt-login__title">Sign Up</h3>
                    <div class="kt-login__desc">Enter your details to create your account:</div>
                </div>
                <form class="kt-form" action="">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Fullname" name="fullname">
                    </div>
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Email" name="email" autocomplete="off">
                    </div>
                    <div class="input-group">
                        <input class="form-control" type="password" placeholder="Password" name="password">
                    </div>
                    <div class="input-group">
                        <input class="form-control" type="password" placeholder="Confirm Password" name="rpassword">
                    </div>
                    <div class="row kt-login__extra">
                        <div class="col kt-align-left">
                            <label class="kt-checkbox">
                                <input type="checkbox" name="agree">I Agree the <a href="#"
                                                                                   class="kt-link kt-login__link kt-font-bold">terms
                                    and conditions</a>.
                                <span></span>
                            </label>
                            <span class="form-text text-muted"></span>
                        </div>
                    </div>
                    <div class="kt-login__actions">
                        <button id="kt_login_signup_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">Sign
                            Up
                        </button>&nbsp;&nbsp;
                        <button id="kt_login_signup_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
            <div class="kt-login__forgot">
                <div class="kt-login__head">
                    <h3 class="kt-login__title">
                        @lang('user::forget-password.index.TITLE_FORGET_PASSWORD')
                    </h3>
                    <div class="kt-login__desc">
                        @lang('user::forget-password.index.TB_ENTER_EMAIL')
                    </div>
                </div>
                <form id="form-reset">
                    <div class="form-group">
                        <input onkeyup="forgetPass.reset()" class="form-control" type="text" placeholder="Email" name="email_reset" id="email_reset"
                               autocomplete="off">
                        <span class="text-danger error-email-reset"></span>
                    </div>
                    <div class="kt-login__actions form-group text-center">
                        <a style="border-color: #d7d7d7;" id="kt_login_forgot_cancel" class="btn btn-light btn-elevate kt-login__btn-secondary">
                            @lang('user::forget-password.index.CLOSE')
                        </a>
                        <button id="submit-forget" type="button" onclick="forgetPass.init()"
                                class="btn btn-brand btn-elevate kt-login__btn-primary">
                            @lang('user::forget-password.index.GET_PASSWORD')
                        </button>&nbsp;&nbsp;
                    </div>
                </form>
            </div>
            <div class="kt-login__account">
            </div>
        </div>
    </div>

    <!--end::Content-->
@stop

@section('after_script')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    </script>
    <script src="{{asset('static/backend/js/login/login.js?v='.time())}}"
            type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function () {
            KTLoginGeneral.please_enter_email = '@lang('validation.PLEASE_ENTER_EMAIL')';
            KTLoginGeneral.please_enter_password = '@lang('validation.PLEASE_ENTER_PASSWORD')';
            KTLoginGeneral.init();
        });
    </script>
@stop
