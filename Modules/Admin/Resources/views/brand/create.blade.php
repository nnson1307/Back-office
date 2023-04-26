@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <form id="form-register">
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('admin::brand.create.CREATE_BRAND')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="register.submit()">
                    @lang('admin::brand.create.CREATE')
                </button>
                <button type="button" class="btn btn-info btn-bold" onclick="register.submit(1)">
                    @lang('admin::brand.create.CREATE_EXIT')
                </button>
                <a href="{{route('admin.brand')}}" class="btn btn-secondary btn-bold">
                    @lang('admin::brand.create.CANCEL')
                </a>
            </div>
        </div>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content" style="margin-bottom: 80px;">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.BRAND_NAME')<span class="color_red"> *</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" id="brand_name" name="brand_name" type="text" maxlength="250"
                                           placeholder="@lang('admin::brand.create.BRAND_NAME_PLACEHOLDER')">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.BRAND_CODE')<span
                                            class="color_red"> *</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" type="text" id="brand_code" name="brand_code" maxlength="50"
                                           placeholder="@lang('admin::brand.create.BRAND_CODE_PLACEHOLDER')">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.COMPANY_NAME')<span class="color_red"> *</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" type="text" id="company_name" name="company_name" maxlength="250"
                                           placeholder="@lang('admin::brand.create.COMPANY_NAME_PLACEHOLDER')">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.DISPLAY_NAME')<span class="color_red"> *</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" type="text" id="display_name" name="display_name" maxlength="250"
                                           placeholder="@lang('admin::brand.create.DISPLAY_NAME_PLACEHOLDER')">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">Hotline</label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" type="text" id="hotline" name="hotline" maxlength="11"
                                           placeholder="@lang('admin::brand.index.input_hotline')">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.LOGO')
                                    <span class="form-text text-muted">@lang('admin::brand.create.MAX_DATA')</span>
                                </label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                        <div id="logo-image">
                                            <div class="kt-avatar__holder"
                                                 style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>
                                        </div>
                                        <input type="hidden" id="brand_avatar" name="brand_avatar">
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                               data-original-title="Change logo">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" id="getFileLogo" name="getFileLogo"
                                                   accept="image/jpeg,image/png,image/jpeg,jpg|png|jpeg"
                                                   onchange="uploadLogo(this);">
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                              data-original-title="Cancel avatar">
																<i class="fa fa-times"></i>
															</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.BACKGROUND')

                                    <span class="form-text text-muted">@lang('admin::brand.create.MAX_DATA')</span>
                                </label>

                                <div class="col-lg-9 col-xl-6">
                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                        <div id="background-image">
                                            <div class="kt-avatar__holder" style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>
                                        </div>
                                        <input type="hidden" id="brand_banner" name="brand_banner">
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                               data-original-title="Change banner">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" id="getFileBanner" name="getFileBanner"
                                                   accept="image/jpeg,image/png,image/jpeg,jpg|png|jpeg"
                                                   onchange="uploadBanner(this);">
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                              data-original-title="Cancel avatar">
																<i class="fa fa-times"></i>
															</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.BRAND_ABOUNT')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <textarea class="form-control" rows="20" id="brand_about" name="brand_about"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.ACTIVE')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <span class="kt-switch kt-switch--success">
                                        <label>
                                            <input type="checkbox" class="switch-publish"
                                                   id="is_activated" name="is_activated" checked>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.DISPLAY_APP')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <span class="kt-switch kt-switch--success">
                                        <label>
                                            <input type="checkbox" class="switch-publish"
                                                   id="is_published" name="is_published" checked>
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.FIREBASE_KEY')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" type="text" id="firebase_key" name="firebase_key" maxlength="250"
                                           placeholder="@lang('admin::brand.create.FIREBASE_KEY_PLACEHOLDER')">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.P12')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <input type="hidden" id="p_file" name="p_file">
                                    <input type="file" id="upload_p12_file" name="upload_p12_file" onchange="uploadFileP12(this);">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.FAVICON')
                                    <span class="form-text text-muted">@lang('admin::brand.create.MAX_DATA')</span>
                                </label>
                                <div class="col-lg-9 col-xl-6">
                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                        <div id="favicon">
                                            <div class="kt-avatar__holder"
                                                 style="background-image: url({{asset('static/backend/images/default-placeholder.png')}})"></div>
                                        </div>
                                        <input type="hidden" id="favicon_file" name="favicon_file">
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                               data-original-title="Change favicon">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" id="upload_favicon_file" name="upload_favicon_file"
                                                   onchange="uploadFavicon(this);">
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                              data-original-title="Cancel avatar">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="form-group row">--}}
{{--                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::brand.create.BRAND_URL')</label>--}}
{{--                                <div class="col-lg-9 col-xl-9">--}}
{{--                                    <input class="form-control" type="text" id="brand_url" name="brand_url"--}}
{{--                                           placeholder="@lang('admin::brand.create.BRAND_URL_PLACEHOLDER')">--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
{{--                        <div class="col-12 border-bottom pb-2">--}}
{{--                            <h3 class="d-inline">@lang('admin::brand.index.using_service')</h3>--}}
{{--                            <button type="button" onclick="register.showModel()" class="float-right btn btn-brand">@lang('admin::brand.index.add_service')</button>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 pt-3" id="table-list-service">--}}

{{--                        </div>--}}
                    </div>
                </div>

            </div>

        </div>
        <!--begin::Modal-->
        <div id="m_modal"></div>
    @include('admin::brand.modal.modal-create-service')
        <!--end::Modal-->
    </form>


@stop
@section('after_script')
    <script>
        //Thông báo
        var create_success = '@lang('admin::brand.create.CREATE_SUCCESS')';
        var create_fail = '@lang('admin::brand.create.CREATE_FAIL')';
        var content_check_delete = '@lang('admin::brand.index.content_check_delete')';
        var yes_delete = '@lang('admin::brand.index.yes_delete')';
        var no_delete = '@lang('admin::brand.index.no_delete')';
        var check_add_service = '@lang('admin::brand.index.check_add_service')';
        var check_add_service_success = '@lang('admin::brand.index.check_add_service_success')';
        var yes = '@lang('admin::brand.index.yes')';
        var no = '@lang('admin::brand.index.no')';
        var update_check_inactive = '@lang('admin::brand.index.update_check_inactive')';
        var update_check_active = '@lang('admin::brand.index.update_check_active')';
        var noti_check_active = '@lang('admin::brand.index.noti_check_active')';
        var noti_check_inactive = '@lang('admin::brand.index.noti_check_inactive')';
        var content_check_delete_fail = '@lang('admin::brand.index.content_check_delete_fail')';
        var confirm = '@lang('admin::brand.index.confirm')';
        var feature_update_check_inactive = '@lang('admin::brand.index.feature_update_check_inactive')';
        var feature_update_check_active = '@lang('admin::brand.index.feature_update_check_active')';
        var feature_noti_check_active = '@lang('admin::brand.index.feature_noti_check_active')';
        var feature_noti_check_inactive = '@lang('admin::brand.index.feature_noti_check_inactive')';
        //Validate
        var brand_name_required = '@lang('admin::validation.brand.brand_name_required')';
        var brand_code_required = '@lang('admin::validation.brand.brand_code_required')';
        var company_name_required='@lang('admin::validation.brand.company_name_required')';
        var display_name_required='@lang('admin::validation.brand.display_name_required')';
    </script>
    <script src="{{asset('static/backend/js/admin/brand/script.js?v='.time())}}" type="text/javascript"></script>
    <script>
        brand.init();
    </script>
    <script type="text/javascript">
        Summernote.generate('brand_about');
        Summernote.uploadImg('brand_about');
    </script>
    <script type="text/template" id="logo-tpl">
        <div class="kt-avatar__holder" style="background-image: url({link});background-position: center;"></div>
    </script>
@stop
