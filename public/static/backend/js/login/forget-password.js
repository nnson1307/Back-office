var login = $('#kt_login');
var displayForgotForm = function () {
    login.removeClass('kt-login--signin');
    login.removeClass('kt-login--signup');

    login.addClass('kt-login--forgot');
    //login.find('.kt-login--forgot').animateClass('flipInX animated');
    KTUtil.animateClass(login.find('.kt-login__forgot')[0], 'flipInX animated');

};
var forgetPassword = {
    changePassword: function (token) {
        $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])[0-9a-zA-Z]{8,}$/i.test(value);
        });
        var form = $('#form-reset');
        $.getJSON(laroute.route('user.validation2'), function (json) {
            form.validate({
                rules: {
                    new_password: {
                        required: true,
                        minlength: 8,
                        maxlength: 20,
                        validatePassword: true,
                    },
                    confirm_new_password: {
                        required: true,
                        equalTo: '#new_password',
                    },
                },
                messages: {
                    new_password: {
                        required: json.forget_password.PLEASE_ENTER_PASSWORD,
                        minlength: json.forget_password.PASSWORD_LENGTH,
                        maxlength: json.forget_password.PASSWORD_LENGTH,
                        validatePassword: json.forget_password.PASSWORD_VALIDATE
                    },
                    confirm_new_password: {
                        equalTo: json.forget_password.PASSWORD_COMFIRM,
                        required: json.forget_password.ENTER_PASSWORD_COMFIRM
                    },
                    }
                });
            if (form.valid()) {
                $.ajax({
                    url: laroute.route('user.forget-password.submit-reset-password'),
                    method: "POST",
                    data: {
                        token: token,
                        password: $('#new_password').val()
                    },
                    success: function (res) {
                        if (res.error == false) {
                            swal.fire(json.forget_password.FORGET_PASSWORD_SUCCESS, "", "success").then(function (result) {
                                if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                    window.location.href = laroute.route('user.forget-password.forget-password-success');
                                }
                                if (result.value == true) {
                                    window.location.href = laroute.route('user.forget-password.forget-password-success');
                                }
                            });
                        } else {
                            swal.fire(res.data, "", "error");
                        }
                    }
                });
            }
        });
    },
    forgetPassword: function () {
        $('.remove-class').remove();
        displayForgotForm();
    },
    getPassword: function () {
        var form = $('#form-send-email');
        $.getJSON(laroute.route('user.validation2'), function (json) {
                form.validate({
                    rules: {
                        email_reset: {
                            required: true,
                            email: true
                        },
                    },
                    messages: {
                        email_reset: {
                            required: json.forget_password.PLEASE_EMAIL,
                            email: json.forget_password.EMAIL_FAIL_FORMAT
                        },
                    }
                });
            if (form.valid()) {
                $('#submit-forget').addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
                $('.error-email-reset').text('');
                $.ajax({
                    url: laroute.route('user.forget-password.send-email-reset-password'),
                    dataType: 'JSON',
                    method: 'POST',
                    data: {
                        email_reset: $('#email_reset').val(),
                    },
                    success: function (res) {
                        $('#submit-forget').addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                        $('#submit-forget').removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light');
                        if (res.error == false) {
                            $('.error-email-reset').text('');
                            swal.fire(json.forget_password.SEND_EMAIL_SUCCESS, "", "success");
                        } else {
                            $('.error-email-reset').text(json.forget_password.EMAIL_NOT_EXIST);
                        }
                    }
                });
            }
        });
    },
    proceedToLogin:function () {
        javascript:location.href = laroute.route('login');
    },
    reset:function () {
        $('.error-email-reset').text('');
    }
};

$(document).ready(function () {
    $('#submit-forget').click(function () {

    });
});
