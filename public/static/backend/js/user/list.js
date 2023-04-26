var heading;


var user = {
    _init: function () {
        $(document).ready(function () {
            $('#created_at').daterangepicker({
                buttonClasses: ' btn',
                applyClass: 'btn-primary',
                cancelClass: 'btn-secondary'
            });
            $('#created_at').val('');


        });

    },
    setHeading: function (arrHeading) {
        heading = arrHeading;
    },
    remove: function (obj, id) {
        // hightlight row
        $(obj).closest('tr').addClass('m-table__row--danger');

        swal.fire({
            title: 'Thông báo',
            text: "Bạn có muốn xóa không?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy',
            onClose: function () {
                // remove hightlight row
                $(obj).closest('tr').removeClass('m-table__row--danger');
            }
        }).then(function (result) {
            if (result.value) {
                $.post(laroute.route('user.remove', {id: id}), function () {
                    if ($('#lang_hide').val() == 'vi') {
                        swal.fire(
                            'Xóa thành công',
                            '',
                            'success'
                        );
                    }else{
                        swal.fire(
                            'Delete success!',
                            '',
                            'success'
                        );
                    }
                    // window.location.reload();
                    $('#autotable').PioTable('refresh');
                });
            }
        });

    },
};
user._init();

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


    let securePass;
    if ($('#lang_hide').val()=='en'){
        securePass='Password is not secure'
    } else {
        securePass='Mật khẩu chưa bảo mật'
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

user._init();
