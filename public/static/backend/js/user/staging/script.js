var autoGeneratePassword = 0;
var is_change_pass = 0;
var staging = {
    change_status: function (id, obj) {
        var is_actived = 0;
        if ($(obj).is(':checked')) {
            is_actived = 1;
        }
        ;

        $.ajax({
            url: laroute.route('user.staging.change-status'),
            dataType: 'JSON',
            method: 'POST',
            data: {
                id: id,
                is_actived: is_actived
            },
            success: function (res) {
                if (res.error == false) {
                    swal.fire(CHANGE_STATUS_SUCCESS, "", "success")
                }
            }
        })
    },
    action: function (o) {
        var t = $(o);
        var userId = t.parents('.class-td').find('.id-my-user').val();

        if (t.val() == 'reset_password') {
            $.ajax({
                url: laroute.route('user.staging.show-reset-password'),
                method: 'POST',
                data: {
                    user_id: userId
                },
                success: function (res) {
                    $('#kt_modal_reset_password').find('.modal-body .kt-scroll').html(res);
                    $('#kt_modal_reset_password').modal();
                    $('#hidden-password').val(userId);
                }
            });
        } else if (t.val() == 'edit_user') {
            javascript:location.href = laroute.route('user.staging.edit', {id: userId});
        } else if (t.val() == 'delete_user') {
            swal.fire({
                title: "Bạn có muốn xóa tài khoản không?",
                buttonsStyling: false,
                showCloseButton: true,
                html: "Khi tài khoản bị xóa, tài khoản đó sẽ không thể khôi phục lại được." +
                "<br>" +
                "Bạn có chắc chắn muốn xóa tài khoản này không?",
                type: "danger",

                confirmButtonText: "Đồng ý xóa",
                confirmButtonClass: "btn btn-sm btn-default btn-bold",

                showCancelButton: true,
                cancelButtonText: "Không xóa",
                cancelButtonClass: "btn btn-sm btn-bold btn-brand"
            }).then(function (result) {
                if (result.value) {
                    javascript:location.href = laroute.route('user.staging.destroy', {id: userId});
                }
            });
        }
    },
    show_password: function (inputId) {
        if ($(inputId).prop('type') == 'password') {
            $(inputId).prop('type', 'text');
        } else {
            $(inputId).prop('type', 'password');
        }
    },
    autoGeneratePassword: function (o) {
        if ($(o).is(':checked')) {
            $('.append-password').empty();
            var tpl = $('#tpl-auto-password').html();
            $('.append-password').append(tpl)
            var password = Math.random()                        // Generate random number, eg: 0.123456
                .toString(36)           // Convert  to base-36 : "0.4fzyo82mvyr"
                .slice(-8);// Cut off last 8 characters : "yo82mvyr"
            $('#password').val(password);
            autoGeneratePassword = 1;
        } else {
            $('#password').val('');
            $('.append-password').empty();
            var tpl = $('#tpl-not-auto-password').html();
            $('.append-password').append(tpl);
            autoGeneratePassword = 0;
        }
    },
    createPasswordNew: function () {

        var is_activated = 0;
        if ($('#is_activateds').is(":checked")) {
            is_activated = 1;
        } else {
            is_activated = 0;
        }

        if (autoGeneratePassword == 0) {
            $('#form-reset-password').validate({
                rules: {
                    password2: {
                        required: true,
                        minlength: 8
                    },
                    confirm_password2: {
                        required: true,
                        equalTo: "#password2"
                    }
                },
                messages: {
                    password2: {
                        required: 'Vui lòng nhập mật khẩu',
                        minlength: 'Mật khẩu ít nhất 8 ký tự'
                    },
                    confirm_password2: {
                        required: 'Vui lòng xác nhận mật khẩu',
                        equalTo: "Vui lòng nhập lại xác nhận mật khẩu "
                    }
                },
                submitHandler: function () {
                    $.ajax({
                        url: laroute.route('user.staging.update-password'),
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            user_id: $('#hidden-password').val(),
                            is_change_pass: is_change_pass,
                            password: $('#password2').val()
                        },
                        success: function (res) {
                            if (res.error == false) {
                                swal.fire('Đổi mật khẩu thành công!', "", "success")
                            }
                        }
                    });
                }
            });
        } else {
            $('#form-reset-password').validate({
                rules: {
                    password: {
                        required: true
                    },
                },
                messages: {
                    password: {
                        required: 'Vui lòng nhập mật khẩu'
                    },
                },
                submitHandler: function () {
                    console.log(1111111, is_activated)
                    $.ajax({
                        url: laroute.route('user.staging.update-password'),
                        method: "POST",
                        dataType: "JSON",
                        data: {
                            user_id: $('#hidden-password').val(),
                            is_change_pass: is_change_pass,
                            password: $('#password').val()
                        },
                        success: function (res) {
                            if (res.error == false) {
                                swal.fire('Đổi mật khẩu thành công!', "", "success")
                            }
                        }
                    });
                }
            });
        }
    },
    isChangePass: function (o) {
        if ($(o).is(':checked')) {
            is_change_pass = 1;
        } else {
            is_change_pass = 0;
        }
    }
};
