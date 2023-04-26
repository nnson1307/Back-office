$(document).ready(function () {
    $("input[name=send_time_radio]").change(function () {
        radio = $("input[name=send_time_radio]:checked").val();
        if (radio === "schedule") {
            $("#schedule-time").css("display", "block");
        } else {
            $("#schedule-time").css("display", "none");
        }
    });
})

var time = {
    immediately: function (key) {
        $("#"+key).css("display", "none");
    },

    schedule: function (key) {
        $("#"+key).css("display", "block");
    }
}

var config = {
    save: function () {
        var form = $('#form-update-config-noti').serialize();
        $.ajax({
            url:route_update,
            method:'POST',
            data:form,
            success: function (res) {
                if (res.error === true) {
                    swal.fire(thatbai, res.message, "error").then(function (res) {
                        // location.reload();
                    });
                } else {
                    swal.fire(thanhcong, "", "success").then(function (res) {
                        location.reload();
                    });
                }
            },
        });
    },

    change: function (type) {
        if ($('#'+type).is(":checked") === true) {
            $("#"+type+"_immediately").prop("checked", true);
            $("#"+type+"_schedule-time").css("display", "none");
        }
    }
}