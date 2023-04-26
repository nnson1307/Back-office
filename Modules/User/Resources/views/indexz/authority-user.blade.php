@extends('layout')

@section('content-head')
    @include('components.content-head')
@stop

@section('content')

    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                ỦY QUYỀN NGƯỜI DÙNG
            </h3>

        </div>

    </div>
    <div class="kt-portlet kt-portlet--tabs">
        <div class="kt-portlet__body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group row">
                        <label class="col-form-label col-lg-3 col-sm-12">Nhóm quyền</label>
                        <div class=" col-lg-7 col-md-9 col-sm-12">
                            <select class="form-control kt-select2" id="role_group_id" name="role_group_id">
                                <option></option>
                                @foreach($optionRole as $key=>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label class="kt-checkbox kt-checkbox--brand">
                        <input type="checkbox"> Quản trị hệ thống
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="kt-section__content">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="kt-padding-b-5">
                            <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                <input type="checkbox"> Tất cả
                                <span></span>
                            </label>
                        </th>
                        <th>Tên trạm</th>
                        <th>Địa chỉ</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($list_station))
                        @foreach($list_station as $item)
                            <tr>
                                <th class="kt-padding-b-5">
                                    <label class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                        @if($item['check_user_station']>0)
                                            <input type="checkbox" checked name="station_id" value="{{$item['id']}}"
                                                   onchange="authority.check_authority(this,{{$user['id']}})">
                                        @else
                                            <input type="checkbox" name="station_id" value="{{$item['id']}}"
                                                   onchange="authority.check_authority(this,{{$user['id']}})">
                                        @endif
                                        <span></span>
                                    </label>
                                </th>
                                <td>{{$item['station_name']}}</td>
                                <td>
                                    {{$item['address'].', '.$item['ward_type'].' '.$item['ward_name'].', '.$item['district_type'].' '.$item['district_name'].', '.$item['province_type'].' '.$item['province_name']}}
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>

        </div>
    </div>




@stop

@section('after_script')
    <script src="{{asset('static/backend/js/user/authority-user.js')}}" type="text/javascript"></script>

@stop
