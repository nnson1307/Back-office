<div class="form-group">
    <div class="kt-section__content">
        <table class="table table-striped">
            <thead>
            <tr>
                <th id="th_title">
                    <p class="pn-pointer">
                        @lang('admin::notification.index.table.header.TITLE')
                        {{--@if (isset($_GET['sort_notification_title']) && $_GET['sort_notification_title'] != null)--}}
                            {{--<i class="fa {{ ($filter['sort_notification_title'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>--}}
                        {{--@endif--}}
                    </p>
                </th>
                <th id="th_is_sent">
                    <p class="">
                        @lang('admin::notification.index.table.header.NOTIFICATIONS_IS_SENT')
                    </p>
                </th>
                <th id="th_read_notification">
                    <p class="">
                        @lang('admin::notification.index.table.header.RATE_READ_NOTIFICATION')
                    </p>
                </th>
                <th id="td_send_time">
                    @lang('admin::notification.index.table.header.SEND_TIME')
                </th>
                <th id="th_active">
                    @lang('admin::notification.index.table.header.ACTIVE')
                </th>
                <th id="th_is_send">
                    @lang('admin::notification.index.table.header.IS_SEND')
                </th>
                <th>
                    @lang('admin::notification.index.table.header.ACTION')
                </th>
            </tr>
            </thead>
            <tbody>
            @if(isset($notiList))
                @foreach($notiList as $noti)
                    @if($noti['title'] == null)
                        @continue
                    @endif
                    <tr>
                        <td>
                            <p title="{{ $noti['title'] }}">
                                {{ subString($noti['title']) }}
                            </p>
                        </td>
                        <td>
                            @if(isset($notiCount[$noti['notification_detail_id']]))
                            {{ $notiCount[$noti['notification_detail_id']]['total'] }}
                            @else
                                0
                            @endif
                        </td>
                        <td>
                            @if(isset($notiCount[$noti['notification_detail_id']]))
                            {{ ceil( ($notiCount[$noti['notification_detail_id']]['is_read'] * 100) / $notiCount[$noti['notification_detail_id']]['total'] ) }}%
                            @else
                                0%
                            @endif
                        </td>
                        <td id="time-{{ $noti['notification_detail_id'] }}">
                            @if($noti['send_at'] != null)
                                {{ $noti['send_at'] }}
                            @else
                                @php
                                    $time_type = null;
                                    if($noti['schedule_value_type'] == 'hours') {
                                        $time_type = 'Giờ';
                                    } elseif($noti['schedule_value_type'] == 'minute') {
                                        $time_type = 'Phút';
                                    } elseif($noti['schedule_value_type'] == 'day') {
                                        $time_type = 'Ngày';
                                    }
                                    echo $noti['schedule_value'].' '.$time_type;
                                @endphp
                            @endif
                        </td>
                        <td>
                            @if (in_array('admin.notification.edit', request()->session()->get('user_route')) || Auth::user()->is_admin)
                                <span class="kt-switch kt-switch--success">
                                    <label>
                                        <input type="checkbox" class="is_actived"
                                               data-id="{{ $noti['notification_detail_id'] }}"
                                               data-non-specific-value="{{ $noti['schedule_value'] }}"
                                               data-non-specific-type="{{ $noti['schedule_value_type'] }}"
                                               @if($noti['queue_id'] == null && $noti['is_actived'] == 1) disabled @endif
                                               @if($noti['is_actived'] == 1) checked="checked" @endif
                                        >
                                        <span></span>
                                    </label>
                                </span>
                            @else
                                <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox" class="is_actived" disabled
                                           data-id="{{ $noti['notification_detail_id'] }}"
                                           data-non-specific-value="{{ $noti['schedule_value'] }}"
                                           data-non-specific-type="{{ $noti['schedule_value_type'] }}"
                                           @if($noti['queue_id'] == null && $noti['is_actived'] == 1) disabled @endif
                                           @if($noti['is_actived'] == 1) checked="checked" @endif
                                    >
                                    <span></span>
                                </label>
                            </span>
                            @endif
                        </td>
                        <td id="status-{{ $noti['notification_detail_id'] }}">
                            @if($noti['queue_id'] == null && $noti['is_actived'] == 1)
                                @lang('admin::notification.index.search.IS_SEND.SENT')
                            @elseif($noti['queue_send_at'] != null && $noti['is_actived'] == 1)
                                @lang('admin::notification.index.search.IS_SEND.WAIT')
                            @elseif($noti['is_actived'] == 0)
                                @lang('admin::notification.index.search.IS_SEND.DONT_SEND')
                            @endif
                        </td>
                        <td>
                            <div class="kt-portlet__head-toolbar">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Hành động
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                        @include('helpers.button', ['button' => [
                                                    'route' => '',
                                                     'html' => '<a href="'.route('admin.notification.detail', $noti['notification_detail_id']).'" class="dropdown-item">'
                                                     .'<i class="la la-eye"></i>'
                                                     .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::notification.index.table.BTN_DETAIL').'</span>'.
                                                '</a>'
                                            ]])
                                        @if($noti['queue_id'] != null || $noti['is_actived'] == 0)
                                            @include('helpers.button', ['button' => [
                                                        'route' => 'admin.notification.edit',
                                                         'html' => '<a href="'.route('admin.notification.edit', $noti['notification_detail_id']).'" class="dropdown-item">'
                                                         .'<i class="la la-edit"></i>'
                                                         .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::notification.index.table.BTN_EDIT').'</span>'.
                                                    '</a>'
                                                ]])
                                        @endif
                                        @include('helpers.button', ['button' => [
                                                   'route' => 'admin.notification.destroy',
                                                    'html' => '<a href="javascript:void(0)" onclick="removeItem('.$noti['notification_detail_id'].')" class="dropdown-item">'
                                                    .'<i class="la la-trash"></i>'
                                                    .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::notification.index.table.BTN_DELETE').'</span>'.
                                               '</a>'
                                           ]])
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
</div>
{{--<input type="hidden" name="sort_notification_title" id="sort_notification_title" value="{{$filter['sort_notification_title']}}">--}}
