@extends('layout') @section('header') @include('components.header',['title'=> __('user.CREATE_ACCOUNT')])
@endsection
@section('content')
            <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                <div class="kt-subheader__main">

                    <h3 class="kt-subheader__title"> @lang('admin::confignotification.index.CONFIG_NOTIFICATION')</h3>

                    <span class="kt-subheader__separator kt-hidden"></span>

                    @include('helpers.breadcrumb', [
                        'menuName' => 'Notification',
                        'route' => 'admin.config-notification',
                        'pageName' => __('admin::confignotification.index.CONFIG_NOTIFICATION')
                    ])
                </div>
                <div class="kt-subheader__toolbar">
                    <button type="button" class="btn btn-info btn-bold" onclick="config.save()">@lang('admin::confignotification.index.SAVE')</button>
                </div>
            </div>
            <!--begin: Datatable -->
            <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-padding-0" id="kt_content">
                <div class="kt-portlet kt-portlet--mobile">
                    <div class="kt-portlet__body">
                        <!-- from-->
                        <form id="form-update-config-noti" action="#">
                            <div class="kt-section">
                                <div class="kt-section__content">
                                    <p class="cnoti">@lang('admin::confignotification.index.CONFIG_NOTIFICATION')</p>
                                    @if(isset($data))
                                    @foreach($data as $value)
                                    <table class="table table-borderless">
                                        <tbody>
                                        <tr>
                                            <td width="30%"><p>{{$value['name']}}</p>
                                                <a href="javascript:void(0)"><p>@lang('admin::confignotification.index.VIEW_DEMO_CONTENT')</a>
                                            </td>

                                            <td>
                                            <span class="kt-switch kt-switch--success">
                                            <label>
                                                <input type="checkbox" id="{{$value['type']}}" onchange="config.change('{{$value['type']}}')" name ="{{$value['type']}}" {{$value['is_active'] == 1 ? "checked" :""}}>
                                                <span></span>
                                            </label>
                                            </span>
                                            </td>
                                            <td width="70%">
                                                <div class="kt-radio-list">
                                                    <label class="kt-radio kt-radio--bold">
                                                        <input type="radio" id="{{$value['type']}}_immediately" name="{{$value['type']}}_radio" value="immediately" onclick="time.immediately('{{$value['type']}}_schedule-time')" {{$value['notify_type'] == 'immediately' ? "Checked":""}}>
                                                        <span></span>
                                                        @lang('admin::confignotification.index.SEND_NOW')
                                                    </label>
                                                    <label class="kt-radio kt-radio--bold">
                                                        <input type="radio" id="{{$value['type']}}schedule" name="{{$value['type']}}_radio" value="schedule" onclick="time.schedule('{{$value['type']}}_schedule-time')" {{$value['notify_type'] == 'schedule' ? "Checked":""}}>
                                                        <span></span>
                                                        @lang('admin::confignotification.index.OPTION_SEND')
                                                    </label>
                                                </div>
                                                <div id="{{$value['type']}}_schedule-time" style="{{$value['notify_type'] == 'schedule' ? 'display:block':'display:none'}}">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <input type="text" class="form-control" value="@lang('admin::confignotification.index.SCHEDULE')" readonly>
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div id="non_specific_time_display" >
                                                                <div class="row">
                                                                    <div class="col-xl-6">
                                                                        <input type="text" class="form-control" name="{{$value['type']}}_time" value="{{$value['option_value']}}" placeholder="Nhập thời gian" id="non_specific_time">
                                                                    </div>
                                                                    <div class="col-xl-6">
                                                                        <select class="form-control" name="{{$value['type']}}_time_type">
                                                                            <option value="hours" {{$value['option_type'] == 'hours' ? "selected":""}}>@lang('admin::confignotification.index.HOUR')</option>
                                                                            <option value="minute" {{$value['option_type'] == 'minute' ? "selected":""}}>@lang('admin::confignotification.index.MINUTE')</option>
                                                                            <option value="day" {{$value['option_type'] == 'day' ? "selected":""}}>@lang('admin::confignotification.index.DAY')</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>

                                        </tbody>
                                    </table>
                                    @endforeach
                                    @endif
                                </div>

                            </div>
                        </form>
                        <!--end: Search Form -->
                    </div>
                </div>
            </div>
@endsection
@section('after_style')
@endsection
@section('after_script') @if(session()->has('remove-user'))
@endif
<script>
    var route_update = '{{route('admin.config-notification.update')}}'
    var thatbai = "@lang('admin::confignotification.index.UPDATE_FAIL')"
    var thanhcong = "@lang('admin::confignotification.index.UPDATE_SUCCESS')"
</script>
<script src="{{asset('static/backend/js/admin/confignotification/script.js?v='.time())}}" type="text/javascript"></script>
@endsection
