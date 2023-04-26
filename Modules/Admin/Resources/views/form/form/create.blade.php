@extends('layout')

@section('header')
    @include('components.header',['title'=>__('admin::form.form.index.create-form')])
@endsection
@section('after_style')
    {{--<link href="{{asset('static/backend/css/form/style.css')}}" rel="stylesheet" type="text/css"/>--}}
@endsection
@section('content')
    <form id="form-create" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="kt-subheader   kt-grid__item" id="">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title"> @lang('product::product.createSampling.CREATE_PRODUCT')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
									<span class="kt-subheader__desc" id="kt_subheader_total">

                                    </span>
                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">

            </div>
        </div>
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('admin::form.form.index.create-form')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="create.save()">
                    @lang('admin::faq-group.input.BUTTON_SAVE_CREATE')
                </button>
                <a href="{{route('page.form.form')}}" class="btn btn-default btn-bold">
                    @lang('admin::faq-group.input.BUTTON_CANCEL')
                </a>
            </div>
        </div>
        <div class="kt-content kt-grid__item kt-grid__item--fluid kt-padding-0" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body" style="border-bottom: 1px solid #ebedf2;">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::form.form.index.name') <span class="text-danger">(*)</span>
                        </label>
                        <div class="col-lg-6 col-xl-6">
                            <input class="form-control" id="feedback_form_name" name="feedback_form_name" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::form.form.index.description') <span class="text-danger">(*)</span>
                        </label>
                        <div class="col-lg-6 col-xl-6">
                            <textarea class="form-control" id="feedback_form_description" name="feedback_form_description" type="text"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::form.form.index.rating_min') <span class="text-danger">(*)</span></label>
                        <div class="col-lg-6 col-xl-6">
                            <input class="form-control" id="feedback_form_rating_min" name="feedback_form_rating_min" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::form.form.index.rating_max') <span class="text-danger">(*)</span></label>
                        <div class="col-lg-6 col-xl-6">
                            <input class="form-control" id="feedback_form_rating_max" name="feedback_form_rating_max" type="text">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::form.form.index.active')
                        </label>
                        <div class="col-lg-6 col-xl-6">
                        <span class="kt-switch kt-switch--success">
                            <label>
                                <input type="checkbox" name="feedback_form_active" id="feedback_form_active" checked>
                                <span></span>
                            </label>
                        </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
@endsection

@section('after_script')
    <script src="{{asset('static/backend/js/admin/form/form/script.js?v='.time())}}" type="text/javascript"></script>

@endsection