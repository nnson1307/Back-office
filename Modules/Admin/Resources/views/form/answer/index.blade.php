@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::form.index.list-answer')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            @include('helpers.breadcrumb', [
                'route' => 'page.form.form',
                'menuName' => 'Form',
                'pageName' => __('admin::form.index.list-answer')
            ])
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>
            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions"></div>
        </div>
        <div class="kt-subheader__toolbar">

        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__body">
                <!--end: Search Form -->
                <form method="GET"  autocomplete="off" id="form-filter">
{{--                    <div class="form-group">--}}
                        <div class="form-group row">
                            <div class="col-lg-4">
                                <input class="form-control ss--width-100"
                                       name="keyword"
                                       value="{{isset($filter['keyword']) ? $filter['keyword'] : ""}}"
                                       placeholder="@lang('admin::form.answer.keyword')">
                            </div>
                            {{--<div class="col-lg-4 form-group">--}}
                                {{--<input class="form-control ss--width-100" name="full_name" value="{{isset($filter['full_name']) ? $filter['full_name'] :""}}" placeholder="@lang('user::user.index.FULL_NAME')">--}}
                            {{--</div>--}}
                            {{--<div class="col-lg-4 form-group">--}}
                                {{--<input class="form-control ss--width-100" name="feedback_answer_value" value="{{isset($filter['feedback_answer_value']) ? $filter['feedback_answer_value'] :""}}" placeholder="@lang('admin::form.form.index.value')">--}}
                            {{--</div>--}}

                            <div class="col-lg-4">
                                <a href="{{ route('page.form.answer') }}" class="btn btn-secondary btn-hover-brand">
                                    @lang('admin::notification.index.search.BTN_REMOVE')
                                </a>
                                <button type="submit" class="btn btn-primary btn-hover-brand">
                                    @lang('admin::notification.index.search.BTN_SEARCH')
                                </button>
                            </div>
                        </div>
{{--                    </div>--}}
                    @include('admin::form.answer.list')
                    {{ $getListAnswer->appends($filter)->links('helpers.paging') }}
                </form>
            </div>
        </div>
    </div>
@endsection
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/page/script.js?v='.time()) }}"></script>
@endsection
