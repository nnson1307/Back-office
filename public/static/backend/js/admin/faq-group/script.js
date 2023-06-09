var faqGroup = {
    init: function () {},
    filter: function () {
        $('#form-filter').submit();
    },
    sort: function (o, col) {
        var sort = $(o).data('sort');
        switch (col) {
            case 'faq_group_title':
                $("#sort_faq_group_title").val(sort);
                $("#sort_faq_group_parent_title").val(null);
                $("#sort_faq_group_position").val(null);
                $("#sort_is_actived").val(null);
                break;
            case 'faq_group_parent_title':
                $("#sort_faq_group_title").val(null);
                $("#sort_faq_group_parent_title").val(sort);
                $("#sort_faq_group_position").val(null);
                $("#sort_is_actived").val(null);
                break;
            case 'faq_group_position':
                $("#sort_faq_group_title").val(null);
                $("#sort_faq_group_parent_title").val(null);
                $("#sort_faq_group_position").val(sort);
                $("#sort_is_actived").val(null);
                break;
            case 'is_actived':
                $("#sort_faq_group_title").val(null);
                $("#sort_faq_group_parent_title").val(null);
                $("#sort_faq_group_position").val(null);
                $("#sort_is_actived").val(sort);
                break;
        }
        faqGroup.filter();
    },
    inputFiler: function () {
        $('.input-filter').show();
    },
    save: function (is_quit = 0) {
        var form = $('#form-submit');
        $.getJSON(laroute.route('admin.validation'), function (json) {
            form.validate({
                rules: {
                    faq_group_title: {
                        required: true,
                        maxlength: 250
                    },
                    faq_group_position: {
                        required: true,
                        number: true,
                        max: 1000000
                    }
                },
                messages: {
                    faq_group_title: {
                        required: json.faq_group.faq_group_title_required,
                        maxlength: json.faq_group.faq_group_title_max
                    },
                    faq_group_position: {
                        required: json.faq_group.faq_group_position_required,
                        number: json.faq_group.faq_group_position_number,
                        max: json.faq_group.faq_group_position_max
                    }
                }
            });

            if (form.valid()) {
                let url = ($('#faq_group_id').length) ? laroute.route('admin.faq-group.update') : laroute.route('admin.faq-group.store')
                $.ajax({
                    url: url,
                    method: 'POST',
                    dataType: 'JSON',
                    data: form.serialize(),
                    success: function (res) {
                        if (!res.error) {
                            Swal.fire(res.message, "", "success").then(function () {
                                if (is_quit === 0) {
                                    if ($('#faq_group_id').length) {
                                        window.location.reload();
                                    } else {
                                        window.location.href = laroute.route('admin.faq-group.create');
                                    }
                                } else {
                                    window.location.href = laroute.route('admin.faq-group.index');
                                }
                            });
                        } else {
                            Swal.fire(data.message, "", "error");
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
    remove: function (id) {
        $.getJSON(laroute.route('admin.validation'), function (json) {
            Swal.fire({
                title: json.faq_group.TITLE_POPUP,
                html: json.faq_group.HTML_POPUP,
                buttonsStyling: false,

                confirmButtonText: json.faq_group.YES_BUTTON,
                confirmButtonClass: "btn btn-sm btn-default btn-bold",

                showCancelButton: true,
                cancelButtonText: json.faq_group.CANCEL_BUTTON,
                cancelButtonClass: "btn btn-sm btn-bold btn-brand"
            }).then(function (result) {
                if (result.value) {
                    $.ajax({
                        url: laroute.route('admin.faq-group.destroy'),
                        method: 'POST',
                        data: {
                            faq_group_id: id
                        },
                        success: function (data) {
                            if (data.error === 0) {
                                // location.reload();
                                window.location.href = laroute.route('admin.faq-group.index');
                            } else {
                                Swal.fire("Lỗi!", data.message, "error");
                            }
                        }
                    });
                }
            });
        });
    },
    updateStatus: function () {
        $('.switch-status').click(function () {
            let id = $(this).data('id');
            let stt = ($(this).data('status') === 1) ? 0 : 1;
            let t = $(this);
            $.ajax({
                url: laroute.route('admin.faq-group.update-status'),
                method: 'POST',
                dataType: 'JSON',
                data: {
                    faq_group_id: id,
                    is_actived: stt
                },
                success: function (res) {
                    if (!res.error) {
                        t.data('status', stt);
                        Swal.fire(res.message, "", "success");
                    } else {
                        Swal.fire(res.message, "", "error");
                        t.prop('checked', true);
                    }
                }
            });
        });
    }
};
faqGroup.init();
