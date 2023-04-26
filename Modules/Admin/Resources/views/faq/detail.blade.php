@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@endsection
@section('content')
    @if (isset($detail))
        <form>
            <div class="kt-subheader kt-grid__item" id="kt_subheader">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">@lang('admin::faq.index.DETAIL_FAQ')</h3>
                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                    <div class="kt-subheader__group" id="kt_subheader_search">
                        <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                    </div>
                    <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                    </div>
                </div>
                <div class="kt-subheader__toolbar">
                    @include('helpers.button', ['button' => [
                        'route' => 'admin.faq.edit',
                        'html' => '<a href="'.route('admin.faq.edit', $detail['faq_id']).'" class="btn btn-info btn-bold">'
                        .__('admin::faq.input.BUTTON_EDIT').
                    '</a>'
                    ]])
                    @include('helpers.button', ['button' => [
                        'route' => 'admin.faq.create',
                        'html' => '<a href="'.route('admin.faq.create').'" class="btn btn-label-brand btn-bold">'
                        .__('admin::faq.input.BUTTON_ADD').
                    '</a>'
                    ]])
                    @include('helpers.button', ['button' => [
                        'route' => 'admin.faq.destroy',
                        'html' => '<a href="javascript:void(0)" class="btn btn-danger btn-bold" onclick="faq.remove('.$detail['faq_id'].')">'
                        .__('admin::faq.input.BUTTON_REMOVE').
                    '</a>'
                    ]])
                    <a href="{{route('admin.faq.index')}}" class="btn btn-secondary btn-bold">
                        @lang('admin::faq.input.BUTTON_CANCEL')
                    </a>
                </div>
            </div>
            <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                <div class="kt-portlet kt-portlet--tabs">
                    <div class="kt-portlet__body">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                @lang('admin::faq.index.FAQ_TITLE')
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <input class="form-control" value="{{ $detail['faq_title'] }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                @lang('admin::faq.index.FAQ_GROUP_TITLE')
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <select class="form-control select2" disabled>
                                    <option value="">@lang('admin::faq.table.COLUMN_TITLE_PARENT')</option>
                                    @if (isset($listFaqGroup) && count($listFaqGroup) > 0)
                                        @foreach ($listFaqGroup as $item)
                                            <option value="{{ $item['faq_group_id'] }}"
                                                    {{ $detail['faq_group'] == $item['faq_group_id'] ? 'selected' : '' }}
                                            >
                                                {{ $item['faq_group_title'] }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                @lang('admin::faq.index.FAQ_POSITION')
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <label class="form-control">{{ $detail['faq_position'] }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                @lang('admin::faq.index.FAQ_STATUS')
                            </label>
                            <div class="col-lg-9 col-xl-9">
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox" {{ $detail['is_actived'] == 1 ? 'checked' : '' }} disabled>
                                    <span></span>
                                </label>
							</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                @lang('admin::faq.index.FAQ_CONTENT')
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
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/faq/script.js?v='.time()) }}"></script>
@endsection
