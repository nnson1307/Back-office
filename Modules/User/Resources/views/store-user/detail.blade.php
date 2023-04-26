@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <form id="form-update">
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">{{$item['phone']}}</h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                @include('helpers.button', ['button' => [
                        'route' => 'admin.country.edit',
                        'html' => '<a href="'.route('user.store-user.edit', ['id' => $item['user_id']]).'" class="btn btn-info btn-bold">'
                        .__('user::store-user.detail.EDIT').
                    '</a>'
                    ]])
                @include('helpers.button', ['button' => [
                        'route' => 'admin.country.create',
                        'html' => '<a href="'.route('user.store-user.create').'" class="btn btn-label-brand btn-bold">'
                        .__('user::store-user.index.CREATE_USER').
                    '</a>'
                    ]])
                <a href="{{route('user.store-user')}}" class="btn btn-secondary btn-bold">
                    @lang('user::store-user.detail.CANCEL')
                </a>
            </div>
        </div>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('user::store-user.create.USER_ACCOUNT')</label>
                        <div class="col-lg-9 col-xl-9">
                            <label class="col-form-label">{{$item['phone']}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('user::store-user.create.USER_FULL_NAME')</label>
                        <div class="col-lg-9 col-xl-9">
                            <label class="col-form-label">{{$item['fullname']}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('user::store-user.create.USER_STATUS')</label>
                        <div class="col-lg-9 col-xl-9">
                            <span class="kt-switch kt-switch--success">
                                <label>
                                    <input disabled type="checkbox" id="is_activated"
                                           name="is_activated" {{$item['is_activated'] ? 'checked': ''}}>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="kt-section__content">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>@lang('user::store-user.detail.STORE_NAME')</th>
                                <th>@lang('user::store-user.detail.ADDRESS')</th>
                                <th>@lang('user::store-user.index.BRAND_NAME')</th>
                                <th>@lang('user::store-user.detail.STATUS_CONNECT')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($store) && count($store) > 0)
                                @foreach($store as $item)
                                    <tr>
                                        <td>{{$item['store_name']}}</td>
                                        <td>
                                            @if($item['store_name'] != '' || $item['store_name'] != null)
                                                {{$item['store_name']}},
                                            @endif
                                            @if($item['ward_type'] != '' || $item['ward_type'] != null)
                                                {{$item['ward_type']}},
                                            @endif
                                            @if($item['ward_name'] != '' || $item['ward_name'] != null)
                                                {{$item['ward_name']}},
                                            @endif
                                            @if($item['district_type'] != '' || $item['district_type'] != null)
                                                {{$item['district_type']}},
                                            @endif
                                            @if($item['province_type'] != '' || $item['province_type'] != null)
                                                {{$item['province_type']}},
                                            @endif
                                            @if($item['country_name'] != '' || $item['country_name'] != null)
                                                {{$item['country_name']}},
                                            @endif
                                        </td>
                                        <td>{{$item['brand_name']}}</td>
                                        <td>

                                            @if($item['is_approved'] != 1)
                                                @lang('user::store-user.detail.UN_CONNECT')
                                            @else
                                                @lang('user::store-user.detail.CONNECT')
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @include('user::store-user.modal.modal-reset-password')
    @include('user::store-user.modal.modal-reset-password-success')
    @include('user::store-user.modal.modal-confirm-remove-account')
@stop
@section('after_script')
    <script>
        //Thông báo
        var loading_message = '@lang('user::store-user.create.LOADING_MESSAGE')';
        var remove_success = '@lang('user::store-user.remove.REMOVE_SUCCESS')';
        var remove_fail = '@lang('user::store-user.remove.REMOVE_FAIL')';
    </script>
    <script src="{{asset('static/backend/js/user/store-user/script.js?v='.time())}}" type="text/javascript"></script>
@stop
