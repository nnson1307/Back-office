@extends('layout')

@section('header')
    @include('components.header',['title'=> __('user::user-group-notification.create.TITLE')])
@stop
@section('content')
    <style>
        #modal-add-user .table td {
            padding: 0.7rem;
            vertical-align: top;
            border-top: 1px solid #ebedf2;
        }
        #modal-add-user .modal-header {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            padding: 1.2rem;
            border-bottom: 1px solid #ebedf2;
            border-top-left-radius: 0.3rem;
            border-top-right-radius: 0.3rem;
        }
    </style>
    <div id="form-adds">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    <span class="kt-subheader__title" id="kt_subheader_total">
                        @lang('user::user-group-notification.create.TITLE_SELF_DEFINE')
                    </span>
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
									<span class="kt-subheader__desc text-capitalize" id="kt_subheader_total">
										Trang chủ > Nhóm khách hàng > Tạo mới nhóm khách hàng tự định nghĩa
                                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">

                <div class="btn-group">
                    <button type="button" class="btn btn-primary" onclick="userGroupDefine.save(1)">
                        @lang('user::user-group-notification.create.SAVE_CHANGE_NEW')
                    </button>
                    <button type="button" class="btn btn-primary" onclick="userGroupDefine.save(0)">
                        @lang('user::user-group-notification.create.SAVE_CHANGE')
                    </button>
                    <a href="{{route('user.user-group-notification')}}" class="btn btn-secondary">
                        @lang('user::user-group-notification.create.CANCEL')
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
                                        <div class="form-group row">
                                            <div class="col-lg-2 kt-padding-0">
                                                <div class="form-group">
                                                    <label class="col-xl-12 col-lg-12 col-form-label">
                                                        @lang('user::user-group-notification.create.USER_GROUP_NAME')
                                                        <span class="color_red"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control"
                                                           id="name"
                                                           name="name"
                                                           placeholder="">
                                                    <span class="text-danger error-name"></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-2"></div>
                                            <div class="col-lg-2">
                                                <div class="kt-portlet ss--border-1px">
                                                    <div class="kt-widget14">
                                                        <div class="kt-widget14__content">
                                                            <div class="kt-widget14__legends ss--padding-left-0">
                                                                <div class="kt-widget14__legend">
                                                                    <span class="kt-widget14__stats kt-portlet__head-title" style="color: #656569;">
                                                                        0 @lang('user::user-group-notification.create.USER_INVALID')</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12 ss-font-size-13rem">
                                                @lang('user::user-group-notification.create.LIST_USER')
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-3">
                                                <input type="text" name="define_phone" id="define_phone" class="form-control"
                                                       placeholder="@lang('user::user-group-notification.create.ACCOUNT')"
                                                       value="">
                                            </div>
                                            <div class="col-lg-3">
                                                <input type="text" name="define_full_name" id="define_full_name" class="form-control"
                                                       placeholder="@lang('user::user-group-notification.create.FULL_NAME')"
                                                       value="">
                                            </div>
                                            <div class="col-lg-3">
                                                <select type="text" name="define_is_actived" id="define_is_actived"
                                                        class="form-control select-2 ss-width-100pt">
                                                    <option value="">@lang('user::user-group-notification.create.STATUS')</option>
                                                    <option value="1">@lang('user::user-group-notification.create.IS_ACTIVE')</option>
                                                    <option value="0">@lang('user::user-group-notification.create.UN_ACTIVE')</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-3">
                                                <button type="button" class="btn btn-primary" onclick="userGroupDefine.searchUserDefine()"
                                                        style="">@lang('user::user-group-notification.create.SEARCH')
                                                </button>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12 table-list-user-group-define">
                                                {{--Danh sách khách hàng--}}
                                                @include('user::user-group-notification.user-define.include.table-list-user')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user::user-group-notification.user-define.modal.add-user')
    @include('user::user-group-notification.user-define.modal.add-user-2')
    @include('user::user-group-notification.user-define.modal.import-excel')
@endsection
@section('after_script')
    <script src="{{asset('static/backend/js/user/user-group/add-user-group-define.js?v='.time())}}" type="text/javascript"></script>
@stop
