@extends('layout')

@section('header')
    @include('components.header',['title'=>'Config'])
@stop
@section('content')



    <form id="form-add">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    @lang('User')
                </h3>
                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group" id="kt_subheader_search">
									<span class="kt-subheader__desc text-capitalize" id="kt_subheader_total">
										@lang('Create')
                                    </span>
                </div>
            </div>
            <div class="kt-subheader__toolbar">

                <div class="btn-group">
                    <a href="{{route('user')}}" class="btn btn-default btn-bold">
                        @lang('Back')
                    </a>
                    <button type="submit" class="btn btn-brand btn-bold" onclick="add.submit_add()">
                        @lang('Save change')
                    </button>

                </div>
            </div>
        </div>
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_apps_user_edit_tab_1" role="tabpanel">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="row">
                                                <label class="col-xl-3"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h3 class="kt-section__title kt-section__title-sm">
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    @lang('First name'): <span class="color_red">*</span></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" class="form-control"
                                                           id="first_name"
                                                           name="first_name"
                                                           placeholder="@lang('Please enter first name')">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    @lang('Last name'): <span class="color_red">*</span></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" class="form-control"
                                                           id="last_name"
                                                           name="last_name"
                                                           placeholder="@lang('Please enter last name')">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    @lang('Phone'): <span class="color_red">*</span></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" class="form-control"
                                                           id="phone"
                                                           name="phone"
                                                           placeholder="@lang('Please enter phone number')">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    Email: <span class="color_red">*</span></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="text" class="form-control"
                                                           id="email"
                                                           name="email"
                                                           placeholder="@lang('Please enter email')">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    @lang('Password'): <span class="color_red">*</span></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="password" class="form-control"
                                                           id="password"
                                                           name="password"
                                                           placeholder="@lang('Please enter password')">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">
                                                    @lang('Confirm password'):</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="password" class="form-control"
                                                           id="password_confirm"
                                                           name="password_confirm"
                                                           placeholder="@lang('Confirm password')">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    @if(Session::get('locale')=='vi')
        <input type="hidden" id="lang_hide" value="vi">
    @else
        <input type="hidden" id="lang_hide" value="en">
    @endif
    <input type="hidden" id="youold" value="@lang('You must be over 18 years old')">
@stop

@section('after_script')
    <script src="{{asset('static/backend/js/user/add.js?v='.time())}}" type="text/javascript"></script>
    <script>
        add.setHeading({
            'enter_first_name': '@lang('Please enter first name')',
            'enter_last_name': '@lang('Please enter last name')',
            'enter_phone': '@lang('Please enter phone number')',
            'enter_email': '@lang('Please enter email')',
            'enter_password': '@lang('Please enter password')',
            'secure_password': '@lang('Password is not secure')',
            'enter_confirm_password': '@lang('Confirm password')',
            'not_phone': '@lang('Invalid phone number')',
            'equal_password': '@lang('Password incorrect, please try again')',
        });
    </script>
@stop
