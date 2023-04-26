<div class="modal fade" id="kt_modal_edit_feature_child" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    @lang('service::feature_service.index.EDIT_FEATURE')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-group table-responsive">
                    <table class="table table-striped m-table m-table--head-bg-default">
                        <thead class="bg">
                        <tr>
                            <th class="tr_thead_list">
                                <label class="m-checkbox m-checkbox--air">
                                    <input type="checkbox" name ="feature_name_all" onclick="service.checkAllFeatureChildGroup(this)">
                                    <span></span>
                                </label>
                            </th>
                            <th class="tr_thead_list">{{__('Tên chức năng con')}}</th>
{{--                            <th class="tr_thead_list">{{__('Loại dịch vụ')}}</th>--}}
{{--                            <th class="tr_thead_list">{{__('Nền tảng')}}</th>--}}
                        </tr>
                        </thead>
                        <tbody style="font-size: 13px">
                        @if(isset($LIST))
                            @foreach ($LIST as $key => $item)
                                <tr>
                                    <td>
                                        <label class="m-checkbox m-checkbox--air">
                                            <input type="checkbox" {{$item['is_checked'] == 1 ? 'checked' : ''}} name ="feature_name" value="{{$item['feature_id']}}">
                                            <span></span>
                                        </label>
                                    </td>
                                    <td>{{$item['feature_name']}}</td>
{{--                                    <td>{{$item['service_type']}}</td>--}}
{{--                                    <td>{{$item['platform_type']}}</td>--}}
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    @lang('user::store-user.reset-password.BUTTON_CANCEL')
                </button>
                <button type="button"
                        id="btn-add-group-child-to-list"
                        class="btn btn-primary"
                        onclick="service.create_feature_child({{$feature_group_id}})">
                    @lang('service::feature_service.button.ADD_NEWS')
                </button>
            </div>
        </div>
    </div>
</div>
</div>
