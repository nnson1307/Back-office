var register = {
    _init: function () {

    },
    submit_index: function () {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-register');

            form.validate({
                rules: {
                    country_id: 'required',
                    name: {
                        required: true,
                        maxlength: 100,
                    },
                    province_code: {
                        required: true,
                        maxlength: 250,
                    },
                    type: 'required'
                },
                messages: {
                    country_id: {
                        required: json.province.country_required
                    },
                    name: {
                        required: json.province.name_required,
                        maxlength: json.province.name_max
                    },
                    province_code: {
                        required: json.province.code_required,
                        maxlength: json.province.code_max
                    },
                    type: {
                        required: json.province.type_required
                    }
                },
            });

            if (!form.valid()) {
                return false;
            }

            var is_actived = 0;
            if ($("#is_actived").is(':checked')) {
                is_actived = 1;
            }

            $.ajax({
                url: laroute.route('admin.province.store'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    country_id: $('#country_id').val(),
                    name: $('#name').val(),
                    province_code: $('#province_code').val(),
                    type: $('#type').val(),
                    is_actived: is_actived
                },
                success: function (res) {
                    if (res.error == false) {
                        swal.fire(create_success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('admin.province');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('admin.province');
                            }
                        });
                    }
                },
                error: function (res) {
                    if (res.responseJSON != undefined) {
                        var mess_error = '';
                        $.map(res.responseJSON.errors, function (a) {
                            console.log(a);
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
                    name: {
                        required: true,
                        maxlength: 100
                    },
                    province_code: {
                        required: true,
                        maxlength: 250
                    },
                    type: 'required'
                },
                messages: {
                    country_id: {
                        required: json.province.country_required
                    },
                    name: {
                        required: json.province.name_required,
                        maxlength: json.province.name_max
                    },
                    province_code: {
                        required: json.province.code_required,
                        maxlength: json.province.code_max
                    },
                    type: {
                        required: json.province.type_required
                    }
                },
            });

            if (!form.valid()) {
                return false;
            }

            var is_actived = 0;
            if ($("#is_actived").is(':checked')) {
                is_actived = 1;
            }

            $.ajax({
                url: laroute.route('admin.province.store'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    country_id: $('#country_id').val(),
                    name: $('#name').val(),
                    province_code: $('#province_code').val(),
                    type: $('#type').val(),
                    is_actived: is_actived
                },
                success: function (res) {
                    if (res.error == false) {
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
                            console.log(a);
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

    },
    submit: function (id) {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-update');

            form.validate({
                rules: {
                    country_id: 'required',
                    name: {
                        required: true,
                        maxlength: 100
                    },
                    province_code: {
                        required: true,
                        maxlength: 250
                    },
                    type: 'required'
                },
                messages: {
                    country_id: {
                        required: json.province.country_required
                    },
                    name: {
                        required: json.province.name_required,
                        maxlength: json.province.name_max
                    },
                    province_code: {
                        required: json.province.code_required,
                        maxlength: json.province.code_max
                    },
                    type: {
                        required: json.province.type_required
                    }
                },
            });

            if (!form.valid()) {
                return false;
            }
            var is_active = 0;
            if ($("#is_actived").is(':checked')) {
                is_active = 1;
            }

            $.ajax({
                url: laroute.route('admin.province.update'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    country_id: $('#country_id').val(),
                    name: $('#name').val(),
                    province_code: $('#province_code').val(),
                    type: $('#type').val(),
                    province_id: id,
                    is_actived: is_active
                },
                success: function (res) {
                    if (res.error == false) {
                        swal.fire(update_success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('admin.province');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('admin.province');
                            }
                        });
                    }
                },
                error: function (res) {
                    if (res.responseJSON != undefined) {
                        var mess_error = '';
                        $.map(res.responseJSON.errors, function (a) {
                            console.log(a);
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
        $.getJSON('/admin/lang-province', function (json) {
            swal.fire({
                title: json.index.ALERT,
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
                            url: laroute.route('admin.province.destroy'),
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

        if ($('#sort_province_code').val() == 'asc') {
            $('.sort_province_code_desc').show();
            $('.sort_province_code_asc').hide();
        } else if ($('#sort_province_code').val() == 'desc') {
            $('.sort_province_code_desc').hide();
            $('.sort_province_code_asc').show();
        } else {
            $('.sort_province_code_desc').show();
            $('.sort_province_code_asc').hide();
        }

        if ($('#sort_province_status').val() == 'asc') {
            $('.sort_status_desc').show();
            $('.sort_status_asc').hide();
        } else if ($('#sort_province_status').val() == 'desc') {
            $('.sort_status_desc').hide();
            $('.sort_status_asc').show();
        } else {
            $('.sort_status_desc').show();
            $('.sort_status_asc').hide();
        }
    },
    sort: function (obj, col) {
        var sort = $(obj).data('sort');
        switch (col) {
            case 'country_name':
                $("#sort_country_name").val(sort);
                $("#sort_province_name").val(null);
                $("#sort_province_code").val(null);
                $("#sort_province_status").val(null);
                break;
            case 'province_name':
                $("#sort_country_name").val(null);
                $("#sort_province_name").val(sort);
                $("#sort_province_code").val(null);
                $("#sort_province_status").val(null);
                break;
            case 'province_code':
                $("#sort_country_name").val(null);
                $("#sort_province_name").val(null);
                $("#sort_province_code").val(sort);
                $("#sort_province_status").val(null);
                break;
            case 'status':
                $("#sort_country_name").val(null);
                $("#sort_province_name").val(null);
                $("#sort_province_code").val(null);
                $("#sort_province_status").val(sort);
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
            url: laroute.route('admin.province.change-status'),
            dataType: 'JSON',
            method: 'POST',
            data: {
                province_id: id,
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
