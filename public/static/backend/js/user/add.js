var heading;

var add={
    setHeading: function (arrHeading) {
        heading = arrHeading;
    },

    submit_add: function () {
        $('#form-add').validate({
            rules: {
                first_name: "required",
                last_name: "required",
                phone: {
                    required: true,
                    number: true,
                },
                email: "required",
                password: "pwcheck",
                password_confirm: {
                    required: true,
                    equalTo: "#password"
                },
            },
            messages: {
                first_name: {
                    required: heading.enter_first_name
                },
                last_name: {
                    required: heading.enter_last_name
                },
                phone: {
                    required: heading.enter_phone,
                    number: heading.not_phone
                },
                email: {
                    required: heading.enter_email
                },
                password: {
                    required: heading.enter_password
                },
                password_confirm: {
                    required: heading.enter_confirm_password,
                    equalTo: heading.equal_password
                }
            },
            submitHandler: function () {
                $.post(laroute.route('user.submitadd'), $('#form-add').serialize(), function (res) {
                    if (res.error == true) {
                        var mess_error = '';
                        $.map(res._error, function (a) {
                            mess_error = mess_error.concat(a + '<br/>');
                        });
                        if($('#lang_hide').val()=='vi'){
                            swal.fire("Thêm thất bại!", mess_error, "error");
                        }else{
                            swal.fire("Create fail!", mess_error, "error");
                        }
                    } else {

                        if($('#lang_hide').val()=='vi'){
                            swal.fire("Thêm thành công!", "", "success").then(function (result) {
                                if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                    window.location.href=laroute.route('user');
                                }
                                if (result.value == true) {
                                    window.location.href=laroute.route('user');
                                }
                            });
                        }else{
                            swal.fire("Create success!", "", "success").then(function (result) {
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
        });
    },
};

if ($.validator) {
    $.validator.addMethod("check_date_of_birth", function (value, element) {

        var day = $("#dob_day").val();
        var month = $("#dob_month").val();
        var year = $("#dob_year").val();
        var age = 18;

        var mydate = new Date();
        mydate.setFullYear(year, month - 1, day);

        var currdate = new Date();
        currdate.setFullYear(currdate.getFullYear() - age);

        return currdate > mydate;

    }, $('#youold').val());


    let securePass;
    if ($('#lang_hide').val()=='vi'){
        securePass='Mật khẩu chưa bảo mật';
    } else {
        securePass='Password is not secure';
    }
    $.validator.addMethod("pwcheck", function (pswd) {
        var rulePass = 0;
        //validate letter
        if (pswd.match(/[a-z]/)) {
            rulePass = rulePass + 1;
        }

        if (pswd.match(/[A-Z]/)) {
            rulePass = rulePass + 1;
        }
        if (pswd.match(/\d/)) {
            rulePass = rulePass + 1;
        }
        if (pswd.match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/)) {
            rulePass = rulePass + 1;
        }

        return rulePass >= 2;
    }, securePass);
}