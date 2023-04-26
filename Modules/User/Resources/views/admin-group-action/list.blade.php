<div class="kt-section__content">
    <form id="form-filter" action="{{route('user.admin-group-action.index')}}">
        <table class="table table-striped" id="table-list-action">
            <thead>
            <tr>
                <th id="th_action_name">
                    <p class="pn-pointer" onclick="adminGroupAction.sort(this, 'action_name')"
                       data-sort="{{ ($filter['sort_admin_action$action_name'] == 'asc') ? 'desc' : 'asc' }}">
                        @lang('user::admin-group-action.index.ADMIN_ACTION_NAME')
                        @if (isset($_GET['sort_admin_action$action_name']) && $_GET['sort_admin_action$action_name'] != null)
                            <i class="fa {{ ($filter['sort_admin_action$action_name'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                        @endif
                    </p>
                </th>
                <th id="th_action_group_name">
                    <p class="pn-pointer" onclick="adminGroupAction.sort(this, 'action_group_name')"
                       data-sort="{{ ($filter['sort_adgn$action_group_name'] == 'asc') ? 'desc' : 'asc' }}">
                        @lang('user::admin-group-action.index.ADMIN_ACTION_GROUP_NAME')
                        @if (isset($_GET['sort_adgn$action_group_name']) && $_GET['sort_adgn$action_group_name'] != null)
                            <i class="fa {{ ($filter['sort_adgn$action_group_name'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                        @endif
                    </p>
                </th>
                <th id="th_description">
                    <p class="pn-pointer" onclick="adminGroupAction.sort(this, 'description')"
                       data-sort="{{ ($filter['sort_admin_action$description'] == 'asc') ? 'desc' : 'asc' }}">
                        @lang('user::admin-group-action.index.ADMIN_ACTION_DESCRIPTION')
                        @if (isset($_GET['sort_admin_action$description']) && $_GET['sort_admin_action$description'] != null)
                            <i class="fa {{ ($filter['sort_admin_action$description'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                        @endif
                    </p>
                </th>
                <th id="th_action_name_default">
                    <p class="pn-pointer" onclick="adminGroupAction.sort(this, 'action_name_default')"
                       data-sort="{{ ($filter['sort_admin_action$action_name_default'] == 'asc') ? 'desc' : 'asc' }}">
                        @lang('user::admin-group-action.index.ADMIN_ACTION_NAME_DEFAULT')
                        @if (isset($_GET['sort_admin_action$action_name_default']) && $_GET['sort_admin_action$action_name_default'] != null)
                            <i class="fa {{ ($filter['sort_admin_action$action_name_default'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                        @endif
                    </p>
                </th>
                <th><p>@lang('user::admin-group-action.index.ACTION')</p></th>
            </tr>
            </thead>
            <tbody>
            @if (isset($list) && $list->count() > 0)
                @foreach ($list  as $key => $item)
                    <tr>
                        <td>
                            <a href="{{ route('user.admin-group-action.show', ['action_id' => $item->action_id]) }}"
                               title="{{ $item->action_name }}">
                                {{ subString($item->action_name) }}
                            </a>
                        </td>
                        <td>
                            <p title="{{ $item->action_group_name }}">
                                {{ subString($item->action_group_name) }}
                            </p>
                        </td>
                        <td>
                            <p title="{{ $item->description }}">
                                {{ subString($item->description) }}
                            </p>
                        </td>
                        <td>
                            <p title="{{ $item->action_name_default }}">
                                {{ subString($item->action_name_default) }}
                            </p>
                        </td>
                        <td>
                            <div class="kt-portlet__head-toolbar">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Hành động
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                        <a href="{{ route('user.admin-group-action.show', ['id' => $item->action_id]) }}" class="dropdown-item">
                                            <i class="la la-search"></i>
                                            <span class="kt-nav__link-text kt-margin-l-5">
                                                @lang('user::admin-group-action.index.VIEW')
                                            </span>
                                        </a>
                                        @include('helpers.button', ['button' => [
                                                    'route' => 'user.admin-group-action.edit',
                                                     'html' => '<a href="'.route('user.admin-group-action.edit', ['id' => $item->action_id]).'" class="dropdown-item">'
                                                     .'<i class="la la-edit"></i>'
                                                     .'<span class="kt-nav__link-text kt-margin-l-5">'.__('user::admin-group-action.index.TABLE_EDIT').'</span>'.
                                                '</a>'
                                            ]])
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" class="text-center">@lang('user::admin-group-action.index.DATA_NULL')</td>
                </tr>
            @endif
            </tbody>
        </table>
        <input type="hidden" name="sort_admin_action$action_name" value="{{$filter['sort_admin_action$action_name']}}"
            id="sort_action_name">
        <input type="hidden" name="sort_admin_action$description" value="{{$filter['sort_admin_action$description']}}"
            id="sort_description">
        <input type="hidden" name="sort_admin_action$action_name_default" value="{{$filter['sort_admin_action$action_name_default']}}"
            id="sort_action_name_default">
        <input type="hidden" name="sort_adgn$action_group_name" value="{{$filter['sort_adgn$action_group_name']}}"
                   id="sort_action_group_name">
    </form>
    {{$list->appends($filter)->links('helpers.paging')}}
</div>
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/user/admin-group-action/script.js?v='.time()) }}"></script>
    <script type="text/javascript">
        adminGroupAction.start();
    </script>
@endsection
