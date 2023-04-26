@if(isset($list))
    @foreach($list as $key => $item)
        <tr>
            <td>
                @if($item['feature_group_name_redefine'] == null)
                    <p title="{{$item['feature_group_name_vi']}}">
                        {{subString($item['feature_group_name_vi'])}}
                    </p>
                @else
                    <p title="{{$item['feature_group_name_redefine']}}">
                        {{subString($item['feature_group_name_redefine'])}}
                    </p>
                @endif
            </td>
            <td>
                <p title="">{{$item['description_short']}}</p>
            </td>
            <td>
                {{  \Carbon\Carbon::parse($item['created_at'])->format('d-m-Y') }}
            </td>
            <td>
                {{  \Carbon\Carbon::parse($item['updated_at'])->format('d-m-Y') }}
            </td>
            <td>
{{--                @if (in_array('admin.country.edit', request()->session()->get('user_route')) || Auth::user()->is_admin)--}}
{{--                    <span class="kt-switch kt-switch--success">--}}
{{--                                <label>--}}
{{--                                    <input type="checkbox"--}}
{{--                                           onchange="service.changeStatusFeature('{{$key}}',this)"--}}
{{--                                            {{ ($item['is_actived'] == 1) ? 'checked' : '' }}>--}}
{{--                                    <span></span>--}}
{{--                                </label>--}}
{{--                            </span>--}}
{{--                @else--}}
{{--                    <span class="kt-switch kt-switch--success">--}}
{{--							<label>--}}
{{--							    <input type="checkbox"--}}
{{--                                       disabled--}}
{{--                                        {{ ($item['is_actived'] == 1) ? 'checked' : '' }}>--}}
{{--							    <span></span>--}}
{{--							</label>--}}
{{--						</span>--}}
{{--                @endif--}}
                <span class="kt-switch kt-switch--success">
                    <label>
                        <input type="checkbox"
                               disabled
                                {{ ($item['is_actived'] == 1) ? 'checked' : '' }}>
                        <span></span>
                    </label>
                </span>
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
                                        'route' => 'admin.service.destroy-feature',
                                         'html' => '<a href="javascript:void(0)" onclick="service.edit_feature_child('.$item["feature_group_id"].')" class="dropdown-item">'
                                         .'<i class="la la-edit"></i>'
                                         .'<span class="kt-nav__link-text kt-margin-l-5">'.__('user::admin-menu.index.TABLE_EDIT').'</span>'.
                                    '</a>'
                                ]])
                            @include('helpers.button', ['button' => [
                                       'route' => 'admin.service.destroy-feature',
                                        'html' => '<a href="javascript:void(0)" onclick="service.delete_feature('.$item["feature_group_id"].')" class="dropdown-item">'
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
