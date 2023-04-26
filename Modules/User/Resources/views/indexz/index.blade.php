@extends('layout')
@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')
    {{--    @lang('home.config')--}}
    <!-- begin:: Content Head -->
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title"> @lang('user') </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
									<span class="kt-subheader__desc" id="kt_subheader_total">
										{{$total}} @lang('user')</span>
                <form class="kt-margin-l-20 kt-margin-b-0" id="kt_subheader_search_form">
                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                        <input type="text" class="form-control" placeholder="@lang('Search')..." id="search">
                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                              id="Path-2" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                              id="Path" fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>

                                <!--<i class="flaticon2-search-1"></i>-->
                            </span>
                        </span>
                    </div>
                </form>
            </div>
            <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
                <div class="kt-subheader__desc"><span
                            id="kt_subheader_group_selected_rows">0</span> @lang('Selected'):
                </div>
                <div class="btn-toolbar kt-margin-l-20">
                    @if(Auth::user()->is_admin==1||in_array('user.change-status',session('routeList')))
                        <div class="dropdown" id="kt_subheader_group_actions_status_change">
                            <button type="button" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle"
                                    data-toggle="dropdown">
                                @lang('Change status')
                            </button>
                            <div class="dropdown-menu">
                                <ul class="kt-nav">
                                    <li class="kt-nav__item">
                                        <a href="javascript:;" class="kt-nav__link" data-toggle="status-change"
                                           data-status="1">
                                        <span class="kt-nav__link-text"><span
                                                    class="kt-badge kt-badge--unified-success kt-badge--inline kt-badge--bold">
                                                @lang('Enable')
                                            </span></span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="javascript:;" class="kt-nav__link" data-toggle="status-change"
                                           data-status="0">
                                        <span class="kt-nav__link-text"><span
                                                    class="kt-badge kt-badge--unified-warning kt-badge--inline kt-badge--bold">
                                                @lang('Disable')
                                            </span></span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    @endif
                    @if(Auth::user()->is_admin==1||in_array('submit-reset-password',session('routeList')))
                        <button class="btn btn-label-success btn-bold btn-sm btn-icon-h"
                                id="kt_subheader_group_actions_fetch" data-toggle="modal"
                                data-target="#kt_datatable_records_fetch_modal">
                            @lang('Changes password')
                        </button>
                    @endif
                    @if(Auth::user()->is_admin==1||in_array('user.remove',session('routeList')))
                        <button class="btn btn-label-danger btn-bold btn-sm btn-icon-h"
                                id="kt_subheader_group_actions_delete_all">
                            @lang('Delete')
                        </button>
                    @endif
                </div>
            </div>
        </div>
        @if(Auth::user()->is_admin==1||in_array('user.add',session('routeList')))
            <div class="kt-subheader__toolbar">
                <a href="#" class="">
                </a>
                <a href="{{route('user.add')}}" class="btn btn-label-brand btn-bold">
                    @lang('Add user') </a>
            </div>
        @endif
    </div>
    <!-- end:: Content Head -->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <!-- begin:: Content -->
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <!--begin: Datatable -->
                <div class="kt-datatable" id="kt_apps_user_list_datatable"></div>
                <!--end: Datatable -->
            </div>
        </div>
        <!-- end:: Content -->

        <!--begin::Modal-->
    @include('user::index.new-password')

    <!--end::Modal-->

    </div>
    <div id="add"></div>
    @if(Session::get('locale')=='vi')
        <input type="hidden" id="lang_hide" value="vi">
    @else
        <input type="hidden" id="lang_hide" value="en">
    @endif
    <input type="hidden" id="enterPass" value="@lang('Please enter password')">
    <input type="hidden" id="xnmk" value="@lang('Confirm password')">
    <input type="hidden" id="mkxnkcx" value="@lang('Password incorrect, please try again')">
    <input type="hidden" id="mkcbm" value="@lang('Password is not secure')">
    <input type="hidden" id="youold" value="@lang('You must be over 18 years old')">

    @if(Auth::user()->is_admin==1||in_array('admin.user-station.authorization.add',session('routeList')))
        <input type="hidden" id="edit-role-authorize" value="1">
    @else
        <input type="hidden" id="edit-role-authorize" value="0">
    @endif
@stop

@section('after_script')
    <script src="{{asset('static/backend/js/user/table-users.js?v='.time())}}" type="text/javascript"></script>
    <script src="{{asset('static/backend/js/user/list.js?v='.time())}}" type="text/javascript"></script>
    <script src="{{asset('static/backend/js/user/reset-password.js?v='.time())}}" type="text/javascript"></script>
    <script>
        KTAppUserListDatatable.setHeading({
            'email': 'Email',
            'country': '@lang('Country')',
            'organize': '@lang('Organize')',
            'status': '@lang('Status')',
            'created_time': '@lang('Created time')',
            'authority': '@lang('Authority')',
            'last_login': '@lang('Last login')',
            'enable': '@lang('Enable')',
            'disable': '@lang('Disable')',
        });
    </script>
@stop
