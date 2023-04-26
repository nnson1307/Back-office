<div class="form-group">
    <div class="kt-section__content">
        <table class="table table-striped">
            <thead>
            <tr>
                <th id="th_account">
                    <p class="pn-pointer" onclick="list.sort(this, 'email')"
                       data-sort="{{ ($filter['sort_admin$email'] == 'asc') ? 'desc' : 'asc' }}">
                        @lang('user::user.index.ACCOUNT')
                        @if (isset($_GET['sort_admin$email']) && $_GET['sort_admin$email'] != null)
                            <i class="fa {{ ($filter['sort_admin$email'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                        @endif
                    </p>
                </th>
                <th id="th_full_name">
                    <p class="pn-pointer" onclick="list.sort(this, 'full_name')"
                       data-sort="{{ ($filter['sort_admin$full_name'] == 'asc') ? 'desc' : 'asc' }}">
                        @lang('user::user.index.FULL_NAME')
                        @if (isset($_GET['sort_admin$full_name']) && $_GET['sort_admin$full_name'] != null)
                            <i class="fa {{ ($filter['sort_admin$full_name'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                        @endif
                    </p>
                </th>
                <th id="status">
                    <p class="pn-pointer" onclick="list.sort(this, 'is_actived')"
                       data-sort="{{ ($filter['sort_admin$is_actived'] == 'asc') ? 'desc' : 'asc' }}">
                        @lang('user::user.index.STATUS')
                        @if (isset($_GET['sort_admin$is_actived']) && $_GET['sort_admin$is_actived'] != null)
                            <i class="fa {{ ($filter['sort_admin$is_actived'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                        @endif
                    </p>
                </th>
                <th id="action">
                    @lang('user::user.index.ACTION')
                </th>
            </tr>
            </thead>
            <tbody>
            @if(isset($LIST))
                @foreach($LIST as $item)
                    <tr>
                        <td>
                            <a href="{{route('user.my-store.edit', $item['id'])}}"
                               title="{{ $item['email'] }}">
                                {{ subString($item['email']) }}
                            </a>
                        </td>
                        <td>
                            <p title="{{ $item['full_name'] }}">{{ subString($item['full_name']) }}</p>
                        </td>
                        <td>
                            @if (in_array('user.my-store.edit', request()->session()->get('user_route')) || Auth::user()->is_admin)
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox" name="" onchange="Add.change_status('{{$item['id']}}',this)"
                                           @if($item['is_actived'] == 1) checked @endif>
                                    <span></span>
                                </label>
                            </span>
                            @else
                                <span class="kt-switch kt-switch--success">
                                    <label>
                                        <input type="checkbox" disabled
                                               @if($item['is_actived'] == 1) checked @endif>
                                        <span></span>
                                    </label>
                                </span>
                            @endif
                        </td>
                        <td data-field="Actions" class="kt-datatable__cell" style="width: 200px;">
                            <div class="kt-portlet__head-toolbar">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @lang('user::user.index.ACTION')
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                        @include('helpers.button', ['button' => [
                                                  'route' => 'user.my-store.update-password',
                                                   'html' => '<a href="javascript:void(0)" onclick="list.resetPass('.$item['id'].')" class="dropdown-item">'
                                                   .'<i class="la la-refresh"></i>'
                                                   .'<span class="kt-nav__link-text kt-margin-l-5">'
                                                       .__('user::user.index.RESET_PASSWORD').
                                                   '</span>'.
                                              '</a>'
                                          ]])
                                        @include('helpers.button', ['button' => [
                                                    'route' => 'user.my-store.edit',
                                                     'html' => '<a href="'.route('user.my-store.edit', $item['id']).'" class="dropdown-item">'
                                                     .'<i class="la la-edit"></i>'
                                                     .'<span class="kt-nav__link-text kt-margin-l-5">'.__('user::user.index.EDIT_ACCOUNT').'</span>'.
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
<input type="hidden" name="sort_admin$email" id="sort_email" value="{{ $filter['sort_admin$email'] }}">
<input type="hidden" name="sort_admin$full_name" id="sort_full_name" value="{{ $filter['sort_admin$full_name'] }}">
<input type="hidden" name="sort_admin$is_actived" id="sort_is_active" value="{{ $filter['sort_admin$is_actived'] }}">

{{ $LIST->links('helpers.paging') }}
