var edit = {
    _init: function () {
        $(document).ready(function () {

        });
        $('.kt-selectpicker').selectpicker();

    },
    submit_edit: function (id) {
        $.ajax({
            url: laroute.route('user.submit-profile'),
            method: 'POST',
            dataType: 'JSON',
            data: {
                id: id,
                avatar: $('#avatar').val(),
                first_name: $('#first_name').val(),
                last_name: $('#last_name').val(),
                day: $('#day').val(),
                month: $('#month').val(),
                year: $('#year').val(),
                phone: $('#phone').val(),
                country: $('#country').val(),
                organize_avatar: $('#organize_avatar').val(),
                email: $('#email').val(),
                organize_name: $('#organize_name').val()
            },
            success: function (res) {
                if (res.error == true) {
                    var mess_error = '';
                    $.map(res._error, function (a) {
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    if ($('#lang_hide').val() == 'en') {
                        swal.fire("Update fail!", mess_error, "error");
                    } else {
                        swal.fire("Chỉnh sửa thất bại!", mess_error, "error");
                    }
                } else {
                    if ($('#lang_hide').val() == 'en') {
                        swal.fire("Update success!", "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('user');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('user');
                            }
                        });
                    } else {
                        swal.fire("Chỉnh sửa thành công!", "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.href = laroute.route('user');
                            }
                            if (result.value == true) {
                                window.location.href = laroute.route('user');
                            }
                        });
                    }
                }
            }
        });
    },
    submit_password_profile: function (id) {
        $('#form-password').validate({
            rules: {
                current_password: "required",
                password: "pwcheck",
                password_confirm: {
                    required: true,
                    equalTo: "#password"
                },

            },
            messages: {
                password_confirm: {
                    required: 'Hãy nhập lại mật khẩu',
                    equalTo: 'Nhập lại mật khẩu không đúng'
                },
                current_password: {
                    required: 'Hãy nhập mật khẩu hiện tại'
                }
            },
            submitHandler: function () {
                $.ajax({
                    url: laroute.route('user.submit-new-password-profile'),
                    dataType: 'JSON',
                    method: 'POST',
                    data: {
                        id: id,
                        password: $('#password').val(),
                        password_confirm: $('#password_confirm').val(),
                        current_password: $('#current_password').val()
                    },
                    success: function (res) {
                        if (res.error == true) {
                            swal.fire("Chỉnh sửa thất bại!", res.message, "error");
                        } else {
                            swal.fire("Chỉnh sửa thành công!", "", "success").then(function (result) {
                                if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                    window.location.href = laroute.route('user');
                                }
                                if (result.value == true) {
                                    window.location.href = laroute.route('user');
                                }
                            });
                        }
                    }
                });
            }

        });
    },
    change_verify:function (id,is_auth) {
       $.ajax({
          url:laroute.route('user.change-verify'),
          method:'POST',
          dataType:'JSON',
          data:{
              id:id,
              is_auth:is_auth
          },
          success:function (res) {
              if (res.error == true) {
                  swal.fire("Chỉnh sửa thất bại!", '', "error");
              } else {
                  swal.fire("Chỉnh sửa thành công!", "", "success").then(function (result) {
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
};
edit._init();

function uploadImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var imageAvatar = $('#avatar');
        reader.onload = function (e) {
            // $('.kt-avatar__holder')
            //     .css('background-image', e.target.result);
            $('#background-image').empty();
            var tpl = $('#background-image-tpl').html();
            tpl = tpl.replace(/{link}/g, e.target.result);
            $('#background-image').append(tpl);

        };
        reader.readAsDataURL(input.files[0]);
        var file_data = $('#getFile').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        var fsize = input.files[0].size;
        var fileInput = input,
            file = fileInput.files && fileInput.files[0];
        var img = new Image();

        img.src = window.URL.createObjectURL(file);

        img.onload = function () {
            var imageWidth = img.naturalWidth;
            var imageHeight = img.naturalHeight;

            window.URL.revokeObjectURL(img.src);

            $('.image-size').text(imageWidth + "x" + imageHeight + "px");

        };
        $('.image-capacity').text(Math.round(fsize / 1024) + 'kb');

        $('.image-format').text(input.files[0].name.split('.').pop().toUpperCase());

        if (Math.round(fsize / 1024) <= 10240) {
            $('.error_img').text('');
            $.ajax({
                url: laroute.route("user.upload"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.success == 1) {
                        $('#avatar').val(res.file);
                    }
                }
            });
        } else {
            $('.error_img').text('Hình ảnh vượt quá dung lượng cho phép');
        }

    }
}

function uploadOrganize(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var imageAvatar = $('#avatar');
        reader.onload = function (e) {
            // $('.kt-avatar__holder')
            //     .css('background-image', e.target.result);
            $('#background-organize-image').empty();
            var tpl = $('#background-image-tpl').html();
            tpl = tpl.replace(/{link}/g, e.target.result);
            $('#background-organize-image').append(tpl);

        };
        reader.readAsDataURL(input.files[0]);
        var file_data = $('#getFileOrganize').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        var fsize = input.files[0].size;
        var fileInput = input,
            file = fileInput.files && fileInput.files[0];
        var img = new Image();

        img.src = window.URL.createObjectURL(file);

        img.onload = function () {
            var imageWidth = img.naturalWidth;
            var imageHeight = img.naturalHeight;

            window.URL.revokeObjectURL(img.src);

            $('.image-size').text(imageWidth + "x" + imageHeight + "px");

        };
        $('.image-capacity').text(Math.round(fsize / 1024) + 'kb');

        $('.image-format').text(input.files[0].name.split('.').pop().toUpperCase());

        if (Math.round(fsize / 1024) <= 10240) {
            $('.error_img').text('');
            $.ajax({
                url: laroute.route("user.upload"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.success == 1) {
                        $('#organize_avatar').val(res.file);
                    }
                }
            });
        } else {
            $('.error_img').text('Hình ảnh vượt quá dung lượng cho phép');
        }

    }
}

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

    }, "Bạn phải trên 18 tuổi.");

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
    }, 'Mật khẩu chưa bảo mật');
}

edit._init()
