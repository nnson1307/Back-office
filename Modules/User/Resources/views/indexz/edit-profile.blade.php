@extends('layout')

@section('header')
    @include('components.header',['title'=>'Config'])
@stop

@section('content')

    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                @lang('My profile')
            </h3>
            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            <div class="kt-subheader__group" id="kt_subheader_search">
                <span class="kt-subheader__desc text-capitalize"
                      id="kt_subheader_total">{{$item['first_name'].' '.$item['last_name']}} </span>
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <a href="{{route('user')}}" class="btn btn-default btn-bold">
                @lang('Back') </a>
            <div class="btn-group">
                <button type="button" class="btn btn-brand btn-bold" onclick="edit.submit_edit({{$item['id']}})">
                    @lang('Save change')
                </button>

            </div>
        </div>
    </div>

    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
            <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside" style="opacity: 1;">

                <!--begin:: Widgets/Applications/User/Profile1-->
                <div class="kt-portlet ">
                    <div class="kt-portlet__head  kt-portlet__head--noborder">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                            </h3>
                        </div>

                    </div>
                    <div class="kt-portlet__body kt-portlet__body--fit-y">

                        <!--begin::Widget -->
                        <div class="kt-widget kt-widget--user-profile-1">
                            <div class="kt-widget__head">
                                <div class="kt-widget__media">
                                    @if($item['avatar']!=null)
                                        <img src="{{asset($item['avatar'])}}" alt="image"
                                             style="max-height: 90px; max-width: 90px;">
                                    @else
                                        <img src="{{asset('static/backend/images/default-placeholder.png')}}" alt="image"
                                             style="max-height: 90px; max-width: 90px;">
                                    @endif
                                </div>
                                <div class="kt-widget__content">
                                    <div class="kt-widget__section">
                                        <a href="#" class="kt-widget__username text-capitalize">
                                            {{$item['first_name'].' '.$item['last_name']}}
                                            <i class="flaticon2-correct kt-font-success"></i>
                                        </a>
                                        <span class="kt-widget__subtitle">
																{{$item['organize_name']}}
															</span>
                                    </div>

                                </div>
                            </div>
                            <div class="kt-widget__body">
                                <div class="kt-widget__content">
                                    <div class="kt-widget__info">
                                        <span class="kt-widget__label">Email:</span>
                                        <a href="#" class="kt-widget__data">{{$item['email']}}</a>
                                    </div>
                                    <div class="kt-widget__info">
                                        <span class="kt-widget__label">@lang('Phone'):</span>
                                        <a href="#" class="kt-widget__data">{{$item['phone']}}</a>
                                    </div>
                                    <div class="kt-widget__info">
                                        <span class="kt-widget__label">@lang('Location'):</span>
                                        <span class="kt-widget__data">{{$item['country']}}</span>
                                    </div>
                                </div>
                                <div class="kt-widget__items">
                                    <a href="{{route('user')}}" class="kt-widget__item ">
															<span class="kt-widget__section">
																<span class="kt-widget__icon">
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1" class="kt-svg-icon">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect id="bound" x="0" y="0" width="24"
                                                                                  height="24"></rect>
																			<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                                                  id="Path-50" fill="#000000"
                                                                                  opacity="0.3"></path>
																			<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                                                  id="Mask" fill="#000000"
                                                                                  opacity="0.3"></path>
																			<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                                                  id="Mask-Copy" fill="#000000"
                                                                                  opacity="0.3"></path>
																		</g>
																	</svg> </span>
																<span class="kt-widget__desc">
																	@lang('User')
																</span>
															</span>
                                        <span class="kt-badge kt-badge--unified-danger kt-badge--sm kt-badge--rounded kt-badge--bolder">{{$total}}</span>
                                    </a>
                                    <a href="{{route('admin.station')}}" class="kt-widget__item"
                                       data-toggle="kt-tooltip" title=""
                                       data-placement="right">
															<span class="kt-widget__section">
																<span class="kt-widget__icon">
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1" class="kt-svg-icon">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<polygon id="Shape"
                                                                                     points="0 0 24 0 24 24 0 24"></polygon>
																			<path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                                                                  id="Combined-Shape" fill="#000000"
                                                                                  fill-rule="nonzero"
                                                                                  opacity="0.3"></path>
																			<rect id="Rectangle" fill="#000000" x="6"
                                                                                  y="11" width="9" height="2"
                                                                                  rx="1"></rect>
																			<rect id="Rectangle-Copy" fill="#000000"
                                                                                  x="6" y="15" width="5" height="2"
                                                                                  rx="1"></rect>
																		</g>
																	</svg> </span>
																<span class="kt-widget__desc">@lang('Station')</span>
															</span>
                                        <span class="kt-badge kt-badge--unified-brand kt-badge--inline kt-badge--bolder">{{$total_station}}</span>
                                    </a>

                                </div>
                            </div>
                        </div>

                        <!--end::Widget -->
                    </div>
                </div>

                <!--end:: Widgets/Applications/User/Profile1-->
            </div>
            <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                <div class="kt-portlet kt-portlet--tabs">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_apps_user_edit_tab_1"
                                       role="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon id="Bound" points="0 0 24 0 24 24 0 24"></polygon>
                                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                      id="Shape" fill="#000000" fill-rule="nonzero"></path>
                                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                      id="Path" fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        @lang('Profile')
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_apps_user_edit_tab_2" role="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon id="Shape" points="0 0 24 0 24 24 0 24"></polygon>
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                      id="Mask" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                      id="Mask-Copy" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg>
                                        @lang('Account')
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_apps_user_edit_tab_3" role="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                      id="Path-50" fill="#000000" opacity="0.3"></path>
                                                <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                      id="Mask" fill="#000000" opacity="0.3"></path>
                                                <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                      id="Mask-Copy" fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        @lang('Changes password')
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_apps_user_edit_tab_4" role="tab">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect id="bound" x="0" y="0" width="24" height="24"></rect>
                                                <path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z"
                                                      id="Combined-Shape" fill="#000000" opacity="0.3"></path>
                                                <path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z"
                                                      id="Combined-Shape" fill="#000000"></path>
                                            </g>
                                        </svg>
                                        @lang('Settings')
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">

                        {!! csrf_field() !!}
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
                                                            @lang('Customer info'):</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('Avatar')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle-"
                                                             id="kt_apps_user_add_avatar">
                                                            <div id="background-image">
                                                                @if($item['avatar']!=null)
                                                                    <div class="kt-avatar__holder"
                                                                         style="background-image: url({{asset($item['avatar'])}});background-position: center;"></div>
                                                                @else
                                                                    <div class="kt-avatar__holder"
                                                                         style="background-image: url({{asset('static/backend/images/default-placeholder.png')}});background-position: center;"></div>
                                                                @endif

                                                            </div>
                                                            <input type="hidden" id="avatar" name="avatar">
                                                            <label class="kt-avatar__upload"
                                                                   data-toggle="kt-tooltip"
                                                                   title=""
                                                                   data-original-title="@lang('Change avatar')">
                                                                <i class="fa fa-pen"></i>
                                                                <input type="file" id="getFile" name="getFile"
                                                                       accept="image/jpeg,image/png,image/jpeg,jpg|png|jpeg"
                                                                       onchange="uploadImage(this);">
                                                            </label>
                                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip"
                                                                  title="" data-original-title="Cancel avatar">
																				<i class="fa fa-times"></i>
																			</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('First name')
                                                        <span
                                                                class="color_red">*</span></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control" type="text" id="first_name"
                                                               name="first_name" value="{{$item['first_name']}}"
                                                               placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('Last name')
                                                        <span
                                                                class="color_red">*</span></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control" type="text" id="last_name"
                                                               name="last_name" value="{{$item['last_name']}}"
                                                               placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('Birthday')
                                                        <span
                                                                class="color_red">*</span></label>
                                                    <div class="col-xl-2">
                                                        <select name="day" id="day"
                                                                class="form-control kt-selectpicker  show-tick"
                                                                data-size="5">
                                                            <option value="">@lang('Day')</option>
                                                            @for($i = 1; $i <= 31; $i++)
                                                                @if($i==\Carbon\Carbon::parse($item['birthday'])->format('d'))
                                                                    <option value="{{ $i }}"
                                                                            selected>{{ $i }}</option>
                                                                @else
                                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                                @endif

                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <select name="month" id="month"
                                                                class="form-control kt-selectpicker show-tick"
                                                                data-size="5">
                                                            <option value="">@lang('Month')</option>
                                                            @for($i = 1; $i <= 12; $i++)
                                                                @if($i==\Carbon\Carbon::parse($item['birthday'])->format('m'))
                                                                    <option value="{{ $i }}" selected>
                                                                        @lang('Month') {{ $i }}</option>
                                                                @else
                                                                    <option value="{{ $i }}">@lang('Month') {{ $i }}</option>
                                                                @endif

                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="col-xl-2">
                                                        <select name="year" id="year"
                                                                class="form-control kt-selectpicker show-tick"
                                                                data-size="5">
                                                            <option value="">@lang('Year')</option>
                                                            @for($i = date('Y'); $i >= 1900; $i--)
                                                                @if($i==\Carbon\Carbon::parse($item['birthday'])->format('Y'))
                                                                    <option value="{{ $i }}"
                                                                            selected>{{ $i }}</option>
                                                                @else
                                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                                @endif

                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('Phone')
                                                        <span class="color_red">*</span></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span
                                                                        class="input-group-text"><i
                                                                            class="la la-phone"></i></span></div>
                                                            <input type="text" class="form-control"
                                                                   value="{{$item['phone']}}" placeholder="Phone"
                                                                   id="phone" name="phone">
                                                        </div>
                                                        <span class="form-text text-muted"></span>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">@lang('Country')</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="country"
                                                                   name="country"
                                                                   value="{{$item['country']}}"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_apps_user_edit_tab_2" role="tabpanel">
                                <div class="kt-form kt-form--label-right">
                                    <div class="kt-form__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="kt-section__title kt-section__title-sm">
                                                            @lang('Account'):</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Email <span
                                                                class="color_red">*</span></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="kt-spinner kt-spinner--sm">
                                                            <input class="form-control" type="text"
                                                                   value="{{$item['email']}}" id="email"
                                                                   name="email">
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="kt-section__title kt-section__title-sm">
                                                            @lang('Organize'):</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        @lang('Organize avatar')
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle-"
                                                             id="kt_apps_user_add_avatar">
                                                            <div id="background-organize-image">
                                                                @if($item['organize_avatar']!=null)
                                                                    <div class="kt-avatar__holder"
                                                                         style="background-image: url({{asset($item['organize_avatar'])}});background-position: center;"></div>
                                                                @else
                                                                    <div class="kt-avatar__holder"
                                                                         style="background-image: url({{asset('static/backend/images/default-placeholder.png')}});background-position: center;"></div>
                                                                @endif

                                                            </div>
                                                            <input type="hidden" id="organize_avatar"
                                                                   name="organize_avatar">
                                                            <label class="kt-avatar__upload"
                                                                   data-toggle="kt-tooltip"
                                                                   title="" data-original-title="Change avatar">
                                                                <i class="fa fa-pen"></i>
                                                                <input type="file" id="getFileOrganize"
                                                                       name="getFileOrganize"
                                                                       accept="image/jpeg,image/png,image/jpeg,jpg|png|jpeg"
                                                                       onchange="uploadOrganize(this);">
                                                            </label>
                                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip"
                                                                  title="" data-original-title="Cancel avatar">
																				<i class="fa fa-times"></i>
																			</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        @lang('Organize name')
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control"
                                                                   id="organize_name"
                                                                   name="organize_name"
                                                                   value="{{$item['organize_name']}}"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="kt-section__title kt-section__title-sm">
                                                            @lang('Security'):</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        @lang('Login verification')
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        @if($item['is_auth'])
                                                            <a href="javascript:void(0)" onclick="edit.change_verify('{{$item['id']}}',0)"
                                                               class="btn btn-label-warning btn-bold btn-sm kt-margin-t-5 kt-margin-b-5">
                                                                Not login verification
                                                            </a>
                                                        @else

                                                            <a href="javascript:void(0)" onclick="edit.change_verify('{{$item['id']}}',1)"
                                                               class="btn btn-label-brand btn-bold btn-sm kt-margin-t-5 kt-margin-b-5">
                                                                @lang('Setup login verification')
                                                            </a>
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    {{--<label class="col-xl-3 col-lg-3 col-form-label">--}}
                                                    {{--Password reset verification</label>--}}
                                                    {{--<div class="col-lg-9 col-xl-6">--}}
                                                    {{--<div class="kt-checkbox-single">--}}
                                                    {{--<label class="kt-checkbox">--}}
                                                    {{--<input type="checkbox"> Require personal information--}}
                                                    {{--to reset your password.--}}
                                                    {{--<span></span>--}}
                                                    {{--</label>--}}
                                                    {{--</div>--}}
                                                    {{--<span class="form-text text-muted">--}}
                                                    {{--For extra security, this requires you to confirm your email or phone number when you reset your password.--}}
                                                    {{--<a href="#" class="kt-link">Learn more</a>.--}}
                                                    {{--</span>--}}
                                                    {{--</div>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_apps_user_edit_tab_3" role="tabpanel">
                                <div class="kt-form kt-form--label-right">
                                    <form id="form-password">
                                        <div class="kt-form__body">
                                            <div class="kt-section kt-section--first">
                                                <div class="kt-section__body">
                                                    <div class="alert alert-solid-danger alert-bold fade show kt-margin-t-20 kt-margin-b-40"
                                                         role="alert">
                                                        <div class="alert-icon"><i
                                                                    class="fa fa-exclamation-triangle"></i></div>
                                                        <div class="alert-text">
                                                            @lang('Configure user passwords to expire periodically')
                                                            <br>
                                                            @lang('Note change password')
                                                        </div>
                                                        <div class="alert-close">
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true"><i
                                                                            class="la la-close"></i></span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label class="col-xl-3"></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <h3 class="kt-section__title kt-section__title-sm">
                                                                @lang('Change or recover your password'):</h3>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            @lang('Current password')<span
                                                                    class="color_red">*</span></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input type="password" class="form-control"
                                                                   id="current_password" name="current_password"
                                                                   placeholder="">
                                                            <a href="#"
                                                               class="kt-link kt-font-sm kt-font-bold kt-margin-t-5">@lang('Forgot password')
                                                                ?</a>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">@lang('New password')
                                                            <span class="color_red">*</span></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input type="password" class="form-control" id="password"
                                                                   name="password" placeholder="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-group-last row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">
                                                            @lang('Verify password')<span
                                                                    class="color_red">*</span></label>
                                                        <div class="col-lg-9 col-xl-6">
                                                            <input type="password" class="form-control"
                                                                   id="password_confirm" name="password_confirm"
                                                                   placeholder="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
                                        <div class="kt-form__actions">
                                            <div class="row">
                                                <div class="col-xl-3"></div>
                                                <div class="col-lg-9 col-xl-6">
                                                    <button onclick="edit.submit_password_profile({{$item['id']}})"
                                                            class="btn btn-label-brand btn-bold">
                                                        @lang('Save change')
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_apps_user_edit_tab_4" role="tabpanel">
                                <div class="kt-form kt-form--label-right">
                                    <div class="kt-form__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="kt-section__title kt-section__title-sm">
                                                            @lang('Setup email notification'):</h3>
                                                    </div>
                                                </div>
                                                <div class="form-group form-group-sm row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        @lang('Email notification')
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
																		<span class="kt-switch">
																			<label>
																				<input type="checkbox" checked="checked"
                                                                                       name="email_notification_1">
																				<span></span>
																			</label>
																		</span>
                                                    </div>
                                                </div>
                                                <div class="form-group form-group-last row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">
                                                        @lang('Send copy to personal email')
                                                    </label>
                                                    <div class="col-lg-9 col-xl-6">
																		<span class="kt-switch">
																			<label>
																				<input type="checkbox"
                                                                                       name="email_notification_2">
																				<span></span>
																			</label>
																		</span>
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

        </div>

    </div>
    @if(Session::get('locale')=='vi')
        <input type="hidden" id="lang_hide" value="vi">
    @else
        <input type="hidden" id="lang_hide" value="en">
    @endif
@stop

@section('after_script')
    <script src="{{asset('static/backend/js/user/edit-profile.js?v='.time())}}" type="text/javascript"></script>
    <script type="text/template" id="background-image-tpl">
        <div class="kt-avatar__holder" style="background-image: url({link});background-position: center;"></div>
    </script>
@stop
