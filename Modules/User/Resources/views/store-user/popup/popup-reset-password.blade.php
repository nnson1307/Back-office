<form id="form-reset-password">
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">@lang('user::store-user.reset-password.USER_ACCOUNT')</label>
        <div class="col-lg-9 col-xl-9">
            <input type="text" class="form-control" id="user_account" name="user_account"
                   hidden value="{{$item['phone']}}">
            <label class="col-form-label">{{$item['phone']}}</label>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-xl-3 col-lg-3 col-form-label">@lang('user::store-user.reset-password.AUTO_GENERATE_PWD')</label>
        <div class="col-lg-9 col-xl-9">
            <div class="col-lg-12 col-xl-12 col-form-label row">
                <label class="kt-checkbox kt-checkbox--solid kt-checkbox--brand">
                    <input type="checkbox" id="is_auto_generate_pws" name="is_auto_generate_pws"
                           onclick="reset_password.autoGeneratePassword()">
                    <span></span>
                </label>
            </div>
            <div class="kt-input-icon kt-input-icon--right mt-3">
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="@lang('user::store-user.reset-password.PLACEHOLDER_PASSWORD')">
                <a href="javascript:void(0)" onclick="reset_password.show_password('#password')" class="kt-input-icon__icon kt-input-icon__icon--right">
                <span  class="kt-input-icon__icon kt-input-icon__icon--right">
                    <span><i class="la la-eye"></i></span>
                 </span>
                </a>
            </div>
        </div>
    </div>
    {{--<div class="form-group row">--}}
        {{--<label class="col-xl-3 col-lg-3 col-form-label">@lang('user::store-user.reset-password.REQUIRE_CHANGE_PWD_NEXT_LOGIN')</label>--}}
        {{--<div class="col-lg-9 col-xl-9">--}}
            {{--<label class="kt-checkbox kt-checkbox--solid kt-checkbox--brand">--}}
                {{--<input type="checkbox" checked id="is_activated" name="is_activated">--}}
                {{--<span></span>--}}
            {{--</label>--}}
        {{--</div>--}}
    {{--</div>--}}
</form>