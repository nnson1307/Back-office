<div class="kt-section__content">
    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
{{--            <th>--}}
{{--                @lang('admin::country.index.ID')--}}
{{--            </th>--}}
            <th>
                <p class="pn-pointer" onclick="index.sort_country(this, 'country_name')"
                   data-sort="{{ ($filter['sort_country$country_name'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::country.index.TABLE_COUNTRY_NAME')
                    @if (isset($_GET['sort_country$country_name']) && $_GET['sort_country$country_name'] != null)
                        <i class="fa {{ ($filter['sort_country$country_name'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th>
                <p class="pn-pointer" onclick="index.sort_country(this, 'country_code')"
                   data-sort="{{ ($filter['sort_country$country_code'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::country.index.TABLE_COUNTRY_CODE')
                    @if (isset($_GET['sort_country$country_code']) && $_GET['sort_country$country_code'] != null)
                        <i class="fa {{ ($filter['sort_country$country_code'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th>
                <p class="pn-pointer" onclick="index.sort_country(this, 'status')"
                   data-sort="{{ ($filter['sort_country$is_actived'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::country.index.TABLE_STATUS')
                    @if (isset($_GET['sort_country$is_actived']) && $_GET['sort_country$is_actived'] != null)
                        <i class="fa {{ ($filter['sort_country$is_actived'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th><p>@lang('admin::country.index.ACTION')</p></th>
        </tr>
        </thead>
        <tbody>
        @if(isset($LIST))
            @foreach($LIST as $item)
                <tr>
                    <td></td>
{{--                    <td>{{$item['country_id']}}</td>--}}
                    <td>
                        <p title="{{ $item['country_name'] }}">
                            <a href="{{route('admin.country.detail',$item['country_id'])}}">
                                {{ subString($item['country_name']) }}
                            </a>
                        </p>
                    </td>
                    <td>
                        <p title="{{ $item['country_code'] }}">
                            <a href="{{route('admin.country.detail',$item['country_id'])}}">
                                {{ subString($item['country_code']) }}
                            </a>
                        </p>
                    </td>
                    <td>
                        @if (in_array('admin.country.edit', request()->session()->get('user_route')) || Auth::user()->is_admin)
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox"
                                           onchange="index.change_status('{{$item['country_id']}}',this)"
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
                        <div class="kt-portlet__head-toolbar">
                            <div class="btn-group" role="group">
                                <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                    @include('helpers.button', ['button' => [
                                                'route' => 'admin.country.edit',
                                                 'html' => '<a href="'.route('admin.country.edit', $item['country_id']).'" class="dropdown-item">'
                                                 .'<i class="la la-edit"></i>'
                                                 .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::country.index.TABLE_EDIT').'</span>'.
                                            '</a>'
                                        ]])
                                    @include('helpers.button', ['button' => [
                                                'route' => 'admin.country.detail',
                                                 'html' => '<a href="'.route('admin.country.detail', $item['country_id']).'" class="dropdown-item">'
                                                 .'<i class="fa flaticon-eye"></i>'
                                                 .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::country.index.DETAIL').'</span>'.
                                            '</a>'
                                        ]])
                                    @include('helpers.button', ['button' => [
                                               'route' => 'admin.country.destroy',
                                                'html' => '<a href="javascript:void(0)" onclick="remove.click('.$item['country_id'].')" class="dropdown-item">'
                                                .'<i class="la la-trash"></i>'
                                                .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::country.index.TABLE_REMOVE').'</span>'.
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
    <input type="hidden" name="sort_country$country_name" id="sort_country_name" value="{{$filter['sort_country$country_name']}}">
    <input type="hidden" name="sort_country$country_code" id="sort_country_code" value="{{$filter['sort_country$country_code']}}">
    <input type="hidden" name="sort_country$is_actived" id="sort_country_status" value="{{$filter['sort_country$is_actived']}}">

</div>
