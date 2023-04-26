@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@endsection
@section('content')
    @if (isset($detail))
        <style>
            .note-editor.note-frame .note-editing-area .note-editable {
                background-color: transparent !important;
            }
            .note-editor, .note-toolbar {
                position: static;
            }
        </style>
        <form>
            <div class="kt-subheader kt-grid__item" id="kt_subheader">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">@lang('admin::policy-terms.index.DETAIL_FAQ')</h3>
                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                    <div class="kt-subheader__group" id="kt_subheader_search">
                        <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                    </div>
                    <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                    </div>
                </div>
                <div class="kt-subheader__toolbar">
                    @include('helpers.button', ['button' => [
                        'route' => 'admin.policy-terms.edit',
                        'html' => '<a href="'.route('admin.policy-terms.edit', $detail['faq_id']).'" class="btn btn-info btn-bold">'
                        .__('admin::policy-terms.input.BUTTON_EDIT').
                    '</a>'
                    ]])
                    @include('helpers.button', ['button' => [
                        'route' => 'admin.policy-terms.create',
                        'html' => '<a href="'.route('admin.policy-terms.create').'" class="btn btn-label-brand btn-bold">'
                        .__('admin::faq.input.BUTTON_ADD').
                    '</a>'
                    ]])
                    @include('helpers.button', ['button' => [
                        'route' => 'admin.policy-terms.destroy',
                        'html' => '<a href="javascript:void(0)" class="btn btn-danger btn-bold" onclick="policyTerms.remove('.$detail['faq_id'].')">'
                        .__('admin::policy-terms.input.BUTTON_REMOVE').
                    '</a>'
                    ]])
                    <a href="{{route('admin.policy-terms.index')}}" class="btn btn-secondary btn-bold">
                        @lang('admin::policy-terms.input.BUTTON_CANCEL')
                    </a>
                </div>
            </div>
            <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                <div class="kt-portlet kt-portlet--tabs">
                    <div class="kt-portlet__body">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                @lang('admin::policy-terms.index.FAQ_GROUP_TITLE')
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <label class="form-control">
                                    @switch($detail['faq_type'])
                                        @case('privacy_policy')
                                            @lang('admin::policy-terms.index.PAGE_PRIVACY_POLICY')
                                        @break
                                        @case('terms_use')
                                            @lang('admin::policy-terms.index.PAGE_TERM_OF_USE')
                                        @break
                                    @endswitch
                                </label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                @lang('admin::policy-terms.index.FAQ_TITLE')
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <input class="form-control" value="{{ $detail['faq_title'] }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                @lang('admin::policy-terms.index.FAQ_CONTENT')
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <textarea id="faq_content" name="faq_content" disabled rows="20">{{ $detail['faq_content'] }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
@endsection
@section('after_script')
    <script type="text/javascript">
        $('#faq_content').summernote('disable');
    </script>
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/faq/policy-terms.js?v='.time()) }}"></script>
@endsection
