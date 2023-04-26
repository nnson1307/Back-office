@extends('layout')

@section('header')
    @include('components.header',['title'=> __('user.CREATE_ACCOUNT')])
@endsection

@section('content')
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('user::user-group-notification.index.USER_GROUP_NOTIFICATION')</h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            @include('helpers.breadcrumb', [
                'menuName' => 'Notification',
                'route' => 'user.user-group-notification',
                'pageName' => __('user::user-group-notification.index.USER_GROUP_NOTIFICATION')
            ])
        </div>
        <div class="kt-subheader__toolbar">
            <a href="{{route('user.user-group-notification.create-user-define')}}" class="btn btn-label-brand btn-bold">
                @lang('user::user-group-notification.index.CREATE_USER_DEFINE')
            </a>
            <a href="{{route('user.user-group-notification.create-auto')}}" class="btn btn-label-brand btn-bold">
                @lang('user::user-group-notification.index.CREATE_AUTO')
            </a>
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-padding-0" id="kt_content">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__body">
                <!--end: Search Form -->
                <form id="form-filter" action="{{route('user.user-group-notification')}}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-3">
                                <input type="text" name="keyword_mystore_filter_group$name" class="form-control"
                                       placeholder="@lang('user::user-group-notification.index.USER_GROUP_NAME')"
                                       value="{{$filter['keyword_mystore_filter_group$name']??''}}">
                            </div>
                            <div class="col-lg-3">
                                <select type="text" name="mystore_filter_group$filter_group_type"
                                        class="form-control --select2 ss--width-100">
                                    <option value="">@lang('user::user-group-notification.index.TYPE')</option>
                                    @if(isset($filter['mystore_filter_group$filter_group_type']))
                                        <option value="user_define" {{($filter['mystore_filter_group$filter_group_type']=='user_define'?'selected':'')}}>
                                            @lang('user::user-group-notification.index.SELF_DEFINE')
                                        </option>
                                        <option value="auto" {{($filter['mystore_filter_group$filter_group_type']=='auto'?'selected':'')}}>
                                            @lang('user::user-group-notification.index.GROUP_AUTO')
                                        </option>
                                    @else
                                        <option value="user_define">
                                            @lang('user::user-group-notification.index.SELF_DEFINE')
                                        </option>
                                        <option value="auto">
                                            @lang('user::user-group-notification.index.GROUP_AUTO')
                                        </option>
                                    @endif

                                </select>
                            </div>
                            <div class="col-lg-3">
                                <a class="btn btn-secondary" href="{{route('user.user-group-notification')}}">
                                    @lang('user::user-group-notification.index.REMOVE')
                                </a>
                                <button class="btn btn-primary" type="submit"
                                        style="">@lang('user::user-group-notification.index.SEARCH')
                                </button>
                            </div>
                        </div>
                    </div>
                    @include('user::user-group-notification.list')
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
    <script src="{{asset('static/backend/js/user/user-group/script.js?v='.time())}}" type="text/javascript"></script>
@endsection
