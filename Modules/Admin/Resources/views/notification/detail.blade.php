@extends('layout')

@section('header')
    @include('components.header',['title'=> __('user.user.create.CREATE_ACCOUNT')])
@stop
@section('content')
    @if (isset($noti) && $noti['is_brand'] == 0)
    <form id="form-edit">
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
                        @lang('admin::notification.detail.DETAIL_NOTIFICATION')
                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">

                <div class="btn-group">
                    <a href="{{ route('admin.notification') }}" class="btn btn-default btn-bold">
                        @lang('admin::notification.detail.BACK')
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
                                            <div class="col-lg-9 col-xl-6">
                                                <h3 class="kt-section__title kt-section__title-sm">
                                                    @lang('admin::notification.create.form.header.INFO_RECEIVER')
                                                </h3>
                                            </div>
                                        </div>
                                        <input type="hidden" id="noti-id" value="{{ $noti['notification_detail_id'] }}">
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 ">
                                                @lang('admin::notification.create.form.RECEIVER'):
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="kt-radio-list">
                                                    <label class="kt-radio kt-radio--bold">
                                                        <input type="radio" name="send_to" value="all" checked disabled>
                                                        @lang('admin::notification.create.form.SEND_ALL_USER')
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-radio kt-radio--bold">
                                                        <input type="radio" name="send_to" value="group" disabled
                                                                {{ $noti['template']['from_type'] == 'group' ? 'checked' : null }}
                                                        >
                                                        @lang('admin::notification.create.form.SEND_GROUP')
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div id="cover-group" style="display: {{ $noti['template']['from_type'] == 'group' ? 'block' : 'none' }};">
                                                    @if($noti['template']['from_type'] == 'group')
                                                        <div class="kt-section__content kt-section__content--solid-- col-6 div-group" id="{{ $group->id }}" style="margin-top: 10px;">
                                                            <div class="kt-searchbar">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1"><i class="fa fa-edit"></i></span></div>
                                                                    <input type="text" class="form-control group-name" readonly="readonly" value="{{ $group->name }}">
                                                                    <input type="hidden" name="group_id" value="{{ $group->id }}">
                                                                    <div class="input-group-prepend"><span class="input-group-text remove-group" onclick="removeGroup({{ $group->id }})" id="basic-addon1" style="cursor: pointer;">X</span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
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
                                            <label class="col-xl-3 col-lg-3 ">
                                                @lang('admin::notification.create.form.BACKGROUND'):
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                                    <div id="div-image">
                                                        <div class="kt-avatar__holder"
                                                             @if($noti['background'] != null)
                                                             style="background-image: url({{$noti['background']}})"
                                                             @else
                                                             style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"
                                                                @endif
                                                        ></div>
                                                    </div>
                                                    <input type="hidden" id="image" name="background" value="{{$noti['background']}}">

                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                                          data-original-title="Cancel avatar">
                                                        <i class="fa fa-times"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 ">
                                                @lang('admin::notification.create.form.CONTENT_GROUP'):
                                                 </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <select class="form-control" name="action_group" disabled>
                                                    <option value="1">@lang('admin::notification.create.form.ACTION_GROUP.ACTION')</option>
                                                    <option value="0" {{ $noti['template']['action_group'] == 0 ? 'selected' : null}}>
                                                        @lang('admin::notification.create.form.ACTION_GROUP.NON_ACTION')
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 ">
                                                @lang('admin::notification.create.form.TITLE'):
                                                 </label>
                                            <div class="col-lg-9 col-xl-6">
                                                {{ $noti['template']['title'] }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 ">
                                                @lang('admin::notification.create.form.SHORT_TITLE'):
                                                 </label>
                                            <div class="col-lg-9 col-xl-6">
                                                {{ $noti['template']['title_short'] }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 ">
                                                @lang('admin::notification.create.form.FEATURE'):
                                                 </label>
                                            <div class="col-lg-9 col-xl-6">
                                                {{ $noti['template']['description'] }}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xl-3 col-lg-3 ">
                                                @lang('admin::notification.create.form.CONTENT'):
                                                 </label>
                                            <div class="col-lg-9 col-xl-6">
                                                {!! $noti['content'] !!}
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
                                                <label class="col-xl-3 col-lg-3 ">
                                                    @lang('admin::notification.create.form.ACTION_NAME'):
                                                     </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    {{ $noti['template']['action_name'] }}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 ">
                                                    @lang('admin::notification.create.form.END_POINT'):
                                                     </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <select class="form-control" id="end_point" name="end_point" disabled>
                                                        @foreach($notiTypeList as $notiType)
                                                            <option value="{{ $notiType['action'] }}" data-type="{{ $notiType['detail_type'] }}"
                                                                    {{ $noti['action'] == $notiType['action'] ? 'selected' : null }}
                                                            >
                                                                {{ $notiType['type_name'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row" id="end-point-detail" style="display: none;">
                                                <label class="col-xl-3 col-lg-3 ">
                                                    @lang('admin::notification.create.form.END_POINT_DETAIL'):
                                                     </label>
                                                <div class="col-lg-9 col-xl-6">
                                                    @if($noti['action'] == 'brand'){{ json_decode($noti['action_params'], true)['brand_name'] }}
                                                    @elseif($noti['action'] == 'faq'){{ json_decode($noti['action_params'], true)['faq_title'] }}@endif
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
                                            <label class="col-xl-3 col-lg-3 ">
                                                @lang('admin::notification.create.form.SCHEDULE'):
                                            </label>
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="kt-radio-list">
                                                    <label class="kt-radio kt-radio--bold">
                                                        <input type="radio" name="send_time_radio" value="0" checked disabled>
                                                        @lang('admin::notification.create.form.SEND_NOW')
                                                        <span></span>
                                                    </label>
                                                    <label class="kt-radio kt-radio--bold">
                                                        <input type="radio" name="send_time_radio" value="1" disabled
                                                               @if($noti['template']['send_type'] == 'schedule') checked @endif
                                                        >
                                                        @lang('admin::notification.create.form.SEND_SCHEDULE')
                                                        <span></span>
                                                    </label>
                                                </div>
                                                <div id="schedule-time" style="display: none;">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <select class="form-control" name="schedule_time" disabled>
                                                                <option value="specific_time">
                                                                    @lang('admin::notification.create.form.SPECIFIC_TIME')
                                                                </option>
                                                                <option value="non_specific_time"
                                                                        @if($noti['template']['schedule_option'] == 'none') selected @endif
                                                                >
                                                                    @lang('admin::notification.create.form.NON_SPECIFIC_TIME')
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="input-group date" id="specific_time_display"
                                                                 @if($noti['template']['schedule_option'] != null && $noti['template']['schedule_option'] != 'specific')
                                                                 style="display: none;"
                                                                 @else
                                                                 style="display: flex;"
                                                                    @endif
                                                            >
                                                                <input type="text" class="form-control"
                                                                       name="specific_time"
                                                                       value="{{ $noti['template']['send_at'] }}"
                                                                       placeholder="@lang('admin::notification.create.form.placeholder.SPECIFIC_TIME')"
                                                                       id="specific_time"
                                                                       disabled
                                                                >
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">
                                                                        <i class="la la-check glyphicon-th"></i>
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <div id="non_specific_time_display" @if($noti['template']['schedule_option'] != 'none') style="display: none;" @endif>
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <input type="text" class="form-control"
                                                                               name="non_specific_time"
                                                                               value="{{ $noti['template']['schedule_value'] }}"
                                                                               placeholder="@lang('admin::notification.create.form.placeholder.NON_SPECIFIC_TIME')"
                                                                               id="non_specific_time"
                                                                               disabled
                                                                        >
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <select class="form-control" name="time_type" disabled>
                                                                            <option value="hour">
                                                                                @lang('admin::notification.create.form.HOUR')
                                                                            </option>
                                                                            <option value="minute"
                                                                                    @if($noti['template']['schedule_value_type'] == 'minute') selected @endif
                                                                            >
                                                                                @lang('admin::notification.create.form.MINUTE')
                                                                            </option>
                                                                            <option value="day"
                                                                                    @if($noti['template']['schedule_value_type'] == 'day') selected @endif
                                                                            >
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
    @endif
@endsection

@section('after_script')
    <script type="text/template" id="image-tpl">
        <div class="kt-avatar__holder" style="background-image: url({link});background-position: center;"></div>
    </script>
    <script src="{{ asset('static/backend/js/admin/notification/editor.js?v='.time()) }}" type="text/javascript"></script>
    <script src="{{ asset('static/backend/js/admin/notification/script.js?v='.time()) }}" type="text/javascript"></script>
@stop
