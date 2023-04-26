@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@endsection
@section('content')
    <form action="{{ route('admin.faq.store') }}" method="POST" id="form-submit">
        {{ csrf_field() }}
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('admin::faq.index.CREATE_FAQ')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="faq.save()">
                    @lang('admin::faq.input.BUTTON_SAVE_CREATE')
                </button>
                <button type="button" class="btn btn-info btn-bold" onclick="faq.save(1)">
                    @lang('admin::faq.input.BUTTON_SAVE')
                </button>
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
                            <input type="text" maxlength="250"
                                   name="faq_title" id="faq_title"
                                   value="{{ old('faq_title') }}"
                                   class="form-control{{ $errors->has('faq_title') ? ' is-invalid' : '' }}" required
                                   placeholder="@lang('admin::faq.input.PLACEHOLDER_NAME')"
                            >
                            @if ($errors->has('faq_title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('faq_title') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::faq.index.FAQ_GROUP_TITLE')
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <select name="faq_group" id="faq_group"
                                    class="form-control select2{{ $errors->has('faq_group') ? ' is-invalid' : '' }}">
                                <option value="">@lang('admin::faq.table.COLUMN_TITLE_PARENT')</option>
                                @if (isset($listFaqGroup) && count($listFaqGroup) > 0)
                                    @foreach ($listFaqGroup as $item)
                                        <option value="{{ $item['faq_group_id'] }}" {{ old('faq_group') == $item['faq_group_id'] ? 'selected' : '' }}>
                                            {{ $item['faq_group_title'] }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('faq_group'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('faq_group') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::faq.index.FAQ_POSITION')
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <input type="number" min="1"
                                   name="faq_position" id="faq_position"
                                   value="{{ old('faq_position', 1) }}"
                                   class="form-control{{ $errors->has('faq_position') ? ' is-invalid' : '' }}" required
                                   placeholder="@lang('admin::faq.input.PLACEHOLDER_POSITION')"
                            >
                            @if ($errors->has('faq_position'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('faq_position') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::faq.index.FAQ_STATUS')
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
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::faq.index.FAQ_CONTENT')
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <textarea id="faq_content" name="faq_content" rows="20"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/faq/script.js?v='.time()) }}"></script>
    <script type="text/javascript">
        Summernote.generate('faq_content');
        Summernote.uploadImg('faq_content');
    </script>
@endsection
