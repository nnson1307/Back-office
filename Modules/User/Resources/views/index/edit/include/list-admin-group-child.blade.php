<table class="table table-striped" id="table-admin-group-child">
    <thead>
    <tr>
        <th>@lang('user::admin-group.create.ADMIN_GROUP_NAME')</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @if (isset($list_group_child))
        @include('user::index.edit.include.list-tr-group-child')
    @endif
    <tr id="row-btn-add">
        <td colspan="2">
            <a href="javascript:void(0)"
               onclick="Edit.selectGroupChild(0)">
                @lang('user::user.create.ADD_ROLE_GROUP')
            </a>
        </td>
    </tr>
    </tbody>
</table>
<div id="modal-list-group-child">
    <div class="modal fade" id="kt_modal_list_group_child" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-modal="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @lang('user::admin-group.create.ADD_ADMIN_GROUP_CHILD')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="kt-scroll" data-scroll="true" data-height="500">
                        <div class="kt-section__content" id="popup-list-group-child"></div>
                        {{--<div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div>--}}
                        {{--<div class="ps__rail-y" style="top: 0px; height: 200px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 40px;"></div></div>--}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('user::admin-group.input.BUTTON_CLOSE')
                    </button>
                    <button type="button"
                            id="btn-add-group-child-to-list"
                            class="btn btn-primary"
                            onclick="Edit.addGroupChild()"
                    >
                        @lang('user::admin-group.input.BUTTON_ADD')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
