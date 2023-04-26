var activeDelete = $(".page-banner").length; // lần đầu load trang sẽ ko xóa params nếu có

function handleChange(bannerId, input)
{
    var objId = bannerId;
    if($(input).val() == 'url'){
        $("#end-point-linkdetail_"+objId).css("display", "flex");
        $("#end-point-detail_"+objId).css("display", "none");
    } else {
        $("#end-point-linkdetail_"+objId).css("display", "none");
        // xóa detail nếu có
        if (activeDelete == 0) {
            $("input[name=end_point_detail_"+objId+"]").val('');
            $("input[name=end_point_detail_click_"+objId+"]").val('');
        }
        activeDelete--;
        // $("input[name=end_point_detail]").val('');
        $("#end-point-detail_"+objId).css("display", "none");
        $("input[name=end_point_detail_"+objId+"]").attr('disabled', 'disabled');
        $("#end-point-modal").html('');

        var detailType1 = $(input).children(":selected").attr("data-type");
        if (detailType1 != '') {
            $("#end-point-detail_"+objId).css("display", "flex");
            $("input[name=end_point_detail_"+objId+"]").removeAttr('disabled');
        }
    }
}

$(".end_point").change();
var Endpoint = {

    handleClick:function (bannerId) {
        var bannerId = bannerId;
        var detailType = $("#"+bannerId).val();
        var end_point_value = $("input[name=end_point_detail_" + bannerId +"]").val();

        console.log(end_point_value);

        $.getJSON('/admin/validation', function (json) {
            $.ajax({
                url: laroute.route("admin.notification.detailEndPoint"),
                method: "GET",
                data: {
                    view: 'modal',
                    detail_type: detailType,
                    end_point_value : end_point_value
                },
                success: function (res) {
                    $("#end-point-modal").html(res);
                    if (detailType == 'order') {
                        $("#end-point-modal").find("#kt_modal_1").modal();
                        getDateTimePicker(['time_order', 'time_ship']);
                        getData(1);
                        var globalFilter;
                        $("#submit-search").click(function () {
                            var filter = {
                                order_code: $("input[name=order_code]").val(),
                                customer_name: $("input[name=customer_name]").val(),
                                phone: $("input[name=phone]").val(),
                                store_name: $("input[name=store_name]").val(),
                                brand_company: $("input[name=brand_company]").val(),
                                product_name: $("input[name=product_name]").val(),
                                sku_sale: $("input[name=sku_sale]").val(),
                                address: $("input[name=address]").val(),
                                time_order: $("input[name=time_order]").val(),
                                time_ship: $("input[name=time_ship]").val(),
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
                                    $('input[name=order_radio]').each(function (i, obj) {
                                        var id = $(this).attr("data-code");
                                        if (end_point_value == id) {
                                            $(this).attr("checked", "checked");
                                        }
                                    });
                                }
                            })
                        }

                        $("#choose-order").click(function () {
                            radio = $('input[name=order_radio]:checked').val();
                            code = $('input[name=order_radio]:checked').attr('data-code');
                            if (radio) {
                                $("input[name=end_point_detail_"+bannerId+"]").val(radio);
                                $("input[name=end_point_detail_click_"+bannerId+"]").val(code);
                                $("#close-btn").trigger("click");
                            } else {
                                swal.fire("", json.notification.end_point_detail_checked, "error");
                            }
                        });
                    } else if (detailType == 'product') {
                        $("#end-point-modal").find("#kt_modal_0").modal();
                        // getData(1);
                        var globalFilter;

                        $("#choose-product").click(function () {
                            radio = $('input[name=product_radio]:checked').val();
                            market_name = $('input[name=product_radio]:checked').attr('data-name');
                            console.log(radio, market_name);
                            if (radio) {
                                $("input[name=end_point_detail_"+bannerId+"]").val(radio);
                                $("input[name=end_point_detail_click_"+bannerId+"]").val(market_name);
                                $("#close-btn").trigger("click");
                            } else {
                                swal.fire("", json.notification.end_point_detail_checked, "error");
                            }
                        });
                    } else if (detailType == 'market') {
                        $("#end-point-modal").find("#kt_modal_0").modal();
                        getData(1);
                        var globalFilter;
                        $("#submit-search").click(function () {
                            var filter = {
                                keyword_campaign_master$campaign_description: $("input[name=campaign_description]").val(),
                                is_display: $("input[name=is_display]").val(),
                                campaign_master$campaign_type: $("#campaign_type").val()
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
                                    $('input[name=market_radio]').each(function (i, obj) {
                                        var id = $(this).val();
                                        if (end_point_value == id) {
                                            $(this).attr("checked", "checked");
                                        }
                                    });
                                }
                            })
                        }

                        $("#choose-market").click(function () {
                            radio = $('input[name=market_radio]:checked').val();
                            market_name = $('input[name=market_radio]:checked').attr('data-name');
                            if (radio) {
                                $("input[name=end_point_detail_"+bannerId+"]").val(radio);
                                $("input[name=end_point_detail_click_"+bannerId+"]").val(market_name);
                                $("#close-btn").trigger("click");
                            } else {
                                swal.fire("", json.notification.end_point_detail_checked, "error");
                            }
                        });
                    } else if (detailType == 'brand') {
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
                                $("input[name=end_point_detail_"+bannerId+"]").val(radio);
                                $("input[name=end_point_detail_click_"+bannerId+"]").val(brand_name);
                                $("#close-btn").trigger("click");
                            } else {
                                swal.fire("", json.notification.end_point_detail_checked, "error");
                            }
                        });
                    } else if (detailType == 'faq_brand') {
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
                                $("input[name=end_point_detail_"+bannerId+"]").val(radio);
                                $("input[name=end_point_detail_click_"+bannerId+"]").val(title);
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
}

var pageBanner = {
    loadProduct : function (page = 1) {
        $('#product-page').val(page);
        $.get(laroute.route('product.index'), $( '#form-filter' ).serializeArray(), function(res){
            $('#content-product-ajax').html(res);
        });
    },
}
