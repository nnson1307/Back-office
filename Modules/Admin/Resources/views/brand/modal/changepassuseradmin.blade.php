<div class="modal fade" id="m_user_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" id="change-pass-user">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('admin::brand.edit.CHANGE_USER_PASS')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form id="form-update-pass">
                    <input type="hidden" value="0" id="user_id" name="user_id">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.ADMIN_USER_PASSWORD_AUTO')</label>
                        <div class="col-lg-9 col-xl-9">
                            <div class="form-group">
                                <label class="kt-checkbox kt-checkbox--solid kt-checkbox--brand">
                                    <input type="checkbox" id="is_active" name="is_active" onchange="update.genAutoPass();">
                                    <span></span>
                                </label>
                                <br><br>

                                <div class="kt-input-icon kt-input-icon--right">
                                    <input type="password" class="form-control" id="password" name="password">
                                    <span class="kt-input-icon__icon kt-input-icon__icon--right">
															<span><i class="la la-eye"></i></span>
														</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.ADMIN_USER_REQUIRE_CHANGE_PASS')</label>
                        <div class="col-lg-9 col-xl-9">
                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--brand">
                                <input type="checkbox" id="is_require_change_pass" name="is_require_change_pass">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin::brand.create.CANCEL')</button>
                <a href="javascript:void(0)" onclick="update.submitChangePassUserAdmin();" class="btn btn-primary">@lang('admin::brand.edit.CREATE_USER_PASS')</a>
            </div>
        </div>
        <div class="modal-content" id="info-user" style="display: none;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('admin::brand.edit.CREATE_USER_INFO_SUCCESS')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form id="form-info-user">
                    <input type="hidden" value="0" id="user_brand_id" name="user_brand_id">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label"><b>@lang('admin::brand.edit.ACCOUNT_LOGIN')</b></label>
                        <div class="col-lg-9 col-xl-9">
                            <label class="col-form-label" id="info_email"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label"><b>@lang('admin::brand.create.ADMIN_USER_FULLNAME')</b></label>
                        <div class="col-lg-9 col-xl-9">
                            <label class="col-form-label" id="info_fullname"></label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label"><b>@lang('admin::brand.edit.PASSWORD')</b></label>
                        <div class="col-lg-9 col-xl-9">
                            <label class="col-form-label" id="info_pass"></label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a href="javascript:void(0)" onclick="update.createUserAdminFinish();" class="btn btn-primary">@lang('admin::brand.edit.CREATE_USER_FINISH')</a>
            </div>
        </div>
    </div>
</div>
<script>
    //Validate
    var password_required='@lang('admin::validation.brand.password_required')';
    $(document).ready(function () {
        $('#form-update-pass').validate({
            rules: {
                password:'required',
            },
            messages: {
                password:{
                    required: password_required
                }
            },
        });
    });
</script>