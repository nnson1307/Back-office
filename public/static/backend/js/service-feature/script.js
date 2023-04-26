var updateFeature = {
    submit_index: function () {
        swal.fire({
            title: check_create,
            buttonsStyling: false,
            showCloseButton: true,
            html: '',
            type: "question",

            confirmButtonText: yes,
            confirmButtonClass: "btn btn-sm btn-default btn-bold",

            showCancelButton: true,
            cancelButtonText: no,
            cancelButtonClass: "btn btn-sm btn-bold btn-brand",
        }).then(function (result) {
            if (result.value == true) {
                var form = $('#form-register');
                form.validate({
                    rules: {
                        feature_group_name_redefine: {
                            required: true,
                            maxlength: 250
                        },
                    },
                    messages: {
                        feature_group_name_redefine: {
                            required: redefine_required,
                            maxlength: redefine_max
                        },
                    },
                });
                if (form.valid()) {

                    $.ajax({
                        url: laroute.route('service.service-feature.editPost'),
                        method: 'POST',
                        dataType: 'JSON',
                        data: {
                            feature_group_id: $('#feature_group_id').val(),
                            feature_group_name_redefine: $('#feature_group_name_redefine').val(),
                        },
                        success: function (res) {
                            if (res.error == false) {
                                swal.fire(feature_edit_success, "", "success").then(function () {
                                    window.location.href = laroute.route('service.service-feature.index');
                                });
                            } else {
                                swal.fire(feature_edit_fail, res.message, "error");
                            }
                        },
                        error: function (res) {
                            var mess_error = '';
                            $.map(res.responseJSON.errors, function (a) {
                                console.log(a);
                                mess_error = mess_error.concat(a + '<br/>');
                            });
                            swal.fire(feature_edit_fail, mess_error, "error");
                        }
                    })
                }
            }
        })

    },
};
