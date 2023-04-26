@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::faq-group.index.FAQ_GROUP')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            @include('helpers.breadcrumb', [
                'menuName' => 'Nội dung hỗ trợ',
                'route' => 'admin.faq-group.index',
                'pageName' => __('admin::faq-group.index.FAQ_GROUP')
            ])
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>
            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            @include('helpers.button', ['button' => [
                'route' => 'admin.faq-group.create',
                'html' => '<a href="'.route('admin.faq-group.create').'" class="btn btn-label-brand btn-bold">'
                .__('admin::faq-group.index.CREATE_FAQ_GROUP').
            '</a>'
            ]])
        </div>
    </div>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <form id="form-filter" action="{{route('admin.faq-group.index')}}">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_faq_group$faq_group_title"
                                   name="keyword_faq_group$faq_group_title"
                                   placeholder="@lang('admin::faq-group.table.COLUMN_TITLE')"
                                   value="{{$filter['keyword_faq_group$faq_group_title'] != null?$filter['keyword_faq_group$faq_group_title'] : ''}}">
                        </div>
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_fgrparent$faq_group_title" name="keyword_fgrparent$faq_group_title"
                                   placeholder="@lang('admin::faq-group.table.COLUMN_TITLE_PARENT')"
                                   value="{{$filter['keyword_fgrparent$faq_group_title'] != null?$filter['keyword_fgrparent$faq_group_title'] : ''}}">
                        </div>
                        <div class="form-group col-lg-3">
                            <select class="form-control ss-select-2"
                                    id="keyword_faq_group$is_actived"
                                    name="keyword_faq_group$is_actived"
                                    data-title="@lang('admin::faq-group.table.COLUMN_IS_ACTIVED')">
                                <option value="">@lang('admin::faq-group.table.COLUMN_IS_ACTIVED')</option>
                                <option value="1" @if(isset($filter['keyword_faq_group$is_actived']) && $filter['keyword_faq_group$is_actived'] == 1) selected @endif>
                                    @lang('admin::faq-group.index.ACTIVE')
                                </option>
                                <option value="0" @if(isset($filter['keyword_faq_group$is_actived']) && $filter['keyword_faq_group$is_actived'] == 0) selected @endif>
                                    @lang('admin::faq-group.index.NOT_ACTIVE')
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <a class="btn btn-secondary btn-hover-brand" href="{{route('admin.faq-group.index')}}">
                                @lang('admin::faq-group.input.BUTTON_REMOVE')
                            </a>
                            <button type="submit" class="btn btn-primary btn-hover-brand">
                                @lang('admin::faq-group.input.BUTTON_SEARCH')
                            </button>
                        </div>
                    </div>
                    <div class="kt-section">
                        @include('admin::faq-group.list')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/faq-group/script.js?v='.time()) }}"></script>
    <script type="text/javascript">
        faqGroup.updateStatus();
    </script>
@endsection
