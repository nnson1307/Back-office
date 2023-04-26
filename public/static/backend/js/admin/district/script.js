var register = {
    _init: function () {
        $('#country_id').change(function () {
            $.ajax({
                url: laroute.route('change-country'),
                method:'POST',
                dataType:'JSON',
                data:{
                    country_id : $(this).val()
                },
                success:function (res) {
                    $('#province_id').empty();
                    $('#province_id').append('<option></option>');
                    $.map(res.province, function (val,key) {
                        $('#province_id').append('<option value="'+key+'">'+val+'</option>');
                    })
                }
            })
        });
        //
    },
    submit_index: function () {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-register');

            form.validate({
                rules: {
                    country_id: 'required',
                    province_id: 'required',
                    name: {
                        required:true,
                        maxlength: 100
                    },
                    district_code: {
                        required:true,
                        maxlength: 250
                    },
                    type: 'required'
                },
                messages: {
                    country_id: {
                        required: json.district.country_required
                    },
                    province_id: {
                        required: json.district.province_required
                    },
                    name: {
                        required: json.district.name_required,
                        maxlength: json.district.name_max
                    },
                    district_code: {
                        required: json.district.code_required,
                        maxlength: json.district.code_max
                    },
                    type: {
                        required: json.district.type_required
                    }
                }
            });

            if (!form.valid()) {
                return false;
            }

            var is_actived = 0;
            if ($("#is_actived").is(':checked')) {
                is_actived = 1;
            }

            $.ajax({
                url: laroute.route('admin.district.store'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    country_id : $('#country_id').val(),
                    province_id: $('#province_id').val(),
                    name: $('#name').val(),
                    district_code: $('#district_code').val(),
                    type: $('#type').val(),
                    is_actived : is_actived
                },
                success: function (res) {
                    if (res.error == true) {
                        var mess_error = '';
                        $.map(res._error, function (a) {
                            mess_error = mess_error.concat(a + '<br/>');
                        });
                        swal.fire(create_fail, mess_error, "error");
                    } else {
                        swal.fire(create_success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('admin.district');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('admin.district');
                            }
                        });
                    }
                },
                error: function (res) {
                    if (res.responseJSON != undefined) {
                        var mess_error = '';
                        $.map(res.responseJSON.errors, function (a) {
                            mess_error = mess_error.concat(a + '<br/>');
                        });
                        swal.fire(create_fail, mess_error, "error");
                    }
                }
            })
        });
    },
    submit_load: function () {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-register');

            form.validate({
                rules: {
                    country_id: 'required',
                    province_id: 'required',
                    name: {
                        required:true,
                        maxlength: 100
                    },
                    district_code: {
                        required:true,
                        maxlength: 250
                    },
                    type: 'required'
                },
                messages: {
                    country_id: {
                        required: json.district.country_required
                    },
                    province_id: {
                        required: json.district.province_required
                    },
                    name: {
                        required: json.district.name_required,
                        maxlength: json.district.name_max
                    },
                    district_code: {
                        required: json.district.code_required,
                        maxlength: json.district.code_max
                    },
                    type: {
                        required: json.district.type_required
                    }
                }
            });

            if (!form.valid()) {
                return false;
            }

            var is_actived = 0;
            if ($("#is_actived").is(':checked')) {
                is_actived = 1;
            }

            $.ajax({
                url: laroute.route('admin.district.store'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    country_id : $('#country_id').val(),
                    province_id: $('#province_id').val(),
                    name: $('#name').val(),
                    district_code: $('#district_code').val(),
                    type: $('#type').val(),
                    is_actived: is_actived
                },
                success: function (res) {
                    if (res.error == true) {
                        var mess_error = '';
                        $.map(res._error, function (a) {
                            mess_error = mess_error.concat(a + '<br/>');
                        });
                        swal.fire(create_fail, mess_error, "error");
                    } else {
                        swal.fire(create_success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.reload();
                            }
                            if (result.value == true) {
                                window.location.reload();
                            }
                        });
                    }
                },
                error: function (res) {
                    if (res.responseJSON != undefined) {
                        var mess_error = '';
                        $.map(res.responseJSON.errors, function (a) {
                            mess_error = mess_error.concat(a + '<br/>');
                        });
                        swal.fire(create_fail, mess_error, "error");
                    }
                }
            })
        });
    }
};

var update = {
    _init: function () {
        $.ajax({
            url: laroute.route('change-country'),
            method:'POST',
            dataType:'JSON',
            data:{
                country_id : $('#country_id').val()
            },
            success:function (res) {
                $('#province_id').empty();
                $('#province_id').append('<option></option>');
                $.map(res.province, function (val,key) {
                    if ($('#province_load').val() == key) {
                        $('#province_id').append('<option value="'+key+'" selected>'+val+'</option>');
                    } else {
                        $('#province_id').append('<option value="'+key+'">'+val+'</option>');
                    }

                })
            }
        });

        $('#country_id').change(function () {
            $.ajax({
                url: laroute.route('change-country'),
                method:'POST',
                dataType:'JSON',
                data:{
                    country_id : $(this).val()
                },
                success:function (res) {
                    $('#province_id').empty();
                    $('#province_id').append('<option></option>');
                    $.map(res.province, function (val,key) {
                        $('#province_id').append('<option value="'+key+'">'+val+'</option>');
                    })
                }
            })
        });
    },
    submit: function (id) {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-update');

            form.validate({
                rules: {
                    country_id: 'required',
                    province_id: 'required',
                    name: {
                        required:true,
                        maxlength: 100
                    },
                    district_code: {
                        required:true,
                        maxlength: 250
                    },
                    type: 'required'
                },
                messages: {
                    country_id: {
                        required: json.district.country_required
                    },
                    province_id: {
                        required: json.district.province_required
                    },
                    name: {
                        required: json.district.name_required,
                        maxlength: json.district.name_max
                    },
                    district_code: {
                        required: json.district.code_required,
                        maxlength: json.district.code_max
                    },
                    type: {
                        required: json.district.type_required
                    }
                }
            });

            if (!form.valid()) {
                return false;
            }

            var is_actived = 0;
            if ($("#is_actived").is(':checked')) {
                is_actived = 1;
            }
            $.ajax({
                url: laroute.route('admin.district.update'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    province_id: $('#province_id').val(),
                    name: $('#name').val(),
                    district_code: $('#district_code').val(),
                    type: $('#type').val(),
                    district_id: id,
                    is_actived: is_actived,
                    country_id : $('#country_id').val(),
                },
                success: function (res) {
                    if (res.error == true) {
                        var mess_error = '';
                        $.map(res._error, function (a) {
                            mess_error = mess_error.concat(a + '<br/>');
                        });
                        swal.fire(update_fail, mess_error, "error");
                    } else {
                        swal.fire(update_success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('admin.district');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('admin.district');
                            }
                        });
                    }
                },
                error: function (res) {
                    if (res.responseJSON != undefined) {
                        var mess_error = '';
                        $.map(res.responseJSON.errors, function (a) {
                            mess_error = mess_error.concat(a + '<br/>');
                        });
                        swal.fire(update_fail, mess_error, "error");
                    }
                }
            })
        });
    }
};

var remove = {
    click: function (id) {
        $.getJSON('/admin/lang-district', function (json) {
            swal.fire({
                title:  json.index.ALERT,
                buttonsStyling: false,
                showCloseButton: true,
                html: json.index.text1 +
                    "<br>" +
                    json.index.text2,
                type: "danger",

                confirmButtonText: json.index.CONFIRM_REMOVE,
                confirmButtonClass: "btn btn-sm btn-default btn-bold",

                showCancelButton: true,
                cancelButtonText: json.index.CANCEL_REMOVE,
                cancelButtonClass: "btn btn-sm btn-bold btn-brand"
            }).then(function (result) {
                if (result.value) {
                    if (result.value) {
                        $.ajax({
                            url: laroute.route('admin.district.destroy'),
                            method: 'POST',
                            dataType: 'JSON',
                            data: {
                                id: id
                            },
                            success: function (res) {
                                if (!res.error) {
                                    swal.fire(json.index.REMOVE_SUCCESS, "", "success").then(function (result) {
                                        if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                            window.location.reload();
                                        }
                                        if (result.value == true) {
                                            window.location.reload();
                                        }
                                    });
                                }
                            }
                        });
                    }
                }
            });
        });
    }
};

var index = {
    _init: function () {
        if ($('#sort_country_name').val() == 'asc') {
            $('.sort_country_name_desc').show();
            $('.sort_country_name_asc').hide();
        } else if ($('#sort_country_name').val() == 'desc') {
            $('.sort_country_name_desc').hide();
            $('.sort_country_name_asc').show();
        } else {
            $('.sort_country_name_desc').show();
            $('.sort_country_name_asc').hide();
        }

        if ($('#sort_province_name').val() == 'asc') {
            $('.sort_province_name_desc').show();
            $('.sort_province_name_asc').hide();
        } else if ($('#sort_province_name').val() == 'desc') {
            $('.sort_province_name_desc').hide();
            $('.sort_province_name_asc').show();
        } else {
            $('.sort_province_name_desc').show();
            $('.sort_province_name_asc').hide();
        }

        if ($('#sort_district_name').val() == 'asc') {
            $('.sort_district_name_desc').show();
            $('.sort_district_name_asc').hide();
        } else if ($('#sort_district_name').val() == 'desc') {
            $('.sort_district_name_desc').hide();
            $('.sort_district_name_asc').show();
        } else {
            $('.sort_district_name_desc').show();
            $('.sort_district_name_asc').hide();
        }

        if ($('#sort_district_code').val() == 'asc') {
            $('.sort_district_code_desc').show();
            $('.sort_district_code_asc').hide();
        } else if ($('#sort_district_code').val() == 'desc') {
            $('.sort_district_code_desc').hide();
            $('.sort_district_code_asc').show();
        } else {
            $('.sort_district_code_desc').show();
            $('.sort_district_code_asc').hide();
        }

        if ($('#sort_district_status').val() == 'asc') {
            $('.sort_status_desc').show();
            $('.sort_status_asc').hide();
        } else if ($('#sort_district_status').val() == 'desc') {
            $('.sort_status_desc').hide();
            $('.sort_status_asc').show();
        } else {
            $('.sort_status_desc').show();
            $('.sort_status_asc').hide();
        }
    },
    sort: function (obj,col) {
        var sort = $(obj).data('sort');
        switch (col) {
            case 'country_name':
                $("#sort_country_name").val(sort);
                $("#sort_province_name").val(null);
                $("#sort_district_name").val(null);
                $("#sort_district_code").val(null);
                $("#sort_district_status").val(null);
                break;
            case 'province_name':
                $("#sort_country_name").val(null);
                $("#sort_province_name").val(sort);
                $("#sort_district_name").val(null);
                $("#sort_district_code").val(null);
                $("#sort_district_status").val(null);
                break;
            case 'district_name':
                $("#sort_country_name").val(null);
                $("#sort_province_name").val(null);
                $("#sort_district_name").val(sort);
                $("#sort_district_code").val(null);
                $("#sort_district_status").val(null);
                break;
            case 'district_code':
                $("#sort_country_name").val(null);
                $("#sort_province_name").val(null);
                $("#sort_district_name").val(null);
                $("#sort_district_code").val(sort);
                $("#sort_district_status").val(null);
                break;
            case 'status':
                $("#sort_country_name").val(null);
                $("#sort_province_name").val(null);
                $("#sort_district_name").val(null);
                $("#sort_district_code").val(null);
                $("#sort_district_status").val(sort);
                break;
        }
        $('#form-filter').submit();
    },
    change_status: function (id, obj) {
        var is_actived = 0;
        if ($(obj).is(':checked')) {
            is_actived = 1;
        }

        $.ajax({
            url: laroute.route('admin.district.change-status'),
            dataType: 'JSON',
            method: 'POST',
            data: {
                district_id: id,
                is_actived: is_actived
            },
            success: function (res) {

            }
        })
    }
};

$(document).ready(function () {
    register._init();
    update._init();
    index._init();
});
