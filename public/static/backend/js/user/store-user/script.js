let register = {
    _init: function () {
    },
    submit_index: function () {
        $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])[0-9a-zA-Z]{8,}$/i.test(value);
        });
        var form = $('#form-register');
        $.getJSON(laroute.route('user.validation'), function (json) {
            form.validate({
                rules: {
                    user_account: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    fullname: {
                        required: true,
                        maxlength: 50
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 20,
                        validatePassword: true,
                    },
                    password_confirm: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    user_account: {
                        required: json['store-user']['account_required'],
                        number: json['store-user']['account_invalid'],
                        minlength: json['store-user']['account_invalid'],
                        maxlength: json['store-user']['account_invalid']
                    },
                    fullname: {
                        required: json['store-user']['fullname_required'],
                        maxlength: json['store-user']['fullname_maxlength']
                    },
                    password: {
                        required: json['store-user']['password_required'],
                        minlength: json['store-user']['password_length'],
                        maxlength: json['store-user']['password_length'],
                        validatePassword: json['store-user']['password_validate']
                    },
                    password_confirm: {
                        required: json['store-user']['enter_comfirm_password'],
                        equalTo: json['store-user']['password_confirm_eq_pwd'],
                    }
                }
            });
            if (form.valid()) {
                swal.fire({
                    title: '',
                    timer: 120000,
                    onOpen: function () {
                        swal.showLoading();
                        let is_activated = 0;
                        if ($('#is_activated').is(':checked')) {
                            is_activated = 1;
                        }
                        $.ajax({
                            url: laroute.route('user.store-user.store'),
                            method: 'POST',
                            dataType: 'JSON',
                            data: {
                                phone: $('#user_account').val(),
                                fullname: $('#fullname').val(),
                                password: $('#password').val(),
                                is_activated: is_activated
                            },
                            success: function (res) {
                                if (res.error == false) {
                                    swal.fire(res.message, "", "success").then(function (result) {
                                        if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                            window.location.href = laroute.route('user.store-user');
                                        }
                                        if (result.value == true) {
                                            window.location.href = laroute.route('user.store-user');
                                        }
                                    });
                                } else {
                                    swal.fire(res.message, "", "error");
                                }
                            },
                            error: function (res) {
                                let mess_error = '';
                                $.map(res.responseJSON.errors, function (a) {
                                    mess_error = mess_error.concat(a + '<br/>');
                                });
                                swal.fire(json['store-user']['create_fail'], mess_error, "error");
                            }
                        })
                    }
                })
            }
        });
    },
    submit_load: function () {
        $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])[0-9a-zA-Z]{8,}$/i.test(value);
        });
        var form = $('#form-register');
        $.getJSON(laroute.route('user.validation'), function (json) {
            form.validate({
                rules: {
                    user_account: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    fullname: {
                        required: true,
                        maxlength: 50
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 20,
                        validatePassword: true,
                    },
                    password_confirm: {
                        required: true,
                        equalTo: "#password"
                    }
                },
                messages: {
                    user_account: {
                        required: json['store-user']['account_required'],
                        number: json['store-user']['account_invalid'],
                        minlength: json['store-user']['account_invalid'],
                        maxlength: json['store-user']['account_invalid']
                    },
                    fullname: {
                        required: json['store-user']['fullname_required'],
                        maxlength: json['store-user']['fullname_maxlength']
                    },
                    password: {
                        required: json['store-user']['password_required'],
                        minlength: json['store-user']['password_length'],
                        maxlength: json['store-user']['password_length'],
                        validatePassword: json['store-user']['password_validate']
                    },
                    password_confirm: {
                        required: json['store-user']['enter_comfirm_password'],
                        equalTo: json['store-user']['password_confirm_eq_pwd'],
                    }
                }
            });
            if (form.valid()) {
                swal.fire({
                    title: '',
                    timer: 120000,
                    onOpen: function () {
                        swal.showLoading();
                        let is_activated = 0;
                        if ($('#is_activated').is(':checked')) {
                            is_activated = 1;
                        }
                        $.ajax({
                            url: laroute.route('user.store-user.store'),
                            method: 'POST',
                            dataType: 'JSON',
                            data: {
                                phone: $('#user_account').val(),
                                fullname: $('#fullname').val(),
                                password: $('#password').val(),
                                is_activated: is_activated
                            },
                            success: function (res) {
                                if (res.error == false) {
                                    swal.fire(res.message, "", "success").then(function (result) {
                                        if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                            window.location.href = laroute.route('user.store-user.create');
                                        }
                                        if (result.value == true) {
                                            window.location.href = laroute.route('user.store-user.create');
                                        }
                                    });
                                } else {
                                    swal.fire(res.message, "", "error");
                                }
                            },
                            error: function (res) {
                                let mess_error = '';
                                $.map(res.responseJSON.errors, function (a) {
                                    mess_error = mess_error.concat(a + '<br/>');
                                });
                                swal.fire(json['store-user']['create_fail'], mess_error, "error");
                            }
                        })
                    }
                })
            }
        });
    },
};

let update = {
    _init: function () {
    },
    submit: function (id) {
        var form = $('#form-update');
        $.getJSON(laroute.route('user.validation'), function (json) {
            form.validate({
                rules: {
                    user_account: {
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    fullname: {
                        required: true,
                        maxlength: 50
                    }
                },
                messages: {
                    user_account: {
                        required: json['store-user']['account_required'],
                        number: json['store-user']['account_invalid'],
                        minlength: json['store-user']['account_invalid'],
                        maxlength: json['store-user']['account_invalid']
                    },
                    fullname: {
                        required: json['store-user']['fullname_required'],
                        maxlength: json['store-user']['fullname_maxlength']
                    }
                }
            });
            if (form.valid()) {
                swal.fire({
                    title: '',
                    timer: 120000,
                    onOpen: function () {
                        swal.showLoading();
                        let is_activated = 0;
                        if ($('#is_activated').is(':checked')) {
                            is_activated = 1;
                        }
                        $.ajax({
                            url: laroute.route('user.store-user.update'),
                            method: 'POST',
                            dataType: 'JSON',
                            data: {
                                phone: $('#user_account').val(),
                                fullname: $('#fullname').val(),
                                is_activated: is_activated,
                                user_id: id
                            },
                            success: function (res) {
                                if (res.error == false) {
                                    swal.fire(res.message, "", "success").then(function (result) {
                                        if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                            window.location.href = laroute.route('user.store-user');
                                        }
                                        if (result.value == true) {
                                            window.location.href = laroute.route('user.store-user');
                                        }
                                    });
                                } else {
                                    swal.fire(res.message, "", "error");
                                }
                            },
                            error: function (res) {
                                $.getJSON(laroute.route('user.validation'), function (json) {
                                    let mess_error = '';
                                    $.map(res.responseJSON.errors, function (a) {
                                        mess_error = mess_error.concat(a + '<br/>');
                                    });
                                    swal.fire(json['store-user']['update_fail'], mess_error, "error");
                                });

                            }
                        })
                    }
                })
            }
        });
    },
    updateStatus: function (id, obj) {
        let is_activated = 0;
        let o = $(obj);
        if ($(obj).is(':checked')) {
            is_activated = 1;
        }

        $.getJSON(laroute.route('user.validation'), function (json) {
            $.ajax({
                url: laroute.route('user.store-user.update-status'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    is_activated: is_activated,
                    user_id: id
                },
                success: function (res) {
                    if (res.error == true) {
                        if (is_activated) {
                            $(obj).attr('checked', '');
                        } else {
                            $(obj).attr('checked', 'checked');
                        }
                        swal.fire(res.message + '!', '', "error");
                    } else {
                        swal.fire(res.message + '!', '', "success");
                    }
                },
                error: function (res) {
                    let mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    if (is_activated) {
                        o.prop('checked', false);
                    } else {
                        o.prop('checked', true);
                    }
                    swal.fire(json['store-user']['update_fail'], mess_error, "error");
                }
            });
        });
    },
};

let remove = {
    click: function () {
        swal.fire({
            title: '',
            timer: 120000,
            onOpen: function () {
                swal.showLoading();
                $.ajax({
                    url: laroute.route('user.store-user.destroy'),
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        user_id: $('#user_id').val()
                    },
                    success: function (res) {
                        if (res.error == false) {
                            swal.close();
                            $('#kt_modal_confirm-remove-account').modal('toggle');
                            window.location.href = laroute.route('user.store-user');
                        } else {
                            swal.fire(res.message, "", "error");
                        }
                    },
                    error: function (res) {
                        let mess_error = '';
                        $.map(res.responseJSON.errors, function (a) {
                            mess_error = mess_error.concat(a + '<br/>');
                        });
                        swal.fire(remove_fail, mess_error, "error");
                    }
                });
            }
        })
    },
    showModalConfirm: function (id) {
        $('#kt_modal_confirm-remove-account').find('#user_id').val(id);
        $('#kt_modal_confirm-remove-account').modal();
    }
};

let index = {
    _init: function () {

        if ($('#sort_phone').val() == 'asc') {
            $('.sort_user_desc').show();
            $('.sort_user_asc').hide();
        } else {
            $('.sort_user_desc').hide();
            $('.sort_user_asc').show();
        }
    },
    sort_full_name: function (o) {
        let sort = $(o).data('sort');

        $("#sort_phone").val(sort);

        if ($('#sort_phone').val() == 'asc') {
            $('.sort_user_desc').show();
            $('.sort_user_asc').hide();
        } else {
            $('.sort_user_desc').hide();
            $('.sort_user_asc').show();
        }

        $('#form-filter').submit();
    },
};

let reset_password = {
    _init: function () {
    },
    select_reset_password: function (id) {
        $.ajax({
            url: laroute.route('user.store-user.show-reset-password'),
            method: 'POST',
            data: {
                user_id: id
            },
            success: function (res) {
                $('#kt_modal_reset_password').find('.modal-body .kt-scroll').html(res);
                $('#kt_modal_reset_password').modal();
            }
        });
    },
    autoGeneratePassword: function () {
        if ($('#is_auto_generate_pws').is(':checked')) {
            var password = Math.random()                        // Generate random number, eg: 0.123456
                .toString(36)           // Convert  to base-36 : "0.4fzyo82mvyr"
                .slice(-8);// Cut off last 8 characters : "yo82mvyr"
            $('#password').val(password);
        } else {
            $('#password').val('');
        }

    },
    show_password: function (inputId) {
        if ($(inputId).prop('type') == 'password') {
            $(inputId).prop('type', 'text');
        } else {
            $(inputId).prop('type', 'password');
        }
    },
    reset_password: function () {
        swal.fire({
            title: '',
            onOpen: function () {
                swal.showLoading();
                $.ajax({
                    url: laroute.route('user.store-user.reset-password'),
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        phone: $('#user_account').val(),
                        password: $('#password').val()
                    },
                    success: function (res) {
                        if (res.error == false) {
                            swal.close();
                            $('#kt_modal_reset_password').modal('toggle');
                            $('#kt_modal_reset_password_success').find('#phone').text(res.item['phone']);
                            $('#kt_modal_reset_password_success').find('#fullname').text(res.item['fullname']);
                            $('#kt_modal_reset_password_success').find('#password-label').val(res.item['password']);
                            $('#kt_modal_reset_password_success').modal();
                        } else {
                            swal.fire(res.message, "", "error");
                        }
                    },
                    error: function (res) {
                        let mess_error = '';
                        $.map(res.responseJSON.errors, function (a) {
                            mess_error = mess_error.concat(a + '<br/>');
                        });
                        $.getJSON(laroute.route('user.validation'), function (json) {
                            swal.fire(json['store-user']['update_fail'], mess_error, "error");
                        });
                    }
                })
            }
        })
    },
    copyToClipboard: function () {
        /* Get the text field */
        var copyText = document.getElementById("password-label");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");

    },
    closeModal: function (element) {
        $(element).modal('toggle');
    }
};

register._init();
index._init();
update._init();
reset_password._init();


var storeUser = {
    filter: function () {
        $('#form-filter').submit();
    },
    sort: function (o, col) {
        var sort = $(o).data('sort');
        switch (col) {
            case 'phone':
                $("#sort_user_phone").val(sort);
                $("#sort_user_fullname").val(null);
                $("#sort_user_is_activated").val(null);
                break;
            case 'fullname':
                $("#sort_user_phone").val(null);
                $("#sort_user_fullname").val(sort);
                $("#sort_user_is_activated").val(null);
                break;
            case 'status':
                $("#sort_user_phone").val(null);
                $("#sort_user_fullname").val(null);
                $("#sort_user_is_activated").val(sort);
                break;
        }
        storeUser.filter();
    }
};
