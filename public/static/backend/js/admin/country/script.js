var register = {
    _init: function () {

    },
    submit_index: function () {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-register');

            form.validate({
                rules: {
                    country_name: {
                        required:true,
                        maxlength:250
                    },
                    country_code: {
                        required:true,
                        maxlength:20
                    }
                },
                messages: {
                    country_name: {
                        required: json.country.name_required,
                        maxlength: json.country.name_max
                    },
                    country_code: {
                        required: json.country.code_required,
                        maxlength: json.country.code_max,
                    }
                },
            });

            if (!form.valid()) {
                return false;
            }

            var is_actived = 0;
            if ($('#is_actived').is(':checked')) {
                is_actived = 1;
            }

            $.ajax({
                url: laroute.route('admin.country.store'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    country_name: $('#country_name').val(),
                    country_code: $('#country_code').val(),
                    is_actived: is_actived
                },
                success: function (res) {
                    if (res.error == false) {
                        swal.fire(create_success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('admin.country');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('admin.country');
                            }
                        });
                    }
                },
                error: function (res) {
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        console.log(a);
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(create_fail, mess_error, "error");
                }
            })

        });

    },
    submit_load: function () {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-register');

            form.validate({
                rules: {
                    country_name: {
                        required:true,
                        maxlength:250
                    },
                    country_code: {
                        required:true,
                        maxlength:20
                    }
                },
                messages: {
                    country_name: {
                        required: json.country.name_required,
                        maxlength: json.country.name_max
                    },
                    country_code: {
                        required: json.country.code_required,
                        maxlength: json.country.code_max,
                    }
                },
            });

            if (!form.valid()) {
                return false;
            }

            var is_actived = 0;
            if ($('#is_actived').is(':checked')) {
                is_actived = 1;
            }

            $.ajax({
                url: laroute.route('admin.country.store'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    country_name: $('#country_name').val(),
                    country_code: $('#country_code').val(),
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
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        console.log(a);
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(create_fail, mess_error, "error");
                }
            })

        });
    },
};

var update = {
    _init: function () {

    },
    submit: function (id) {
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-update');

            form.validate({
                rules: {
                    country_name: {
                        required:true,
                        maxlength:250
                    },
                    country_code: {
                        required:true,
                        maxlength:20
                    }
                },
                messages: {
                    country_name: {
                        required: json.country.name_required,
                        maxlength: json.country.name_max
                    },
                    country_code: {
                        required: json.country.code_required,
                        maxlength: json.country.code_max,
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
                url: laroute.route('admin.country.update'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    country_name: $('#country_name').val(),
                    country_code: $('#country_code').val(),
                    is_actived: is_actived,
                    country_id: id
                },
                success: function (res) {
                    if (res.error == false) {
                        swal.fire(update_success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('admin.country');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('admin.country');
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
    },
};

var remove = {
    click: function (id) {
        $.getJSON('/admin/lang-country', function (json) {
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
                            url: laroute.route('admin.country.destroy'),
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
    _init: function () {},
    sort_country: function (obj,col) {
        var sort = $(obj).data('sort');
        switch (col) {
            case 'country_name':
                $("#sort_country_name").val(sort);
                $("#sort_country_code").val(null);
                $("#sort_country_status").val(null);
                break;
            case 'country_code':
                $("#sort_country_name").val(null);
                $("#sort_country_code").val(sort);
                $("#sort_country_status").val(null);
                break;
            case 'status':
                $("#sort_country_name").val(null);
                $("#sort_country_code").val(null);
                $("#sort_country_status").val(sort);
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
            url: laroute.route('admin.country.change-status'),
            dataType: 'JSON',
            method: 'POST',
            data: {
                country_id: id,
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
