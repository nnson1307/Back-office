@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@endsection
@section('content')
    @if (isset($detail) && $detail != null)
        <form>
            <div class="kt-subheader kt-grid__item" id="kt_subheader">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">@lang('admin::faq-group.index.SHOW_FAQ_GROUP')</h3>
                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                    <div class="kt-subheader__group" id="kt_subheader_search">
                        <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                    </div>
                    <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                    </div>
                </div>
                <div class="kt-subheader__toolbar">
                    @include('helpers.button', ['button' => [
                        'route' => 'admin.faq-group.edit',
                        'html' => '<a href="'.route('admin.faq-group.edit', ['id' => $detail['faq_group_id']]).'" class="btn btn-info btn-bold">'
                        .__('admin::faq-group.input.BUTTON_EDIT').
                    '</a>'
                    ]])
                    @include('helpers.button', ['button' => [
                        'route' => 'admin.faq-group.create',
                        'html' => '<a href="'.route('admin.faq-group.create').'" class="btn btn-label-brand btn-bold">'
                        .__('admin::faq-group.input.BUTTON_ADD').
                    '</a>'
                    ]])
                    @if ($detail['faq_group_type'] != 'default')
                        @include('helpers.button', ['button' => [
                            'route' => 'admin.faq-group.destroy',
                            'html' => '<a href="javascript:void(0)" class="btn btn-danger btn-bold" onclick="faqGroup.remove('.$detail['faq_group_id'].')">'
                            .__('admin::faq-group.input.BUTTON_REMOVE').
                        '</a>'
                        ]])
                    @endif
                    <a href="{{route('admin.faq-group.index')}}" class="btn btn-secondary btn-bold">
                        @lang('admin::faq-group.input.BUTTON_CANCEL')
                    </a>
                </div>
            </div>
            <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                <div class="kt-portlet kt-portlet--tabs">
                    <div class="kt-portlet__body">
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                @lang('admin::faq-group.index.FAQ_GROUP_TITLE')
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <input class="form-control" value="{{ $detail['faq_group_title'] }}" disabled>
                            </div>
                        </div>
                        @if ($detail['faq_group_type'] != 'default')
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">
                                    @lang('admin::faq-group.index.FAQ_GROUP_TITLE_PARENT')
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <select class="form-control --select2 ss--width-100" disabled>
                                        <option value="0">@lang('admin::faq-group.input.PLACEHOLDER_NAME_PARENT')</option>
                                        @if (isset($parentList) && count($parentList) > 0)
                                            @foreach ($parentList as $item)
                                                <option value="{{ $item['faq_group_id'] }}" {{ ($detail['parent_id'] == $item['faq_group_id']) ? 'selected' : '' }}>
                                                    {{ $item['faq_group_title'] }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">
                                @lang('admin::faq-group.index.FAQ_GROUP_POSITION')
                            </label>
                            <div class="col-lg-9 col-xl-9">
                                <label class="form-control">{{ $detail['faq_group_position'] }}</label>
                            </div>
                        </div>
                        @if ($detail['faq_group_type'] != 'default')
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">
                                    @lang('admin::faq-group.index.FAQ_GROUP_IS_ACTIVED')
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                <span class="kt-switch kt-switch--success">
                                    <label>
                                        <input type="checkbox" {{ ($detail['is_actived'] == 1) ? 'checked' : '' }} disabled>
                                        <span></span>
                                    </label>
                                </span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    @else
        <p class="text-center w-100">@lang('admin::faq-group.table.DATA_NULL')</p>
    @endif
@endsection
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/faq-group/script.js?v='.time()) }}"></script>
@endsection
