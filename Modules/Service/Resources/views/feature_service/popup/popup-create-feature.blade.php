<form id="form-reset-password">
    <div class="form-group row">
        <label class="col-xl-4 col-lg-4 col-form-label">@lang('service::feature_service.create.NAME_FEATURE')
            <span class="color_red"> *</span></label>
        <div class="col-lg-8 col-xl-8">
            <input class="form-control" id="feature_name" name="feature_name" type="text" maxlength="250"
                   placeholder="@lang('service::feature_service.create.FEATURE_NAME_PLACEHOLDER')">
            <input type="hidden" id="action" name="action" value="create">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-xl-4 col-lg-4 col-form-label">@lang('service::service.create.STATUS')</label>
        <div class="col-lg-8 col-xl-8">
            <span class="kt-switch kt-switch--success">
                <label>
                    <input type="checkbox" class="switch-publish"
                           id="is_activated" name="is_activated">
                    <span></span>
                </label>
            </span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-xl-4 col-lg-4 col-form-label">@lang('service::feature_service.create.FEATURE_SYSTEM')
            <span class="color_red"> *</span></label>
        <div class="col-lg-8 col-md-8 col-sm-12 form-group-sub">
            <select class="form-control" id="feature_system" name="feature_system">
                <option value="" SELECTED>@lang('service::feature_service.create.CHOOSE_FEATURE')</option>
                <option>Tính năng 1</option>
                <option>Tính năng 2</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-xl-4 col-lg-4 col-form-label">@lang('service::feature_service.create.des')
            <span class="color_red"> *</span></label>
        <div class="col-lg-8 col-xl-8">
            <input class="form-control" id="description" name="description" type="text" maxlength="250"
                   placeholder="@lang('service::feature_service.create.DES_PLACEHOLDER')">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-xl-4 col-lg-4 col-form-label">@lang('service::service.create.IMG_CONTENT')</label>
        <div class="col-lg-8 col-xl-8">
            <textarea class="form-control" rows="10" id="img_content1" name="img_content1"></textarea>
        </div>
    </div>
</form>

<script type="text/javascript">
    Summernote.generate('img_content1');
    Summernote.uploadImg('img_content1');
</script>
