@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@endsection
@section('content')
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            <div class="alert-text">{{ session('error') }}</div>
        </div>
    @endif

    <form action="{{ route('admin.policy-terms.store') }}" method="POST" id="form-submit">
        {{ csrf_field() }}
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">@lang('admin::policy-terms.index.CREATE_FAQ')</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                <button type="button" class="btn btn-info btn-bold" onclick="policyTerms.save()">
                    @lang('admin::policy-terms.input.BUTTON_SAVE_CREATE')
                </button>
                <button type="button" class="btn btn-info btn-bold" onclick="policyTerms.save(1)">
                    @lang('admin::policy-terms.input.BUTTON_SAVE')
                </button>
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
                            <select name="faq_type" id="faq_type" class="form-control">
                                @if (isset($faqType) && count($faqType) > 0)
                                    @foreach ($faqType as $key => $item)
                                        <option value="{{ $key }}" {{ old('faq_type') == $key ? 'selected' : '' }}>
                                            {{ $item }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('admin::policy-terms.index.FAQ_TITLE')
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <input type="text" maxlength="250"
                                   name="faq_title" id="faq_title"
                                   value="{{ old('faq_title') }}"
                                   class="form-control{{ $errors->has('faq_title') ? ' is-invalid' : '' }}" required
                                   placeholder="@lang('admin::policy-terms.input.PLACEHOLDER_NAME')"
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
                            @lang('admin::policy-terms.index.FAQ_CONTENT')
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
    <script type="text/javascript" src="{{ asset('static/backend/js/admin/faq/policy-terms.js?v='.time()) }}"></script>
    <script type="text/javascript">
        Summernote.generate('faq_content');
        Summernote.uploadImg('faq_content');
    </script>
@endsection
