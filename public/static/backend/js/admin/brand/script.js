
var buttonAction = {
    active : function (name) {
        var update_check = update_check_active;
        var noti_check = noti_check_active;
        if ($('input[name="'+name+'"]').is(":checked") == false){
            update_check = update_check_inactive;
            noti_check = noti_check_inactive;
        }
        if ($('input[name="'+name+'"]').is(":checked") == false) {
            swal.fire({
                // title: title_check_delete,
                title: update_check,
                buttonsStyling: false,
                showCloseButton: true,
                // html: content_check_delete,
                type: "danger",

                confirmButtonText: yes,
                confirmButtonClass: "btn btn-sm btn-default btn-bold",

                showCancelButton: true,
                cancelButtonText: no,
                cancelButtonClass: "btn btn-sm btn-bold btn-brand",
            }).then(function (result) {
                if (!result.value) {
                    if ($('input[name="'+name+'"]').is(":checked") == true) {
                        $('input[name="'+name+'"]').prop('checked', false);
                    } else {
                        $('input[name="'+name+'"]').prop('checked', true);
                    }
                } else {
                    swal.fire(noti_check, '', "success");
                }
            });
        }
    },

    activeFeature : function (name) {
        var update_check = feature_update_check_active;
        var noti_check = feature_noti_check_active;
        if ($('input[name="'+name+'"]').is(":checked") == false){
            update_check = feature_update_check_inactive;
            noti_check = feature_noti_check_inactive;
        }
        if ($('input[name="'+name+'"]').is(":checked") == false) {
            swal.fire({
                // title: title_check_delete,
                title: update_check,
                buttonsStyling: false,
                showCloseButton: true,
                // html: content_check_delete,
                type: "danger",

                confirmButtonText: yes,
                confirmButtonClass: "btn btn-sm btn-default btn-bold",

                showCancelButton: true,
                cancelButtonText: no,
                cancelButtonClass: "btn btn-sm btn-bold btn-brand",
            }).then(function (result) {
                if (!result.value) {
                    if ($('input[name="'+name+'"]').is(":checked") == true) {
                        $('input[name="'+name+'"]').prop('checked', false);
                    } else {
                        $('input[name="'+name+'"]').prop('checked', true);
                    }
                } else {
                    swal.fire(noti_check, '', "success");
                }
            });
        }
    },

    popQrCode: function (idBrand, brandCustomerCode) {
        $.ajax({
            url: laroute.route('admin.brand.show-pop-qr-code'),
            method: 'POST',
            dataType: 'JSON',
            data: {
                brand_id: idBrand,
                brand_customer_code: brandCustomerCode
            },
            success: function (res) {
                $('#my-modal').html(res.html);
                $('#modal-qr-code').modal('show');
            }
        });
    }
}

var register = {
    _init: function () {

    },

    paging : function(page){
        $('#service_popup_page').val(page);
        register.listModel();
    },

    listModel: function(id){
        data = $('#list-ajax').serialize();
        if (id == 1){
            data = {};
        }
        $.ajax({
            url: laroute.route('admin.brand.showModel'),
            method: 'POST',
            data: data,
            success: function (res) {
                $('#kt_modal_reset_password').find('.modal-body .kt-scroll').html(res);
                $('#hidden-password').val();
            }
        });
    },

    showModel: function() {
        $('#kt_modal_reset_password').modal();
        register.listModel();
    },

    list_feature: function() {
        $.ajax({
            url: laroute.route('admin.brand.list-service'),
            method: 'POST',
            success: function (res) {
                $('#table-list-service').empty();
                $('#table-list-service').append(res);
            }
        });
    },

    delete_feature: function(id , name) {
        if ($('input[name="'+name+'"]').is(":checked") == false) {
            swal.fire({
                title: content_check_delete,
                buttonsStyling: false,
                showCloseButton: true,
                type: "danger",

                confirmButtonText: yes,
                confirmButtonClass: "btn btn-sm btn-default btn-bold",

                showCancelButton: true,
                cancelButtonText: no,
                cancelButtonClass: "btn btn-sm btn-bold btn-brand",
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: laroute.route('admin.brand.destroy-feature'),
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            id: id,
                        },
                        success: function (res) {
                            if (res.error == false) {
                                swal.fire(res.message, "", "success").then(function () {
                                    register.list_feature();
                                });
                            } else {
                                swal.fire(res.message, '', "error");
                            }
                        }
                    });
                }
            });
        } else {
            swal.fire({
                title: content_check_delete_fail,
                buttonsStyling: false,
                showCloseButton: true,
                type: "danger",
                confirmButtonText: confirm,
                confirmButtonClass: "btn btn-sm btn-bold btn-brand",

                showCancelButton: false,
                // cancelButtonText: no_delete,
                cancelButtonClass: "btn btn-sm btn-bold btn-brand",
            })
        }
    },

    create_feature: function(){
        var checked = [];
        $("input[name='service_id']:checked").each(function ()
        {
            checked.push(parseInt($(this).val()));
        });
        swal.fire({
            // title: title_check_delete,
            title: check_add_service,
            buttonsStyling: false,
            showCloseButton: true,
            // html: content_check_delete,
            type: "danger",

            confirmButtonText: yes,
            confirmButtonClass: "btn btn-sm btn-default btn-bold",

            showCancelButton: true,
            cancelButtonText: no,
            cancelButtonClass: "btn btn-sm btn-bold btn-brand",
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url: laroute.route('admin.brand.store-service'),
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        service_group: checked
                    },
                    success: function (res) {
                        if (!res.error) {
                            swal.fire(res.message, "", "success").then(function () {
                                // window.location.href = laroute.route('admin.service.create');
                                $('#kt_modal_reset_password').modal('toggle');
                                register.list_feature();
                            });
                        } else {
                            swal.fire(res.message, "", "error");
                        }
                    },
                });
            }
        })
    },

    submit: function (is_quit = 0) {
        var form = $('#form-register');
        $.getJSON(laroute.route('admin.validation'), function (json) {
            form.validate({
                rules: {
                    brand_name: {
                        required: true,
                        maxlength: 250
                    },
                    brand_code: {
                        required: true,
                        maxlength: 50
                    },
                    company_name: {
                        required: true,
                        maxlength: 250
                    },
                    display_name: {
                        required: true,
                        maxlength: 250
                    },
                    hotline:{
                        number: true,
                        digits: true
                    },
                    firebase_key: {
                        maxlength: 250
                    }
                },
                messages: {
                    brand_name:{
                        required: json.brand.brand_name_required,
                        maxlength: json.brand.brand_name_max
                    },
                    brand_code:{
                        required: json.brand.brand_code_required,
                        maxlength: json.brand.brand_code_max
                    },
                    company_name:{
                        required: json.brand.company_name_required,
                        maxlength: json.brand.company_name_max
                    },
                    display_name:{
                        required: json.brand.display_name_required,
                        maxlength: json.brand.display_name_max
                    },
                    hotline: {
                        number: json.brand.input_hotline,
                        digits: json.brand.input_hotline,
                    },
                    firebase_key: {
                        maxlength: json.brand.max_firebase_key
                    }
                }
            });

            if (form.valid()) {
                $.ajax({
                    url:laroute.route('admin.brand.store'),
                    method:'POST',
                    dataType:'JSON',
                    data: $("#form-register").serialize(),
                    success: function (res) {
                        if (res.error == false) {
                            swal.fire(res.message, "", "success").then(function (result) {
                                if (is_quit === 0) {
                                    window.location.href = laroute.route('admin.brand.create');
                                } else {
                                    window.location.href = laroute.route('admin.brand');
                                }
                            });
                        } else {
                            swal.fire(create_fail, res.message, "error");
                        }
                    },
                    error: function (res) {
                        var mess_error = '';
                        $.map(res.responseJSON.errors, function (a) {
                            mess_error = mess_error.concat(a + '<br/>');
                        });
                        swal.fire(mess_error, '', "error");
                    }
                });
            }
        });
    },
};
var update={
    _init:function () {

    },
    submit:function (id, is_quit = 0) {
        var form = $('#form-update');
        $.getJSON(laroute.route('admin.validation'), function (json) {
            form.validate({
                rules: {
                    brand_name: {
                        required: true,
                        maxlength: 250
                    },
                    brand_code: {
                        required: true,
                        maxlength: 50
                    },
                    company_name: {
                        required: true,
                        maxlength: 250
                    },
                    display_name: {
                        required: true,
                        maxlength: 250
                    },
                    hotline:{
                        number: true,
                        digits: true
                    },
                    firebase_key: {
                        maxlength: 250
                    }
                },
                messages: {
                    brand_name:{
                        required: json.brand.brand_name_required,
                        maxlength: json.brand.brand_name_max
                    },
                    brand_code:{
                        required: json.brand.brand_code_required,
                        maxlength: json.brand.brand_code_max
                    },
                    company_name:{
                        required: json.brand.company_name_required,
                        maxlength: json.brand.company_name_max
                    },
                    display_name:{
                        required: json.brand.display_name_required,
                        maxlength: json.brand.display_name_max
                    },
                    hotline: {
                        number: json.brand.input_hotline,
                        digits: json.brand.input_hotline,
                    },
                    firebase_key: {
                        maxlength: json.brand.max_firebase_key
                    }
                }
            });

            if (form.valid()) {
                $.ajax({
                    url:laroute.route('admin.brand.update'),
                    method:'POST',
                    dataType:'JSON',
                    data:$("#form-update").serialize(),
                    success:function (res) {
                        if (res.error == false) {
                            swal.fire(res.message, "", "success").then(function (result) {
                                if (is_quit === 0) {
                                    window.location.reload();
                                } else {
                                    window.location.href = laroute.route('admin.brand');
                                }
                            });
                        } else {
                            swal.fire(res.message, "", "error");
                        }
                    },
                    error: function (res) {
                        var mess_error = '';
                        $.map(res.responseJSON.errors, function (a) {
                            mess_error = mess_error.concat(a + '<br/>');
                        });
                        swal.fire(mess_error, '', "error");
                    }
                });
            }
        });
    },

    removeUser: function (id) {
        $.ajax({
            url:laroute.route('admin.brand.deleteuseradmin'),
            method:'POST',
            dataType:'JSON',
            data:{
                id: id
            },
            success: function (res) {
                if (res.error == false) {
                    swal.fire(delete_user_success, "", "success").then(function (result) {
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
                swal.fire(delete_user_fail, mess_error, "error");
            }
        });
    },

    activeUser: function (id,is_actived) {
        $.ajax({
            url:laroute.route('admin.brand.activeuseradmin'),
            method:'POST',
            dataType:'JSON',
            data:{
                id :id,
                is_actived: is_actived
            },
            success: function (res) {
                if (res.error == false) {
                    swal.fire(update_success, "", "success").then(function (result) {
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
                swal.fire(update_fail, mess_error, "error");
            }
        });
    },

    addUserAdmin: function (id) {
        $.ajax({
            url: laroute.route('admin.brand.useradminadd'),
            method: 'GET',
            success: function (data) {
                $('#m_modal').html(data).find('#m_user_add').modal();
                $('#user_brand_id').val(id);
            }
        });
    },

    changePassUserAdmin: function (id, email, fullname) {
        $.ajax({
            url: laroute.route('admin.brand.changepassuseradmin'),
            method: 'GET',
            success: function (data) {
                $('#m_modal').html(data).find('#m_user_add').modal();
                $('#user_id').val(id);
                $('#info_email').text(email);
                $('#info_fullname').text(fullname);
            }
        });
    },

    submitChangePassUserAdmin: function () {
        if ($('#form-update-pass').valid()) {
            $.ajax({
                url:laroute.route('admin.brand.changepassuseradmin'),
                method:'POST',
                dataType:'JSON',
                data: $('#form-update-pass').serialize(),
                success: function (res) {
                    if (res.error == false) {
                        $("#change-pass-user").css("display", "none");
                        $("#info-user").css("display", "block");
                        $('#info_email').text($('#email').val());
                        $('#info_fullname').text($('#full_name').val());
                        $('#info_pass').text($('#password').val());
                    }
                },
                error: function (res) {
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        console.log(a);
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(create_user_fail, mess_error, "error");
                }
            })
        }
    },

    genAutoPass: function () {
        var str = makePassword(8);
        $('#password').val(str);
    },
    submitAddUserAdmin: function () {
        if ($('#form-register-user').valid()) {
            $.ajax({
                url:laroute.route('admin.brand.useradminadd'),
                method:'POST',
                dataType:'JSON',
                data: $('#form-register-user').serialize(),
                success: function (res) {
                    if (res.error == false) {
                        $("#register-user").css("display", "none");
                        $("#info-user").css("display", "block");
                        $('#info_email').text($('#email').val());
                        $('#info_fullname').text($('#full_name').val());
                        $('#info_pass').text($('#password').val());
                    }
                },
                error: function (res) {
                    var mess_error = '';
                    $.map(res.responseJSON.errors, function (a) {
                        console.log(a);
                        mess_error = mess_error.concat(a + '<br/>');
                    });
                    swal.fire(create_user_fail, mess_error, "error");
                }
            })
        }
    },
    createUserAdminFinish : function () {
        window.location.reload();
    }
};

var remove={
    click:function (id) {
        $.getJSON(laroute.route('admin.validation'), function (json) {
            Swal.fire({
                title: json.brand.TITLE_POPUP,
                text: json.brand.TEXT_POPUP,
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: json.brand.YES_BUTTON
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: laroute.route('admin.brand.destroy'),
                        method: 'POST',
                        dataType:'JSON',
                        data:{
                            id:id
                        },
                        success:function (res) {
                            if (!res.error) {
                                window.location.reload();
                            }
                        }
                    });
                }
            });
        });
    }
};


register._init();
update._init();

function uploadLogo(input) {
    if (input.files && input.files[0]) {
        var file_data = $('#getFileLogo').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('link', '_brand.');
        var fsize = input.files[0].size;
        var fileInput = input,
            file = fileInput.files && fileInput.files[0];
        var img = new Image();

        if (Math.round(fsize / 1024) <= 2048) {
            var reader = new FileReader();
            var imageAvatar = $('#station_category_icon');
            reader.onload = function (e) {
                // $('.kt-avatar__holder')
                //     .css('background-image', e.target.result);
                $('#logo-image').empty();
                var tpl = $('#logo-tpl').html();
                tpl = tpl.replace(/{link}/g, e.target.result);
                $('#logo-image').append(tpl);

            };
            reader.readAsDataURL(input.files[0]);
            $('.error_img').text('');
            $.ajax({
                url: laroute.route("admin.upload-image"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.error == 0) {
                        $('#brand_avatar').val(res.file);
                    }
                }
            });
        } else {
            $.getJSON(laroute.route('admin.validation'), function (json) {
                Swal.fire(json.brand.SIZE_TOO_LARGE, "", 'error');
            });
        }
    }
}

function uploadBanner(input) {
    if (input.files && input.files[0]) {
        var file_data = $('#getFileBanner').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('link', '_brand.');
        var fsize = input.files[0].size;
        var fileInput = input,
            file = fileInput.files && fileInput.files[0];
        var img = new Image();

        // img.src = window.URL.createObjectURL(file);
        //
        // img.onload = function () {
        //     var imageWidth = img.naturalWidth;
        //     var imageHeight = img.naturalHeight;
        //
        //     window.URL.revokeObjectURL(img.src);
        //
        //     $('.image-size').text(imageWidth + "x" + imageHeight + "px");
        //
        // };
        // $('.image-capacity').text(Math.round(fsize / 1024) + 'kb');
        //
        // $('.image-format').text(input.files[0].name.split('.').pop().toUpperCase());

        if (Math.round(fsize / 1024) <= 2048) {
            var reader = new FileReader();
            var imageAvatar = $('#station_category_icon');
            reader.onload = function (e) {
                // $('.kt-avatar__holder')
                //     .css('background-image', e.target.result);
                $('#background-image').empty();
                var tpl = $('#logo-tpl').html();

                tpl = tpl.replace(/{link}/g, e.target.result);
                $('#background-image').append(tpl);

            };
            reader.readAsDataURL(input.files[0]);
            $('.error_img').text('');
            $.ajax({
                url: laroute.route("admin.upload-image"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.error == 0) {
                        $('#brand_banner').val(res.file);
                    }
                }
            });
        } else {
            $.getJSON(laroute.route('admin.validation'), function (json) {
                Swal.fire(json.brand.SIZE_TOO_LARGE, "", 'error');
            });
        }
    }
}

function uploadFileP12(input) {
    if (input.files && input.files[0]) {
        var file_data = $('#upload_p12_file').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('link', '_brand.');
        var fsize = input.files[0].size;
        var fileInput = input,
            file = fileInput.files && fileInput.files[0];

        if (Math.round(fsize / 1024) <= 2048) {
            var reader = new FileReader();
            reader.onload = function (e) {
                // $('.kt-avatar__holder')
                //     .css('background-image', e.target.result);
                // $('#background-image').empty();
                // var tpl = $('#logo-tpl').html();
                //
                // tpl = tpl.replace(/{link}/g, e.target.result);
                // $('#background-image').append(tpl);

            };
            reader.readAsDataURL(input.files[0]);
            $.ajax({
                url: laroute.route("admin.upload-image"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.error == 0) {
                        $('#p_file').val(res.file);
                    }
                }
            });
        } else {
            $.getJSON(laroute.route('admin.validation'), function (json) {
                Swal.fire(json.brand.SIZE_TOO_LARGE, "", 'error');
            });
        }
    }
}

function uploadFavicon(input) {
    if (input.files && input.files[0]) {
        var file_data = $('#upload_favicon_file').prop('files')[0];
        var form_data = new FormData();
        form_data.append('file', file_data);
        form_data.append('link', '_brand.');
        var fsize = input.files[0].size;
        var fileInput = input,
            file = fileInput.files && fileInput.files[0];

        if (Math.round(fsize / 1024) <= 2048) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#favicon').empty();
                var tpl = $('#logo-tpl').html();

                tpl = tpl.replace(/{link}/g, e.target.result);
                $('#favicon').append(tpl);
            };
            reader.readAsDataURL(input.files[0]);
            $.ajax({
                url: laroute.route("admin.upload-image"),
                method: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (res) {
                    if (res.error == 0) {
                        $('#favicon_file').val(res.file);
                    }
                }
            });
        } else {
            $.getJSON(laroute.route('admin.validation'), function (json) {
                Swal.fire(json.brand.SIZE_TOO_LARGE, "", 'error');
            });
        }
    }
}
function makePassword(length) {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

var brand = {
    init: function () {
        if ($('#sort_brand_name').val() == 'asc') {
            $('#th_brand_name .sort-desc').show();
            $('#th_brand_name .sort-asc').hide();
        } else if ($('#sort_brand_name').val() == 'desc') {
            $('#th_brand_name .sort-desc').hide();
            $('#th_brand_name .sort-asc').show();
        } else {
            $('#th_brand_name .sort-desc').show();
            $('#th_brand_name .sort-asc').hide();
        }

        if ($('#sort_brand_code').val() == 'asc') {
            $('#th_brand_code .sort-desc').show();
            $('#th_brand_code .sort-asc').hide();
        } else if ($('#sort_brand_code').val() == 'desc') {
            $('#th_brand_code .sort-desc').hide();
            $('#th_brand_code .sort-asc').show();
        } else {
            $('#th_brand_code .sort-desc').show();
            $('#th_brand_code .sort-asc').hide();
        }

        if ($('#sort_company_name').val() == 'asc') {
            $('#th_company_name .sort-desc').show();
            $('#th_company_name .sort-asc').hide();
        } else if ($('#sort_company_name').val() == 'desc') {
            $('#th_company_name .sort-desc').hide();
            $('#th_company_name .sort-asc').show();
        } else {
            $('#th_company_name .sort-desc').show();
            $('#th_company_name .sort-asc').hide();
        }

        if ($('#sort_is_actived').val() == 'asc') {
            $('#th_is_actived .sort-desc').show();
            $('#th_is_actived .sort-asc').hide();
        } else if ($('#sort_is_actived').val() == 'desc') {
            $('#th_is_actived .sort-desc').hide();
            $('#th_is_actived .sort-asc').show();
        } else {
            $('#th_is_actived .sort-desc').show();
            $('#th_is_actived .sort-asc').hide();
        }

        if ($('#sort_is_published').val() == 'asc') {
            $('#th_is_published .sort-desc').show();
            $('#th_is_published .sort-asc').hide();
        } else if ($('#sort_is_published').val() == 'desc') {
            $('#th_is_published .sort-desc').hide();
            $('#th_is_published .sort-asc').show();
        } else {
            $('#th_is_published .sort-desc').show();
            $('#th_is_published .sort-asc').hide();
        }

        brand.updateStatus();
        brand.updatePublish();
        $('#perpage').change(function () {
            brand.filter();
        });
    },
    filter: function () {
        $('#form-filter').submit();
    },
    sort: function (o, col) {
        var sort = $(o).data('sort');
        switch (col) {
            case 'brand_name':
                $("#sort_brand_name").val(sort);
                $("#sort_brand_code").val(null);
                $("#sort_company_name").val(null);
                $("#sort_is_actived").val(null);
                $("#sort_is_published").val(null);
                break;
            case 'brand_code':
                $("#sort_brand_name").val(null);
                $("#sort_brand_code").val(sort);
                $("#sort_company_name").val(null);
                $("#sort_is_actived").val(null);
                $("#sort_is_published").val(null);
                break;
            case 'company_name':
                $("#sort_brand_name").val(null);
                $("#sort_brand_code").val(null);
                $("#sort_company_name").val(sort);
                $("#sort_is_actived").val(null);
                $("#sort_is_published").val(null);
                break;
            case 'is_actived':
                $("#sort_brand_name").val(null);
                $("#sort_brand_code").val(null);
                $("#sort_company_name").val(null);
                $("#sort_is_actived").val(sort);
                $("#sort_is_published").val(null);
                break;
            case 'is_published':
                $("#sort_brand_name").val(null);
                $("#sort_brand_code").val(null);
                $("#sort_company_name").val(null);
                $("#sort_is_actived").val(null);
                $("#sort_is_published").val(sort);
                break;
        }
        brand.filter();
    },
    inputFiler: function () {
        $('.input-filter').show();
    },
    updateStatus: function () {
        $('.switch-status').click(function () {
            let id = $(this).data('id');
            let stt = ($(this).data('status') === 1) ? 0 : 1;
            let t = $(this);
            $.ajax({
                url: laroute.route('admin.brand.update-status'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    brand_id: id,
                    is_activated: stt
                },
                success: function (res) {
                    if (!res.error) {
                        t.data('status', stt);
                        Swal.fire(res.message, "", "success");
                    } else {
                        Swal.fire("Lỗi!", res.message, "error");
                    }
                }
            });
        });
    },
    updatePublish: function () {
        $('.switch-publish').click(function () {
            let id = $(this).data('id');
            let stt = ($(this).data('status') === 1) ? 0 : 1;
            let t = $(this);
            $.ajax({
                url: laroute.route('admin.brand.update-publish'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    brand_id: id,
                    is_published: stt
                },
                success: function (res) {
                    if (!res.error) {
                        t.data('status', stt);
                        Swal.fire(res.message, "", "success");
                    } else {
                        Swal.fire("Lỗi!", res.message, "error");
                    }
                }
            });
        });
    },

};
