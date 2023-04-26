@extends('layout')

@section('header')
    @include('components.header',['title'=> __('user.user.create.CREATE_ACCOUNT')])
@stop

@section('content')
    <form id="form-add">
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
{{--                <h3 class="kt-subheader__title">--}}
{{--                    <span class="kt-subheader__desc text-capitalize" id="kt_subheader_total">--}}
{{--                        @lang('admin::notification.create.SEND_NOTIFICATION')--}}
{{--                    </span>--}}
{{--                </h3>--}}
{{--                <span class="kt-subheader__separator kt-subheader__separator--v"></span>--}}
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc text-capitalize" id="kt_subheader_total">
                        @lang('admin::notification.create.CREATE_NOTIFICATION')
                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">

                <div class="btn-group">
                    <button type="button" class="btn btn-brand btn-bold" id="submit-store" onclick="script.submit_add(0)">
                        @lang('admin::notification.create.BTN_STORE_RELOAD')
                    </button>
                    <button type="button" class="btn btn-brand btn-bold" id="submit-store" onclick="script.submit_add(1)">
                        @lang('admin::notification.create.BTN_STORE_EXIT')
                    </button>
                    <a href="{{ route('admin.notification') }}" class="btn btn-default btn-bold">
                        @lang('admin::notification.create.BTN_CANCEL')
                    </a>
                </div>
            </div>
        </div>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid fix-margin" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_apps_user_edit_tab_1" role="tabpanel">
                            <div class="kt-form__body">
                                <div class="kt-section kt-section--first">
                                    <div class="kt-section__body">
                                        <div class="row">
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">
                                                    @lang('admin::notification.create.form.header.INFO_RECEIVER')
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3">
                                                @lang('admin::notification.create.form.RECEIVER'):
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="kt-radio-list">
                                                    <label class="kt-radio kt-radio--bold">
                                                        <input type="radio" name="send_to" value="all" checked>
                                                        @lang('admin::notification.create.form.SEND_ALL_USER')
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-radio kt-radio--bold">
                                                        <input type="radio" name="send_to" value="group">
                                                        @lang('admin::notification.create.form.SEND_GROUP')
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div id="cover-group" style="display: none;">

                                                    <div class="row" style="margin-top: 10px;">
                                                        <div class="col-4">
                                                            <button type="button" class="btn btn-brand btn-bold" onclick="handleClickGroup()">
                                                                @lang('admin::notification.create.form.BTN_ADD_SEGMENT')
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">
                                                    @lang('admin::notification.create.form.header.CONTENT')
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3">
                                                @lang('admin::notification.create.form.BACKGROUND'):
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                                    <div id="div-image">
                                                        <div class="kt-avatar__holder"
                                                             style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>
                                                    </div>
                                                    <input type="hidden" id="image" name="background">
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                                           data-original-title="Change avatar">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" id="getFileImage" name="getFileImage"
                                                               accept="image/jpeg,image/png,image/jpeg,jpg|png|jpeg"
                                                               onchange="script.uploadAvatar(this);">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                                          data-original-title="Cancel avatar">
                                                        <i class="fa fa-times"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3">
                                                @lang('admin::notification.create.form.CONTENT_GROUP'):
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control" name="action_group">
                                                    <option value="1">@lang('admin::notification.create.form.ACTION_GROUP.ACTION')</option>
                                                    <option value="0">@lang('admin::notification.create.form.ACTION_GROUP.NON_ACTION')</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3">
                                                @lang('admin::notification.create.form.TITLE'):
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control" name="title" type="text"
                                                       value="{{old('title')}}" placeholder="@lang('admin::notification.create.form.placeholder.TITLE')">
                                                @if ($errors->has('title'))
                                                    <div class="form-control-feedback">{{ $errors->first('title') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3">
                                                @lang('admin::notification.create.form.SHORT_TITLE'):
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <input class="form-control" name="short_title" type="text"
                                                       value="{{old('short_title')}}" placeholder="@lang('admin::notification.create.form.placeholder.SHORT_TITLE')">
                                                @if ($errors->has('short_title'))
                                                    <div class="form-control-feedback">{{ $errors->first('short_title') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3">
                                                @lang('admin::notification.create.form.FEATURE'):
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <textarea class="form-control" name="feature" rows="5">{{ old('feature') }}</textarea>
                                                @if ($errors->has('feature'))
                                                    <div class="form-control-feedback">{{ $errors->first('feature') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3">
                                                @lang('admin::notification.create.form.CONTENT'):
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <textarea class="form-control" id="content-notification" name="content" rows="5">{{ old('content') }}</textarea>
                                                @if ($errors->has('content'))
                                                    <div class="form-control-feedback">{{ $errors->first('content') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- ACTION--}}
                                        <div id="cover-action">
                                            <div class="row">
                                                <div class="col-lg-9 col-xl-6">
                                                    <h3 class="kt-section__title kt-section__title-sm">
                                                        @lang('admin::notification.create.form.header.ACTION')
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3">
                                                    @lang('admin::notification.create.form.ACTION_NAME'):
                                                    <span class="color_red">*</span></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" name="action_name" type="text" id="action_name"
                                                           value="{{old('action_name')}}" placeholder="@lang('admin::notification.create.form.placeholder.ACTION_NAME')">
                                                    @if ($errors->has('action_name'))
                                                        <div class="form-control-feedback">{{ $errors->first('action_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3">
                                                    @lang('admin::notification.create.form.END_POINT'):
                                                    <span class="color_red">*</span></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control" id="end_point" name="end_point">
                                                        @foreach($notiTypeList as $notiType)
                                                            @if($notiType['from'] == 'backoffice' || $notiType['from'] == 'all')
                                                                <option value="{{ $notiType['action'] }}" data-id="{{ $notiType['id'] }}" is-detail="{{ $notiType['is_detail'] }}" data-type="{{ $notiType['detail_type'] }}">{{ $notiType['type_name'] }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row" id="end-point-detail" style="display: none;">
                                                <label class="col-xl-3 col-lg-3">
                                                    @lang('admin::notification.create.form.END_POINT_DETAIL'):
                                                    <span class="color_red">*</span></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" name="end_point_detail_click" id="end_point_detail_click" type="text" onclick="handleClick()"
                                                           placeholder="@lang('admin::notification.create.form.placeholder.END_POINT_DETAIL')" readonly>
                                                    <input class="form-control" name="end_point_detail" type="hidden">
                                                    <input class="form-control" name="is_detail" type="hidden">
                                                    <input class="form-control" name="notification_type_id" type="hidden">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- END ACTION--}}

                                        {{-- SEND --}}
                                        <div class="row">
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">
                                                    @lang('admin::notification.create.form.header.SCHEDULE')
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3">
                                                @lang('admin::notification.create.form.SCHEDULE'):
                                                <span class="color_red">*</span></label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="kt-radio-list">
                                                    <label class="kt-radio kt-radio--bold">
                                                        <input type="radio" name="send_time_radio" value="0" checked> @lang('admin::notification.create.form.SEND_NOW')
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-radio kt-radio--bold">
                                                        <input type="radio" name="send_time_radio" value="1"> @lang('admin::notification.create.form.SEND_SCHEDULE')
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div id="schedule-time" style="display: none;">
                                                    <div class="row">
                                                        <div class="col-xl-5">
                                                            <select class="form-control" name="schedule_time">
                                                                <option value="specific_time">
                                                                    @lang('admin::notification.create.form.SPECIFIC_TIME')
                                                                </option>
                                                                <option value="non_specific_time">
                                                                    @lang('admin::notification.create.form.NON_SPECIFIC_TIME')
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-7">
                                                            <div class="input-group date" id="specific_time_display">
                                                                <input type="text" class="form-control" name="specific_time"
                                                                       placeholder="@lang('admin::notification.create.form.placeholder.SPECIFIC_TIME')" id="specific_time"

                                                                >
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-check glyphicon-th"></i>
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div id="non_specific_time_display" style="display: none;">
                                                                <div class="row">
                                                                    <div class="col-xl-7">
                                                                        <input type="text"
                                                                               class="form-control"
                                                                               name="non_specific_time"
                                                                               placeholder="@lang('admin::notification.create.form.placeholder.NON_SPECIFIC_TIME')"
                                                                                id="non_specific_time"
                                                                        >
                                                                    </div>
                                                                    <div class="col-xl-5">
                                                                        <select class="form-control" name="time_type">
                                                                            <option value="hour">
                                                                                @lang('admin::notification.create.form.HOUR')
                                                                            </option>
                                                                            <option value="minute">
                                                                                @lang('admin::notification.create.form.MINUTE')
                                                                            </option>
                                                                            <option value="day">
                                                                                @lang('admin::notification.create.form.DAY')
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- END SEND --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet kt-portlet--tabs">
{{--                @include('user::index.include.tabs')--}}
            </div>
        </div>
    </form>

    {{-- Modal action--}}
    <div id="end-point-modal"></div>
    <div id="group-modal"></div>
@endsection

@section('after_script')
    <script type="text/template" id="image-tpl">
        <div class="kt-avatar__holder" style="background-image: url({link});background-position: center;"></div>
    </script>
    <script src="{{ asset('static/backend/js/admin/notification/script.js?v='.time()) }}" type="text/javascript"></script>
    <script src="{{asset('static/backend/js/admin/notification/group.js?v='.time())}}" type="text/javascript"></script>
    <script type="text/javascript">
        Summernote.generate('content-notification');
        Summernote.uploadImg('content-notification');
    </script>
@stop
