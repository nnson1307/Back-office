@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::form.index.list-question')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            @include('helpers.breadcrumb', [
                'route' => 'page.form.form',
                'menuName' => 'Form',
                'pageName' => __('admin::form.index.list-question')
            ])
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>
            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions"></div>
        </div>
        <div class="kt-subheader__toolbar">

            @include('helpers.button', ['button' => [
                    'route' => 'page.form.question.create',
                     'html' => '<a href="'.route('page.form.question.create').'" class="btn btn-label-brand btn-bold">'.__('admin::form.question.index.create-question').'</a>'
            ]])
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__body">
                <!--end: Search Form -->
                <form method="GET"  autocomplete="off" id="form-filter">
{{--                    <div class="form-group">--}}
                        <div class="row">
                            <div class="col-lg-3 form-group">
                                <input class="form-control ss--width-100" name="feedback_form_name" value="{{isset($filter['feedback_form_name']) ? $filter['feedback_form_name'] :""}}" placeholder="@lang('admin::form.form.index.name')">
                            </div>
                            <div class="col-lg-3 form-group">
                                <select name="feedback_form_description" class="form-control --select2 ss--width-100 select2">
                                    <option value="">@lang('admin::form.question.index.question_type')</option>
                                    <option value="rating" {{isset($filter['feedback_form_description']) && $filter['feedback_form_description'] == "rating" ? "selected" :""}}>rating</option>
                                    <option value="comment" {{isset($filter['feedback_form_description']) && $filter['feedback_form_description'] == "comment" ? "selected" :""}}>comment</option>
                                </select>
                            </div>
                            <div class="col-lg-3 form-group">
                                <input class="form-control ss--width-100" name="feedback_question_title" value="{{isset($filter['feedback_question_title']) ? $filter['feedback_question_title'] :""}}" placeholder="@lang('admin::form.question.index.question_title')">
                            </div>
                            <div class="col-lg-3 form-group">
                                <input class="form-control ss--width-100" name="feedback_question_position" value="{{isset($filter['feedback_question_position']) ? $filter['feedback_question_position'] :""}}" placeholder="@lang('admin::form.question.index.question_position')">
                            </div>
                            <div class="col-lg-3 form-group">
                                <select name="feedback_question_active" class="form-control --select2 ss--width-100 select2">
                                    <option value="">@lang('admin::form.form.index.active')</option>
                                    <option value="0" {{isset($filter['feedback_question_active']) && $filter['feedback_question_active'] == 0 ? "selected" :""}}>@lang('admin::form.form.index.active_fail')</option>
                                    <option value="1" {{isset($filter['feedback_question_active']) && $filter['feedback_question_active'] == 1 ? "selected" :""}}>@lang('admin::form.form.index.active_success')</option>
                                </select>
                            </div>

                            <div class="col-lg-9 form-group text-right">
                                <a href="{{ route('page.form.question') }}" class="btn btn-secondary btn-hover-brand">
                                    @lang('admin::notification.index.search.BTN_REMOVE')
                                </a>
                                <button type="submit" class="btn btn-primary btn-hover-brand">
                                    @lang('admin::notification.index.search.BTN_SEARCH')
                                </button>
                            </div>
                        </div>
{{--                    </div>--}}
                    @include('admin::form.question.list')
                    {{ $listQuestion->appends($filter)->links('helpers.paging') }}
                </form>
            </div>
        </div>
    </div>
@endsection
@section('after_script')
    <script>
        $('.select2').select2();
    </script>
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/page/script.js?v='.time()) }}"></script>
@endsection
