@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::notification.index.NOTIFICATION')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            @include('helpers.button', ['button' => [
                'route' => 'admin.notification.create',
                'html' => '<a href="'.route('admin.notification.create').'" class="btn btn-label-brand btn-bold">'
                .__('admin::notification.index.table.BTN_ADD').
            '</a>'
            ]])
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__body">
                <!--end: Search Form -->
                <form action="{{route('admin.notification')}}" method="GET" id="form-filter">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-2">
                                <input type="text" class="form-control" name="title"
                                       value="{{ isset($filter['title']) ? $filter['title'] : null }}"
                                       placeholder="@lang('admin::notification.index.search.TITLE')">
                            </div>
                            <div class="col-lg-3">
                                <select type="text" name="is_send" class="form-control ss-select-2 ss--width-100 ">
                                    <option value="">@lang('admin::notification.index.search.IS_SEND.DEFAULT')</option>
                                    <option value="sent"
                                            @if(isset($filter['is_send']) && $filter['is_send'] == "sent") selected @endif
                                    >
                                        @lang('admin::notification.index.search.IS_SEND.SENT')
                                    </option>
                                    <option value="not"
                                            @if(isset($filter['is_send']) && $filter['is_send'] == "not") selected @endif
                                    >
                                        @lang('admin::notification.index.search.IS_SEND.DONT_SEND')
                                    </option>
                                    <option value="pending"
                                            @if(isset($filter['is_send']) && $filter['is_send'] == "pending") selected @endif
                                    >
                                        @lang('admin::notification.index.search.IS_SEND.WAIT')
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <select type="text" name="is_actived" class="form-control ss-select-2 ss--width-100">
                                    <option value="">@lang('admin::notification.index.search.IS_ACTIVED.DEFAULT')</option>
                                    <option value="1"
                                            @if(isset($filter['is_actived']) && $filter['is_actived'] == 1) selected @endif
                                    >
                                        @lang('admin::notification.index.search.IS_ACTIVED.ACTIVE')
                                    </option>
                                    <option value="0"
                                            @if(isset($filter['is_actived']) && $filter['is_actived'] == 0) selected @endif
                                    >
                                        @lang('admin::notification.index.search.IS_ACTIVED.NON_ACTIVE')
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-5">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="@lang('admin::notification.index.search.TIME')" disabled>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group pull-right" id="kt_daterangepicker_4">
                                            <input type="text" class="form-control" readonly="" placeholder="" name="send_time"
                                                   value="{{ isset($filter['send_time']) ? $filter['send_time'] : null }}"
                                            >
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="la la-calendar-check-o"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-clearfix" style="margin-top: 10px;">
                            <div class="form-group float-right">
                                <a href="{{ route('admin.notification') }}" class="btn btn-secondary btn-hover-brand">
                                    @lang('admin::notification.index.search.BTN_REMOVE')
                                </a>
                                <button class="btn btn-primary btn-hover-brand">
                                    @lang('admin::notification.index.search.BTN_SEARCH')
                                </button>
                            </div>
                        </div>
                    </div>
                    @include('admin::notification.list')
                    {{ $notiList->links('helpers.paging') }}
                </form>
            </div>
        </div>
    </div>
@stop
@section('after_script')
    <script>
        statusPending = '@lang('admin::notification.index.search.IS_SEND.WAIT')';
        statusNot = '@lang('admin::notification.index.search.IS_SEND.DONT_SEND')';
    </script>
    <script src="{{asset('static/backend/js/admin/notification/script.js?v='.time())}}" type="text/javascript"></script>
@stop
