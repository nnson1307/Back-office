@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">@lang('service::service.index.SERVICE')</h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            @include('helpers.breadcrumb', [
                'menuName' => __('service::service.index.SERVICE_TITLE'),
                'route' => 'admin.service',
                'pageName' => __('service::service.index.SERVICE')
            ])
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total"> </span>

            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

            </div>
        </div>
        <div class="kt-subheader__toolbar">
            @include('helpers.button', ['button' => [
                'route' => 'admin.service.create',
                'html' => '<a href="'.route('admin.service.create').'" class="btn btn-label-brand btn-bold">'
                .__('service::service.button.CREATE_SERVICE').
            '</a>'
            ]])
        </div>
    </div>
    <!--begin: Datatable -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <form id="form-filter" action="{{route('admin.service')}}">
                    @include('service::service.list')
                </form>
            </div>
        </div>
    </div>
@stop
@section('after_script')
    <script src="{{asset('static/backend/js/service/script.js?v='.time())}}" type="text/javascript"></script>
    <script>
        $('#is_actived').select2({});
    </script>
@stop
