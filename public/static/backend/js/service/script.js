var service = {
    _init: function () {

    },
    checkAllFeatureGroup: function(e){
        if($(e).is(':checked')){
            $('[name="feature_group"]').prop("checked", true);
        } else {
            $('[name="feature_group"]').prop("checked", false);
        }
    },
    checkAllFeatureChildGroup: function(e){
        if($(e).is(':checked')){
            $('[name="feature_name"]').prop("checked", true);
        } else {
            $('[name="feature_name"]').prop("checked", false);
        }
    },
    showPopup: function(){
        $.ajax({
            url: laroute.route('admin.service.show-modal'),
            method: 'POST',
            data: {
            },
            success: function (res) {
                $('#kt_modal_reset_password').find('.modal-body .kt-scroll').html(res);
                $('#kt_modal_reset_password').modal();
                $('#hidden-password').val();
            }
        });
    },

    showPopupEdit: function(id){

        $.ajax({
            url: laroute.route('admin.service.show-popup-edit'),
            method: 'POST',
            data: {
                id: id,
            },
            success: function (res) {
                $('#kt_modal_edit_feature').find('.modal-body .kt-scroll').html(res);
                $('#kt_modal_edit_feature').modal();
                $('#hidden-password').val();
            }
        });
    },

    list_feature: function() {
        $.ajax({
            url: laroute.route('admin.service.list-feature'),
            method: 'POST',
            success: function (res) {
                $('#table-list-feature').empty();
                $('#table-list-feature').append(res);
            }
        });
    },
    edit_feature_child: function(id) {
        $.ajax({
            url: laroute.route('admin.service.modal-feature-child'),
            method: 'POST',
            dataType: 'JSON',
            data: {
                feature_group_id: id,
            },
            success: function (res) {
                $('#popup-feature-child').empty();
                $('#popup-feature-child').append(res);
                $('#kt_modal_edit_feature_child').modal('show');
            }
        });
    },

    delete_feature: function(id) {
        swal.fire({
            // title: title_check_delete,
            title: content_check_delete,
            buttonsStyling: false,
            showCloseButton: true,
            // html: content_check_delete,
            type: "danger",

            confirmButtonText: yes_delete,
            confirmButtonClass: "btn btn-sm btn-default btn-bold",

            showCancelButton: true,
            cancelButtonText: no_delete,
            cancelButtonClass: "btn btn-sm btn-bold btn-brand",
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: laroute.route('admin.service.destroy-feature'),
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: id,
                    },
                    success: function (res) {
                        if (res.error == false) {
                            swal.fire(res.message, "", "success").then(function (result) {
                                if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                    window.location.reload();
                                }
                                if (result.value == true) {
                                    service.list_feature();
                                }
                            });
                        } else {
                            swal.fire(res.message, '', "error");
                        }
                    }
                });
            }
        });
    },

    update_feature: function(){
        $.getJSON('/service/validation', function (json) {
            var form = $('#form-edit-feature');

            form.validate({
                rules: {
                    feature_name: {
                        required: true,
                        maxlength: 250,
                    },
                    // feature_system: {
                    //     required: true,
                    // },
                    description: {
                        required: true,
                    },
                },
                messages: {
                    feature_name: {
                        required: json.feature.feature_name_required,
                        maxlength: json.feature.feature_name_max,
                    },
                    // feature_system: {
                    //     required: json.feature.feature_system_required,
                    // },
                    description: {
                        required: json.feature.description_required,
                    },
                },
            });
            if (form.valid()) {
                $.ajax({
                    url: laroute.route('admin.service.update-feature'),
                    method: 'POST',
                    dataType: 'JSON',
                    data: form.serialize(),
                    success: function (res) {
                        if (!res.error) {
                            swal.fire(res.message, "", "success").then(function () {
                                $('#kt_modal_edit_feature').modal('toggle');
                                service.list_feature();
                            });
                        } else {
                            swal.fire(res.message, "", "error");
                        }
                    },
                    error: function (res) {
                        var mess_error = '';
                        jQuery.each(res.responseJSON.errors, function (key, val) {
                            mess_error = mess_error.concat(val + '<br/>');
                        });
                        swal.fire(mess_error, "", "error");
                    }
                });
            }
        });
    },

    create_feature: function(){
        var checked = [];
        $("input[name='feature_group']:checked").each(function ()
        {
            checked.push(parseInt($(this).val()));
        });
        $.ajax({
            url: laroute.route('admin.service.store-feature'),
            method: 'POST',
            dataType: 'JSON',
            data: {
                feature_group: checked
            },
            success: function (res) {
                if (!res.error) {
                    swal.fire(res.message, "", "success").then(function () {
                        // window.location.href = laroute.route('admin.service.create');
                        $('#kt_modal_reset_password').modal('toggle');
                        service.list_feature();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
            // error: function (res) {
            //     var mess_error = '';
            //     jQuery.each(res.responseJSON.errors, function (key, val) {
            //         mess_error = mess_error.concat(val + '<br/>');
            //     });
            //     swal.fire(mess_error, "", "error");
            // }
        });
    },

    create_feature_child : function(id){
        var checked = [];
        $("input[name='feature_name']:checked").each(function ()
        {
            checked.push(parseInt($(this).val()));
        });
        $.ajax({
            url: laroute.route('admin.service.store-feature-child'),
            method: 'POST',
            dataType: 'JSON',
            data: {
                feature_name : checked,
                feature_group_id : id
            },
            success: function (res) {
                if (!res.error) {
                    swal.fire(res.message, "", "success").then(function () {
                        // window.location.href = laroute.route('admin.service.create');
                        $('#kt_modal_edit_feature_child').modal('toggle');
                        service.list_feature();
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            },
            // error: function (res) {
            //     var mess_error = '';
            //     jQuery.each(res.responseJSON.errors, function (key, val) {
            //         mess_error = mess_error.concat(val + '<br/>');
            //     });
            //     swal.fire(mess_error, "", "error");
            // }
        });
    },

    changeStatusFeature: function (id, obj) {
        var is_actived = 0;
        if ($(obj).is(':checked')) {
            is_actived = 1;
        }

        $.ajax({
            url: laroute.route('admin.service.change-status-feature'),
            method: "POST",
            dataType: "JSON",
            data: {
                id: id,
                is_actived: is_actived
            },
            success: function (res) {
                if (res.error == false) {
                    swal.fire(res.message, "", "success");
                    service.list_feature();
                } else {
                    swal.fire(res.message, '', "error");
                }
            }
        });
    },

    submit_index: function () {
        swal.fire({
            title: check_create,
            buttonsStyling: false,
            showCloseButton: true,
            html: '',
            type: "question",

            confirmButtonText: yes,
            confirmButtonClass: "btn btn-sm btn-default btn-bold",

            showCancelButton: true,
            cancelButtonText: no,
            cancelButtonClass: "btn btn-sm btn-bold btn-brand",
        }).then(function (result) {
            if (result.value == true) {
                var form = $('#form-register');
                form.validate({
                    rules: {
                        service_name_vi: {
                            required: true,
                            maxlength: 250
                        },
                        service_name_en: {
                            required: true,
                            maxlength: 250
                        },
                        description:{
                            required: true,
                            maxlength: 300
                        },
                    },
                    messages: {
                        service_name_vi: {
                            required: service_name_required_vi,
                            maxlength: service_name_max_vi
                        },
                        service_name_en: {
                            required: service_name_required_en,
                            maxlength: service_name_max_en
                        },
                        description: {
                            required: des_short_required,
                            maxlength: description_max
                        }
                    },
                });
                if (form.valid()) {
                    var is_actived = 0;
                    if ($('#is_actived').is(':checked')) {
                        is_actived = 1;
                    }

                    $.ajax({
                        url: laroute.route('admin.service.store'),
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            service_name_vi: $('#service_name_vi').val(),
                            service_name_en: $('#service_name_en').val(),
                            description: $('#description').val(),
                            img_content: $('#img_content').val(),
                            is_actived: is_actived
                        },
                        success: function (res) {
                            if (res.error == false) {
                                // swal.fire(create_success, "", "success").then(function (result) {
                                swal.fire(service_create_success, "", "success").then(function () {
                                    window.location.href = laroute.route('admin.service');
                                });
                            } else {
                                swal.fire(service_create_fail, res.message, "error");
                            }
                        },
                        error: function (res) {
                            var mess_error = '';
                            $.map(res.responseJSON.errors, function (a) {
                                console.log(a);
                                mess_error = mess_error.concat(a + '<br/>');
                            });
                            swal.fire(service_create_fail, mess_error, "error");
                        }
                    })
                }
            }
        })

    },
    submit_load: function () {
        $.getJSON('/service/validation', function (json) {
            var form = $('#form-register');

            form.validate({
                rules: {
                    service_name: {
                        required:true,
                        maxlength:250
                    },

                },
                messages: {
                    service_name: {
                        required: json.service.name_required,
                        maxlength: json.service.name_max
                    },

                },
            });

            if (!form.valid()) {
                return false;
            }

            var is_actived = 0;
            if ($('#is_actived').is(':checked')) {
                is_actived = 1;
            }

            $.ajax({
                url: laroute.route('admin.service.store'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    service_name: $('#service_name').val(),
                    description: $('#description').val(),
                    img_content: $('#img_content').val(),
                    is_actived: is_actived
                },
                success: function (res) {
                    if (res.error == false) {
                        swal.fire(create_success, "", "success").then(function (result) {
                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                window.location.reload();
                            }
                            if (result.value == true) {
                                window.location.reload();
                            }
                        });
                    }
                },
                error: function (res) {
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        console.log(a);
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(create_fail, mess_error, "error");
                }
            })

        });
    },
};

var update = {
    _init: function () {

    },
    submit_index: function () {
        swal.fire({
            title: check_create,
            buttonsStyling: false,
            showCloseButton: true,
            html: '',
            type: "question",

            confirmButtonText: yes,
            confirmButtonClass: "btn btn-sm btn-default btn-bold",

            showCancelButton: true,
            cancelButtonText: no,
            cancelButtonClass: "btn btn-sm btn-bold btn-brand",
        }).then(function (result) {
            if (result.value == true) {
                var form = $('#form-register');
                form.validate({
                    rules: {
                        service_name_vi: {
                            required: true,
                            maxlength: 250
                        },
                        service_name_en: {
                            required: true,
                            maxlength: 250
                        },
                        description:{
                            required: true,
                            maxlength: 300
                        },
                    },
                    messages: {
                        service_name_vi: {
                            required: service_name_required_vi,
                            maxlength: service_name_max_vi
                        },
                        service_name_en: {
                            required: service_name_required_en,
                            maxlength: service_name_max_en
                        },
                        description: {
                            required: des_short_required,
                            maxlength: description_max
                        }
                    },
                });
                if (form.valid()) {
                    var is_actived = 0;
                    if ($('#is_actived').is(':checked')) {
                        is_actived = 1;
                    }

                    $.ajax({
                        url: laroute.route('admin.service.update'),
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            service_id: $('#service_id').val(),
                            service_name_vi: $('#service_name_vi').val(),
                            service_name_en: $('#service_name_en').val(),
                            description: $('#description').val(),
                            img_content: $('#img_content').val(),
                            is_actived: is_actived
                        },
                        success: function (res) {
                            if (res.error == false) {
                                swal.fire(service_edit_success, "", "success").then(function () {
                                    window.location.href = laroute.route('admin.service');
                                });
                            } else {
                                swal.fire(service_edit_fail, res.message, "error");
                            }
                        },
                        error: function (res) {
                            var mess_error = '';
                            $.map(res.responseJSON.errors, function (a) {
                                console.log(a);
                                mess_error = mess_error.concat(a + '<br/>');
                            });
                            swal.fire(service_edit_fail, mess_error, "error");
                        }
                    })
                }
            }
        })

    },
};

var remove = {
    click: function (id) {
        $.getJSON('/admin/lang-service', function (json) {
            swal.fire({
                title:  json.index.ALERT,
                buttonsStyling: false,
                showCloseButton: true,
                html: json.index.text1 +
                    "<br>" +
                    json.index.text2,
                type: "danger",

                confirmButtonText: json.index.CONFIRM_REMOVE,
                confirmButtonClass: "btn btn-sm btn-default btn-bold",

                showCancelButton: true,
                cancelButtonText: json.index.CANCEL_REMOVE,
                cancelButtonClass: "btn btn-sm btn-bold btn-brand"
            }).then(function (result) {
                if (result.value) {
                    if (result.value) {
                        $.ajax({
                            url: laroute.route('admin.service.destroy'),
                            method: 'POST',
                            dataType: 'JSON',
                            data: {
                                id: id
                            },
                            success: function (res) {
                                if (!res.error) {
                                    swal.fire(json.index.REMOVE_SUCCESS, "", "success").then(function (result) {
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
                }
            });
        });
    }
};

var index = {
    _init: function () {},
    sort_service: function (obj,col) {
        var sort = $(obj).data('sort');
        switch (col) {
            case 'service_name':
                $("#sort_service_name").val(sort);
                $("#sort_service_code").val(null);
                $("#sort_service_status").val(null);
                break;
            case 'service_code':
                $("#sort_service_name").val(null);
                $("#sort_service_code").val(sort);
                $("#sort_service_status").val(null);
                break;
            case 'status':
                $("#sort_service_name").val(null);
                $("#sort_service_code").val(null);
                $("#sort_service_status").val(sort);
                break;
        }
        $('#form-filter').submit();
    },
    change_status: function (id, obj) {
        var is_actived = 0;
        if ($(obj).is(':checked')) {
            is_actived = 1;
        }

        $.ajax({
            url: laroute.route('admin.service.change-status'),
            dataType: 'JSON',
            method: 'POST',
            data: {
                service_id: id,
                is_actived: is_actived
            },
            success: function (res) {

            }
        })
    }
};
$(document).ready(function () {
    service._init();
    update._init();
    index._init();
});
