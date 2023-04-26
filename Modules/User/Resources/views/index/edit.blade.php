@extends('layout')

@section('header')
    @include('components.header',['title'=> __('user.user.create.CREATE_ACCOUNT')])
@stop
@section('content')
    <form id="form-edit">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
{{--                <h3 class="kt-subheader__title">--}}
{{--                    <span class="kt-subheader__title" id="kt_subheader_total">--}}
{{--										@lang('user::user.index.MANAGEMENT_ACCOUNT')--}}
{{--                                    </span>--}}
{{--                </h3>--}}
{{--                <span class="kt-subheader__separator kt-subheader__separator--v"></span>--}}
                <div class="kt-subheader__group" id="kt_subheader_search">
									<span class="kt-subheader__desc text-capitalize" id="kt_subheader_total">
										@lang('user::store-user.edit.EDIT_STORE_USER_BACKOFFICE')
                                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">

                <div class="btn-group">
                    <button type="submit" class="btn btn-brand btn-bold" onclick="Edit.submitEdit('{{$data['id']}}')">
                        @lang('user::user.edit.SAVE_CHANGE')
                    </button>
                    <div class="kt-portlet__head-toolbar">
                        <a href="#" class="btn btn-secondary btn-bold" data-toggle="dropdown" aria-expanded="false">
                            @lang('user::store-user.detail.CHOOSE_ACTION')<i class="flaticon-more-1 ml-2"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="top-end"
                             style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(262px, 11px, 0px);">
                            <ul class="kt-nav">
                                <li class="kt-nav__item">
                                    @include('helpers.button', ['button' => [
                                            'route' => 'user.store-user.show-reset-password',
                                             'html' => '<a href="javascript:void(0)" onclick="list.onlyReset(' . $data['id'] .')" class="kt-nav__link">'
                                             .'<i class="la la-edit"></i>'
                                             .'<span class="kt-nav__link-text kt-margin-l-5">'.__('user::store-user.detail.RESET_PASSWORD').'</span>'.
                                        '</a>'
                                    ]])
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="{{route('user.my-store')}}" class="btn btn-default btn-bold">
                        @lang('user::user.create.CANCEL')
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_apps_user_edit_tab_1" role="tabpanel">
                            <div class="kt-form__body">

                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <label class="col-xl-3"></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('user::user.create.NAME'):
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input type="text" class="form-control"
                                                       id="full_name"
                                                       name="full_name"
                                                       placeholder=""
                                                       value="{{$data['full_name']}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('user::user.create.EMAIL'):
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
{{--                                                <input type="text" class="form-control" disabled--}}
{{--                                                       id="email"--}}
{{--                                                       name="email"--}}
{{--                                                       placeholder=""--}}
{{--                                                       value="{{$data['email']}}">--}}
                                                <p>{{$data['email']}}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 col-form-label">
                                                @lang('user::user.index.ACTIVE'):
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                {{--<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">--}}
                                                    {{--<label>--}}
                                                        {{--<input type="checkbox" {{$data['is_actived']==1?'checked':''}} name="is_actived" id="is_actived">--}}
                                                        {{--<span></span>--}}
                                                    {{--</label>--}}
                                                {{--</span>--}}
                                                {{--<select class="form-control --select2 ss--width-100" name="is_actived" id="is_actived">--}}
                                                    {{--<option value="1" >TRUE</option>--}}
                                                    {{--<option value="0" {{$data['is_actived']==0?'selected':''}}>FALSE</option>--}}
                                                {{--</select>--}}
                                                <label class="kt-switch kt-switch--success">
                                                    <input type="checkbox" {{$data['is_actived']==1?'checked':''}} name="is_actived" id="is_actived">
                                                    <span></span>
                                                </label>
                                            </div>
                                        </div>
                                        {{--<div class="form-group row">--}}
                                            {{--<label class="col-xl-3 col-lg-3 col-form-label">--}}
                                                {{--@lang('user::user.create.PASSWORD'):--}}
                                                {{--<span class="color_red">*</span></label>--}}
                                            {{--<div class="col-lg-9 col-xl-6">--}}
                                                {{--<input type="password" class="form-control"--}}
                                                       {{--id="password"--}}
                                                       {{--name="password"--}}
                                                       {{--placeholder=""--}}
                                                {{--value="">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group row">--}}
                                            {{--<label class="col-xl-3 col-lg-3 col-form-label">--}}
                                                {{--@lang('user::user.create.CONFIRM_PASSWORD'):</label>--}}
                                            {{--<div class="col-lg-9 col-xl-6">--}}
                                                {{--<input type="password" class="form-control"--}}
                                                       {{--id="password_confirm"--}}
                                                       {{--name="password_confirm"--}}
                                                       {{--placeholder="">--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="form-group row">--}}
                                            {{--<label class="col-xl-3 col-lg-3 col-form-label">--}}
                                                {{--@lang('user::user.create.ADMIN_MENU'):--}}
                                            {{--</label>--}}
                                            {{--<div class="col-lg-9 col-xl-6">--}}
                                                {{--<select class="form-control --select2 ss--width-100" name="default_menu"--}}
                                                        {{--id="default_menu">--}}
                                                    {{--<option value="">@lang('user::user.create.ADMIN_MENU')</option>--}}
                                                    {{--@foreach($optionAdminMenu as $key=>$value)--}}
                                                        {{--<option value="{{$key}}" {{$data['default_menu']==$key?'selected':''}}>{{$value}}</option>--}}
                                                    {{--@endforeach--}}
                                                {{--</select>--}}
                                                {{--<span class="form-text text-muted"></span>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet kt-portlet--tabs">
                @include('user::index.edit.include.tabs')
            </div>
        </div>
    </form>

    @include('user::index.modal.modal-reset-password')
    @include('user::index.modal.modal-reset-password-success')
@endsection

@section('after_script')
    <script>
        var PLEASE_ENTER_NAME = '@lang('user::user.edit.PLEASE_ENTER_NAME')';
        var PLEASE_ACTIVE = '@lang('user::user.edit.PLEASE_ACTIVE')';
        var PLEASE_ENTER_ADMIN_MENU = '@lang('user::user.create.PLEASE_ENTER_ADMIN_MENU')';
        var PLEASE_ENTER_CONFIRM_PASSWORD = '@lang('user::user.create.PLEASE_ENTER_CONFIRM_PASSWORD')';
    </script>
    <script src="{{asset('static/backend/js/user/my-store/add.js?v='.time())}}" type="text/javascript"></script>
    <script src="{{asset('static/backend/js/user/my-store/edit.js?v='.time())}}" type="text/javascript"></script>
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
@stop
