@extends('layout')
@section('header')
    @include('components.header', ['title' => 'Config'])
@endsection
@section('content')
    @if (isset($detail))
        <div class="kt-subheader kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    @lang('user::admin-group.index.DETAIL_ADMIN_GROUP')
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
                    <span class="kt-subheader__desc" id="kt_subheader_total"> </span>
                </div>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                </div>
            </div>
            <div class="kt-subheader__toolbar">
                @include('helpers.button', ['button' => [
                        'route' => 'user.admin-group.edit',
                        'html' => '<a href="'.route('user.admin-group.edit', ['id' => $detail['group_id']]).'" class="btn btn-info btn-bold">'
                        .__('user::admin-group.input.BUTTON_EDIT').
                    '</a>'
                    ]])
                @include('helpers.button', ['button' => [
                    'route' => 'user.admin-group.create',
                    'html' => '<a href="'.route('user.admin-group.create').'" class="btn btn-label-brand btn-bold">'
                    .__('user::admin-group.input.BUTTON_ADD_NEW').
                '</a>'
                ]])
                @include('helpers.button', ['button' => [
                    'route' => 'user.admin-group.destroy',
                    'html' => '<a href="javascript:void(0)" class="btn btn-danger btn-bold" onclick="adminGroup.removeGroup('.$detail['group_id'].')">'
                    .__('user::admin-group.input.BUTTON_REMOVE').
                '</a>'
                ]])
                <a href="{{route('user.admin-group.index')}}" class="btn btn-secondary btn-bold">
                    @lang('user::admin-group.input.BUTTON_CANCEL')
                </a>
            </div>
        </div>
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__body">
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">
                        @lang('user::admin-group.edit.ADMIN_GROUP_NAME')
                    </label>
                    <div class="col-lg-9 col-xl-9">
                        <input type="text" value="{{ $detail['group_name'] }}" class="form-control" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-xl-3 col-lg-3 col-form-label">
                        @lang('user::admin-group.edit.ADMIN_GROUP_DESCRIPTION')
                    </label>
                    <div class="col-lg-9 col-xl-9">
                        <textarea class="form-control" disabled rows="1">{{ $detail['group_description'] }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-left nav-tabs-line-primary"
                        role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#admin-list"
                               role="tab"
                               aria-selected="true">
                                @lang('user::admin-group.create.ADMIN_LIST')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#admin-group-action-menu"
                               role="tab"
                               aria-selected="true">
                                @lang('user::admin-group.create.ADMIN_GROUP_ACTION_MENU')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#admin-group-action"
                               role="tab"
                               aria-selected="true">
                                @lang('user::admin-group.create.ADMIN_GROUP_ACTION')
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-form kt-form--label-right">
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="admin-list">
                            <div class="kt-section kt-margin-t-30">
                                <div class="kt-section__body">
                                    @include('user::admin-group.partial.list-admin-list-static')
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="admin-group-action-menu">
                            <div class="kt-section kt-margin-t-30">
                                <div class="kt-section__body">
                                    <table class="table table-striped" id="table-list-menu">
                                        <thead>
                                        <tr>
                                            <th>@lang('user::admin-group.create.ADMIN_ACTION_MENU_NAME')</th>
                                            <th>@lang('user::admin-group.create.ADMIN_ACTION_MENU_POSITION')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if (isset($list_menu) && count($list_menu) > 0)
                                            @foreach ($list_menu as $item)
                                                <tr class="menu-item">
                                                    <td>
                                                        <p>{{ $item['menu_name'] }}</p>
                                                    </td>
                                                    <td>
                                                        <p>{{ $item['menu_position'] }}</p>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="admin-group-action">
                            <div class="kt-section kt-margin-t-30">
                                <div class="kt-section__body">
                                    <table class="table table-striped" id="table-list-action">
                                        <thead>
                                        <tr>
                                            <th>@lang('user::admin-group.create.ADMIN_ACTION_NAME')</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if (isset($list_action) && count($list_action) > 0)
                                            @foreach ($list_action as $item)
                                                <tr class="action-item">
                                                    <td>
                                                        <p>{{ $item['action_name'] }}</p>
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
                </div>
                <div class="kt-portlet__foot"></div>
            </div>
        </div>
    @endif
@endsection
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/user/admin-group/script.js?v='.time()) }}"></script>
@endsection
