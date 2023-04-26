@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@endsection
@section('content')
    <form action="{{ route('admin.faq-group.store') }}" method="POST" id="form-submit">
        {{ csrf_field() }}
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('admin::faq-group.index.CREATE_FAQ_GROUP')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="faqGroup.save()">
                    @lang('admin::faq-group.input.BUTTON_SAVE_CREATE')
                </button>
                <button type="button" class="btn btn-info btn-bold" onclick="faqGroup.save(1)">
                    @lang('admin::faq-group.input.BUTTON_SAVE')
                </button>
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
                            <input type="text" value="{{ old('faq_group_title') }}"
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
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::faq-group.index.FAQ_GROUP_TITLE_PARENT')
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select class="form-control --select2 ss--width-100 ss-select-2" name="parent_id"
                                    id="parent_id">
                                <option value="0">@lang('admin::faq-group.input.PLACEHOLDER_NAME_PARENT')</option>
                                @if (isset($parentList) && count($parentList) > 0)
                                    @foreach ($parentList as $item)
                                        <option value="{{ $item['faq_group_id'] }}" {{ old('parent_id') == $item['faq_group_id'] ? 'selected' : '' }}>
                                            {{ $item['faq_group_title'] }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::faq-group.index.FAQ_GROUP_POSITION')
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <input type="number" min="1" value="{{ old('faq_group_position', 1) }}"
                                   class="form-control{{ $errors->has('faq_group_position') ? ' is-invalid' : '' }}"
                                   id="faq_group_position" name="faq_group_position"
                                   placeholder="@lang('admin::faq-group.input.PLACEHOLDER_POSITION')">
                            @if ($errors->has('faq_group_position'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('faq_group_position') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::faq-group.index.FAQ_GROUP_IS_ACTIVED')
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input type="checkbox" checked="checked" name="is_actived">
                                    <span></span>
                                </label>
							</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/faq-group/script.js?v='.time()) }}"></script>
@endsection
