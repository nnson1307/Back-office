$('.--select2').select2();
var listUserGroup = {
    inputFiler: function () {
        $('.input-filter').show();
    },
    init: function () {
    },
    sort: function (o, col) {
        var sort = $(o).data('sort');
        switch (col) {
            case 'name':
                $("#sort_name").val(sort);
                $("#sort_filter_group_type").val(null);
                $("#sort_created_at").val(null);
                break;
            case 'type':
                $("#sort_name").val(null);
                $("#sort_filter_group_type").val(sort);
                $("#sort_created_at").val(null);
                break;
            case 'created_at':
                $("#sort_name").val(null);
                $("#sort_filter_group_type").val(null);
                $("#sort_created_at").val(sort);
                break;
        }
        listUserGroup.filter();
    },
    filter: function () {
        $('#form-filter').submit();
    },
};

listUserGroup.init();
