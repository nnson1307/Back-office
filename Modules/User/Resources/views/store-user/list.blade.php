<div class="kt-section__content">
    <table class="table table-striped">
        <thead>
        <tr>
            <th id="th_phone">
                <p class="pn-pointer" onclick="storeUser.sort(this, 'phone')"
                   data-sort="{{ ($filter['sort_user$phone'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('user::store-user.index.TABLE_USER_ACCOUNT')
                    @if (isset($_GET['sort_user$phone']) && $_GET['sort_user$phone'] != null)
                        <i class="fa {{ ($filter['sort_user$phone'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th id="th_fullname">
                <p class="pn-pointer" onclick="storeUser.sort(this, 'fullname')"
                   data-sort="{{ ($filter['sort_user$fullname'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('user::store-user.index.TABLE_USER_NAME')
                    @if (isset($_GET['sort_user$fullname']) && $_GET['sort_user$fullname'] != null)
                        <i class="fa {{ ($filter['sort_user$fullname'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th id="th_status">
                <p class="pn-pointer" onclick="storeUser.sort(this, 'status')"
                   data-sort="{{ ($filter['sort_user$is_activated'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('user::store-user.index.TABLE_STATUS')
                    @if (isset($_GET['sort_user$is_activated']) && $_GET['sort_user$is_activated'] != null)
                        <i class="fa {{ ($filter['sort_user$is_activated'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th>
                <p class="">
                    @lang('user::store-user.index.ACTION')
                </p>
            </th>
        </tr>
        </thead>
        <tbody>
        @if(isset($LIST))
            @foreach($LIST as $item)
                <tr  id="user_id_{{$item['user_id']}}">
                    <td>
                        @include('helpers.button', ['button' => [
                                                'route' => 'user.store-user.detail',
                                                 'html' => '<a href="'.route('user.store-user.detail', $item['user_id']).'" title="'. $item['phone'] .'">
                            '.$item['phone'].'
                        </a>'
                                        ]])

                    </td>
                    <td>
                        <p title="{{ $item['fullname'] }}">
                            {{ subString($item['fullname']) }}
                        </p>
                    </td>
                    <td>
                        <span class="kt-switch kt-switch--success">
							<label>
							    <input type="checkbox"
                                       onclick="update.updateStatus('{{$item['user_id']}}',this)"
                                        {{ ($item['is_activated'] == 1) ? 'checked' : '' }}>
							    <span></span>
							</label>
						</span>
                    </td>
                    <td>
                        <div class="kt-portlet__head-toolbar">
                            <div class="btn-group" role="group">
                                <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @lang('user::store-user.index.ACTION')
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                    @include('helpers.button', ['button' => [
                                                'route' => 'user.store-user.edit',
                                                 'html' => '<a href="'.route('user.store-user.edit', $item['user_id']).'" class="dropdown-item">'
                                                 .'<i class="la la-edit"></i>'
                                                 .'<span class="kt-nav__link-text kt-margin-l-5">'.__('user::store-user.index.TABLE_EDIT').'</span>'.
                                            '</a>'
                                        ]])
                                    @include('helpers.button', ['button' => [
                                               'route' => 'user.store-user.reset-password',
                                                'html' => '<a href="javascript:void(0)" onclick="reset_password.select_reset_password('.$item['user_id'].')" class="dropdown-item">'
                                                .'<i class="la la-refresh"></i>'
                                                .'<span class="kt-nav__link-text kt-margin-l-5">'
                                                    .__('user::store-user.index.TABLE_RESET_PASSWORD').
                                                '</span>'.
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

    <input type="hidden" name="sort_user$phone" value="{{$filter['sort_user$phone']}}"
           id="sort_user_phone">
    <input type="hidden" name="sort_user$fullname" value="{{$filter['sort_user$fullname']}}"
           id="sort_user_fullname">
    <input type="hidden" name="sort_user$is_activated" value="{{$filter['sort_user$is_activated']}}"
           id="sort_user_is_activated">

    {{--<input type="hidden" name="sort_phone" id="sort_phone" value="{{$filter['sort_phone']}}">--}}
    {{$LIST->appends($filter)->links('helpers.paging')}}
</div>
