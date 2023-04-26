<div class="modal fade" id="m_user_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content" id="register-user">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('admin::brand.create.ADMIN_USER_CREATE')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form id="form-register-user">
                    <input type="hidden" value="0" id="user_brand_id" name="user_brand_id">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.ADMIN_USER_EMAIL')<span class="color_red"> *</span></label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control" id="email" name="email" type="text"
                                   placeholder="@lang('admin::brand.create.ADMIN_USER_EMAIL_PLACEHOLDER')">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.ADMIN_USER_FULLNAME')<span class="color_red"> *</span></label>
                        <div class="col-lg-9 col-xl-9">
                            <input class="form-control" id="full_name" name="full_name" type="text"
                                   placeholder="@lang('admin::brand.create.ADMIN_USER_FULLNAME_PLACEHOLDER')">
                        </div>
                    </div>
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
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.ADMIN_USER_STATUS')</label>
                        <div class="col-lg-9 col-xl-9">
                            <label class="kt-checkbox kt-checkbox--solid kt-checkbox--brand">
                                <input type="checkbox" id="is_actived" name="is_actived">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('admin::brand.create.CANCEL')</button>
                <a href="javascript:void(0)" onclick="update.submitAddUserAdmin();" class="btn btn-primary">@lang('admin::brand.create.CREATE_USER_ADMIN')</a>
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
    var email_required = '@lang('admin::validation.brand.email_required')';
    var name_required = '@lang('admin::validation.brand.name_required')';
    var email_type_required='@lang('admin::validation.brand.email_type_required')';
    var display_name_required='@lang('admin::validation.brand.display_name_required')';
    $(document).ready(function () {
        $('#form-register-user').validate({
            rules: {
                "email": {
                    required: true,
                    email: true
                },
                full_name:'required',
            },
            messages: {
                email:{
                    required: email_required,
                    email : email_type_required
                },
                full_name:{
                    required: name_required
                }
            },
        });
    });
</script>