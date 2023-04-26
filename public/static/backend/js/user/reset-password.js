var reset_password = {
    _init: function () {

    },
    submit_reset: function (id) {
        $('#form-reset').validate({
            rules: {
                password: "pwcheck",
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
            },
            messages: {
                password: {
                    required: $('#enterPass').val()
                },
                confirm_password: {
                    required: $('#xnmk').val(),
                    equalTo: $('#mkxnkcx').val()
                }
            },
            submitHandler: function () {
                $.ajax({
                    url: laroute.route('submit-reset-password'),
                    dataType: 'JSON',
                    method: 'POST',
                    data: {
                        password: $('#password').val(),
                        confirm_password: $('#confirm_password').val(),
                        id: id
                    },
                    success: function (res) {
                        if (res.error == true) {
                            var mess_error = '';
                            $.map(res._error, function (a) {
                                mess_error = mess_error.concat(a + '<br/>');
                            });
                            if ($('#lang_hide').val() == 'vi') {
                                swal.fire("Thay đổi mật khẩu thất bại!", mess_error, "error");
                            } else {
                                swal.fire("Change password fail!", mess_error, "error");
                            }
                        } else {
                            if ($('#lang_hide').val() == 'vi') {
                                swal.fire("Thay đổi mật khẩu thành công!", "", "success").then(function (result) {
                                    if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                        window.location.reload();
                                    }
                                    if (result.value == true) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                swal.fire("Change password success!", "", "success").then(function (result) {
                                    if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                        window.location.reload();
                                    }
                                    if (result.value == true) {
                                        window.location.reload();
                                    }
                                });
                            }
                        }


                    }
                });
            }
        });
    }
};
reset_password._init();

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


    // let securePass;
    // if ($('#lang_hide').val()=='en'){
    //     securePass='Password is not secure'
    // } else {
    //     securePass='Mật khẩu chưa bảo mật'
    // }
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
    }, $('#mkcbm').val());
}