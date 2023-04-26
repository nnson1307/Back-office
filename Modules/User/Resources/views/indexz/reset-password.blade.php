@extends('layout-login')

@section('title', 'Reset password')

@section('content')

    <!--begin::Content-->
    @if(isset($user))
        <form id="form-reset">
            <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
                <div class="kt-login__container">
                    <div class="kt-login__signin">
                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Enter New Password...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Confirm New Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                   placeholder="Enter Confirm Password...">
                        </div>
                        <div class="kt-login__actions">
                            <button type="submit" onclick="reset_password.submit_reset({{$user['id']}})"
                                    class="btn btn-brand btn-elevate kt-login__btn-primary">
                                Change your password
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
        <!--end::Content-->
    @else
        <span>Link không tồn tại</span>
    @endif


@stop

@section('after_script')

    <script src="{{asset('js/laroute.js')}}" type="text/javascript"></script>
    <script src="{{asset('static/backend/js/user/reset-password.js?v='.time())}}" type="text/javascript"></script>
@stop
