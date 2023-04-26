// Index
$('#kt_daterangepicker_4').daterangepicker({
    buttonClasses: ' btn',
    applyClass: 'btn-primary',
    cancelClass: 'btn-secondary',

    timePicker: true,
    timePickerIncrement: 30,
    locale: {
        format: 'MM/DD/YYYY h:mm A'
    }
}, function (start, end, label) {
    $('#kt_daterangepicker_4 .form-control').val(start.format('MM/DD/YYYY h:mm A') + ' / ' + end.format('MM/DD/YYYY h:mm A'));
});

$(".is_actived").change(function () {
    var notiId = $(this).attr('data-id');
    var check;
    this.checked ? check = 1 : check = 0;
    var time = $(this).attr("data-non-specific-value");
    var type = $(this).attr("data-non-specific-type");
    // dùng để hiển thị lại giờ tương đối
    var oldTime = $("#time-"+notiId).text();
    $.ajax({
        method: 'POST',
        url: laroute.route('admin.notification.updateIsActived', {id:notiId}),
        data: {
            check: check,
            non_specific_value: time,
            non_specific_type: type,
            old_time: oldTime
        },
        success: function (result) {
            if (result.success == 1) {
                toastr.success('Cập nhật thành công!');
                if (check == 1) {
                    $("#status-"+notiId).html(statusPending);
                } else if (check == 0) {
                    $("#status-"+notiId).html(statusNot);
                }

                if (time != '' && type != '') {
                    $("#time-"+notiId).html(result.send_at);
                }
            } else {
                swal.fire("", result.message, "error").then(function (result) {
                    location.reload();
                });
                // $(this).attr('checked', false);
            }
        }
    });
});

function removeItem(id)
{
    $.getJSON(laroute.route('admin.validation'), function (json) {
        swal.fire({
            title: json.notification.TITLE_POPUP,
            html: json.notification.HTML_POPUP,
            buttonsStyling: false,

            confirmButtonText: json.notification.YES_BUTTON,
            confirmButtonClass: "btn btn-sm btn-default btn-bold",

            showCancelButton: true,
            cancelButtonText: json.notification.CANCEL_BUTTON,
            cancelButtonClass: "btn btn-sm btn-bold btn-brand"
        }).then(function (result) {
            if (result.value) {
                $.post(laroute.route("admin.notification.destroy", {id:id}), function (res) {
                    if (res.error == false) {
                        location.reload();
                    } else {
                        Swal.fire(res.message, "", "error");
                    }
                })
            }
        });
    });
}

// Xử lý thao tác
$("select[name=action]").change(function ()
{
    var value = $(this).children(":selected").val();
    if (value == 0) {
        return false;
    } else if (value != 'delete') {
        window.location.href = value;
    } else {
        var route = $(this).children(":selected").attr("data-route");
        var id = $(this).children(":selected").attr("data-id");
        removeItem(route, id);
    }
});
// End Index


var detailType = 0;
var activeDelete = 0; // lần đầu load trang sẽ ko xóa params nếu có
$("#end_point").change(function () {
    // xóa detail nếu có
    if (activeDelete == 1) {
        $("input[name=end_point_detail]").val('');
        $("input[name=end_point_detail_click]").val('');
    }
    activeDelete = 1;
    // $("input[name=end_point_detail]").val('');
    $("#end-point-detail").css("display", "none");
    $("input[name=end_point_detail]").attr('disabled', 'disabled');
    $("#end-point-modal").html('');

    var detailType1 = $(this).children(":selected").attr("data-type");
    if (detailType1 != '') {
        $("#end-point-detail").css("display", "flex");
        $("input[name=end_point_detail]").removeAttr('disabled');
        detailType = detailType1;
    }

    $("input[name=is_detail]").val($(this).children(":selected").attr("is-detail"));
    $("input[name=notification_type_id]").val($(this).children(":selected").attr("data-id"));
});

function handleClick()
{
    $.getJSON('/admin/validation', function (json) {
        $.ajax({
            url: laroute.route("admin.notification.detailEndPoint"),
            method: "GET",
            data: {
                view: 'modal',
                detail_type: detailType
            },
            success: function (res) {
                end_point_value = $("input[name=end_point_detail]").val();
                $("#end-point-modal").html(res);
                if (detailType == 'brand') {
                    $("#end-point-modal").find("#kt_modal_4").modal();
                    // $("#action-button").trigger("click");
                    //
                    getData(1);
                    var globalFilter;
                    $("#submit-search").click(function () {
                        var filter = {
                            brand_name: $("#search-brand-name").val(),
                            brand_code: $("#search-brand-code").val(),
                            company_name: $("#search-company-name").val(),
                            is_activated: $("#search-activated").val(),
                            is_published: $("#search-published").val(),
                        };
                        globalFilter = filter;
                        getData(1, filter);
                        return false;
                    });

                    $(document).on('click', '.kt-pagination__links a', function (event) {
                        event.preventDefault();
                        // $('li').removeClass('active');
                        // $(this).parent('li').addClass('active');
                        var page = $(this).attr('data-page');

                        getData(page, globalFilter);
                    });

                    function getData(page, filter = null)
                    {
                        $.ajax({
                            url: laroute.route("admin.notification.detailEndPoint", {page: page}),
                            method: "GET",
                            data: {
                                view: 'list',
                                detail_type: detailType,
                                filter: filter
                            },
                            success: function (res) {
                                $("#item-list").html(res);
                                $('input[name=brand_radio]').each(function (i, obj) {
                                    var id = $(this).val();
                                    if (end_point_value == id) {
                                        $(this).attr("checked", "checked");
                                    }
                                });
                            }
                        })
                    }

                    $("#choose-brand").click(function () {
                        radio = $('input[name=brand_radio]:checked').val();
                        brand_name = $('input[name=brand_radio]:checked').attr('data-name');
                        if (radio) {
                            $("input[name=end_point_detail]").val(radio);
                            $("input[name=end_point_detail_click]").val(brand_name);
                            $("#close-btn").trigger("click");
                        } else {
                            swal.fire("", json.notification.end_point_detail_checked, "error");
                        }
                    });
                } else if (detailType == 'faq') {
                    $("#end-point-modal").find("#kt_modal_3").modal();
                    // $("#action-button").trigger("click");
                    getData(1);
                    var globalFilter;
                    $("#submit-search").click(function () {
                        var filter = {
                            title: $("#search-title").val(),
                            group: $("#search-group").val(),
                            active: $("#search-activated").val(),
                        };
                        globalFilter = filter;
                        getData(1, filter);
                        return false;
                    });

                    $(document).on('click', '.kt-pagination__links a', function (event) {
                        event.preventDefault();
                        // $('li').removeClass('active');
                        // $(this).parent('li').addClass('active');
                        var page = $(this).attr('data-page');

                        getData(page, globalFilter);
                    });

                    function getData(page, filter = null)
                    {
                        $.ajax({
                            url: laroute.route("admin.notification.detailEndPoint", {page: page}),
                            method: "GET",
                            data: {
                                view: 'list',
                                detail_type: detailType,
                                filter: filter
                            },
                            success: function (res) {
                                $("#item-list").html(res);
                                $('input[name=faq_radio]').each(function (i, obj) {
                                    var id = $(this).val();
                                    if (end_point_value == id) {
                                        $(this).attr("checked", "checked");
                                    }
                                });
                            }
                        })
                    }

                    $("#choose-faq").click(function () {
                        radio = $('input[name=faq_radio]:checked').val();
                        title = $('input[name=faq_radio]:checked').attr('data-title');
                        if (radio) {
                            $("input[name=end_point_detail]").val(radio);
                            $("input[name=end_point_detail_click]").val(title);
                            $("#close-btn").trigger("click");
                        } else {
                            swal.fire("", json.notification.end_point_detail_checked, "error");
                        }
                    });
                }
            }
        });
    });
}

$('#specific_time').datetimepicker({
    todayHighlight: true,
    autoclose: true,
    pickerPosition: 'top-left',
    format: 'yyyy-mm-dd hh:ii'
});

$("input[name=send_time_radio]").change(function () {
    radio = $("input[name=send_time_radio]:checked").val();
    if (radio == 1) {
        $("#schedule-time").css("display", "flex");
    } else {
        $("#schedule-time").css("display", "none");
    }
});

$("select[name=schedule_time]").change(function () {
    value = $(this).val();
    if (value == 'non_specific_time') {
        $("#non_specific_time_display").css("display", "block");
        $("#specific_time_display").css("display", "none");
        $("#specific_time").removeClass("is-invalid");
        $("#specific_time-error").remove();
        $(".invalid-feedback").remove();
    }
    if (value == 'specific_time') {
        $("#specific_time_display").css("display", "flex");
        $("#non_specific_time_display").css("display", "none");
        $("#non_specific_time").removeClass("is-invalid");
        $("#non_specific_time-error").remove();
        $(".invalid-feedback").remove();
    }
});

$("select[name=action_group]").change(function () {
    value = $(this).val();
    if (value == 1) {
        $("#cover-action").removeAttr('style');
        $("input[name=action_name]").removeAttr('disabled');
    } else {
        $("#cover-action").css("display", "none");
        $("input[name=action_name]").attr('disabled', 'disabled');
    }
});

// trigger change cho view edit
$("select[name=action_group]").change();
$("#end_point").change();
$("input[name=send_time_radio]").change();

var script = {
    uploadAvatar: function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#div-image').empty();
                var tpl = $('#image-tpl').html();
                tpl = tpl.replace(/{link}/g, e.target.result);
                $('#div-image').append(tpl);

            };
            reader.readAsDataURL(input.files[0]);
            var file_data = $('#getFileImage').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);
            var fsize = input.files[0].size;
            var fileInput = input,
                file = fileInput.files && fileInput.files[0];
            var img = new Image();

            if (Math.round(fsize / 1024) <= 10240) {
                $('.error_img').text('');
                $.ajax({
                    url: laroute.route("admin.notification.upload"),
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (res) {
                        if (res.success == 1) {
                            $('#image').val(res.file);
                        }
                    }
                });
            }
        }
    },

    submit_add: function (is_quit) {
        $(".invalid-feedback").remove();
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-add');
            rules = {
                title: {required: true, maxlength: 255},
                short_title: {required: true, maxlength: 255},
                feature: {required: true, maxlength: 255}
            };

            messages = {
                title: {
                    required: json.notification.title_required,
                    maxlength: json.notification.max_255
                },
                short_title: {
                    required: json.notification.short_title_required,
                    maxlength: json.notification.max_255
                },
                feature: {
                    required: json.notification.feature_required,
                    maxlength: json.notification.max_255
                } };

            form.validate({
                rules: rules,
                messages: messages
            });

            if (!form.valid()) {
                return false;
            }

            // $.post(laroute.route('admin.notification.store'), $('#form-add').serialize(), function (res) {
            //     if (res.error == true) {
            //         swal.fire(res.message, "", "error")
            //             .then(function (result) {
            //                 if (result.value) {
            //                     window.location.href = laroute.route('admin.notification');
            //                 }
            //             });
            //     } else {
            //         swal.fire(res.message, "", "success").then(function (result) {
            //             if (result.value == true) {
            //                 window.location.href = laroute.route('admin.notification');
            //             }
            //         });
            //     }
            // });
            $.ajax({
                url: laroute.route('admin.notification.store'),
                method: 'POST',
                dataType: 'JSON',
                data: $('#form-add').serialize(),
                success: function (res) {
                    if (res.error) {
                        var iconMessage = "error";
                    } else {
                        var iconMessage = "success";
                    }
                    setTimeout(function () {
                        swal.fire(res.message, "", iconMessage)
                            .then(function (result) {
                                if (result.value) {
                                    if (is_quit === 0) {
                                        window.location.reload();
                                    } else {
                                        window.location.href = laroute.route('admin.notification');
                                    }
                                }
                            });
                    }, 1500);
                },
                error: function (res) {
                    var mess_error = '';
                    jQuery.each(res.responseJSON.errors, function (key, val) {
                        mess_error = mess_error.concat(val + '<br/>');
                    });
                    swal.fire(mess_error, "", "error");
                }
            });
        });
    },

    submit_edit: function () {
        $(".invalid-feedback").remove();
        $.getJSON('/admin/validation', function (json) {
            var form = $('#form-edit');
            rules = {
                title: {required: true, maxlength: 255},
                short_title: {required: true, maxlength: 255},
                feature: {required: true, maxlength: 255}
            };

            messages = {
                title: {
                    required: json.notification.title_required,
                    maxlength: json.notification.max_255
                },
                short_title: {
                    required: json.notification.short_title_required,
                    maxlength: json.notification.max_255
                },
                feature: {
                    required: json.notification.feature_required,
                    maxlength: json.notification.max_255
                } };

            form.validate({
                rules: rules,
                messages: messages
            });

            if (!form.valid()) {
                return false;
            }

            $.ajax({
                url: laroute.route('admin.notification.update', {id:$("#noti-id").val()}),
                method: 'POST',
                dataType: 'JSON',
                data: $('#form-edit').serialize(),
                success: function (res) {
                    if (res.error) {
                        var iconMessage = "error";
                    } else {
                        var iconMessage = "success";
                    }
                    setTimeout(function () {
                        swal.fire(res.message, "", iconMessage)
                            .then(function (result) {
                                if (result.value) {
                                    window.location.href = laroute.route('admin.notification');
                                }
                            });
                    }, 1500);
                },
                error: function (res) {
                    var mess_error = '';
                    jQuery.each(res.responseJSON.errors, function (key, val) {
                        mess_error = mess_error.concat(val + '<br/>');
                    });
                    swal.fire(mess_error, "", "error");
                }
            });
        });
    },
}
