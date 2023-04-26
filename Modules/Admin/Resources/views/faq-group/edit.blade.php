@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@endsection
@section('content')
    @if (isset($detail) && $detail != null)
        <form action="{{ route('admin.faq-group.update') }}" method="POST" id="form-submit">
            {{ csrf_field() }}
            <input type="hidden" value="{{ $detail['faq_group_id'] }}" name="faq_group_id" id="faq_group_id">
            <div class="kt-subheader kt-grid__item" id="kt_subheader">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">@lang('admin::faq-group.index.EDIT_FAQ_GROUP')</h3>
                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                    <div class="kt-subheader__group" id="kt_subheader_search">
                        <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                    </div>
                    <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                    </div>
                </div>
                <div class="kt-subheader__toolbar">
                    <button type="button" class="btn btn-info btn-bold" onclick="faqGroup.save(1)">
                        @lang('admin::faq-group.input.BUTTON_SAVE')
                    </button>
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
                                <input type="text" value="{{ old('faq_group_title', isset($detail) ? $detail['faq_group_title'] : null) }}"
                                       name="faq_group_title" id="faq_group_title" maxlength="250"
                                       class="form-control{{ $errors->has('faq_group_title') ? ' is-invalid' : '' }}" required
                                       placeholder="@lang('admin::faq-group.input.PLACEHOLDER_NAME')"
                                >
                                @if ($errors->has('faq_group_title'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('faq_group_title') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if ($detail['faq_group_type'] != 'default')
                            <div class="form-group row">
                                <label class="col-xl-3 col-lg-3 col-form-label">
                                    @lang('admin::faq-group.index.FAQ_GROUP_TITLE_PARENT')
                                </label>
                                <div class="col-lg-9 col-xl-9">
                                    <select class="form-control --select2 ss--width-100"
                                            name="parent_id"
                                            id="parent_id">
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
                                <input type="number" min="1" value="{{ old('faq_group_position', isset($detail) ? $detail['faq_group_position'] : null) }}"
                                       class="form-control{{ $errors->has('faq_group_position') ? ' is-invalid' : '' }}"
                                       id="faq_group_position" name="faq_group_position"
                                       placeholder="@lang('admin::faq-group.input.PLACEHOLDER_POSITION')"
                                >
                                @if ($errors->has('faq_group_position'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('faq_group_position') }}
                                    </div>
                                @endif
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
                                        <input type="checkbox" name="is_actived" {{ ($detail['is_actived'] == 1) ? 'checked' : '' }}>
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
