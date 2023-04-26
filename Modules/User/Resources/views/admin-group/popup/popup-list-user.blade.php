<table class="table table-striped" id="table-popup-user">
    <thead>
    <tr>
        <th>
            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--brand">
                <input type="checkbox" onclick="adminGroup.selectAll(this, 'table-popup-user')">
                <span></span>
            </label>
        </th>
        <th>@lang('user::admin-group.create.USER_FULL_NAME')</th>
        <th>@lang('user::admin-group.create.USER_EMAIL')</th>
    </tr>
    </thead>
    <tbody>
    @if (isset($list_user) && count($list_user) > 0)
        @foreach ($list_user as $item)
            <tr>
                <td>
                    <label class="kt-checkbox kt-checkbox--solid kt-checkbox--brand">
                        <input type="checkbox"
                               value="{{ $item['id'] }}"
                        >
                        <span></span>
                    </label>
                </td>
                <td>
                    <p title="{{ $item['full_name'] }}">
                        {{ subString($item['full_name']) }}
                    </p>
                </td>
                <td>
                    <p title="{{ $item['email'] }}">
                        {{ subString($item['email']) }}
                    </p>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="3" class="text-center">@lang('user::admin-group.index.DATA_NULL')</td>
        </tr>
    @endif
    </tbody>
</table>
