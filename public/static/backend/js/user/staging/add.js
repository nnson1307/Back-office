var Add = {
    submitAdd: function () {
        var form = $('#form-adds');
        form.validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirm: {
                    required: true,
                    equalTo: "#password"
                },
                brand_id: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: PLEASE_ENTER_NAME
                },
                email: {
                    required: PLEASE_ENTER_EMAIL,
                    email: PLEASE_ENTER_EMAIL,
                },
                password: {
                    required: PLEASE_ENTER_PASSWORD,
                    min: PASSWORD_LENGTH,
                },
                password_confirm: {
                    required: PLEASE_ENTER_CONFIRM_PASSWORD,
                    equalTo: PLEASE_ENTER_CONFIRM_PASSWORD,
                },
                brand_id: {
                    required: PLEASE_SELECT_BRAND
                }
            }
        });

        if (!form.valid()) {
            return;
        }

        form.submit();
    },
    submitEdit: function (id) {
        $('#form-edit').validate({
            rules: {
                name: {
                    required: true
                },
                brand_id: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: PLEASE_ENTER_NAME
                },
                brand_id: {
                    required: PLEASE_SELECT_BRAND
                }
            },
            submitHandler: function () {
                var arrayRoleGroup = [];
                $("input[name='group_child_id[]']").each(function () {
                    var val = $(this).val();
                    arrayRoleGroup.push(val);
                });
                var is_actived = 0;
                if ($('#is_actived').is(':checked')) {
                    is_actived = 1;
                };
                $.ajax({
                    url: laroute.route('user.staging.update'),
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        id:id,
                        full_name: $('#name').val(),
                        is_actived: is_actived,
                        password: $('#password').val(),
                        brand_id: $('#brand_id').val(),
                        default_menu: $('#default_menu').val(),
                        arrayRoleGroup: arrayRoleGroup
                    }, success: function (res) {
                        if (res.error == true) {
                            var mess_error = '';
                            $.map(res._error, function (a) {
                                mess_error = mess_error.concat(a + '<br/>');
                            });
                            swal.fire("Chỉnh sửa thất bại!", mess_error, "error");
                        } else {
                            swal.fire("Chỉnh sửa thành công!", "", "success").then(function (result) {
                                if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                    window.location.href = laroute.route('user.staging');
                                }
                                if (result.value == true) {
                                    window.location.href = laroute.route('user.staging');
                                }
                            });
                        }
                    }
                });
            }
        });
    },
    selectGroupChild: function (group_id = 0) {
        var listChild = [];
        $('#table-admin-group-child tbody').find('.group-child-item input:hidden').each(function () {
            var t = $(this);
            listChild.push(t.val());
        });

        $.ajax({
            url: laroute.route('user.staging.get-list-child'),
            method: 'POST',
            data: {
                group_id_list: listChild,
                group_id: group_id
            },
            success: function (res) {
                $('#kt_modal_list_group_child').find('#popup-list-group-child').html(res);
                $('#kt_modal_list_group_child').modal();
            }
        });
    },
    selectAllGroup: function (o) {
        if ($(o).is(':checked')) {
            // Iterate each checkbox
            $('#table-popup-group-child input:checkbox').each(function () {
                $(this).prop('checked', true);
            });
        } else {
            $('#table-popup-group-child input:checkbox').each(function () {
                $(this).prop('checked', false);
            });
        }
    },
    addGroupChild: function () {
        var collection = [];
        $('#table-popup-group-child tr td').each(function () {
            var thisTableTr = $(this);
            thisTableTr.find('input:checkbox').each(function () {
                var thisCheckbox = $(this);
                if (thisCheckbox.prop('checked') === true) {
                    collection.push($(this).val());
                }
            });
        });
        $.ajax({
            url: laroute.route('user.staging.add-collection-list-child'),
            method: 'POST',
            data: {
                collection: collection
            },
            success: function (res) {
                $('#row-btn-add').before(res);
                $('#kt_modal_list_group_child').find('#popup-list-group-child').html();
                $('#kt_modal_list_group_child').modal('hide');
            }
        });
    },
    removeRowGroupChild: function (t) {
        if ($(t).val() == 1) {
            $(t).parentsUntil('tbody').remove();
        }
    },
};

jQuery(document).ready(function () {
    $('.--select2').select2();
});
