var create = {
    save: function () {
        $.getJSON(laroute.route('admin.validation'), function (json) {
            var form = $('#form-create');

            form.validate({
                rules: {
                    feedback_form_name: {
                        required: true,
                        maxlength: 255
                    },
                    feedback_form_description: {
                        required: true,
                        maxlength: 5000
                    },
                    feedback_form_rating_min: {
                        required: true,
                        digits: true,
                        number:true
                    },
                    feedback_form_rating_max: {
                        required: true,
                        digits: true,
                        number:true
                    }
                },
                messages: {
                    feedback_form_name: {
                        required: json.page.form.form.required_name,
                        maxlength: json.page.form.form.max_name,
                    },
                    feedback_form_description: {
                        required: json.page.form.form.required_description,
                        maxlength: json.page.form.form.max_description,
                    },
                    feedback_form_rating_min: {
                        required: json.page.form.form.required_rating_min,
                        digits: json.page.form.form.int_rating_min,
                        number: json.page.form.form.int_rating_min,
                    },
                    feedback_form_rating_max: {
                        required: json.page.form.form.required_rating_max,
                        digits: json.page.form.form.int_rating_max,
                        number: json.page.form.form.int_rating_max,
                    },
                },
            });

            if (!form.valid()) {
                return false;
            }

            var feedback_form_active = 0;
            if ($('#feedback_form_active').is(":checked")) {
                feedback_form_active = 1;
            } else {
                feedback_form_active = 0;
            }

            $.ajax({
                url: laroute.route('page.form.form.create.post'),
                method:'POST',
                dataType:'JSON',
                data: {
                    feedback_form_name: $('#feedback_form_name').val(),
                    feedback_form_description: $('#feedback_form_description').val(),
                    feedback_form_rating_min: $('#feedback_form_rating_min').val(),
                    feedback_form_rating_max: $('#feedback_form_rating_max').val(),
                    feedback_form_active: feedback_form_active,
                },
                success:function (res) {
                    if (res.error == false) {
                        swal.fire(res.data, "", "success").then(function (result) {
                            window.location.href = laroute.route('page.form.form');
                        });
                    } else {
                        swal.fire(res.data, '', "error").then(function () {
                            window.location.reload();
                        });
                    }
                },
            });

        });
    },
}

var edit = {
    save: function () {
        $.getJSON(laroute.route('admin.validation'), function (json) {
            var form = $('#form-create');

            form.validate({
                rules: {
                    feedback_form_name: {
                        required: true,
                        maxlength: 255
                    },
                    feedback_form_description: {
                        required: true,
                        maxlength: 5000
                    },
                    feedback_form_rating_min: {
                        required: true,
                        digits: true,
                        number:true
                    },
                    feedback_form_rating_max: {
                        required: true,
                        digits: true,
                        number:true
                    }
                },
                messages: {
                    feedback_form_name: {
                        required: json.page.form.form.required_name,
                        maxlength: json.page.form.form.max_name,
                    },
                    feedback_form_description: {
                        required: json.page.form.form.required_description,
                        maxlength: json.page.form.form.max_description,
                    },
                    feedback_form_rating_min: {
                        required: json.page.form.form.required_rating_min,
                        digits: json.page.form.form.int_rating_min,
                        number: json.page.form.form.int_rating_min,
                    },
                    feedback_form_rating_max: {
                        required: json.page.form.form.required_rating_max,
                        digits: json.page.form.form.int_rating_max,
                        number: json.page.form.form.int_rating_max,
                    },
                },
            });

            if (!form.valid()) {
                return false;
            }

            var feedback_form_active = 0;
            if ($('#feedback_form_active').is(":checked")) {
                feedback_form_active = 1;
            } else {
                feedback_form_active = 0;
            }

            $.ajax({
                url: laroute.route('page.form.form.edit.post'),
                method:'POST',
                dataType:'JSON',
                data: {
                    feedback_form_id: $('#feedback_form_id').val(),
                    feedback_form_name: $('#feedback_form_name').val(),
                    feedback_form_description: $('#feedback_form_description').val(),
                    feedback_form_rating_min: $('#feedback_form_rating_min').val(),
                    feedback_form_rating_max: $('#feedback_form_rating_max').val(),
                    feedback_form_active: feedback_form_active,
                },
                success:function (res) {
                    if (res.error == false) {
                        swal.fire(res.data, "", "success").then(function (result) {
                            window.location.href = laroute.route('page.form.form');
                        });
                    } else {
                        swal.fire(res.data, '', "error").then(function () {
                            window.location.reload();
                        });
                    }
                },
            });

        });
    },
}