@extends('layout')
@section('header')
    @include('components.header', ['title' => 'Config'])
@endsection
@section('content')
    <form id="form-edit" method="POST">
        {{ csrf_field() }}
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    @lang('admin::profile.change_password.TITLE_CHANGE_PASSWORD')
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>
                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="profile.changePass()">
                    @lang('admin::profile.change_password.SAVE')
                </button>
            </div>
        </div>
        <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::profile.change_password.CURRENT_PASSWORD')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="password" class="form-control" id="current_pass" name="current_pass">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::profile.change_password.NEW_PASSWORD')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="password" class="form-control" id="new_pass" name="new_pass">
                                    </div>
                                </div>
                                <div class="form-group form-group-last row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::profile.change_password.CONFIRM_PASSWORD')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="password" class="form-control" id="pass_confirm" name="pass_confirm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/profile/script.js?v='.time()) }}"></script>
@endsection
