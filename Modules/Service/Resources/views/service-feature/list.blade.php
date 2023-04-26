<div class="kt-section__content">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>
                @lang('service::service_feature.index.feature_name_vi')
            </th>
            <th>
                @lang('service::service_feature.index.feature_name_en')
            </th>
            <th>
                @lang('service::service_feature.index.feature_name_redefine')
            </th>
            <th>
                @lang('service::service_feature.index.des_short')
            </th>
            <th>@lang('service::service.index.STATUS')</th>
            <th><p>@lang('admin::country.index.ACTION')</p></th>
        </tr>
        </thead>
        <tbody>
        @if(isset($list) && count($list))
            @foreach($list as $item)
                <tr>
                    <td title="{{$item['feature_group_name_vi']}}">
                        {{subString($item['feature_group_name_vi'])}}
                    </td>
                    <td title="{{$item['feature_group_name_en']}}">
                        {{subString($item['feature_group_name_en'])}}
                    </td>
                    <td title="{{$item['feature_group_name_redefine']}}">
                        {{subString($item['feature_group_name_redefine'])}}
                    </td>
                    <td title="{{$item['description_short']}}">
                        {{subString($item['description_short'])}}
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
                                                'route' => 'service.service-feature.edit',
                                                 'html' => '<a href="'.route('service.service-feature.edit', ['id' => $item['feature_group_id']]).'" class="dropdown-item">'
                                                 .'<i class="la la-edit"></i>'
                                                 .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::country.index.TABLE_EDIT').'</span>'.
                                            '</a>'
                                        ]])
                                    @include('helpers.button', ['button' => [
                                                'route' => 'service.service-feature.show',
                                                 'html' => '<a href="'.route('service.service-feature.show', ['id' => $item['feature_group_id']]).'" class="dropdown-item">'
                                                 .'<i class="fa flaticon-eye"></i>'
                                                 .'<span class="kt-nav__link-text kt-margin-l-5">'.__('admin::country.index.DETAIL').'</span>'.
                                            '</a>'
                                        ]])
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="text-center">
                <td colspan="6">@lang('service::service_feature.index.nodata')</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
