var adminGroup = {
    enableEdit: 0,
    enableDelete: 0,
    init: function () {
        if ($('#sort_group_name').val() == 'asc') {
            $('#th_group_name .sort-desc').show();
            $('#th_group_name .sort-asc').hide();
        } else if ($('#sort_group_name').val() == 'desc') {
            $('#th_group_name .sort-desc').hide();
            $('#th_group_name .sort-asc').show();
        } else {
            $('#th_group_name .sort-desc').show();
            $('#th_group_name .sort-asc').hide();
        }

        if ($('#sort_group_description').val() == 'asc') {
            $('#th_group_description .sort-desc').show();
            $('#th_group_description .sort-asc').hide();
        } else if ($('#sort_group_description').val() == 'desc') {
            $('#th_group_description .sort-desc').hide();
            $('#th_group_description .sort-asc').show();
        } else {
            $('#th_group_description .sort-desc').show();
            $('#th_group_description .sort-asc').hide();
        }

        $('#perpage').change(function () {
            adminGroup.filter();
        });
    },
    filter: function () {
        $('#form-filter').submit();
    },
    sort: function (o, col) {
        var sort = $(o).data('sort');
        switch (col) {
            case 'group_name':
                $("#sort_group_name").val(sort);
                $("#sort_group_description").val(null);
                break;
            case 'group_description':
                $("#sort_group_name").val(null);
                $("#sort_group_description").val(sort);
                break;
        }
        adminGroup.filter();
    },
    inputFiler: function () {
        $('.input-filter').show();
    },
    selectAll: function (t, table) {
        if (t.checked) {
            // Iterate each checkbox
            $('#'+table+' input:checkbox').each(function () {
                this.checked = true;
            });
        } else {
            $('#'+table+' input:checkbox').each(function () {
                this.checked = false;
            });
        }
    },
    selectGroupChild: function (group_id = 0) {
        var listChild = [];
        $('#table-admin-group-child tbody').find('.group-child-item input:hidden').each(function () {
            var t = $(this);
            listChild.push(t.val());
        });
        $.ajax({
            url: laroute.route('brand-portal.admin-group.get-list-child'),
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
            url: laroute.route('brand-portal.admin-group.add-collection-list-child'),
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
    showPopupUserList: function () {
        var listUser = [];
        $('#table-list-user tbody').find('.user-item input:hidden').each(function () {
            var t = $(this);
            listUser.push(t.val());
        });
        $.ajax({
            url: laroute.route('brand-portal.admin-group.get-list-user'),
            method: 'POST',
            data: {
                user_id_list: listUser
            },
            success: function (res) {
                $('#kt_modal_list_user').find('#popup-list-user').html(res);
                $('#kt_modal_list_user').modal();
            }
        });
    },
    addUser: function () {
        var collection = [];
        $('#table-popup-user tr td').each(function () {
            var thisTableTr = $(this);
            thisTableTr.find('input:checkbox').each(function () {
                var thisCheckbox = $(this);
                if (thisCheckbox.prop('checked') === true) {
                    collection.push($(this).val());
                }
            });
        });
        $.ajax({
            url: laroute.route('brand-portal.admin-group.add-collection-list-user'),
            method: 'POST',
            data: {
                collection: collection
            },
            success: function (res) {
                $('#row-btn-add-user').before(res);
                $('#kt_modal_list_user').find('#popup-list-user').html();
                $('#kt_modal_list_user').modal('hide');
            }
        });
    },
    showPopupMenuList: function () {
        var listMenu = [];
        $('#table-list-menu tbody').find('.menu-item input:hidden').each(function () {
            var t = $(this);
            listMenu.push(t.val());
        });
        $.ajax({
            url: laroute.route('brand-portal.admin-group.get-list-menu'),
            method: 'POST',
            data: {
                menu_id_list: listMenu
            },
            success: function (res) {
                $('#kt_modal_list_menu').find('#popup-list-menu').html(res);
                $('#kt_modal_list_menu').modal();
            }
        });
    },
    addMenu: function () {
        var collection = [];
        $('#table-popup-menu tr td').each(function () {
            var thisTableTr = $(this);
            thisTableTr.find('input:checkbox').each(function () {
                var thisCheckbox = $(this);
                if (thisCheckbox.prop('checked') === true) {
                    collection.push($(this).val());
                }
            });
        });
        $.ajax({
            url: laroute.route('brand-portal.admin-group.add-collection-list-menu'),
            method: 'POST',
            data: {
                collection: collection
            },
            success: function (res) {
                $('#row-btn-add-menu').before(res);
                $('#kt_modal_list_menu').find('#popup-list-menu').html();
                $('#kt_modal_list_menu').modal('hide');
            }
        });
    },
    showPopupActionList: function () {
        var listAction = [];
        $('#table-list-action tbody').find('.action-item input:hidden').each(function () {
            var t = $(this);
            listAction.push(t.val());
        });
        $.ajax({
            url: laroute.route('brand-portal.admin-group.get-list-action'),
            method: 'POST',
            data: {
                action_id_list: listAction
            },
            success: function (res) {
                $('#kt_modal_list_action').find('#popup-list-action').html(res);
                $('#kt_modal_list_action').modal();
            }
        });
    },
    addAction: function () {
        var collection = [];
        $('#table-popup-action tr td').each(function () {
            var thisTableTr = $(this);
            thisTableTr.find('input:checkbox').each(function () {
                var thisCheckbox = $(this);
                if (thisCheckbox.prop('checked') === true) {
                    collection.push($(this).val());
                }
            });
        });
        $.ajax({
            url: laroute.route('brand-portal.admin-group.add-collection-list-action'),
            method: 'POST',
            data: {
                collection: collection
            },
            success: function (res) {
                $('#row-btn-add-action').before(res);
                $('#kt_modal_list_action').find('#popup-list-action').html();
                $('#kt_modal_list_action').modal('hide');
            }
        });
    },
    removeRow: function (t) {
        $(t).parentsUntil('tbody').remove();
    },
    removeGroup: function (group_id) {
        $.getJSON(laroute.route('brand-portal.validation'), function (json) {
            Swal.fire({
                title: json.admin_group.TITLE_POPUP,
                text: json.admin_group.TEXT_POPUP,
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: json.admin_group.YES_BUTTON
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: laroute.route('brand-portal.admin-group.destroy'),
                        method: 'POST',
                        data: {
                            group_id: group_id
                        },
                        success: function (data) {
                            if (data.error === 0) {
                                location.reload();
                            } else {
                                swal("Lỗi!", data.message, "error");
                            }
                        }
                    });
                }
            });
        });
    },
    save: function () {
        var form = $('#form-submit');
        $.getJSON(laroute.route('brand-portal.validation'), function (json) {
            form.validate({
                rules: {
                    group_name: {
                        required: true
                    }
                },
                messages: {
                    group_name: {
                        required: json.admin_group.PLEASE_ENTER_NAME
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
adminGroup.init();
