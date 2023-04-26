"use strict";

// Class Definition
var KTLoginGeneral = function() {

    var login = $('#kt_login');

    var showErrorMsg = function(form, type, msg) {
        var alert = $('<div class="kt-alert kt-alert--outline alert alert-' + type + ' alert-dismissible" role="alert">\
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\
			<span></span>\
		</div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        //alert.animateClass('fadeIn animated');
        KTUtil.animateClass(alert[0], 'fadeIn animated');
        alert.find('span').html(msg);
    };

    // Private Functions
    var displaySignUpForm = function() {
        login.removeClass('kt-login--forgot');
        login.removeClass('kt-login--signin');

        login.addClass('kt-login--signup');
        KTUtil.animateClass(login.find('.kt-login__signup')[0], 'flipInX animated');
    };

    var displaySignInForm = function() {
        login.removeClass('kt-login--forgot');
        login.removeClass('kt-login--signup');

        login.addClass('kt-login--signin');
        KTUtil.animateClass(login.find('.kt-login__signin')[0], 'flipInX animated');
        //login.find('.kt-login__signin').animateClass('flipInX animated');
    };

    var displayForgotForm = function() {
        login.removeClass('kt-login--signin');
        login.removeClass('kt-login--signup');

        login.addClass('kt-login--forgot');
        //login.find('.kt-login--forgot').animateClass('flipInX animated');
        KTUtil.animateClass(login.find('.kt-login__forgot')[0], 'flipInX animated');

    };

    var handleFormSwitch = function() {
        $('#kt_login_forgot').click(function(e) {
            e.preventDefault();
            displayForgotForm();
        });

        $('#kt_login_forgot_cancel').click(function(e) {
            e.preventDefault();
            displaySignInForm();
        });

        $('#kt_login_signup').click(function(e) {
            e.preventDefault();
            displaySignUpForm();
        });

        $('#kt_login_signup_cancel').click(function(e) {
            e.preventDefault();
            displaySignInForm();
        });
    };

    var handleSignInFormSubmit = function(please_enter_email, please_enter_password) {
        $('#kt_login_signin_submit').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                }, messages: {
                    email: {
                        required: please_enter_email,
                        email: please_enter_email
                    },
                    password: {
                        required: please_enter_password
                    }
                }
            });

            if (!form.valid()) {
                return;
            }


            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                url: '',
                success: function(response, status, xhr, $form) {
                    if (response.error)
                    {
                        // similate 2s delay
                        setTimeout(function() {
                            btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                            showErrorMsg(form, 'danger', response.message);
                        }, 1000);
                    }
                    else
                    {
                        window.location = response.url;
                    }
                }
            });
        });
    };

    var handleSignUpFormSubmit = function() {
        $('#kt_login_signup_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    fullname: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    },
                    rpassword: {
                        required: true
                    },
                    agree: {
                        required: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                url: '',
                success: function(response, status, xhr, $form) {
                    // similate 2s delay
                    setTimeout(function() {
                        btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                        form.clearForm();
                        form.validate().resetForm();

                        // display signup form
                        displaySignInForm();
                        var signInForm = login.find('.kt-login__signin form');
                        signInForm.clearForm();
                        signInForm.validate().resetForm();

                        showErrorMsg(signInForm, 'success', 'Thank you. To complete your registration please check your email.');
                    }, 2000);
                }
            });
        });
    };

    // var handleForgotFormSubmit = function() {
    //     $('#kt_login_forgot_submit').click(function(e) {
    //         e.preventDefault();
    //
    //         var btn = $(this);
    //         var form = $(this).closest('form');
    //
    //         form.validate({
    //             rules: {
    //                 email: {
    //                     required: true,
    //                     email: true
    //                 }
    //             }
    //         });
    //
    //         if (!form.valid()) {
    //             return;
    //         }
    //
    //         btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
    //
    //         form.ajaxSubmit({
    //             url: '',
    //             success: function(response, status, xhr, $form) {
    //             	// similate 2s delay
    //             	setTimeout(function() {
    //             		btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false); // remove
    //                     form.clearForm(); // clear form
    //                     form.validate().resetForm(); // reset validation states
    //
    //                     // display signup form
    //                     displaySignInForm();
    //                     var signInForm = login.find('.kt-login__signin form');
    //                     signInForm.clearForm();
    //                     signInForm.validate().resetForm();
    //
    //                     showErrorMsg(signInForm, 'success', 'Cool! Password recovery instruction has been sent to your email.');
    //             	}, 2000);
    //             }
    //         });
    //     });
    // }

    // Public Functions
    return {
        please_enter_email: '',
        please_enter_password: '',
        // public functions
        init: function() {
            handleFormSwitch();
            handleSignInFormSubmit(this.please_enter_email, this.please_enter_password);
            handleSignUpFormSubmit();
            // handleForgotFormSubmit();
        }
    };
}();

var forgetPass={
    init:function () {
        $.getJSON(laroute.route('user.validation2'), function (json) {
            $('.error-email-reset').text('');
            var form=$('#form-reset');
            form.validate({
                rules: {
                    email_reset: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    email_reset: {
                        required: json.forget_password.PLEASE_EMAIL,
                        email: json.forget_password.EMAIL_FAIL_FORMAT
                    }
                }
            });
            if (form.valid()) {
                $('#submit-forget').addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);
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
    reset:function () {
        $('.error-email-reset').text('');
    }
};
$(document).ready(function () {
    // $('#submit-forget').click(function () {
    //     $.getJSON(laroute.route('user.validation2'), function (json) {
    //         $('#form-reset').validate({
    //             rules: {
    //                 email_reset: {
    //                     required: true,
    //                     email: true
    //                 }
    //             },
    //             messages: {
    //                 email_reset: {
    //                     required: json.forget_password.PLEASE_EMAIL,
    //                     email: json.forget_password.EMAIL_FAIL_FORMAT
    //                 }
    //             },
    //             submitHandler: function () {
    //
    //             }
    //         });
    //     });
    // });
});