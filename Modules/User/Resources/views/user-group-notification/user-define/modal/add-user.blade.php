<div class="modal fade" id="modal-add-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
    <div class="modal-dialog" style="max-width: 70%" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    @lang('user::user-group-notification.create.ADD_USER')
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row kt-margin-b-10">
                    <div class="col-lg-12">
                        <button class="btn btn-label-primary"
                                data-toggle="modal" onclick="userGroupDefine.showModalImportExcel()">
                            @lang('user::user-group-notification.create.ADD_USER_EXCEL')
                        </button>
                    </div>
                </div>
                <div class="form-group row kt-margin-b-10">
                    <div class="col-lg-3">
                        <input type="text" name="user1" id="user1" class="form-control"
                               placeholder="@lang('user::user-group-notification.create.ACCOUNT')"
                               value="">
                    </div>
                    <div class="col-lg-3">
                        <input type="text" name="full_name1" id="full_name1" class="form-control"
                               placeholder="@lang('user::user-group-notification.create.FULL_NAME')"
                               value="">
                    </div>
                    <div class="col-lg-2">
                        <select type="text" name="is_actived1" id="is_actived1"
                                class="form-control select-2 select-22" style="width: 100%">
                            <option value="">@lang('user::user-group-notification.create.STATUS')</option>
                            <option value="1">@lang('user::user-group-notification.create.IS_ACTIVE')</option>
                            <option value="0">@lang('user::user-group-notification.create.UN_ACTIVE')</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <button class="btn btn-primary kt-margin-r-10" onclick="userGroupDefine.searchPopup1()"
                                style="">@lang('user::user.index.SEARCH')
                        </button>
                        <button class="btn btn-primary"
                                style="" onclick="userGroupDefine.showModalAddUser2()">
                            @lang('user::user-group-notification.create.ADD_USER')
                        </button>
                    </div>
                </div>
                <div class="form-group row kt-margin-b-0">
                    <div class="col-lg-12">
                        <div class="kt-section__content ss--height-modal-customer" id="table-list-user">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>
                                        <label class="kt-checkbox kt-checkbox--solid kt-checkbox--brand">
                                            <input type="checkbox"
                                                   onclick="adminGroup.selectAll(this, 'table-popup-user')">
                                            <span></span>
                                        </label>
                                    </th>
                                    <th>@lang('user::user-group-notification.create.ACCOUNT')</th>
                                    <th>@lang('user::user-group-notification.create.FULL_NAME')</th>
                                    <th>@lang('user::user-group-notification.create.STATUS')</th>
                                </tr>
                                </thead>
                                <tbody id="tbody-add-user">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    @lang('user::user-group-notification.create.CLOSE')
                </button>
                <button type="button" class="btn btn-primary" onclick="userGroupDefine.addUserGroupDefine()">
                    @lang('user::user-group-notification.create.ADD_USER')
                </button>
            </div>
        </div>
    </div>
</div>