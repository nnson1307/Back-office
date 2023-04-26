<form id="form-reset-password-success">
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">@lang('user::store-user.reset-password.USER_ACCOUNT')</label>
        <div class="col-lg-9 col-xl-9">
            <label class="col-form-label" id="phone"></label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">@lang('user::store-user.reset-password.FULL_NAME')</label>
        <div class="col-lg-9 col-xl-9">
            <label class="col-form-label" id="fullname"></label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">@lang('user::store-user.reset-password.PASSWORD')</label>
        <div class="col-lg-9 col-xl-9">
            <div class="kt-input-icon kt-input-icon--right">
                <input style="background: rgba(0,0,0,0);border: none;padding-left: 0;"
                       class="form-control" type="password" id="password-label" name="password-label"
                        >
                <a href="javascript:void(0)" onclick="reset_password.show_password('#password-label')" class="kt-input-icon__icon kt-input-icon__icon--right">
                <span  class="kt-input-icon__icon kt-input-icon__icon--right">
                    <span><i class="la la-eye"></i></span>
                 </span>
                </a>
            </div>
            <div class="kt-input-icon kt-input-icon--right">
                <a href="javascript:void(0)" onclick="reset_password.copyToClipboard()" class="col-form-label">@lang('user::store-user.reset-password.CLICK_TO_COPY_PASSWORD')</a>
            </div>
        </div>
    </div>
</form>