@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@endsection
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('admin::faq.index.FAQ')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            @include('helpers.breadcrumb', [
                'menuName' => 'Nội dung hỗ trợ',
                'route' => 'admin.faq.index',
                'pageName' => __('admin::faq.index.FAQ')
            ])
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>
            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            @include('helpers.button', ['button' => [
                'route' => 'admin.faq.create',
                'html' => '<a href="'.route('admin.faq.create').'" class="btn btn-label-brand btn-bold">'
                .__('admin::faq.index.CREATE_FAQ').
            '</a>'
            ]])
        </div>
    </div>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <form id="form-filter" action="{{route('admin.faq.index')}}">
                    <div class="row">
                        <div class="form-group col-lg-3">
                            <input class="form-control" type="text" id="keyword_faq$faq_title"
                                   name="keyword_faq$faq_title"
                                   placeholder="@lang('admin::faq.table.COLUMN_TITLE')"
                                   value="{{$filter['keyword_faq$faq_title'] != null?$filter['keyword_faq$faq_title'] : ''}}">
                        </div>
                        <div class="form-group col-lg-3">
                            <select name="keyword_faq$faq_group" id="keyword_faq$faq_group"
                                    class="form-control select2 ss-select-2">
                                <option value="">@lang('admin::faq.table.COLUMN_TITLE_PARENT')</option>
                                @if (isset($listFaqGroup) && count($listFaqGroup) > 0)
                                    @foreach ($listFaqGroup as $item)
                                        <option value="{{ $item['faq_group_id'] }}"
                                                {{ ($filter['keyword_faq$faq_group'] == $item['faq_group_id']) ? 'selected' : '' }}>
                                            {{ $item['faq_group_title'] }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <select class="form-control select2 ss-select-2" style="width: 100%"
                                    id="keyword_faq$is_actived"
                                    name="keyword_faq$is_actived"
                                    data-title="@lang('admin::faq.table.COLUMN_IS_ACTIVED')">
                                <option value="">@lang('admin::faq.table.COLUMN_IS_ACTIVED')</option>
                                <option value="1" @if(isset($filter['keyword_faq$is_actived']) && $filter['keyword_faq$is_actived'] == 1) selected @endif>
                                    @lang('admin::faq.index.ACTIVE')
                                </option>
                                <option value="0" @if(isset($filter['keyword_faq$is_actived']) && $filter['keyword_faq$is_actived'] == 0) selected @endif>
                                    @lang('admin::faq.index.NOT_ACTIVE')
                                </option>
                            </select>
                        </div>
                        <div class="form-group col-lg-3">
                            <a class="btn btn-secondary btn-hover-brand" href="{{route('admin.faq.index')}}">
                                @lang('admin::faq.input.BUTTON_REMOVE')
                            </a>
                            <button type="submit"
                                    class="btn btn-primary btn-hover-brand">
                                @lang('admin::faq.input.BUTTON_SEARCH')
                            </button>
                        </div>
                    </div>
                    <div class="kt-section">
                        @include('admin::faq.list')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/faq/script.js?v='.time()) }}"></script>
@endsection
