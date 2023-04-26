@extends('layout-login')

@section('content')
    <!--    --><?php //dd(session('user_info')); ?>
    <!--begin::Content-->
    <div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
        <div class="kt-login__container">
            <div class="kt-login__logo">
                {{--                <img src="{{asset(session('user_info')->avatar)}}" style="max-width:150px;"><br/>--}}
                {{--                <span>{{session('user_info')->email}}</span>--}}
                <div class="kt-widget kt-widget--user-profile-4">
                    <div class="kt-widget__head">
                        <div class="kt-widget__media">
                            @if(session('user_info')->avatar)
                                <img class="kt-widget__img kt-hidden-" src="{{asset(session('user_info')->avatar)}}"
                                     alt="image">
                            @else
                                <img class="kt-widget__img kt-hidden-"
                                     src="{{asset('static/backend/images/logo-v1.png')}}"
                                     alt="image" style="border-radius: 20px !important;">
                            @endif
                        </div>
                        <div class="kt-widget__content">
                            <div class="kt-widget__section">
                                <span class="kt-widget__username">
                                    {{session('user_info')->email}}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-login__signin">
                <form class="kt-form" id="form-auth" novalidate="novalidate">
                    {!! csrf_field() !!}
                    <input type="hidden" name="email" value=" {{session('user_info')->email}}">
                    <input type="hidden" name="password" value="{{session('user_info')->password}}">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter Code..." name="verify" id="verify"
                               autocomplete="off">
                    </div>
                    <div class="kt-login__actions">
                        <button id="kt_login_signin_submit" class="btn btn-brand btn-elevate kt-login__btn-primary">
                            Confirm
                        </button>
                    </div>
                </form>
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
    <script>
        $('#kt_login_signin_submit').click(function () {
            var _frm = $('#form-auth');
            _frm.validate({
                rules: {
                    verify: 'required'
                },
                submitHandler: function () {
                    $.post(laroute.route('submit-two-factory-auth'),_frm.serialize(),function (res) {
                        window.location = res.url;
                    })
                }
            });
        });
    </script>
@stop
