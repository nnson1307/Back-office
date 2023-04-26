<form id="list-ajax">
    <input type="hidden" value="1" name="page" id="service_popup_page">
{{--    <div class="row">--}}
{{--        <div class="form-group col-lg-3">--}}
{{--            <input class="form-control clear-value" type="text" id="keyword_admin_service$service_name_vi" name="keyword_admin_service$service_name_vi"--}}
{{--                   placeholder="@lang('service::service.index.PLACEHOLDER_SERVICE_NAME')" value="{{isset($filter['keyword_admin_service$service_name_vi']) ? $filter['keyword_admin_service$service_name_vi'] : ""}}">--}}
{{--        </div>--}}

{{--        <div class="form-group col-lg-3">--}}
{{--            <input class="form-control clear-value" type="text" id="keyword_admin_service$description_short" name="keyword_admin_service$description_short"--}}
{{--                   placeholder="@lang('service::service.table.DESCRIPTION')" value="{{isset($filter['keyword_admin_service$description_short']) ? $filter['keyword_admin_service$description_short'] : ""}}">--}}
{{--        </div>--}}

{{--        <div class="form-group col-lg-3">--}}
{{--            <select class="form-control --select2 ss--width-100 " id="is_actived" name="keyword_admin_service$is_actived">--}}
{{--                <option value="">@lang('service::service.index.action')</option>--}}
{{--                <option value="1" {{isset($filter['keyword_admin_service$is_actived']) && $filter['keyword_admin_service$is_actived'] == 1 ? "selected" : ""}}>@lang('service::service.index.active')</option>--}}
{{--                <option value="0" {{isset($filter['keyword_admin_service$is_actived']) && $filter['keyword_admin_service$is_actived'] == 0 ? "selected" : ""}}>@lang('service::service.index.inactive')</option>--}}
{{--            </select>--}}
{{--        </div>--}}

{{--        <div class="form-group col-lg-3">--}}
{{--            <button type="button" class="btn btn-secondary" onclick="register.listModel(1)">--}}
{{--                @lang('admin::country.index.REMOVE')--}}
{{--            </button>--}}
{{--            <button type="button" onclick="register.listModel(0)"--}}
{{--                    class="btn btn-primary btn-hover-brand">--}}
{{--                @lang('admin::country.index.SEARCH')--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="kt-section">
        <div class="kt-section__content">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td></td>
                    <th>
                        @lang('service::service.table.SERVICE_NAME')
                    </th>
                    <th>
                        @lang('service::service.table.FEATURE')
                    </th>
                    <th>
                        @lang('service::service.table.DESCRIPTION')
                    </th>
                    {{--            <th>--}}
                    {{--                @lang('service::service.table.BRAND')--}}
                    {{--            </th>--}}

                    <th>@lang('service::service.index.STATUS')</th>
                    <th>
                        @lang('admin::brand.index.release_date')
                    </th>
                </tr>
                </thead>
                <tbody>
                @if(isset($list) && count($list))
                    @foreach($list as $item)
                        <tr>
                            <td>
                                <label class="kt-checkbox kt-checkbox--bold kt-checkbox--success">
                                    <input type="checkbox" id="service_id" name="service_id" {{$check != null && in_array($item['service_id'],$check) ? "checked" : ""}} value="{{$item['service_id']}}">
                                    <span></span>
                                </label>
                            </td>
                            <td title="{{$item['service_name_vi']}}">
                                {{subString($item['service_name_vi'])}}
                            </td>
                            <td>
                                {{$item['service_feature']}}
                            </td>
                            <td>
                                <p title="{{$item['description_short']}}">{{subString($item['description_short'])}}</p>
                            </td>
                            {{--                    <td>--}}

                            {{--                    </td>--}}

{{--                            <td>--}}
{{--                                {{\Carbon\Carbon::parse($item['updated_at'])->format('H:i:s d/m/Y')}}--}}
{{--                            </td>--}}
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
                                {{\Carbon\Carbon::parse($item['created_at'])->format('H:i:s d/m/Y')}}
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
            {{ $list->appends($filter)->links('helpers.paging-ajax-list') }}
        </div>
    </div>
</form>
