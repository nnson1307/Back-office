@extends('layout')
@section('header')
    @include('components.header', ['title' => 'Config'])
@endsection
@section('content')
    @if (isset($detail))
        <form id="form-submit" method="POST" action="{{ route('user.admin-group.submit-add-user-into-group') }}">
            {{ csrf_field() }}
            <input type="hidden" name="group_id" id="group_id" value="{{ $detail['group_id'] }}">
            <div class="kt-subheader kt-grid__item" id="kt_subheader">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        @lang('user::admin-group.index.ADD_USER_INTO_ADMIN_GROUP')
                    </h3>
                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                    <div class="kt-subheader__group" id="kt_subheader_search">
                        <span class="kt-subheader__desc" id="kt_subheader_total"> </span>
                    </div>
                    <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                    </div>
                </div>
                <div class="kt-subheader__toolbar">
                    <button type="button" onclick="adminGroup.addUserIntoGroup()"
                            class="btn btn-info btn-bold">
                        @lang('user::admin-group.input.BUTTON_SAVE')
                    </button>
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
                            <label class="form-control">{{ $detail['group_name'] }}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">
                            @lang('user::admin-group.edit.ADMIN_GROUP_DESCRIPTION')
                        </label>
                        <div class="col-lg-9 col-xl-9">
                            <label class="form-control">{{ $detail['group_description'] }}</label>
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
                        </ul>
                    </div>
                </div>
                <div class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="admin-list">
                                <div class="kt-section kt-margin-t-30">
                                    <div class="kt-section__body">
                                        @include('user::admin-group.partial.list-admin-list')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot"></div>
                </div>
            </div>
        </form>
    @endif
@endsection
@section('after_script')
    <script type="text/javascript" src="{{ asset('static/backend/js/user/admin-group/script.js?v='.time()) }}"></script>
@endsection
