<table class="table table-striped" id="table-popup-action">
    <thead>
    <tr>
        <th>
            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--brand">
                <input type="checkbox" onclick="adminGroup.selectAll(this, 'table-popup-action')">
                <span></span>
            </label>
        </th>
        <th>@lang('user::admin-group.create.ADMIN_ACTION_NAME')</th>
        <th>@lang('user::admin-group.create.ADMIN_ACTION_GROUP_NAME')</th>
    </tr>
    </thead>
    <tbody>
    @if (isset($list_action) && count($list_action) > 0)
        @foreach ($list_action as $index => $item)
            @if (count($item) > 0)
                @foreach ($item as $key => $value)
                    <tr>
                        <td>
                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--brand">
                                <input type="checkbox"
                                       value="{{ $value['action_id'] }}"
                                >
                                <span></span>
                            </label>
                        </td>
                        <td>
                            <p title="{{ $value['action_name'] }}">
                                {{ subString($value['action_name']) }}
                            </p>
                        </td>
                        @if ($key == 0)
                            <td rowspan="{{ count($item) }}"
                                style="vertical-align:middle;text-align:center;background-color:#ffffff;">
                                {{ $value['action_group_name'] }}
                            </td>
                        @endif
                    </tr>
                @endforeach
            @endif
        @endforeach
    @else
        <tr>
            <td colspan="2" class="text-center">@lang('user::admin-group.index.DATA_NULL')</td>
        </tr>
    @endif
    </tbody>
</table>
