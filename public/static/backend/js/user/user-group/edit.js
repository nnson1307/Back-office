$('.select-2').select2();
var userGroupAuto = {
    addConditionA: function () {

        var flag = true;
        var arrayCondition = [0];
        $('.condition-A').each(function () {
            var id = $(this).val();
            if (id == '') {
                flag = false;
            } else {
                arrayCondition.push(id);
            }
        });
        if (flag == true) {
            $('.condition-A').prop('disabled', true);
            $.ajax({
                url: laroute.route('user.user-group-notification.get-condition'),
                method: "POST",
                data: {arrayCondition: arrayCondition},
                success: function (res) {
                    if (res != '') {
                        var option = "";
                        $.each(res, function (index, element) {
                            option += '<option value="' + element.id + '">' + element.name + '</option>';
                        });
                        var tpl = $('#condition-A-tpl').html();
                        tpl = tpl.replace(/{option}/g, option);
                        $('.div-A-condition').append(tpl);
                        $('.select-2').select2();
                    }
                }
            });
        }
    },
    removeConditionA: function (t) {
        $(t).closest('.div-A-1-condition').remove();
    },
    chooseConditionA: function (t) {
        var val = $(t).val();
        if (val == 1) {
            $.ajax({
                url: laroute.route('user.user-group-notification.get-user-group'),
                method: "POST",
                data: {},
                success: function (res) {
                    if (res != '') {
                        var option = "";
                        $.each(res, function (index, element) {
                            option += '<option value="' + element.id + '">' + element.name + '</option>';
                        });
                        $(t).parents('.div-A-1-condition').find('.div-content-condition').empty();
                        var tpl = $('#condition-A-1-tpl').html();
                        tpl = tpl.replace(/{option}/g, option);
                        $(t).parents('.div-A-1-condition').find('.div-content-condition').append(tpl);
                        $('.select-2').select2();
                        $(".day-A").inputmask({
                            "mask": "9",
                            "repeat": 10,
                            "greedy": false
                        });
                    }else {
                        var option = "";
                        $(t).parents('.div-A-1-condition').find('.div-content-condition').empty();
                        var tpl = $('#condition-A-1-tpl').html();
                        tpl = tpl.replace(/{option}/g, option);
                        $(t).parents('.div-A-1-condition').find('.div-content-condition').append(tpl);
                        $('.select-2').select2();
                        $(".day-A").inputmask({
                            "mask": "9",
                            "repeat": 10,
                            "greedy": false
                        });
                    }
                }
            });

        } else if (val == 2 || val == 3 || val == 4) {
            $(t).parents('.div-A-1-condition').find('.div-content-condition').empty();
            var tpl = $('#condition-A-2-3-4-tpl').html();
            $(t).parents('.div-A-1-condition').find('.div-content-condition').append(tpl);
            $(".day-A").inputmask({
                "mask": "9",
                "repeat": 10,
                "greedy": false
            });
        } else if (val == 5) {
            $(t).parents('.div-A-1-condition').find('.div-content-condition').empty();
            var tpl = $('#condition-A-5-tpl').html();
            $(t).parents('.div-A-1-condition').find('.div-content-condition').append(tpl);
            $(".day-A").inputmask({
                "mask": "9",
                "repeat": 10,
                "greedy": false
            });
        }
        $('.select-2').select2();
        $(".day-A").inputmask({
            "mask": "9",
            "repeat": 10,
            "greedy": false
        });
    },
    addConditionB: function () {
        var flag = true;
        var arrayCondition = [0];
        $('.condition-B').each(function () {
            var id = $(this).val();
            if (id == '') {
                flag = false;
            } else {
                arrayCondition.push(id);
            }
        });
        if (flag == true) {
            $('.condition-B').prop('disabled', true);
            $.ajax({
                url: laroute.route('user.user-group-notification.get-condition'),
                method: "POST",
                data: {arrayCondition: arrayCondition},
                success: function (res) {
                    if (res != '') {
                        var option = "";
                        $.each(res, function (index, element) {
                            option += '<option value="' + element.id + '">' + element.name + '</option>';
                        });
                        var tpl = $('#condition-B-tpl').html();
                        tpl = tpl.replace(/{option}/g, option);
                        $('.div-B-condition').append(tpl);
                        $('.select-2').select2();
                    }
                }
            });
        }
    },
    removeConditionB: function (t) {
        $(t).closest('.div-B-1-condition').remove();
    },
    chooseConditionB: function (t) {
        var val = $(t).val();
        if (val == 1) {
            $.ajax({
                url: laroute.route('user.user-group-notification.get-user-group'),
                method: "POST",
                data: {},
                success: function (res) {
                    if (res != '') {
                        var option = "";
                        $.each(res, function (index, element) {
                            option += '<option value="' + element.id + '">' + element.name + '</option>';
                        });
                        $(t).parents('.div-B-1-condition').find('.div-content-condition').empty();
                        var tpl = $('#condition-A-1-tpl').html();
                        tpl = tpl.replace(/{option}/g, option);
                        $(t).parents('.div-B-1-condition').find('.div-content-condition').append(tpl);
                        $('.select-2').select2();
                        $(".day-B").inputmask({
                            "mask": "9",
                            "repeat": 10,
                            "greedy": false
                        });
                    }else {
                        var option = "";
                        $(t).parents('.div-B-1-condition').find('.div-content-condition').empty();
                        var tpl = $('#condition-A-1-tpl').html();
                        tpl = tpl.replace(/{option}/g, option);
                        $(t).parents('.div-B-1-condition').find('.div-content-condition').append(tpl);
                        $('.select-2').select2();
                        $(".day-B").inputmask({
                            "mask": "9",
                            "repeat": 10,
                            "greedy": false
                        });
                    }
                }
            });

        } else if (val == 2 || val == 3 || val == 4) {
            $(t).parents('.div-B-1-condition').find('.div-content-condition').empty();
            var tpl = $('#condition-B-2-3-4-tpl').html();
            $(t).parents('.div-B-1-condition').find('.div-content-condition').append(tpl);
            $(".day-B").inputmask({
                "mask": "9",
                "repeat": 10,
                "greedy": false
            });
        } else if (val == 5) {
            $(t).parents('.div-B-1-condition').find('.div-content-condition').empty();
            var tpl = $('#condition-B-5-tpl').html();
            $(t).parents('.div-B-1-condition').find('.div-content-condition').append(tpl);
            $(".day-B").inputmask({
                "mask": "9",
                "repeat": 10,
                "greedy": false
            });
        }
        $('.select-2').select2();
        $(".day-B").inputmask({
            "mask": "9",
            "repeat": 10,
            "greedy": false
        });
    },
    save: function (id) {
        //Nếu số ngày rỗng thì set mặc định là 30 ngày
        $('.day-A').each(function () {
            if ($(this).val() == "") {
                $(this).val(30);
            }
        });
        //Nếu số ngày rỗng thì set mặc định là 30 ngày
        $('.day-B').each(function () {
            if ($(this).val() == "") {
                $(this).val(30);
            }
        });

        var name = $('#name');
        //Bao gồm những người đáp ứng.
        var andOrA = $('#A-or-and').val();

        //Loại bỏ những người đáp ứng.
        var andOrB = $('#B-or-and').val();
        //Đếm số phần tử của bao gồm và loại bỏ.
        var countA = 0;
        var countB = 0;
        //Kết quả của A.
        var arrayResultA = [];
        $('.A-condition-1').each(function () {
            countA ++;
            var temp = {};
            var condition = $(this).find('.condition-A').val();

            temp.condition_id = condition;
            if (condition != 5) {
                if (condition == 1) {
                    temp.value1 = $(this).find('.select-user-group').val();
                } else {
                    temp.value1 = $(this).find('.day-A').val();
                }
                temp.value2 = '';
            } else if (condition == 5) {
                temp.value1 = $(this).find('.most-pt-A').val();
                temp.value2 = $(this).find('.day-A').val();
            }
            arrayResultA.push(temp);
        });

        //Kết quả của B.
        var arrayResultB = [];
        $('.B-condition-1').each(function () {
            countB ++;
            var temp = {};
            var condition = $(this).find('.condition-B').val();

            temp.condition_id = condition;

            if (condition != 5) {
                if (condition == 1) {
                    temp.value1 = $(this).find('.select-user-group').val();
                } else {
                    temp.value1 = $(this).find('.day-B').val();
                }
                temp.value2 = '';
            } else if (condition == 5) {
                temp.value1 = $(this).find('.most-pt-B').val();
                temp.value2 = $(this).find('.day-B').val();
            }
            arrayResultB.push(temp);
        });

        var flag2 = true;
        if (countA == 0 && countB == 0) {
            flag2 = false;
        } else {
            // if ($('*').hasClass('select-user-group')) {
            //     var co = 0;
            //     $(".select-user-group").each(function () {
            //         if ($(this).val() == '') {
            //             co ++;
            //             if (co > 1) {
            //                 flag2 = false;
            //             }
            //         }
            //     });
            // }
        }

        $.getJSON(laroute.route('user.validation'), function (json) {
            if (flag2 == false) {
                swal.fire(json.user_group.TB, json.user_group.PLEASE_ENTER_CONDITION, "error");
                return false;
            }

            var flag = true;
            if (name.val() == '') {
                flag = false;
                $('.error-name').text(json.user_group.PLEASE_ENTER_NAME);
            } else {
                if (name.val().length > 255) {
                    flag = false;
                    $('.error-name').text(json.user_group.NAME_LENGTH);
                } else {
                    flag = true;
                    $('.error-name').text('');
                }
            }
            if (flag == true) {
                $.ajax({
                    url: laroute.route('user.user-group-notification.update-auto'),
                    method: "POST",
                    data: {
                        name: name.val(),
                        arrayResultA: arrayResultA,
                        arrayResultB: arrayResultB,
                        andOrA: andOrA,
                        andOrB: andOrB,
                        id: id
                    },
                    success: function (res) {
                        if (res.error == false) {
                            let mess = '';
                            $.map(res.message, function (a) {
                                mess = mess.concat(a + '<br/>');
                            });
                            swal.fire(mess, "", "success").then(function (result) {
                                if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                    window.location.href = laroute.route('user.user-group-notification');
                                }
                                if (result.value == true) {
                                    window.location.href = laroute.route('user.user-group-notification');
                                }
                            });
                        } else {
                            swal.fire(json.user_group.ADD_FAIL, res.message, "error");
                        }
                    },
                    error: function (res) {
                        let mess_error = '';
                        $.map(res.responseJSON.errors, function (a) {
                            mess_error = mess_error.concat(a + '<br/>');
                        });
                        swal.fire(json.user_group.EDIT_FAIL, mess_error, "error");
                    }
                });
            }
        });
    },
    computeUserInUserGroupAuto:function (id) {
        $.ajax({
            url: laroute.route('user.user-group-notification.compute-user-in-user-group-auto'),
            method: "POST",
            data: {
                id: id
            },
            success: function (res) {
                if (res.error == false) {

                }
            },
            error: function (res) {
                let mess_error = '';
                $.map(res.responseJSON.errors, function (a) {
                    mess_error = mess_error.concat(a + '<br/>');
                });
                // swal.fire(json.user_group.EDIT_FAIL, mess_error, "error");
            }
        });
    }
};
$(".day-A").inputmask({
    "mask": "9",
    "repeat": 10,
    "greedy": false
});
$(".day-B").inputmask({
    "mask": "9",
    "repeat": 10,
    "greedy": false
});



