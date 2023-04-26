@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::policy-terms.index.FAQ')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            @include('helpers.breadcrumb', [
                'menuName' => 'Nội dung hỗ trợ',
                'route' => 'admin.policy-terms.index',
                'pageName' => __('admin::policy-terms.index.FAQ')
            ])
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>
            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions"></div>
        </div>
        <div class="kt-subheader__toolbar">
            @include('helpers.button', ['button' => [
                'route' => 'admin.policy-terms.create',
                'html' => '<a href="'.route('admin.policy-terms.create').'" class="btn btn-label-brand btn-bold">'
                .__('admin::policy-terms.index.CREATE_FAQ').
            '</a>'
            ]])
        </div>
    </div>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <form id="form-filter" action="{{route('admin.policy-terms.index')}}">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <select name="keyword_faq$faq_type" id="keyword_faq$faq_type"
                                    class="form-control select2">
                                <option value="">@lang('admin::policy-terms.table.COLUMN_TITLE_PARENT')</option>
                                @if (isset($faqType) && count($faqType) > 0)
                                    @foreach ($faqType as $key => $item)
                                        <option value="{{ $key }}"
                                                {{ ($filter['keyword_faq$faq_type'] == $key) ? 'selected' : '' }}>
                                            {{ $item }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_faq$faq_title"
                                   name="keyword_faq$faq_title"
                                   placeholder="@lang('admin::policy-terms.table.COLUMN_TITLE')"
                                   value="{{$filter['keyword_faq$faq_title'] != null?$filter['keyword_faq$faq_title'] : ''}}">
                        </div>
                        <div class="form-group col-lg-3">
                            <a class="btn btn-secondary btn-hover-brand" href="{{route('admin.policy-terms.index')}}">
                                @lang('admin::policy-terms.input.BUTTON_REMOVE')
                            </a>
                            <button type="submit"
                                    class="btn btn-primary btn-hover-brand">
                                @lang('admin::policy-terms.input.BUTTON_SEARCH')
                            </button>
                        </div>
                    </div>
                    <div class="kt-section">
                        @include('admin::faq.policy-terms.list')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/faq/policy-terms.js?v='.time()) }}"></script>
@endsection
