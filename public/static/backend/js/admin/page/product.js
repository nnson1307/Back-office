var product = {
    product_id_list: null,
    selected_product: [],
    countProduct: 0,
    init: function () {
        $('.select2').select2({
            'width': '100%'
        });
        product.changeType();
        product.moveRow();
        product.moveRowUp();
        product.moveRowDown();
    },
    changeType: function () {
        $('input[type=radio][name=type]').change(function() {
            if (this.value === 'auto') {
                $('#type-auto').css({
                    'display': 'block'
                });
                $('#type-manual').css({
                    'display': 'none'
                });
                $('#auto_category').val('0').trigger("change");
                $('#auto_total_display').val('5').trigger("change");
                $('#auto_sort').prop("checked", true);
            }
            else if (this.value === 'manual') {
                $('#type-manual').css({
                    'display': 'block'
                });
                $('#type-auto').css({
                    'display': 'none'
                });
            }
        });
    },
    moveRow: function () {
        $(document).on('mousedown', '.category-move', function () {
            $(function () {
                $(".sortable").sortable({
                    placeholder: "ui-state-highlight",
                    handle: ".category-move"
                });
            });
        });
    },
    moveRowUp: function () {
        $(document).on('click', '.category-click-up', function () {
            var level = $(this).data('level');
            var e = $(this).closest('.level-' + level);
            e.prev().insertAfter(e);
        });
    },
    moveRowDown: function () {
        $(document).on('click', '.category-click-down', function () {
            var level = $(this).data('level');
            var e = $(this).closest('.level-' + level);
            e.next().insertBefore(e);
        });
    },
    openPopup: function () {
        var listProduct = [];
        var countRow = 0;
        $('#table-list-product tbody').find('input:hidden').each(function () {
            var t = $(this);
            listProduct.push(t.val());
            countRow++;
        });
        product.countProduct = countRow + product.selected_product.length;
        product.product_id_list = listProduct;
        $.ajax({
            url: laroute.route('page.product.get-list-product'),
            method: 'POST',
            data: {
                product_id_list: listProduct,
                selected_product: product.selected_product
            },
            success: function (res) {
                $('#popup-product').html(res);
                $('#modal-add-product').modal();
            }
        });
    },
    removeRow: function (t) {
        $(t).parentsUntil('tbody').remove();
    },
    selectOne: function (t) {
        var inputVal = t.value;
        if (t.checked) {
            if (jQuery.inArray(inputVal, product.selected_product) === -1) {
                if (inputVal !== 'on') {
                    product.selected_product.push(inputVal);
                    product.countProduct++;
                }
            }
        } else {
            if (jQuery.inArray(inputVal, product.selected_product) !== -1) {
                product.selected_product = jQuery.grep(product.selected_product, function (value) {
                    return value != inputVal;
                });
                product.countProduct--;
            }
        }
    },
    selectAll: function (t, table) {
        if (t.checked) {
            // Iterate each checkbox
            $('#'+table+' input:checkbox').each(function () {
                this.checked = true;
                var inputVal = this.value;
                if (jQuery.inArray(inputVal, product.selected_product) === -1) {
                    if (inputVal !== 'on') {
                        product.selected_product.push(inputVal);
                        product.countProduct++;
                    }
                }
            });
        } else {
            $('#'+table+' input:checkbox').each(function () {
                this.checked = false;
                var inputVal = this.value;
                if (jQuery.inArray(inputVal, product.selected_product) !== -1) {
                    product.selected_product = jQuery.grep(product.selected_product, function (value) {
                        return value != inputVal;
                    });
                    product.countProduct--;
                }
            });
        }
    },
    addCollectionProduct: function () {
        $.getJSON(laroute.route('admin.validation'),function (json) {
            if (product.selected_product.length == 0) {
                swal.fire("Bạn chưa chọn sản phẩm nào", "", "warning");
            } else {
                if (product.countProduct <= 20) {
                    $.ajax({
                        url: laroute.route('page.product.add-collection-product'),
                        method: 'POST',
                        dataType: 'HTML',
                        data: {
                            product_id_list: product.selected_product
                        },
                        success: function (res) {
                            product.selected_product = [];
                            $('#table-list-product tbody').append(res);
                            $('#modal-add-product').modal('hide');
                        }
                    });
                } else {
                    swal.fire(json.notification.exceeded + (product.countProduct - 20) + json.notification.product, "", "warning");
                }
            }
        })
    },
    save: function (is_quit = 0) {
        var form = $('#form-submit');
        let url = ($('#page_product_id').length) ? laroute.route('page.product.update') : laroute.route('page.product.update');
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'JSON',
            data: form.serialize(),
            success: function (res) {
                if (!res.error) {
                    swal.fire(res.message, "", "success").then(function () {
                        if (is_quit === 0) {
                            window.location.reload();
                        } else {
                            window.location.href = laroute.route('page.banner');
                        }
                    });
                } else {
                    swal.fire(res.message, "", "error");
                }
            }
        });
    },
    submitSearch: function () {
        $.ajax({
            url: laroute.route('page.product.search-and-paging'),
            method: "POST",
            async: false,
            data: {
                not_in_product: product.product_id_list,
                keyword_product_master$product_name: $('#product_name_popup').val(),
                pc$category_id: $('#category_id_popup').val(),
                product_master$allow_sales: $('#allow_sales_popup').val(),
                product_uom$is_public: $('#is_published_popup').val(),
                display_eligible: $('#display_eligible_popup').val(),
                selected_product: product.selected_product
            },
            success: function (res) {
                $('#table-list-product-popup').html(res);
            }
        });
    },
    resetSearch: function () {
        $('#product_name_popup').val('');
        $('#category_id_popup').val('');
        $('#allow_sales_popup').val('');
        $('#is_published_popup').val('');
        $('#display_eligible_popup').val('');
        $.ajax({
            url: laroute.route('page.product.search-and-paging'),
            method: "POST",
            async: false,
            data: {
                not_in_product: product.product_id_list,
                keyword_product_master$product_name: $('#product_name_popup').val(),
                pc$category_id: $('#category_id_popup').val(),
                product_master$allow_sales: $('#allow_sales_popup').val(),
                product_uom$is_public: $('#is_published_popup').val(),
                display_eligible: $('#display_eligible_popup').val(),
                selected_product: product.selected_product
            },
            success: function (res) {
                $('#table-list-product-popup').html(res);
            }
        });
    },
    goToPage: function (page_number) {
        $.ajax({
            url: laroute.route('page.product.search-and-paging'),
            method: "POST",
            async: false,
            data: {
                not_in_product: product.product_id_list,
                keyword_product_master$product_name: $('#product_name_popup').val(),
                pc$category_id: $('#category_id_popup').val(),
                product_master$allow_sales: $('#allow_sales_popup').val(),
                product_uom$is_public: $('#is_published_popup').val(),
                display_eligible: $('#display_eligible_popup').val(),
                selected_product: product.selected_product,
                page: page_number
            },
            success: function (res) {
                $('#table-list-product-popup').html(res);
            }
        });
    }
};
product.init();
