var authority = {
    _init: function () {
        $(document).ready(function () {
            $('#role_group_id').select2({
                placeholder: "Hãy chọn nhóm quyền"
            });
        });
    },
    check_authority: function (obj, id_user) {
        var id_station = $(obj).val();
        if ($(obj).is(':checked') == true) {
            $.ajax({
                url: laroute.route('user.add-user-station'),
                dataType: 'JSON',
                method: 'POST',
                data: {
                    id_user: id_user,
                    id_station: id_station
                },
                success: function (res) {
                    if (res.status == 1) {
                        swal.fire("Thêm quyền trạm thành công!", "", "success");
                    }else{
                        swal.fire("Thêm quyền trạm thất bại!", "", "error");
                    }
                }
            });
        } else {
            $.ajax({
                url:laroute.route('user.remove-user-station'),
                dataType:'JSON',
                method:'POST',
                data:{
                    id_user: id_user,
                    id_station: id_station
                },
                success:function (res) {
                    if (res.status == 1) {
                        swal.fire("Xóa quyền trạm thành công!", "", "success");
                    }else{
                        swal.fire("Xóa quyền trạm thất bại!", "", "error");
                    }
                }
            });
        }
    }

};
authority._init();