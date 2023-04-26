<div class="modal fade" id="modal-add-user-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
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
                    <div class="col-lg-3">
                        <input type="text" name="user" id="user" class="form-control"
                               placeholder="@lang('user::user-group-notification.create.ACCOUNT')"
                               value="">
                    </div>
                    <div class="col-lg-3">
                        <input type="text" name="full_name" id="full_name" class="form-control"
                               placeholder="@lang('user::user-group-notification.create.FULL_NAME')"
                               value="">
                    </div>
                    <div class="col-lg-2">
                        <select type="text" name="is_actived" id="is_actived"
                                class="form-control select-2" style="width: 100%">
                            <option value="">@lang('user::user-group-notification.create.STATUS')</option>
                            <option value="1">@lang('user::user-group-notification.create.IS_ACTIVE')</option>
                            <option value="0">@lang('user::user-group-notification.create.UN_ACTIVE')</option>
                        </select>
                    </div>
                    <div class="col-lg-3">
                        <button class="btn btn-primary kt-margin-r-10" onclick="userGroupDefine.searchAddUser()"
                                style="">@lang('user::user.index.SEARCH')
                        </button>
                    </div>
                </div>
                <div class="form-group row kt-margin-b-0">
                    <div class="col-lg-12">
                        <div class="kt-section__content ss--height-modal-customer" id="table-list-user" >

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    @lang('user::user-group-notification.create.CLOSE')
                </button>
                <button type="button" class="btn btn-primary" onclick="userGroupDefine.addUser2()">
                    @lang('user::user-group-notification.create.ADD_USER')
                </button>
            </div>
        </div>
    </div>
</div>