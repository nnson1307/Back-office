var create = {
    save: function () {
        $.getJSON(laroute.route('admin.validation'), function (json) {
            var form = $('#form-create');

            form.validate({
                rules: {
                    feedback_question_title: {
                        required: true,
                        maxlength: 500
                    },
                    feedback_question_position: {
                        digits: true,
                        number:true
                    }
                },
                messages: {
                    feedback_question_title: {
                        required: json.page.form.question.required_title,
                        maxlength: json.page.form.question.max_title,
                    },
                    feedback_question_position: {
                        digits: json.page.form.question.int_position,
                        number: json.page.form.question.int_position,
                    }
                },
            });

            if (!form.valid()) {
                return false;
            }

            var feedback_question_active = 0;
            if ($('#feedback_question_active').is(":checked")) {
                feedback_question_active = 1;
            } else {
                feedback_question_active = 0;
            }

            $.ajax({
                url: laroute.route('page.form.question.create.post'),
                method:'POST',
                dataType:'JSON',
                data: {
                    feedback_form_id: $('#feedback_form_id').val(),
                    feedback_question_type: $('#feedback_question_type').val(),
                    feedback_question_title: $('#feedback_question_title').val(),
                    feedback_question_position: $('#feedback_question_position').val(),
                    feedback_question_active: feedback_question_active,
                },
                success:function (res) {
                    if (res.error == false) {
                        swal.fire(res.data, "", "success").then(function (result) {
                            window.location.href = laroute.route('page.form.question');
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
                    feedback_question_title: {
                        required: true,
                        maxlength: 500
                    },
                    feedback_question_position: {
                        digits: true,
                        number:true
                    }
                },
                messages: {
                    feedback_question_title: {
                        required: json.page.form.question.required_title,
                        maxlength: json.page.form.question.max_title,
                    },
                    feedback_question_position: {
                        digits: json.page.form.question.int_position,
                        number: json.page.form.question.int_position,
                    }
                },
            });

            if (!form.valid()) {
                return false;
            }

            var feedback_question_active = 0;
            if ($('#feedback_question_active').is(":checked")) {
                feedback_question_active = 1;
            } else {
                feedback_question_active = 0;
            }

            $.ajax({
                url: laroute.route('page.form.question.edit.post'),
                method:'POST',
                dataType:'JSON',
                data: {
                    feedback_question_id: $('#feedback_question_id').val(),
                    feedback_form_id: $('#feedback_form_id').val(),
                    feedback_question_type: $('#feedback_question_type').val(),
                    feedback_question_title: $('#feedback_question_title').val(),
                    feedback_question_position: $('#feedback_question_position').val(),
                    feedback_question_active: feedback_question_active,
                },
                success:function (res) {
                    if (res.error == false) {
                        swal.fire(res.data, "", "success").then(function (result) {
                            window.location.href = laroute.route('page.form.question');
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