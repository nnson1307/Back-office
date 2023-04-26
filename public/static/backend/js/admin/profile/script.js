var profile = {
    _init: function () {

    },
    uploadAvatar: function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                // $('.kt-avatar__holder')
                //     .css('background-image', e.target.result);
                $('#logo-image').empty();
                var tpl = $('#logo-tpl').html();
                tpl = tpl.replace(/{link}/g, e.target.result);
                $('#logo-image').append(tpl);

            };
            reader.readAsDataURL(input.files[0]);
            var file_data = $('#profile_avatar').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            var fsize = input.files[0].size;
            var fileInput = input,
                file = fileInput.files && fileInput.files[0];
            var img = new Image();
            if (Math.round(fsize / 1024) <= 10240) {
                $('.error_img').text('');
                $.ajax({
                    url: laroute.route("admin.profile.upload-avatar"),
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (res) {
                        $('#avatar').val(res.file);
                    }
                });
            }
        }
    },
    save: function () {
        $.getJSON(laroute.route('admin.validation'), function (json) {
            // json.notification.update-success
            var form = $('#form-edit');

            form.validate({
                rules: {
                    full_name: {
                        required: true,
                        maxlength: 190
                    },
                    // email: {
                    //     required: true,
                    //     maxlength: 190
                    // },
                    phone: {
                        required: true,
                        number: true,
                        maxlength: 10
                    }
                },
                messages: {
                    full_name: {
                        required: json.profile.FULL_NAME_REQUIRED,
                        maxlength: json.profile.FULL_NAME_MAX
                    },
                    // email: {
                    //     required: json.profile.EMAIL_REQUIRED,
                    //     maxlength: json.profile.EMAIL_MAX
                    // },
                    phone: {
                        required: json.profile.PHONE_REQUIRED,
                        number: json.profile.PHONE_INT,
                        maxlength: json.profile.PHONE_MAX
                    },
                },
            });

            if (!form.valid()) {
                return false;
            }

            $.ajax({
                url: laroute.route('admin.profile.edit-profile'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    full_name: $('#full_name').val(),
                    // email: $('#email').val(),
                    phone: $('#phone').val(),
                    avatar: $('#avatar').val()
                },
                success: function (res) {
                    if (res.error == 0) {
                        swal.fire(json.profile.EDIT_SUCCESS, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.reload();
                            }
                            if (result.value == true) {
                                window.location.reload();
                            }
                        });
                    } else {
                        swal.fire(json.profile.EDIT_ERROR, res.message, "error");
                    }
                },
                error: function (res) {
                    if (res.responseJSON != undefined) {
                        var mess_error = '';
                        $.map(res.responseJSON.errors, function (a) {
                            mess_error = mess_error.concat(a + '<br/>');
                        });
                        swal.fire(json.profile.EDIT_ERROR, mess_error, "error");
                    }
                }
            });
        });
    },
    changePass: function () {
        $.getJSON(laroute.route('admin.validation'), function (json) {
            var form = $('#form-edit');

            form.validate({
                rules: {
                    current_pass: {
                        required: true,
                    },
                    new_pass: {
                        required: true,
                        minlength: 6
                    },
                    pass_confirm: {
                        required: true,
                        equalTo: "#new_pass"
                    }
                },
                messages: {
                    current_pass: {
                        required: json.change_pass.CURRENT_PASS_REQUIRED,
                    },
                    new_pass: {
                        required: json.change_pass.NEW_PASS_REQUIRED,
                        minlength: json.change_pass.NEW_PASS_MIN
                    },
                    pass_confirm: {
                        required: json.change_pass.CONFIRM_PASS_REQUIRED,
                        equalTo: json.change_pass.CONFIRM_PASS_NOT_SAME,
                    },
                },
            });

            if (!form.valid()) {
                return false;
            }

            $.ajax({
                url: laroute.route('admin.profile.submit-change-pass'),
                dataType: 'JSON',
                method: 'POST',
                data: {
                    current_pass: $('#current_pass').val(),
                    new_pass: $('#new_pass').val(),
                    pass_confirm: $('#pass_confirm').val(),
                },
                success:function (res) {
                    if (res.error == 0) {
                        swal.fire(json.change_pass.CHANGE_SUCCESS, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.reload();
                            }
                            if (result.value == true) {
                                window.location.reload();
                            }
                        });
                    } else {
                        swal.fire(json.change_pass.CHANGE_ERROR, res.message, "error");
                    }
                },
                error: function (res) {
                    if (res.responseJSON != undefined) {
                        var mess_error = '';
                        $.map(res.responseJSON.errors, function (a) {
                            mess_error = mess_error.concat(a + '<br/>');
                        });
                        swal.fire(json.change_pass.CHANGE_ERROR, mess_error, "error");
                    }
                }
            });
        });
    }
};