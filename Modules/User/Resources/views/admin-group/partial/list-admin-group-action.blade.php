<table class="table table-striped" id="table-list-action">
    <thead>
    <tr>
        <th>@lang('user::admin-group.create.ADMIN_ACTION_NAME')</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
        @if (isset($list_action) && count($list_action) > 0)
            @foreach ($list_action as $item)
                <tr class="action-item">
                    <td>
                        <p title="{{ $item['action_name'] }}">
                            {{ subString($item['action_name']) }}
                        </p>
                        <input type="hidden" name="action_id[]" value="{{ $item['action_id'] }}">
                    </td>
                    <td>
                        <select class="form-control" onchange="adminGroup.removeRow(this)">
                            <option value="">Hành động</option>
                            <option value="1">@lang('user::admin-group.index.TABLE_REMOVE')</option>
                        </select>
                    </td>
                </tr>
            @endforeach
        @endif
        <tr id="row-btn-add-action">
            <td colspan="2">
                <a href="javascript:void(0)" onclick="adminGroup.showPopupActionList()">
                    @lang('user::admin-group.input.BUTTON_ADD_NEW')
                </a>
            </td>
        </tr>
    </tbody>
</table>
<div id="modal-list-action">
    <div class="modal fade" id="kt_modal_list_action" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-modal="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        @lang('user::admin-group.create.ADD_ADMIN_ACTION')
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="kt-scroll" data-scroll="true" data-height="500" id="popup-list-action"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        @lang('user::admin-group.input.BUTTON_CLOSE')
                    </button>
                    <button type="button"
                            id="btn-add-action-to-list"
                            class="btn btn-primary"
                            onclick="adminGroup.addAction()"
                    >
                        @lang('user::admin-group.input.BUTTON_ADD')
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
