{{--<div class="row">--}}
{{--    <div class="form-group col-lg-3">--}}
{{--        <input class="form-control" type="text" id="keyword_admin_service$service_name_vi" name="keyword_admin_service$service_name_vi"--}}
{{--               placeholder="@lang('service::service.index.PLACEHOLDER_SERVICE_NAME')" value="{{isset($filter['keyword_admin_service$service_name_vi']) ? $filter['keyword_admin_service$service_name_vi'] : ""}}">--}}
{{--    </div>--}}

{{--    <div class="form-group col-lg-3">--}}
{{--        <input class="form-control" type="text" id="keyword_admin_service$description_short" name="keyword_admin_service$description_short"--}}
{{--               placeholder="@lang('service::service.table.DESCRIPTION')" value="{{isset($filter['keyword_admin_service$description_short']) ? $filter['keyword_admin_service$description_short'] : ""}}">--}}
{{--    </div>--}}

{{--    <div class="form-group col-lg-3">--}}
{{--        <select class="form-control --select2 ss--width-100 " id="is_actived" name="keyword_admin_service$is_actived">--}}
{{--            <option value="">@lang('service::service.index.action')</option>--}}
{{--            <option value="1" {{isset($filter['keyword_admin_service$is_actived']) && $filter['keyword_admin_service$is_actived'] == 1 ? "selected" : ""}}>@lang('service::service.index.active')</option>--}}
{{--            <option value="0" {{isset($filter['keyword_admin_service$is_actived']) && $filter['keyword_admin_service$is_actived'] == 0 ? "selected" : ""}}>@lang('service::service.index.inactive')</option>--}}
{{--        </select>--}}
{{--    </div>--}}

{{--    <div class="form-group col-lg-3">--}}
{{--        <a class="btn btn-secondary" href="{{route('admin.service')}}">--}}
{{--            @lang('admin::country.index.REMOVE')--}}
{{--        </a>--}}
{{--        <button type="submit"--}}
{{--                class="btn btn-primary btn-hover-brand">--}}
{{--            @lang('admin::country.index.SEARCH')--}}
{{--        </button>--}}
{{--    </div>--}}
{{--</div>--}}
<div class="kt-section">
    <div class="kt-section__content">
        <div class="fixscroll mb-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>
                        @lang('service::service.table.SERVICE_NAME')
                    </th>
                    <th>
                        @lang('service::service.table.FEATURE')
                    </th>
                    <th>
                        @lang('service::service.table.DESCRIPTION')
                    </th>
                    <th>
                        @lang('service::service.table.BRAND')
                    </th>
                    <th>
                        @lang('service::service.table.CREATE_DATE')
                    </th>
                    <th>
                        @lang('service::service.table.UPDATE_DATE')
                    </th>
                    <th>@lang('service::service.index.STATUS')</th>
{{--                    <th><p>@lang('admin::country.index.ACTION')</p></th>--}}
                </tr>
                </thead>
                <tbody>
                @if(isset($list) && count($list))
                    @foreach($list as $item)
                        <tr>
                            <td title="{{$item['service_name_vi']}}">
                                {{subString($item['service_name_vi'])}}
                            </td>
                            <td>
                                {{$item['service_feature']}}
                            </td>
                            <td>
                                <p title="{{$item['description_short']}}">{{subString($item['description_short'])}}</p>
                            </td>
                            <td>
                                {{$item['service_brand']}} @lang('service::service.index.service_brand')
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($item['created_at'])->format('H:i:s d/m/Y')}}
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($item['updated_at'])->format('H:i:s d/m/Y')}}
                            </td>
                            <td>
                                <span class="kt-switch kt-switch--success">
                                    <label>
                                        <input type="checkbox"
                                               disabled
        {{--                                        {{ ($item['is_actived'] == 1) ? 'checked' : '' }}>--}}
                                                {{ $item['is_actived'] == 1 ? 'checked' : '' }}>
                                        <span></span>
                                    </label>
                                </span>
                            </td>
                            <td>
                                <div class="kt-portlet__head-toolbar">
                                    <div class="btn-group" role="group">
                                        <button id="btnGroupVerticalDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @lang('service::service.index.action')
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                            @include('helpers.button', ['button' => [
                                                        'route' => 'admin.service.edit',
                                                         'html' => '<a href="'.route('admin.service.edit', ['id' => $item['service_id']]).'" class="dropdown-item">'
                                                         .'<i class="la la-edit"></i>'
                                                         .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::country.index.TABLE_EDIT').'</span>'.
                                                    '</a>'
                                                ]])
{{--                                            @include('helpers.button', ['button' => [--}}
{{--                                                        'route' => 'admin.service.show',--}}
{{--                                                         'html' => '<a href="'.route('admin.service.show', ['id' => $item['service_id']]).'" class="dropdown-item">'--}}
{{--                                                         .'<i class="fa flaticon-eye"></i>'--}}
{{--                                                         .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::country.index.DETAIL').'</span>'.--}}
{{--                                                    '</a>'--}}
{{--                                                ]])--}}
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="text-center">
                        <td colspan="8">@lang('service::service.index.nodata')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
        {{ $list->appends($filter)->links('helpers.paging') }}
    </div>
</div>
