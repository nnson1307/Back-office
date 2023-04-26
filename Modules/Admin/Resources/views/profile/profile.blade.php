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
                    @lang('admin::profile.profile.TITLE_PROFILE')
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>
                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="profile.save()">
                    @lang('admin::profile.profile.SAVE')
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
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::profile.profile.AVATAR')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar">
                                            <div id="logo-image">
                                                <div class="kt-avatar__holder"
                                                     style="background-image: url({{$item['avatar'] != null ? $item['avatar'] : asset('static/backend/images/default-placeholder.png')}})"></div>
                                            </div>
                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen"></i>
                                                <input type="file" id="profile_avatar" name="profile_avatar"
                                                       accept="image/jpeg,image/png,image/jpeg,jpg|png|jpeg"
                                                       onchange="profile.uploadAvatar(this);">
                                                <input type="hidden" id="avatar" name="avatar"
                                                       value="{{$item['avatar']}}">
                                            </label>
                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                                  data-original-title="Cancel avatar">
                                                    <i class="fa fa-times"></i>
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::profile.profile.FULL_NAME')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control" type="text" id="full_name" name="full_name"
                                               value="{{$item['full_name']}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::profile.profile.PHONE')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="la la-phone"></i></span></div>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                   value="{{$item['phone']}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::profile.profile.EMAIL')</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i
                                                            class="la la-at"></i></span></div>
                                            <input type="text" class="form-control" id="email" name="email"
                                                   value="{{$item['email']}}" disabled>
                                        </div>
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
    <script type="text/template" id="logo-tpl">
        <div class="kt-avatar__holder" style="background-image: url({link});background-position: center;"></div>
    </script>
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/profile/script.js?v='.time()) }}"></script>
@endsection
