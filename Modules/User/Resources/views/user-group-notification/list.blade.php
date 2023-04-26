<div class="form-group">
    <div class="kt-section__content">
        <table class="table table-striped">
            <thead>
            <tr>
                {{--                <th id="th_user_group_name">--}}
                {{--                    @lang('user::user-group-notification.index.USER_GROUP_NAME')--}}
                {{--                    <i class="fa fa-caret-down kt-margin-l-5 ss--font-size-1p6rem sort-desc" data-sort="desc"--}}
                {{--                       onclick="listUserGroup.sort(this, 'name')" style="display: none"></i>--}}
                {{--                    <i class="fa fa-caret-up ss--font-size-1p6rem sort-show sort-asc"--}}
                {{--                       onclick="listUserGroup.sort(this, 'name')" data-sort="asc" style="display: none"></i>--}}
                {{--                    <i class="fa fa-filter kt-margin-l-5" onclick="listUserGroup.inputFiler(this,)"></i>--}}
                {{--                </th>--}}
                <th id="th_user_group_name">
                    <p class="pn-pointer" onclick="listUserGroup.sort(this, 'name')"
                       data-sort="{{ ($filter['sort_mystore_filter_group$name'] == 'asc') ? 'desc' : 'asc' }}">
                        @lang('user::user-group-notification.index.USER_GROUP_NAME')
                        @if (isset($_GET['sort_mystore_filter_group$name']) && $_GET['sort_mystore_filter_group$name'] != null)
                            <i class="fa {{ ($filter['sort_mystore_filter_group$name'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                        @endif
                    </p>
                </th>
                <th id="th_user_group_type">
                    <p class="pn-pointer" onclick="listUserGroup.sort(this, 'type')"
                       data-sort="{{ ($filter['sort_mystore_filter_group$filter_group_type'] == 'asc') ? 'desc' : 'asc' }}">
                        @lang('user::user-group-notification.index.TYPE')
                        @if (isset($_GET['sort_mystore_filter_group$filter_group_type']) && $_GET['sort_mystore_filter_group$filter_group_type'] != null)
                            <i class="fa {{ ($filter['sort_mystore_filter_group$filter_group_type'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                        @endif
                    </p>
                </th>
                <th id="th_user_group_created_at">
                    <p class="pn-pointer" onclick="listUserGroup.sort(this, 'created_at')"
                       data-sort="{{ ($filter['sort_mystore_filter_group$created_at'] == 'asc') ? 'desc' : 'asc' }}">
                        @lang('user::user-group-notification.index.CREATED_AT')
                        @if (isset($_GET['sort_mystore_filter_group$created_at']) && $_GET['sort_mystore_filter_group$created_at'] != null)
                            <i class="fa {{ ($filter['sort_mystore_filter_group$created_at'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                        @endif
                    </p>
                </th>

                <th>
                    @lang('user::user-group-notification.index.ACTION')
                </th>
            </tr>
            </thead>
            <tbody>
            @if(isset($list))
                @foreach($list as $item)
                    <tr>
                        <td>
                            @if($item['filter_group_type']=='auto')
                                <a href="{{route('user.user-group-notification.detail-auto', $item['id'])}}"
                                   title="{{ $item['name'] }}">
                                    {{ subString($item['name']) }}
                                </a>
                            @else
                                <a href="{{route('user.user-group-notification.detail-define', $item['id'])}}"
                                   title="{{ $item['name'] }}">
                                    {{ subString($item['name']) }}
                                </a>
                            @endif
                        </td>
                        <td>
                            @if($item['filter_group_type']=='user_define')
                                @lang('user::user-group-notification.index.SELF_DEFINE')
                            @else
                                @lang('user::user-group-notification.index.GROUP_AUTO')
                            @endif
                        </td>
                        <td>
                            {{date("H:i:s d/m/Y",strtotime($item['created_at']))}}
                        </td>

                        <td data-field="Actions" class="kt-datatable__cell" style="width: 200px;">
                            <div class="kt-portlet__head-toolbar">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupVerticalDrop1" type="button"
                                            class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                        @lang('user::user.index.ACTION')
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                        @if($item['filter_group_type']=='auto')
                                            @include('helpers.button', ['button' => [
                                                       'route' => 'user.user-group-notification.edit-auto',
                                                        'html' => '<a href="'.route('user.user-group-notification.edit-auto', $item['id']).'" class="dropdown-item">'
                                                        .'<i class="la la-edit"></i>'
                                                        .'<span class="kt-nav__link-text kt-margin-l-5">'.__('user::user-group-notification.index.EDIT').'</span>'.
                                                   '</a>'
                                               ]])
                                            @include('helpers.button', ['button' => [
                                                       'route' => 'user.user-group-notification',
                                                        'html' => '<a href="'.route('user.user-group-notification.detail-auto', $item['id']).'" class="dropdown-item">'
                                                        .'<i class="la la-eye"></i>'
                                                        .'<span class="kt-nav__link-text kt-margin-l-5">'.__('user::user-group-notification.index.DETAIL').'</span>'.
                                                   '</a>'
                                               ]])
                                        @else
                                            @include('helpers.button', ['button' => [
                                                      'route' => 'user.user-group-notification.edit-user-define',
                                                       'html' => '<a href="'.route('user.user-group-notification.edit-user-define', $item['id']).'" class="dropdown-item">'
                                                       .'<i class="la la-edit"></i>'
                                                       .'<span class="kt-nav__link-text kt-margin-l-5">'.__('user::user-group-notification.index.EDIT').'</span>'.
                                                  '</a>'
                                              ]])
                                            @include('helpers.button', ['button' => [
                                                       'route' => 'user.user-group-notification',
                                                        'html' => '<a href="'.route('user.user-group-notification.detail-define', $item['id']).'" class="dropdown-item">'
                                                        .'<i class="la la-eye"></i>'
                                                        .'<span class="kt-nav__link-text kt-margin-l-5">'.__('user::user-group-notification.index.DETAIL').'</span>'.
                                                   '</a>'
                                               ]])
                                        @endif

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
    {{--    <input type="hidden" name="sort_mystore_filter_group$name"--}}
    {{--           value="{{$filter['sort_mystore_filter_group$name']}}"--}}
    {{--           id="sort_name">--}}
    {{--    <input type="hidden" name="sort_mystore_filter_group$filter_group_type"--}}
    {{--           value="{{$filter['sort_mystore_filter_group$filter_group_type']}}"--}}
    {{--           id="sort_filter_group_type">--}}
    {{--    <input type="hidden" name="sort_mystore_filter_group$created_at"--}}
    {{--           value="{{$filter['sort_mystore_filter_group$created_at']}}"--}}
    {{--           id="sort_created_at">--}}

    <input type="hidden" name="sort_mystore_filter_group$name" value="{{$filter['sort_mystore_filter_group$name']}}"
           id="sort_name">
    <input type="hidden" name="sort_mystore_filter_group$filter_group_type" value="{{$filter['sort_mystore_filter_group$filter_group_type']}}"
           id="sort_filter_group_type">
    <input type="hidden" name="sort_mystore_filter_group$created_at" value="{{$filter['sort_mystore_filter_group$created_at']}}"
           id="sort_created_at">

</div>
{{ $list->appends($filter)->links('helpers.paging') }}
