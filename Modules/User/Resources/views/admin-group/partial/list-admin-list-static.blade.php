<table class="table table-striped" id="table-list-user">
    <thead>
    <tr>
        <th>@lang('user::admin-group.create.USER_FULL_NAME')</th>
        <th>@lang('user::admin-group.create.USER_EMAIL')</th>
    </tr>
    </thead>
    <tbody>
    @if (isset($admin_has_group) && count($admin_has_group) > 0)
        @foreach ($admin_has_group as $item)
            <tr class="user-item">
                <td>
                    <p title="{{ $item['full_name'] }}">{{ subString($item['full_name']) }}</p>
                </td>
                <td>
                    <p title="{{ $item['email'] }}">{{ subString($item['email']) }}</p>
                </td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
