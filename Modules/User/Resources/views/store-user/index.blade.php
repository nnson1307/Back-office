@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('user::store-user.index.STORE_USER')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            @include('helpers.breadcrumb', [
                'menuName' => 'Tài khoản',
                'route' => 'user.store-user',
                'pageName' => __('user::store-user.index.STORE_USER')
            ])
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>
            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            @include('helpers.button', ['button' => [
                'route' => 'user.store-user.create',
                'html' => '<a href="'.route('user.store-user.create').'" class="btn btn-label-brand btn-bold">'
                .__('user::store-user.index.CREATE_USER').
            '</a>'
            ]])
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <form id="form-filter" action="{{route('user.store-user')}}">
                    <div class="form-group row">
                        <div class="col-lg-3">
                            <input class="form-control" type="text" id="keyword_phone" name="keyword_phone"
                                   placeholder="@lang('user::store-user.index.PLACEHOLDER_ACCOUNT')"
                                   value="{{$filter['keyword_phone']}}">
                        </div>
                        <div class="col-lg-3">
                            <input class="form-control" type="text" id="keyword_fullname" name="keyword_fullname"
                                   placeholder="@lang('user::store-user.index.PLACEHOLDER_USER_FULL_NAME')"
                                   value="{{$filter['keyword_fullname']}}">
                        </div>
                        <div class="col-lg-3">
                            <select class="form-control ss-select-2" id="keyword_is_activated" name="keyword_is_activated">
                                @if($filter['keyword_is_activated'] == null)
                                    <option value="" {{$filter['keyword_is_activated'] == null ? 'selected' : ''}}>
                                        Trạng thái
                                    </option>
                                    <option value="1">@lang('user::store-user.index.ACTIVE')</option>
                                    <option value="0">@lang('user::store-user.index.NOT_ACTIVE')</option>
                                @else
                                    <option value="">
                                        Trạng thái
                                    </option>
                                    <option value="1" {{$filter['keyword_is_activated'] == 1 ? 'selected' : ''}}>@lang('user::store-user.index.ACTIVE')</option>
                                    <option value="0" {{$filter['keyword_is_activated'] == 0? 'selected' : ''}}>@lang('user::store-user.index.NOT_ACTIVE')</option>
                                @endif

                            </select>
                        </div>
                        <div class="col-lg-3">
                            <a class="btn btn-secondary" href="{{route('user.store-user')}}">
                                @lang('user::store-user.index.REMOVE')
                            </a>
                            <button type="submit" class="btn btn-primary">
                                @lang('user::store-user.index.SEARCH')
                            </button>
                        </div>
                    </div>
                    <div class="kt-section">
                        @include('user::store-user.list')
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('user::store-user.modal.modal-reset-password')
    @include('user::store-user.modal.modal-reset-password-success')

@stop
@section('after_script')
    <script>

        var loading_message = '@lang('user::store-user.create.LOADING_MESSAGE')';
        var update_fail = '@lang('user::store-user.edit.UPDATE_FAIL')';

        //Validate
        var account_required='@lang('user::validation.store-user.account_required')';
        var account_invalid='@lang('user::validation.store-user.account_invalid')';
        var password_required='@lang('user::validation.store-user.password_required')';
        var password_length='@lang('user::validation.store-user.password_length')';
    </script>
    <script src="{{asset('static/backend/js/user/store-user/script.js?v='.time())}}" type="text/javascript"></script>
    <script>
        $('#is_activated').select2({
            placeholder: '@lang('user::store-user.index.PLACEHOLDER_CHOOSE_STATUS')'
        });
    </script>
@stop
