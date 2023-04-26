@extends('layout')

@section('header')
    @include('components.header',['title'=>__('admin::form.form.index.edit-question')])
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
                <h3 class="kt-subheader__title">@lang('admin::form.question.index.edit-question')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="edit.save()">
                    @lang('admin::district.edit.UPDATE')
                </button>
                <a href="{{route('page.form.question')}}" class="btn btn-default btn-bold">
                    @lang('admin::district.edit.CANCEL')
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
                            <select name="feedback_form_id" id="feedback_form_id" class="form-control --select2">
                                @foreach($getListForm as $form)
                                    <option value="{{$form['feedback_form_id']}}" {{$detail['feedback_form_id'] == $form['feedback_form_id'] ? "selected" :""}}>{{$form['feedback_form_name']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::form.question.index.question_type') <span class="text-danger">(*)</span>
                        </label>
                        <div class="col-lg-6 col-xl-6">
                            <select name="feedback_question_type" id="feedback_question_type" class="form-control --select2">
                                <option value="rating" {{$detail['feedback_question_type'] == 'rating' ? "selected" :""}}>@lang('admin::form.question.index.rating')</option>
                                <option value="comment" {{$detail['feedback_question_type'] == 'comment' ? "selected" :""}}>@lang('admin::form.question.index.comment')</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::form.question.index.question_title') <span class="text-danger">(*)</span></label>
                        <div class="col-lg-6 col-xl-6">
                            <textarea class="form-control" id="feedback_question_title" name="feedback_question_title" type="text">{{$detail['feedback_question_title']}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('admin::form.question.index.question_position')</label>
                        <div class="col-lg-6 col-xl-6">
                            <input class="form-control" id="feedback_question_position" name="feedback_question_position" type="text" value="{{$detail['feedback_question_position']}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::form.form.index.active')
                        </label>
                        <div class="col-lg-6 col-xl-6">
                        <span class="kt-switch kt-switch--success">
                            <label>
                                <input type="checkbox" name="feedback_question_active" id="feedback_question_active" {{$detail['feedback_question_active' == 1 ? "checked" :""]}}>
                                <span></span>
                            </label>
                        </span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <input type="hidden" name="feedback_question_id" id="feedback_question_id" value="{{$detail['feedback_question_id']}}" disabled >
    </form>
@endsection
@section('after_script')
    <script>
        $('select').select2();
    </script>
    <script src="{{asset('static/backend/js/admin/form/question/script.js?v='.time())}}" type="text/javascript"></script>

@endsection