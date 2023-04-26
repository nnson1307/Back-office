@if(isset($list))
    <div class="row">
        @foreach($list as $itemService)
            <div class="col-12 mt-5">
                <div class="row">
                    <div class="col-3"><h4>{{$itemService['service_name_vi']}}</h4></div>
                    <div class="col-8">
                <span class="kt-switch kt-switch--success mr-5">
                    <label class="mb-0">
                        <input type="checkbox" class="switch-publish"
                               id="is_published" onchange="buttonAction.active('service[{{$itemService["service_id"]}}][is_actived]')" name="service[{{$itemService['service_id']}}][is_actived]" value="1"
{{--                                {{$itemService['is_actived'] == 1 ? "checked" : ""}}--}}
                                @if(isset($getServiceBrand) && count($getServiceBrand) != 0)
                                    @if(isset($getServiceBrand[$itemService['service_id']]))
                                       @if($getServiceBrand[$itemService['service_id']]['is_actived'] == 1)
                                            checked
                                       @endif
                                    @endif
{{--                                @else--}}
{{--                                    @if($itemService['is_actived'] == 1)--}}
{{--                                        checked--}}
{{--                                    @endif--}}
                                @endif

                        @if(Route::currentRouteName() == 'admin.brand.detail')
                            disabled
                        @endif

                        >
                        <span class="mb-0"></span>
                    </label>
                    <input type="hidden" name="service[{{$itemService['service_id']}}][service_id]" value="{{$itemService['service_id']}}">
                </span>
                        @if(Route::currentRouteName() != 'admin.brand.detail')
                            <a href="javascript:void(0)" onclick='register.delete_feature("{{$itemService['service_id']}}","service[{{$itemService['service_id']}}][is_actived]")'><i  class="flaticon2-trash" style="font-size: 30px"></i></a>
                        @endif
                    </div>
                    <div class="col-12">
                        <ul class="nav nav-tabs  nav-tabs-line nav-tabs-line-success" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tabs_7_1" role="tab">
                                    <i class=""></i> @lang('service::service.index.feature')</a>
                            </li>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        @lang('service::service_feature.index.feature_name')
                                    </th>
                                    <th>
                                        @lang('service::service_feature.index.des_short')
                                    </th>
                                    <th>
                                        @lang('service::service_feature.index.start_date')
                                    </th>
                                    <th>
                                        @lang('service::service_feature.index.update_date')
                                    </th>

                                    <th>@lang('service::service.index.STATUS')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($listFeature as $itemFeature)
                                    @if($itemFeature['service_id'] == $itemService['service_id'])
                                        <tr>
                                            @if($itemFeature['feature_group_name_redefine'] == null)
                                                <td title="{{$itemFeature['feature_group_name_vi']}}"> {{subString($itemFeature['feature_group_name_vi'])}}</td>
                                            @else
                                                <td title="{{$itemFeature['feature_group_name_redefine']}}"> {{subString($itemFeature['feature_group_name_redefine'])}}</td>
                                            @endif
                                            <td title="{{$itemFeature['description_short']}}"> {{subString($itemFeature['description_short'])}}</td>
                                            <td>{{\Carbon\Carbon::parse($itemFeature['created_at'])->format('d/m/Y')}}</td>
                                            <td>{{\Carbon\Carbon::parse($itemFeature['updated_at'])->format('d/m/Y')}}</td>
                                            <td>
                                            <span class="kt-switch kt-switch--success">
                                                <label>
                                                    <input value="1" type="checkbox" class="switch-publish"
                                                           id="is_actived" onchange='buttonAction.activeFeature("service[{{$itemService['service_id']}}][feature][{{$itemFeature['feature_group_id']}}][is_actived]")' name="service[{{$itemService['service_id']}}][feature][{{$itemFeature['feature_group_id']}}][is_actived]"
{{--                                                            {{$itemFeature['is_actived'] == 1 ? "checked" : ""}}--}}
                                                        @if(isset($getServiceBrandFeature) && count($getServiceBrandFeature) != 0)
                                                            @if(isset($getServiceBrandFeature[$itemService['service_id'].'-'.$itemFeature['feature_group_id']]))
                                                               @if($getServiceBrandFeature[$itemService['service_id'].'-'.$itemFeature['feature_group_id']]['is_actived'] == 1)
                                                                checked
                                                               @endif
                                                            @endif
{{--                                                        @else--}}
{{--                                                            @if($itemFeature['is_actived'] == 1)--}}
{{--                                                                checked--}}
{{--                                                            @endif--}}
                                                        @endif
                                                        @if(Route::currentRouteName() == 'admin.brand.detail')
                                                            disabled
                                                        @endif
                                                    >
                                                    <span></span>
                                                    <input type="hidden" name="service[{{$itemService['service_id']}}][feature][{{$itemFeature['feature_group_id']}}][feature_group_id]" value="{{$itemFeature['feature_group_id']}}">
                                                </label>
                                            </span>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif