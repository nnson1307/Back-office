$('.select-2').select2();

var arrayAccount = [];
var arrayAccount2 = [];
var arrayAccountRemove = [];

var userGroupDefine = {
    removeRow: function (t) {
        $(t).parentsUntil('tbody').remove();
    },
    removeRowTr: function (t, phone, page) {
        if (jQuery.inArray(phone, arrayAccount) !== -1) {
            arrayAccount = jQuery.grep(arrayAccount, function (value) {
                return value != phone;
            });
        }
        pageClick3(page);
        $(t).closest('tr').remove();
    },
    showModalAddUser: function () {
        $('#modal-add-user').modal('show');
        $('.select-2').select2();
    },
    searchAddUser: function () {
        var user = $('#modal-add-user-2 #user').val();
        var fullName = $('#modal-add-user-2 #full_name').val();
        var isActive = $('#modal-add-user-2 #is_actived').val();
        $.ajax({
            url: laroute.route('user.user-group-notification.search-all-user'),
            method: "POST",
            async: false,
            data: {
                user: user,
                fullName: fullName,
                isActive: isActive,
            },
            success: function (res) {
                $('#modal-add-user-2 #table-list-user').empty();
                $('#modal-add-user-2 #table-list-user').append(res.view);
            }
        });
    },
    selectAll1: function (t) {
        if ($(t).is(":checked")) {
            $('.check-box-choose-user1').prop('checked', true);
            $('.check-box-choose-user1').each(function () {
                var phone = $(this).parents('label').find('.phone-1').val();
                if (jQuery.inArray(phone, arrayAccount) === -1) {
                    arrayAccount.push(phone)
                }
            });
        } else {
            $('.check-box-choose-user1').prop('checked', false);

            $('.check-box-choose-user1').each(function () {
                var phone = $(this).parents('label').find('.phone-1').val();
                if (jQuery.inArray(phone, arrayAccount) !== -1) {
                    arrayAccount = jQuery.grep(arrayAccount, function (value) {
                        return value != phone;
                    });
                }
            });

        }
    },
    selectAll2: function (t) {
        if ($(t).is(":checked")) {
            $('.check-box-choose-user').prop('checked', true);
            $('.check-box-choose-user').each(function () {
                var phone = $(this).parents('label').find('.phone-2').val();
                if (jQuery.inArray(phone, arrayAccount2) === -1) {
                    arrayAccount2.push(phone)
                }
            });
        } else {
            $('.check-box-choose-user').prop('checked', false);

            $('.check-box-choose-user').each(function () {
                var phone = $(this).parents('label').find('.phone-2').val();
                if (jQuery.inArray(phone, arrayAccount2) !== -1) {
                    arrayAccount2 = jQuery.grep(arrayAccount2, function (value) {
                        return value != phone;
                    });
                }
            });

        }
    },
    showModalImportExcel: function () {
        $('#import-excel').modal('show');
        $('#modal-add-user').modal('hide');
    },
    showNameFile: function () {
        var fileNamess = $('input[type=file]').val();
        $('#show').val(fileNamess);
    },
    import: function () {
        $.getJSON(laroute.route('user.validation'), function (json) {
            if ($('#show').val() == '') {
                $('.error-input-excel').text(json.user_group.PLEASE_ENTER_FILE);
            } else {
                $('.error-input-excel').text('');
                swal.fire({
                    title: '',
                    timer: 12000,
                    onOpen: function () {
                        swal.showLoading();
                        var file_data = $('#file_excel').prop('files')[0];
                        var form_data = new FormData();
                        form_data.append('file', file_data);
                        $.ajax({
                            url: laroute.route("user.user-group-notification.read-excel"),
                            method: "POST",
                            data: form_data,
                            contentType: false,
                            cache: false,
                            processData: false,
                            async: false,
                            success: function (res) {
                                if (res.success == 10) {
                                    swal.fire(json.user_group.IMPORT_FAIL, '', "error");
                                } else {
                                    swal.hideLoading();
                                    var success = 0;
                                    $.map(res.arrayPhone, function (value, key) {
                                        if (jQuery.inArray(value, arrayAccount) === -1) {
                                            success += 1;
                                            arrayAccount.push(value);
                                        }
                                    });
                                    userGroupDefine.searchWhereInUser(arrayAccount);
                                    let mess = '';
                                    mess = mess.concat(json.user_group.QUANTITY_USER_IMPORT_SUCCESS + (success) + '<br/>');
                                    mess = mess.concat(json.user_group.QUANTITY_USER_IMPORT_FAIL + (res.total - success) + '<br/>');
                                    swal.fire(json.user_group.IMPORT_SUCCESS, mess, "success");
                                }
                            }
                        });
                    }
                });
            }
        });
    },
    searchWhereInUser: function (arrayUser, phone, fullName, isActive) {
        $.ajax({
            url: laroute.route('user.user-group-notification.search-where-in-user'),
            method: "POST",
            async: false,
            data: {
                arrayUser: arrayUser,
                phone: phone,
                fullName: fullName,
                isActive: isActive,

            },
            success: function (res) {
                $('#modal-add-user #table-list-user').empty();
                $('#modal-add-user #table-list-user').append(res);
                $('#import-excel').modal('hide');
                $('.check-box-choose-user1').each(function () {
                    var p = $(this).parents('label').find('.phone-1').val();
                    if (jQuery.inArray(p, arrayAccountRemove) !== -1) {
                        $(this).prop('checked', false);
                    }
                });
            }
        });
    },
    showModalAddUser2: function () {
        //Show modal thêm user 2 (Thêm user từ db)
        userGroupDefine.searchAddUser();

        $('#modal-add-user-2').modal('show');
        $('#modal-add-user').modal('hide');
    },
    chooseUser1: function (t) {
        if ($(t).is(":checked")) {
            var phone = $(t).parents('label').find('.phone-1').val();
            if (jQuery.inArray(phone, arrayAccount) === -1) {
                arrayAccount.push(phone)
            }

            if (jQuery.inArray(phone, arrayAccountRemove) !== -1) {
                arrayAccountRemove = jQuery.grep(arrayAccountRemove, function (value) {
                    return value != phone;
                });
            }
        } else {
            var phone = $(t).parents('label').find('.phone-1').val();
            if (jQuery.inArray(phone, arrayAccount) !== -1) {
                arrayAccount = jQuery.grep(arrayAccount, function (value) {
                    return value != phone;
                });
            }
            if (jQuery.inArray(phone, arrayAccountRemove) === -1) {
                arrayAccountRemove.push(phone)
            }
        }

    },
    chooseUser2: function (t) {
        if ($(t).is(":checked")) {
            var phone = $(t).parents('label').find('.phone-2').val();
            if (jQuery.inArray(phone, arrayAccount2) === -1) {
                arrayAccount2.push(phone)
            }
        } else {
            var phone = $(t).parents('label').find('.phone-2').val();
            if (jQuery.inArray(phone, arrayAccount2) !== -1) {
                arrayAccount2 = jQuery.grep(arrayAccount2, function (value) {
                    return value != phone;
                });
            }
        }
    },
    addUser2: function () {
        $.map(arrayAccount2, function (value, key) {
            if (jQuery.inArray(value, arrayAccount) === -1) {
                arrayAccount.push(value);
            }
        });
        userGroupDefine.searchWhereInUser(arrayAccount, '', '', '');
        $('#modal-add-user-2').modal('hide');
    },
    searchPopup1: function () {
        var phone = $('#modal-add-user #user1').val();
        var fullName = $('#modal-add-user #full_name1').val();
        var isActive = $('#modal-add-user #is_actived1').val();
        userGroupDefine.searchWhereInUser(arrayAccount, phone, fullName, isActive);
    },
    addUserGroupDefine: function () {
        $.map(arrayAccount, function (value, key) {
            if (jQuery.inArray(value, arrayAccountRemove) !== -1) {
                arrayAccount = jQuery.grep(arrayAccount, function (a) {
                    return a != value;
                });
            }
        });

        $.ajax({
            url: laroute.route('user.user-group-notification.add-user-group-define'),
            method: "POST",
            data: {arrayAccount: arrayAccount},
            success: function (res) {
                $('.table-list-user-group-define').empty();
                $('.table-list-user-group-define').append(res);
                $('#modal-add-user').modal('hide');
            }
        });
    },
    searchUserDefine: function () {
        var phone = $('#define_phone').val();
        var fullName = $('#define_full_name').val();
        var isActive = $('#define_is_actived').val();
        $.ajax({
            url: laroute.route('user.user-group-notification.add-user-group-define'),
            method: "POST",
            data: {
                phone: phone,
                fullName: fullName,
                isActive: isActive,
                arrayAccount: arrayAccount,
            },
            success: function (res) {
                $('.table-list-user-group-define').empty();
                $('.table-list-user-group-define').append(res);
                $('#modal-add-user').modal('hide');
            }
        });
    },
    save: function () {
        $.getJSON(laroute.route('user.validation'), function (json) {
            var name = $('#name').val();
            var error = $('.error-name');

            if (name == '') {
                error.text(json.user_group.PLEASE_ENTER_NAME);
            } else {
                if (name.length > 255) {
                    error.text(json.user_group.NAME_LENGTH);
                } else {
                    error.text('');
                    if (arrayAccount.length == 0) {
                        swal.fire(json.user_group.TB, json.user_group.PLEASE_CUSTOMER, "error");
                    } else {
                        $.ajax({
                            url: laroute.route('user.user-group-notification.update-user-define'),
                            method: "POST",
                            data: {
                                id: $('#user_group_id').val(),
                                name: name,
                                arrayAccount: arrayAccount
                            },
                            success: function (res) {
                                if (res.error == false) {
                                    let mess = '';
                                    $.map(res.message, function (a) {
                                        mess = mess.concat(a + '<br/>');
                                    });
                                    swal.fire(json.user_group.ADD_SUCCESS, mess, "success").then(function (result) {
                                        if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                            window.location.href = laroute.route('user.user-group-notification');
                                        }
                                        if (result.value == true) {
                                            window.location.href = laroute.route('user.user-group-notification');
                                        }
                                    });
                                }
                            },
                            error: function (res) {
                                let mess_error = '';
                                $.map(res.responseJSON.errors, function (a) {
                                    mess_error = mess_error.concat(a + '<br/>');
                                });
                                swal.fire(json.user_group.ADD_FAIL, mess_error, "error");
                            }
                        });
                    }
                }
            }
        });
    },
    init: function () {
        $.ajax({
            url: laroute.route('user.user-group-notification.get-user-by-group-define'),
            method: "POST",
            data: {
                id: $('#user_group_id').val()
            },
            success: function (res) {

                $.map(res, function (value, key) {
                    if (jQuery.inArray(value, arrayAccount) === -1) {
                        arrayAccount.push(value.phone);
                    }
                });
                userGroupDefine.searchUserDefine();
            }
        });
    }
};
userGroupDefine.init();
$('#import-excel').on('hidden.bs.modal', function () {
    $('#modal-add-user').modal('show');
    $('.select-2').select2();
});
$('#modal-add-user-2').on('hidden.bs.modal', function () {
    $('#modal-add-user').modal('show');
    $('.select-2').select2();
});


function pageClick2(page) {
    var user = $('#modal-add-user-2 #user').val();
    var fullName = $('#modal-add-user-2 #full_name').val();
    var isActive = $('#modal-add-user-2 #is_actived').val();
    $.ajax({
        url: laroute.route('user.user-group-notification.search-all-user'),
        method: "POST",
        async: false,
        data: {
            user: user,
            fullName: fullName,
            isActive: isActive,
            page: page
        },
        success: function (res) {
            $('#modal-add-user-2 #table-list-user').empty();
            $('#modal-add-user-2 #table-list-user').append(res.view);
            $('.check-box-choose-user').each(function () {
                var phone = $(this).parents('label').find('.phone-2').val();
                if (jQuery.inArray(phone, arrayAccount2) !== -1) {
                    $(this).prop('checked', true);
                } else {
                    $(this).prop('checked', false);
                }
            });

        }
    });
}

function pageClick1(page) {
    var user = $('#modal-add-user #user1').val();
    var fullName = $('#modal-add-user #full_name1').val();
    var isActive = $('#modal-add-user #is_actived1').val();
    $.map(arrayAccountRemove, function (value, key) {
        arrayAccount.push(value);
    });
    $.ajax({
        url: laroute.route('user.user-group-notification.search-where-in-user'),
        method: "POST",
        async: false,
        data: {
            user: user,
            fullName: fullName,
            isActive: isActive,
            page: page,
            arrayUser: arrayAccount
        },
        success: function (res) {
            $('#modal-add-user #table-list-user').empty();
            $('#modal-add-user #table-list-user').append(res);
            $('.check-box-choose-user1').each(function () {
                var phone = $(this).parents('label').find('.phone-1').val();
                if (jQuery.inArray(phone, arrayAccount) !== -1) {
                    $(this).prop('checked', true);
                } else {
                    $(this).prop('checked', false);
                }
            });
            $('.check-box-choose-user1').each(function () {
                var p = $(this).parents('label').find('.phone-1').val();
                if (jQuery.inArray(p, arrayAccountRemove) !== -1) {
                    $(this).prop('checked', false);
                }
            });

        }
    });
}

function pageClick3(page) {
    var phone = $('#define_phone').val();
    var fullName = $('#define_full_name').val();
    var isActive = $('#define_is_actived').val();
    $.ajax({
        url: laroute.route('user.user-group-notification.add-user-group-define'),
        method: "POST",
        data: {
            phone: phone,
            fullName: fullName,
            isActive: isActive,
            arrayAccount: arrayAccount,
            page: page
        },
        success: function (res) {
            $('.table-list-user-group-define').empty();
            $('.table-list-user-group-define').append(res);
            $('#modal-add-user').modal('hide');
        }
    });
}
