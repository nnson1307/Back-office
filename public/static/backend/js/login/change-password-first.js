var changePwdFirst = {
    init: function () {

    },
    backToLogin: function () {
        window.location.href = 'logout';
    },
    submit: function () {
        var form = $('#frm-changepwd');
        $.validator.addMethod("validatePassword", function (value, element) {
            return this.optional(element) || /^(?=.*\d)(?=.*[a-z])[0-9a-zA-Z]{8,20}$/i.test(value);
        });
        $.getJSON(laroute.route('user.login.validation'), function (json) {
            form.validate({
                rules: {
                    currentpassword: {
                        required: true,
                        minlength: 8,
                        maxlength: 20
                    },
                    newpassword: {
                        required: true,
                        validatePassword: true,
                        minlength: 8,
                        maxlength: 20
                    },
                    confirmpassword: {
                        equalTo: "#newpassword",
                        required: true,
                        minlength: 8,
                        maxlength: 20
                    }
                },
                messages: {
                    currentpassword: {
                        required: json.PLEASE_ENTER_PASSWORD,
                        minlength: json.MIN_LENGTH,
                        maxlength: json.MAX_LENGTH
                    },
                    newpassword: {
                        required: json.PLEASE_ENTER_NEW_PASSWORD,
                        validatePassword: json.VALIDATE_PASSWORD,
                        minlength: json.MIN_LENGTH,
                        maxlength: json.MAX_LENGTH
                    },
                    confirmpassword: {
                        equalTo: json.WRONG_CONFIRM_PASSWORD,
                        required: json.PLEASE_ENTER_CONFIRM_PASSWORD,
                        minlength: json.MIN_LENGTH,
                        maxlength: json.MAX_LENGTH
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            form.submit();
        });

    }
};
