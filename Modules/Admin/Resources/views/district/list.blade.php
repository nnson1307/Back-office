<div class="kt-section__content">
    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th>
                <p class="pn-pointer" onclick="index.sort(this, 'country_name')"
                   data-sort="{{ ($filter['sort_country$country_name'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::district.index.TABLE_COUNTRY')
                    @if (isset($_GET['sort_country$country_name']) && $_GET['sort_country$country_name'] != null)
                        <i class="fa {{ ($filter['sort_country$country_name'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th>
                <p class="pn-pointer" onclick="index.sort(this, 'province_name')"
                   data-sort="{{ ($filter['sort_province$name'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::district.index.TABLE_PROVINCE')
                    @if (isset($_GET['sort_province$name']) && $_GET['sort_province$name'] != null)
                        <i class="fa {{ ($filter['sort_province$name'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th>
                <p class="pn-pointer" onclick="index.sort(this, 'district_name')"
                   data-sort="{{ ($filter['sort_district$name'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::district.index.TABLE_DISTRICT_NAME')
                    @if (isset($_GET['sort_district$name']) && $_GET['sort_district$name'] != null)
                        <i class="fa {{ ($filter['sort_district$name'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th>
                <p class="pn-pointer" onclick="index.sort(this, 'district_code')"
                   data-sort="{{ ($filter['sort_district$district_code'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::district.index.TABLE_DISTRICT_CODE')
                    @if (isset($_GET['sort_district$district_code']) && $_GET['sort_district$district_code'] != null)
                        <i class="fa {{ ($filter['sort_district$district_code'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th>
                <p class="pn-pointer" onclick="index.sort(this, 'status')"
                   data-sort="{{ ($filter['sort_district$is_actived'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::district.index.ACTIVE')
                    @if (isset($_GET['sort_district$is_actived']) && $_GET['sort_district$is_actived'] != null)
                        <i class="fa {{ ($filter['sort_district$is_actived'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th><p>@lang('admin::district.index.ACTION')</p></th>
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
                        <p title="{{ $item['province_name'] }}">
                            {{ subString($item['province_name']) }}
                        </p>
                    </td>
                    <td>
                        <p title="{{ $item['district_name'] }}">
                            <a href="{{route('admin.district.detail', $item['district_id'])}}">
                                {{ subString($item['district_name']) }}
                            </a>
                        </p>
                    </td>
                    <td>
                        <p title="{{ $item['district_code'] }}">
                            <a href="{{route('admin.district.detail', $item['district_id'])}}">
                                {{ subString($item['district_code']) }}
                            </a>
                        </p>
                    </td>
                    <td>
                        @if (in_array('admin.district.edit', request()->session()->get('user_route')) || Auth::user()->is_admin)
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox"
                                           onchange="index.change_status('{{$item['district_id']}}',this)"
                                            {{ ($item['is_actived'] == 1) ? 'checked' : '' }}>
                                    <span></span>
                                </label>
                            </span>
                        @else
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox"
                                           disabled
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
                                                'route' => 'admin.district.edit',
                                                 'html' => '<a href="'.route('admin.district.edit', $item['district_id']).'" class="dropdown-item">'
                                                 .'<i class="la la-edit"></i>'
                                                 .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::district.index.TABLE_EDIT').'</span>'.
                                            '</a>'
                                        ]])
                                @include('helpers.button', ['button' => [
                                                'route' => 'admin.district.detail',
                                                 'html' => '<a href="'.route('admin.district.detail', $item['district_id']).'" class="dropdown-item">'
                                                 .'<i class="fa flaticon-eye"></i>'
                                                 .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::district.index.DETAIL').'</span>'.
                                            '</a>'
                                        ]])
                                @include('helpers.button', ['button' => [
                                           'route' => 'admin.district.destroy',
                                            'html' => '<a href="javascript:void(0)" onclick="remove.click('.$item['district_id'].')" class="dropdown-item">'
                                            .'<i class="la la-trash"></i>'
                                            .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::district.index.TABLE_REMOVE').'</span>'.
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
    <input type="hidden" name="sort_district$name" id="sort_district_name" value="{{$filter['sort_district$name']}}">
    <input type="hidden" name="sort_district$district_code" id="sort_district_code" value="{{$filter['sort_district$district_code']}}">
    <input type="hidden" name="sort_district$is_actived" id="sort_district_status" value="{{$filter['sort_district$is_actived']}}">
</div>
