<div class="kt-section__content">
    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th>
                <p class="pn-pointer" onclick="index.sort(this, 'country_name')"
                   data-sort="{{ ($filter['sort_country$country_name'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::province.index.COUNTRY')
                    @if (isset($_GET['sort_country$country_name']) && $_GET['sort_country$country_name'] != null)
                        <i class="fa {{ ($filter['sort_country$country_name'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th>
                <p class="pn-pointer" onclick="index.sort(this, 'province_name')"
                   data-sort="{{ ($filter['sort_province$name'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::province.index.PROVINCE_NAME')
                    @if (isset($_GET['sort_province$name']) && $_GET['sort_province$name'] != null)
                        <i class="fa {{ ($filter['sort_province$name'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th>
                <p class="pn-pointer" onclick="index.sort(this, 'province_code')"
                   data-sort="{{ ($filter['sort_province$province_code'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::province.index.PROVINCE_CODE')
                    @if (isset($_GET['sort_province$province_code']) && $_GET['sort_province$province_code'] != null)
                        <i class="fa {{ ($filter['sort_province$province_code'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th>
                <p class="pn-pointer" onclick="index.sort(this, 'status')"
                   data-sort="{{ ($filter['sort_province$is_actived'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::province.index.TABLE_STATUS')
                    @if (isset($_GET['sort_province$is_actived']) && $_GET['sort_province$is_actived'] != null)
                        <i class="fa {{ ($filter['sort_province$is_actived'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th><p>@lang('admin::province.index.ACTION')</p></th>
        </tr>
        </thead>
        <tbody>
        @if(isset($LIST))
            @foreach($LIST as $item)
                <tr>
                    <td></td>
                    <td>
                        <p title="{{ $item['country_name'] }}">
                            {{ subString($item['country_name']) }}
                        </p>
                    </td>
                    <td>
                        <p title="{{ $item['name'] }}">
                            <a href="{{route('admin.province.detail', $item['province_id'])}}">
                                {{ subString($item['name']) }}
                            </a>
                        </p>
                    </td>
                    <td>
                        <p title="{{ $item['province_code'] }}">
                            <a href="{{route('admin.province.detail', $item['province_id'])}}">
                                {{ subString($item['province_code']) }}
                            </a>
                        </p>
                    </td>
                    <td>
                        @if (in_array('admin.province.edit', request()->session()->get('user_route')) || Auth::user()->is_admin)
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox"
                                           onchange="index.change_status('{{$item['province_id']}}',this)"
                                            {{ ($item['is_actived'] == 1) ? 'checked' : '' }}>
                                    <span></span>
                                </label>
                            </span>
                        @else
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox" disabled
                                            {{ ($item['is_actived'] == 1) ? 'checked' : '' }}>
                                    <span></span>
                                </label>
                            </span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                    id="dropdownMenu" data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                Hành động
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                                @include('helpers.button', ['button' => [
                                                'route' => 'admin.province.edit',
                                                 'html' => '<a href="'.route('admin.province.edit', $item['province_id']).'" class="dropdown-item">'
                                                 .'<i class="la la-edit"></i>'
                                                 .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::province.index.TABLE_EDIT').'</span>'.
                                            '</a>'
                                        ]])
                                @include('helpers.button', ['button' => [
                                               'route' => 'admin.province.detail',
                                                'html' => '<a href="'.route('admin.province.detail', $item['province_id']).'" class="dropdown-item">'
                                                .'<i class="fa flaticon-eye"></i>'
                                                .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::province.index.DETAIL').'</span>'.
                                           '</a>'
                                       ]])

                                @include('helpers.button', ['button' => [
                                           'route' => 'admin.province.destroy',
                                            'html' => '<a href="javascript:void(0)" onclick="remove.click('.$item['province_id'].')" class="dropdown-item">'
                                            .'<i class="la la-trash"></i>'
                                            .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::province.index.TABLE_REMOVE').'</span>'.
                                       '</a>'
                                   ]])
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <input type="hidden" name="sort_country$country_name" id="sort_country_name" value="{{$filter['sort_country$country_name']}}">
    <input type="hidden" name="sort_province$name" id="sort_province_name" value="{{$filter['sort_province$name']}}">
    <input type="hidden" name="sort_province$province_code" id="sort_province_code" value="{{$filter['sort_province$province_code']}}">
    <input type="hidden" name="sort_province$is_actived" id="sort_province_status" value="{{$filter['sort_province$is_actived']}}">
</div>
