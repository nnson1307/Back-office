var page = {
    filter: function () {
        $('#form-filter').submit();
    },
    sort: function (o, col) {
        var sort = $(o).data('sort');
        switch (col) {
            case 'page_name':
                $("#sort_page_name").val(sort);
                $("#sort_page_order").val(null);
                $("#sort_type").val(null);
                $("#sort_updated_at").val(null);
                break;
            case 'page_order':
                $("#sort_page_name").val(null);
                $("#sort_page_order").val(sort);
                $("#sort_type").val(null);
                $("#sort_updated_at").val(null);
                break;
            case 'type':
                $("#sort_page_name").val(null);
                $("#sort_page_order").val(null);
                $("#sort_type").val(sort);
                $("#sort_updated_at").val(null);
                break;
            case 'updated_at':
                $("#sort_page_name").val(null);
                $("#sort_page_order").val(null);
                $("#sort_type").val(null);
                $("#sort_updated_at").val(sort);
                break;
        }
        page.filter();
    }
};
