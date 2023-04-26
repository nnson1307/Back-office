@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <form id="form-register">
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('service::service.button.CREATE_SERVICE')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="service.submit_index()">
                    @lang('admin::brand.create.CREATE')
                </button>
                <a href="{{route('admin.service')}}" class="btn btn-secondary btn-bold">
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
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.create.SERVICE_NAME') VI
                                    <span class="color_red"> *</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" id="service_name_vi" name="service_name_vi" type="text" maxlength="250"
                                           placeholder="@lang('service::service.create.SERVICE_NAME_PLACEHOLDER') VI">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.create.SERVICE_NAME') EN
                                    <span class="color_red"> *</span></label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" id="service_name_en" name="service_name_en" type="text" maxlength="250"
                                           placeholder="@lang('service::service.create.SERVICE_NAME_PLACEHOLDER') EN">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.create.STATUS')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <span class="kt-switch kt-switch--success">
                                        <label>
                                            <input type="checkbox" class="switch-publish"
                                                   id="is_actived" name="is_actived">
                                            <span></span>
                                        </label>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.table.DES_FEATURE')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <input class="form-control" type="text" id="description" name="description"
                                           placeholder="@lang('service::service.create.DES_PLACEHOLDER')">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.create.NAME_SYSTEM')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <p>VisibilityPRO</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">@lang('service::service.create.IMG_CONTENT')</label>
                                <div class="col-lg-9 col-xl-9">
                                    <textarea class="form-control" rows="10" id="img_content" name="img_content"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <ul class="nav nav-tabs  nav-tabs-line nav-tabs-line-success" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_tabs_7_1" role="tab">
                                <i class=""></i> @lang('service::service.index.feature')</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" data-toggle="tab" href="#kt_tabs_7_2" role="tab">--}}
{{--                                <i class=""></i> @lang('service::service.index.customer')</a>--}}
{{--                        </li>--}}
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_tabs_7_1" role="tabpanel">
                            @include('service::feature_service.list')
                        </div>
                        {{--                    <div class="tab-pane" id="kt_tabs_7_2" role="tabpanel">--}}
                        {{--                    </div>--}}
                    </div>
                </div>

            </div>
        </div>

        <!--begin::Modal-->
        <div id="m_modal"></div>
        <!--end::Modal-->
    @include('service::feature_service.modal.modal-create-feature')
    @include('service::feature_service.modal.modal-create-feature-success')
    @include('service::feature_service.modal.modal-edit-feature')

    </form>

    <div id="popup-feature-child"></div>

@stop
@section('after_script')
    <script>
        var title_check_delete = "@lang('service::service.create.title_check_delete')";
        var content_check_delete = "@lang('service::service.create.content_check_delete')";
        var yes_delete = "@lang('service::service.create.yes_delete')";
        var no_delete = "@lang('service::service.create.no_delete')";
        var check_create = "@lang('service::service.create.check_create')";
        var yes = "@lang('service::service.create.yes')";
        var no = "@lang('service::service.create.no')";
        var service_name_required_vi = "@lang('service::validation.service.service_name_required_vi')";
        var service_name_required_en = "@lang('service::validation.service.service_name_required_en')";
        var service_name_max_vi = "@lang('service::validation.service.service_name_max_vi')";
        var service_name_max_en = "@lang('service::validation.service.service_name_max_en')";
        var description_max = "@lang('service::validation.service.description_max')";
        var service_create_fail = "@lang('service::validation.service.service_create_fail')";
        var service_create_success = "@lang('service::validation.service.service_create_success')";
        var des_short_required = "@lang('service::validation.service.des_short_required')";
    </script>
    <script src="{{asset('static/backend/js/service/script.js?v='.time())}}" type="text/javascript"></script>
    <script>
        // brand.init();
    </script>
    <script type="text/javascript">
        Summernote.generate('img_content');
        Summernote.uploadImg('img_content');
    </script>
    <script type="text/template" id="logo-tpl">
        <div class="kt-avatar__holder" style="background-image: url({link});background-position: center;"></div>
    </script>
@stop
