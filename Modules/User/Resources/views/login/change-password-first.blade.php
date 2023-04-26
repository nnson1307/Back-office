@extends('layout-login')
@section('title')
    @lang('Login')
@endsection
@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
        <div class="kt-login__container">
            <div class="kt-login__logo">
                <a href="#">
                    <img src="{{asset('static/backend/images/icon-epoints.png')}}" style="max-width:150px;border-radius: 30px;">
                </a>
            </div>

            <div class="kt-login__signin">
                <form class="kt-form" novalidate="novalidate" action="{{ route('change-password-first') }}" method="post" id="frm-changepwd">
                    @if ($errors->has('error'))
                        <div class="kt-alert kt-alert--outline alert alert-danger alert-dismissible animated fadeIn" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                            <span>{{$errors->first('error')}}</span>
                        </div>
                    @endif
                    {!! csrf_field() !!}
                    <div class="input-group">
                        <input class="form-control {{ ($errors->has('currentpassword')) ? 'is-invalid' : '' }}"
                               type="password" id="currentpassword"
                               minlength="8" maxlength="20"
                               placeholder="@lang('Password')"
                               name="currentpassword">
                        @if ($errors->has('currentpassword'))
                            <div id="currentpassword-error"
                                 class="error invalid-feedback">{{ $errors->first('currentpassword') }}</div>
                        @endif
                    </div>
                    <div class="input-group">
                        <input class="form-control {{ ($errors->has('newpassword')) ? 'is-invalid' : '' }}"
                               type="password" id="newpassword"
                               minlength="8" maxlength="20"
                               placeholder="@lang('New Password')"
                               name="newpassword">
                        @if ($errors->has('newpassword'))
                            <div id="newpassword-error"
                                 class="error invalid-feedback">{{ $errors->first('newpassword') }}</div>
                        @endif
                    </div>
                    <div class="input-group">
                        <input class="form-control {{ ($errors->has('confirmpassword')) ? 'is-invalid' : '' }}"
                               type="password" id="confirmpassword"
                               minlength="8" maxlength="20"
                               placeholder="@lang('Confirm Password')"
                               name="confirmpassword">
                        @if ($errors->has('confirmpassword'))
                            <div id="confirmpassword-error"
                                 class="error invalid-feedback">{{ $errors->first('confirmpassword') }}</div>
                        @endif
                    </div>
                    <div class="kt-login__actions">
                        <button type="button" onclick="changePwdFirst.backToLogin()" class="btn btn-light btn-elevate kt-login__btn-secondary">
                            @lang('shared.BACK_TO_LOGIN')
                        </button>
                        <button type="button" onclick="changePwdFirst.submit()" class="btn btn-brand btn-elevate kt-login__btn-primary">
                            @lang('shared.CHANGE_PASSWORD')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/login/change-password-first.js?v='.time()) }}"></script>
    <script type="text/javascript">
        changePwdFirst.init();
    </script>
@endsection
