<div class="kt-section__content">
    <table class="table table-striped">
        <thead>
        <tr>
            <th><p>@lang('admin::brand.index.LOGO')</p></th>
            <th id="th_brand_name">
                <p class="pn-pointer" onclick="brand.sort(this, 'brand_name')"
                   data-sort="{{ ($filter['sort_brand$brand_name'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::brand.index.BRAND_NAME')
                    @if (isset($_GET['sort_brand$brand_name']) && $_GET['sort_brand$brand_name'] != null)
                        <i class="fa {{ ($filter['sort_brand$brand_name'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th id="th_brand_code">
                <p class="pn-pointer" onclick="brand.sort(this, 'brand_code')"
                   data-sort="{{ ($filter['sort_brand$brand_code'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::brand.index.BRAND_CODE')
                    @if (isset($_GET['sort_brand$brand_code']) && $_GET['sort_brand$brand_code'] != null)
                        <i class="fa {{ ($filter['sort_brand$brand_code'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th id="th_company_name">
                <p class="pn-pointer" onclick="brand.sort(this, 'company_name')"
                   data-sort="{{ ($filter['sort_brand$company_name'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::brand.index.COMPANY_NAME')
                    @if (isset($_GET['sort_brand$company_name']) && $_GET['sort_brand$company_name'] != null)
                        <i class="fa {{ ($filter['sort_brand$company_name'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th>
                Qr Code
            </th>
            <th id="th_is_actived">
                <p class="pn-pointer" onclick="brand.sort(this, 'is_actived')"
                   data-sort="{{ ($filter['sort_brand$is_activated'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::brand.index.ADMIN_USER_STATUS')
                    @if (isset($_GET['sort_brand$is_activated']) && $_GET['sort_brand$is_activated'] != null)
                        <i class="fa {{ ($filter['sort_brand$is_activated'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th id="th_is_published">
                <p class="pn-pointer" onclick="brand.sort(this, 'is_published')"
                   data-sort="{{ ($filter['sort_brand$is_published'] == 'asc') ? 'desc' : 'asc' }}">
                    @lang('admin::brand.index.DISPLAY_APP')
                    @if (isset($_GET['sort_brand$is_published']) && $_GET['sort_brand$is_published'] != null)
                        <i class="fa {{ ($filter['sort_brand$is_published'] == 'asc') ? 'fa-sort-amount-up' : 'fa-sort-amount-down' }}"></i>
                    @endif
                </p>
            </th>
            <th>
                <p class="pn-pointer">
                    @lang('admin::brand.index.ACTION')
                </p>
            </th>
        </tr>
        </thead>
        <tbody>
        @if(isset($LIST))
            @foreach($LIST as $item)
                <tr>
                    <td class="text-center">
                        @if($item['brand_avatar'] != null)
                            <img src="{{ asset($item['brand_avatar']) }}" height="40">
                        @else
                            <img src="{{ asset('static/backend/images/default-placeholder.png') }}" height="40">
                        @endif
                    </td>
                    <td>
                        <p title="{{ $item['brand_name'] }}">
                            <a href="{{route('admin.brand.detail', $item['brand_id'])}}">
                                {{ subString($item['brand_name']) }}
                            </a>
                        </p>
                    </td>
                    <td>
                        <p title="{{ $item['brand_code'] }}">
                            {{ subString($item['brand_code']) }}
                        </p>
                    </td>
                    <td>{{ subString($item['company_name']) }}</td>
                    <td>
                        @if ($item['brand_customer_code'] != null)
                            <a href="javascript:void(0)" onclick="buttonAction.popQrCode('{{$item['brand_id']}}', '{{$item['brand_customer_code']}}')">
                                <img src="https://chart.googleapis.com/chart?chs=40x40&cht=qr&chl={{$item['brand_customer_code']}}&choe=UTF-8"/>
                            </a>
                        @endif
                    </td>
                    <td>
                        @include('helpers.button', ['button' => [
                                                'route' => 'admin.brand.update-status',
                                                 'html' => '<span class="kt-switch kt-switch--success">
							<label>
							    <input type="checkbox" class="switch-status"
                                       data-status="'. $item['is_activated'] .'"
                                       data-id="'.$item['brand_id'].'"
                                        '. (($item['is_activated'] == 1) ? 'checked' : '') .'>
							    <span></span>
							</label>
						</span>',
						                    'default' => '<span class="kt-switch kt-switch--success">
							<label>
							    <input type="checkbox" class="switch-status" disabled
                                        '. (($item['is_activated'] == 1) ? 'checked' : '') .'>
							    <span></span>
							</label>
						</span>',
                                        ]])

                    </td>
                    <td>
                        @include('helpers.button', ['button' => [
                                                'route' => 'admin.brand.update-status',
                                                 'html' => '<span class="kt-switch kt-switch--success">
							<label>
							    <input type="checkbox" class="switch-publish"
                                       data-status="'. $item['is_published'] .'"
                                       data-id="'.$item['brand_id'].'"
                                        '. (($item['is_published'] == 1) ? 'checked' : '') .'>
							    <span></span>
							</label>
						</span>',
						                        'default' => '<span class="kt-switch kt-switch--success">
							<label>
							    <input type="checkbox" disabled
                                        '. (($item['is_published'] == 1) ? 'checked' : '') .'>
							    <span></span>
							</label>
						</span>'
                                        ]])
                    </td>
                    <td>
                        <div class="kt-portlet__head-toolbar">
                            <div class="btn-group" role="group">
                                <button id="btnGroupVerticalDrop1" type="button"
                                        class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Hành động
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                    @include('helpers.button', ['button' => [
                                                'route' => 'admin.brand.edit',
                                                 'html' => '<a href="'.route('admin.brand.edit', $item['brand_id']).'" class="dropdown-item">'
                                                 .'<i class="la la-edit"></i>'
                                                 .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::province.index.TABLE_EDIT').'</span>'.
                                            '</a>'
                                        ]])
                                    @include('helpers.button', ['button' => [
                                                'route' => 'admin.brand.detail',
                                                 'html' => '<a href="'.route('admin.brand.detail', $item['brand_id']).'" class="dropdown-item">'
                                                 .'<i class="fa flaticon-eye"></i>'
                                                 .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::province.index.DETAIL').'</span>'.
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
    <input type="hidden" name="sort_brand$brand_name" id="sort_brand_name"
           value="{{ $filter['sort_brand$brand_name'] }}">
    <input type="hidden" name="sort_brand$brand_code" id="sort_brand_code" value="{{$filter['sort_brand$brand_code']}}">
    <input type="hidden" name="sort_brand$company_name" id="sort_company_name"
           value="{{$filter['sort_brand$company_name']}}">
    <input type="hidden" name="sort_brand$is_published" id="sort_is_published"
           value="{{$filter['sort_brand$is_published']}}">
    <input type="hidden" name="sort_brand$is_activated" id="sort_is_actived"
           value="{{$filter['sort_brand$is_activated']}}">
    {{$LIST->appends($filter)->links('helpers.paging')}}
</div>
