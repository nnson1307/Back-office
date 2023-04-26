<form id="form-edit-feature">
    <div class="form-group row">
        <label class="col-xl-4 col-lg-4 col-form-label">@lang('service::feature_service.create.NAME_FEATURE')
            <span class="color_red"> *</span></label>
        <div class="col-lg-8 col-xl-8">
            <input class="form-control" id="feature_name" name="feature_name" type="text" maxlength="250"
                   value="{{$data['name_feature']}}">
            <input type="hidden" id="id" name="id" value="{{$id}}">

        </div>
    </div>
    <div class="form-group row">
        <label class="col-xl-4 col-lg-4 col-form-label">@lang('service::service.create.STATUS')</label>
        <div class="col-lg-8 col-xl-8">
            <span class="kt-switch kt-switch--success">
                <label>
                     <input type="checkbox" id="is_activated" name="is_activated"
{{--                            onchange="index.change_status('{{}}',this)"--}}
                                            {{ ($data['is_actived'] == 1) ? 'checked' : '' }}>
                    <span></span>
                </label>
            </span>
        </div>
    </div>
{{--    <div class="form-group row">--}}
{{--        <label class="col-xl-4 col-lg-4 col-form-label">@lang('service::feature_service.create.FEATURE_SYSTEM')--}}
{{--            <span class="color_red"> *</span></label>--}}
{{--        <div class="col-lg-8 col-md-8 col-sm-12 form-group-sub">--}}
{{--            <select class="form-control" id="feature_system" name="feature_system">--}}
{{--                <option value="" SELECTED>@lang('service::feature_service.create.CHOOSE_FEATURE')</option>--}}
{{--                <option>Tính năng 1</option>--}}
{{--                <option>Tính năng 2</option>--}}
{{--            </select>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="form-group row">
        <label class="col-xl-4 col-lg-4 col-form-label">@lang('service::feature_service.create.des')
            <span class="color_red"> *</span></label>
        <div class="col-lg-8 col-xl-8">
            <input class="form-control" id="description" name="description" type="text" maxlength="250"
                   placeholder="@lang('service::feature_service.create.DES_PLACEHOLDER')"
                    value="{{$data['description']}}">
        </div>
    </div>
    <div class="form-group row">
        <label  class="col-xl-4 col-lg-4 col-form-label">@lang('service::feature_service.index.CREATE_DATE')</label>
            <div class="col-lg-8 col-xl-8 input-group date">
                <input type="text" class="form-control" readonly   name="create_date" id="create_date"
                       value="{{date('d/m/Y', strtotime($data['create_date'])) }}">
            </div>
    </div>
    <div class="form-group row">
        <label class="col-xl-4 col-lg-4 col-form-label">@lang('service::service.create.IMG_CONTENT')</label>
        <div class="col-lg-8 col-xl-8">
            <textarea class="form-control" rows="10" id="img_content2"
                      name="img_content2">{!! $data['img_content'] !!}</textarea>
        </div>
    </div>
</form>

<script type="text/javascript">
    Summernote.generate('img_content2');
    Summernote.uploadImg('img_content2');

    $(document).ready(function () {
        var arrows;
        if (KTUtil.isRTL()) {
            arrows = {
                leftArrow: '<i class="la la-angle-right"></i>',
                rightArrow: '<i class="la la-angle-left"></i>'
            }
        } else {
            arrows = {
                leftArrow: '<i class="la la-angle-left"></i>',
                rightArrow: '<i class="la la-angle-right"></i>'
            }
        }

        $('#create_date').datepicker({
            rtl: KTUtil.isRTL(),
            format: 'dd/mm/yyyy',
            // pickerPosition: 'bottom-left',
            todayHighlight: true,
            autoclose: true,
            arrows: true,
        });
    });
</script>
