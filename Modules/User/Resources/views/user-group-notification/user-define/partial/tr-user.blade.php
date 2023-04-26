<table class="table table-striped">
    <thead>
    <tr>
        <th>
            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--brand">
                <input type="checkbox" onclick="userGroupDefine.selectAll1(this)">
                <span></span>
            </label>
        </th>
        <th>@lang('user::user-group-notification.create.ACCOUNT')</th>
        <th>@lang('user::user-group-notification.create.FULL_NAME')</th>
        <th>@lang('user::user-group-notification.create.STATUS')</th>
    </tr>
    </thead>
    <tbody id="tbody-add-user">
    @if(isset($list))
        @foreach($list as $item)
            <tr>
                <td>
                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--brand">
                        <input type="checkbox" checked class="check-box-choose-user1"
                               onclick="userGroupDefine.chooseUser1(this)">
                        <input type="hidden" value="{{$item['phone']}}" class="phone-1">
                        <span></span>
                    </label>
                </td>
                <td>
                    <span title="{{$item['phone']}}">
                        {{ subString($item['phone']) }}
                    </span>
                </td>
                <td>
                    <span title="{{ $item['fullname'] }}">
                        {{ subString($item['fullname']) }}
                    </span>
                </td>
                <td>{{$item['is_activated']==1?'Hoạt động':'Không hoạt động'}}</td>
            </tr>
        @endforeach
    @else
    @endif
    </tbody>
</table>
@if(isset($list))
    {{$list->links('user::user-group-notification.user-define.helper.paging-ajax-1')}}
@endif
