@extends('layout')

@section('header')
    @include('components.header',['title'=> __('user.CREATE_ACCOUNT')])
@endsection

@section('content')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">

            <h3 class="kt-subheader__title">@lang('user::user.index.MANAGEMENT_ACCOUNT')</h3>

            <span class="kt-subheader__separator kt-hidden"></span>
            @include('helpers.breadcrumb', [
                'menuName' => 'Tài khoản',
                'route' => 'user.my-store',
                'pageName' => __('user::user.index.MANAGEMENT_ACCOUNT')
            ])
        </div>
        <div class="kt-subheader__toolbar">
            <a href="{{route('user.my-store.create')}}" class="btn btn-label-brand btn-bold">
                @lang('user::user.index.CREATE')
            </a>
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-padding-0" id="kt_content">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__body">
                <!--end: Search Form -->
                <form id="form-filter" action="{{route('user.my-store')}}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <input type="text" name="keyword_admin$email" class="form-control"
                                       placeholder="Tên tài khoản" value="{{$filter['keyword_admin$email']??''}}">
                            </div>
                            <div class="col-lg-3">
                                <input type="text" name="keyword_admin$full_name" class="form-control"
                                       placeholder="Họ và tên" value="{{$filter['keyword_admin$full_name']??''}}">
                            </div>
                            <div class="col-lg-3">
                                <select type="text" name="admin$is_actived"
                                        class="form-control --select2 ss--width-100">
                                    <option value="">@lang('user::user.index.STATUS')</option>
                                    @if(isset($filter['admin$is_actived']))
                                        <option value="1" {{($filter['admin$is_actived']=='1'?'selected':'')}}>@lang('user::user.index.ACTIVE-SELECT')
                                        </option>
                                        <option value="0" {{($filter['admin$is_actived']=='0'?'selected':'')}}>@lang('user::user.index.INACTIVE-SELECT')
                                        </option>
                                    @else
                                        <option value="1">@lang('user::user.index.ACTIVE-SELECT')</option>
                                        <option value="0">@lang('user::user.index.INACTIVE-SELECT')</option>
                                    @endif

                                </select>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-secondary" href="{{route('user.my-store')}}">
                                    @lang('user::user.index.REMOVE')
                                </a>
                                <button class="btn btn-primary"
                                        style="">@lang('user::user.index.SEARCH')
                                </button>
                            </div>
                        </div>
                    </div>
                    @include('user::index.list')
                </form>
            </div>
        </div>
    </div>
    @include('user::index.modal.modal-reset-password')
    @include('user::index.modal.modal-reset-password-success')
@endsection
@section('after_style')
    <link href="{{asset('static/backend/css/product.css?v='.time())}}" type="text/javascript"/>
@endsection
@section('after_script')
    @if(session()->has('remove-user'))
        <script>
            swal.fire("@lang('user::user.index.REMOVE_SUCCESS')", '', "success");
        </script>
    @endif
    <script type="text/template" id="tpl-not-auto-password">
        <div class="kt-input-icon kt-input-icon--right mt-3">
            <input type="password" class="form-control" id="password2" name="password2"
                   placeholder="@lang('user::store-user.reset-password.PLACEHOLDER_PASSWORD')">
            <a href="javascript:void(0)" onclick="list.show_password('#password2')"
               class="kt-input-icon__icon kt-input-icon__icon--right">
                <span class="kt-input-icon__icon kt-input-icon__icon--right">
                    <span><i class="la la-eye"></i></span>
                 </span>
            </a>
        </div>
        {{--<div class="kt-input-icon kt-input-icon--right mt-3">--}}
            {{--<input type="password" class="form-control" id="confirm_password2" name="confirm_password2"--}}
                   {{--placeholder="Xác nhận mật khẩu">--}}
            {{--<a href="javascript:void(0)" onclick="list.show_password('#confirm_password2')"--}}
               {{--class="kt-input-icon__icon kt-input-icon__icon--right">--}}
                {{--<span class="kt-input-icon__icon kt-input-icon__icon--right">--}}
                    {{--<span><i class="la la-eye"></i></span>--}}
                 {{--</span>--}}
            {{--</a>--}}
        {{--</div>--}}
    </script>
    <script type="text/template" id="tpl-auto-password">
        <div class="kt-input-icon kt-input-icon--right mt-3">
            <input type="password" class="form-control" id="password" name="password"
                   placeholder="@lang('user::store-user.reset-password.PLACEHOLDER_PASSWORD')">
            <a href="javascript:void(0)" onclick="list.show_password('#password')"
               class="kt-input-icon__icon kt-input-icon__icon--right">
                <span class="kt-input-icon__icon kt-input-icon__icon--right">
                    <span><i class="la la-eye"></i></span>
                 </span>
            </a>
        </div>
    </script>
    <script>
        var CHANGE_STATUS_SUCCESS="@lang('user::user.index.CHANGE_STATUS_SUCCESS')"
    </script>
    <script src="{{asset('static/backend/js/user/my-store/add.js?v='.time())}}" type="text/javascript"></script>
@endsection
