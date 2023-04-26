var Banner = {
    uploadAvatar: function (input, bannerId) {
        $.getJSON('/page/validation', function (json) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.readAsDataURL(input.files[0]);
                var file_data = $('#getFileImage_'+bannerId).prop('files')[0];
                var form_data = new FormData();
                form_data.append('file', file_data);
                var fsize = input.files[0].size;
                var fileInput = input,
                    file = fileInput.files && fileInput.files[0];
                var img = new Image();

                if (Math.round(fsize / 1024) <= 2000) {
                    reader.onload = function (e) {
                        $('#div-image-'+bannerId).empty();
                        var tpl = $('#image-tpl-'+bannerId).html();
                        tpl = tpl.replace(/{link}/g, e.target.result);
                        $('#div-image-'+bannerId).append(tpl);
                    };
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
                                $('#image-'+bannerId).val(res.file);
                            }
                        }
                    });
                } else {
                    swal.fire("", json.page.image_max, "error");
                }
            }
        });
    },

    addBanner:function (pageId) {
        $.getJSON('/page/validation', function (json) {
            var totalBanner = $(".page-banner").length;
            if (totalBanner < 10) {
                $.ajax({
                    url: laroute.route("page.addBanner"),
                    method: "POST",
                    data: {
                        total_banners: totalBanner,
                        pageId: pageId
                    },
                    success: function (res) {
                        $(".kt-section__body").append(res);
                    }
                });
            } else {
                swal.fire("", json.page.edit.over_page, "error");
            }
        });
    },

    storeNewBanner:function (id) {
        console.log($('input[name=banner_'+id+']').val());
        $.ajax({
            url: laroute.route("page.banner.store"),
            method: "POST",
            data: {
                page_id: $("input[name=page_id]").val(),
                position: $("input[name=position_"+id+"]").val(),
                banner: $("input[name=banner_"+id+"]").val(),
                end_point: $("#"+id).val(),
                end_point_detail: $("input[name=end_point_detail_"+id+"]").val(),
                end_point_detail_click: $("input[name=end_point_detail_click_"+id+"]").val(),
                end_point_linkdetail_click: $("input[name=end_point_linkdetail_click_"+id+"]").val()
            },
            success: function (res) {
                swal.fire(res.message, "", res.iconMessage)
                    .then(function (result) {
                        if (result.value) {
                            window.location.reload();
                        }
                    });
            },
            error: function (res) {
                var mess_error = '';
                jQuery.each(res.responseJSON.errors, function (key, val) {
                    mess_error = mess_error.concat(val + '<br/>');
                });
                swal.fire(mess_error, "", "error");
            }
        });
    },

    updateBanner:function (id) {
        $.ajax({
            url: laroute.route("page.banner.update"),
            method: "POST",
            data: {
                banner_id: id,
                banner: $("input[name=banner_"+id+"]").val(),
                end_point: $("#"+id).val(),
                end_point_detail: $("input[name=end_point_detail_"+id+"]").val(),
                end_point_detail_click: $("input[name=end_point_detail_click_"+id+"]").val(),
                end_point_linkdetail_click: $("input[name=end_point_linkdetail_click_"+id+"]").val(),
            },
            success: function (res) {
                swal.fire(res.message, "", res.iconMessage)
                    .then(function (result) {
                        if (result.value) {
                            window.location.reload();
                        }
                    });
            },
            error: function (res) {
                var mess_error = '';
                jQuery.each(res.responseJSON.errors, function (key, val) {
                    mess_error = mess_error.concat(val + '<br/>');
                });
                swal.fire(mess_error, "", "error");
            }
        });
    },

    deleteBanner:function (id) {
        $.getJSON(laroute.route('page.validation'), function (json) {
            swal.fire({
                title: json.page.TITLE_POPUP,
                html: json.page.HTML_POPUP,
                buttonsStyling: false,

                confirmButtonText: json.page.YES_BUTTON,
                confirmButtonClass: "btn btn-sm btn-default btn-bold",

                showCancelButton: true,
                cancelButtonText: json.page.CANCEL_BUTTON,
                cancelButtonClass: "btn btn-sm btn-bold btn-brand"
            }).then(function (result) {
                if (result.value) {
                    $.post(laroute.route("page.banner.destroy", {id:id}), function (res) {
                        if (res.error == false) {
                            Banner.doSort();
                            setTimeout(function () {
                                location.reload();
                            }, 500);

                        } else {
                            Swal.fire(res.message, "", "error");
                        }
                    })
                }
            });
        });
    },

    deleteCreateBanner:function (id) {
        $.getJSON(laroute.route('page.validation'), function (json) {
            swal.fire({
                title: json.page.TITLE_POPUP,
                html: json.page.HTML_POPUP,
                buttonsStyling: false,

                confirmButtonText: json.page.YES_BUTTON,
                confirmButtonClass: "btn btn-sm btn-default btn-bold",

                showCancelButton: true,
                cancelButtonText: json.page.CANCEL_BUTTON,
                cancelButtonClass: "btn btn-sm btn-bold btn-brand"
            }).then(function (result) {
                if (result.value) {
                    $(".create-banner-"+id).remove();
                }
            });
        });
    },

    sortPosition:function () {
        $.getJSON(laroute.route('page.validation'), function (json) {
            $("#sortable").sortable({
                placeholder: "ui-state-highlight",
                handle: ".category-move",
                stop: function (event, ui) {
                    if ($(".page-banner-create").length > 0) {
                        $( "#sortable" ).sortable("cancel");
                        Swal.fire(json.page.add_then_sort, "", "error");
                    } else {
                        Banner.doSort();
                    }
                }
            });
        });
    },

    doSort : function(){
        $.getJSON(laroute.route('page.validation'), function (json) {
            var id_array = [];
            var sequence_array = [];
            $("#sortable").find(".page-banner").each(function () {
                id_array.push($(this).attr("data-id"));
            });

            $.ajax({
                method: 'POST',
                url: laroute.route('page.banner.sortPosition'),
                data: {id_array: id_array},
                success: function (result) {
                    if (result.success) {
                        toastr.success(json.page.sort_success);
                        var key = 1;
                        $(".banner-title").each(function () {
                            $(this).html('Banner '+ key++);
                        });
                    }
                }
            });
        });

    },

    sortUp:function (input) {
        $.getJSON(laroute.route('page.validation'), function (json) {
            var e = $(input).closest(".page-banner");

            if (e.prev().attr('class') == e.attr('class')) {
                // move up:
                e.prev().insertAfter(e);

                if ($(".page-banner-create").length > 0) {
                    Swal.fire(json.page.add_then_sort, "", "error");
                    e.next().insertBefore(e);
                } else {
                    var id_array = [];
                    var sequence_array = [];
                    $("#sortable").find(".page-banner").each(function () {
                        id_array.push($(this).attr("data-id"));
                    });

                    $.ajax({
                        method: 'POST',
                        url: laroute.route('page.banner.sortPosition'),
                        data: {id_array: id_array},
                        success: function (result) {
                            if (result.success) {
                                toastr.success(json.page.sort_success);
                                var key = 1;
                                $(".banner-title").each(function () {
                                    $(this).html('Banner ' + key++);
                                });
                            }
                        }
                    });
                }
            }
        });
    },

    sortDown:function (input) {
        $.getJSON(laroute.route('page.validation'), function (json) {
            var e = $(input).closest(".page-banner");

            if (e.next().attr('class') == e.attr('class')) {
                // move up:
                e.next().insertBefore(e);

                if ($(".page-banner-create").length > 0) {
                    Swal.fire(json.page.add_then_sort, "", "error");
                    e.prev().insertAfter(e);
                } else {
                    var id_array = [];
                    var sequence_array = [];
                    $("#sortable").find(".page-banner").each(function () {
                        id_array.push($(this).attr("data-id"));
                    });

                    $.ajax({
                        method: 'POST',
                        url: laroute.route('page.banner.sortPosition'),
                        data: {id_array: id_array},
                        success: function (result) {
                            if (result.success) {
                                toastr.success(json.page.sort_success);
                                var key = 1;
                                $(".banner-title").each(function () {
                                    $(this).html('Banner ' + key++);
                                });
                            }
                        }
                    });
                }
            }
        });
    }

};
