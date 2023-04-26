"use strict";
// Class definition

var KTAppUserListDatatable = function () {

    // variables
    var datatable;
    var heading;

    var setHeading = function (arrHeading) {
        heading = arrHeading;
    };

    // init
    var init = function () {
        $('.kt-selectpicker').selectpicker();
        // init the datatables. Learn more: https://keenthemes.com/metronic/?page=docs&section=datatable
        datatable = $('#kt_apps_user_list_datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        // url: 'https://keenthemes.com/metronic/themes/themes/metronic/dist/preview/inc/api/datatables/demos/default.php',
                        url: laroute.route('user.list'),
                    },
                },

                pageSize: 10, // display 20 records per page
                serverPaging: true,
                serverFiltering: true,
                serverSorting: false,
            },

            // layout definition
            layout: {
                scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                footer: false, // display/hide footer
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#search'),
                delay: 400,
            },

            // columns definition
            columns: [{
                field: 'id',
                title: '#',
                sortable: false,
                width: 20,
                selector: {
                    class: 'kt-checkbox--solid'
                },
                textAlign: 'center',
            },
                {
                    field: "email",
                    title: heading.email,
                    width: 220,
                    // callback function support for column rendering
                    template: function (data, i) {
                        var output = '';
                        let link = laroute.route('user.edit', {id: data.id});

                        if (data.avatar != null) {
                            output = '<div class="kt-user-card-v2">\
								<div class="kt-user-card-v2__pic">\
									<img src="' + data.avatar + '" alt="photo">\
								</div>\
								<div class="kt-user-card-v2__details">\
									<a href="' + link + '" class="kt-user-card-v2__name">' + data.email + '</a>\
									<span class="kt-user-card-v2__desc text-capitalize">' + data.first_name + '</span>\
								</div>\
							</div>';
                        } else {
                            var stateNo = KTUtil.getRandomInt(0, 6);
                            var states = [
                                'success',
                                'brand',
                                'danger',
                                'success',
                                'warning',
                                'primary',
                                'info'
                            ];
                            var state = states[stateNo];

                            output = '<div class="kt-user-card-v2">\
                        			<div class="kt-user-card-v2__pic">\
                        				<div class="kt-badge kt-badge--xl kt-badge--' + state + '">' + data.first_name.substring(0, 1).toUpperCase() + '</div>\
                        			</div>\
                        			<div class="kt-user-card-v2__details">\
                        				<a href="' + link + '" class="kt-user-card-v2__name">' + data.email + '</a>\
                        				<span class="kt-user-card-v2__desc text-capitalize">' + data.first_name + '</span>\
                        			</div>\
                        		</div>';
                        }
                        return output;
                    }
                },
                {
                    field: 'country',
                    title: heading.country,
                    textAlign: 'center',
                },
                {
                    field: "organize_name",
                    title: heading.organize,
                    width: 'auto',
                    autoHide: false,
                    // callback function support for column rendering
                    template: function (data, i) {
                        var number = i + 1;
                        while (number > 5) {
                            number = number - 3;
                        }
                        var img = number + '.png';

                        var organize_name = '';
                        var country = '';
                        if (data.organize_name != null) {
                            organize_name = data.organize_name;
                        }
                        if (data.country != null) {
                            country = data.country;
                        }

                        var output = '';

                        if (data.organize_avatar != null) {
                            output = '\
                        <div class="kt-user-card-v2">\
                            <div class="kt-user-card-v2__pic">\
                                <img src="' + data.organize_avatar + '" alt="photo">\
                            </div>\
                            <div class="kt-user-card-v2__details">\
                                <span class="kt-user-card-v2__name">' + organize_name + '</span>\
                                <span class="kt-user-card-v2__email">' +
                                country + '</span>\
                            </div>\
                        </div>';
                        } else {

                            output = '\
                        <div class="kt-user-card-v2">\
                            <div class="kt-user-card-v2__pic">\
                                <img src="https://keenthemes.com/metronic/preview/assets/media/client-logos/logo' + img + '" alt="photo">\
                            </div>\
                            <div class="kt-user-card-v2__details">\
                                <span  class="kt-user-card-v2__name">' + organize_name + '</span>\
                                <span class="kt-user-card-v2__email">' +
                                country + '</span>\
                            </div>\
                        </div>';

                        }


                        return output;
                    }
                }, {
                    field: "is_actived",
                    title: heading.status,
                    width: 100,
                    // callback function support for column rendering
                    template: function (row) {
                        var status = {
                            0: {
                                'title': heading.disable,
                                'class': ' btn-label-warning'
                            },
                            1: {
                                'title': heading.enable,
                                'class': ' btn-label-success'
                            },
                        };
                        return '<span class="btn btn-bold btn-sm btn-font-sm ' + status[row.is_actived].class + '">' + status[row.is_actived].title + '</span>';
                    }
                },

                {
                    field: 'created_at',
                    title: heading.created_time,
                    textAlign: 'center',
                },

                {
                    field: "Actions",
                    width: 80,
                    title: heading.authority,
                    sortable: false,
                    autoHide: false,
                    template: function (data) {
                        var linksss = laroute.route('admin.user-station.authorization.add', {id: data.id});
                        if ($('#edit-role-authorize').val() == 1) {
                            return '\
								<a href="' + linksss + '" class="btn btn-sm btn-clean btn-icon btn-icon-md">\
									<i class="flaticon2-group"></i>\
								</a>\
						';
                        }
                    },


                },
                {
                    field: 'last_login',
                    title: heading.last_login,
                    textAlign: 'center',
                }]
        });
    }

    // search
    var search = function () {
        $('#kt_form_status').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });
    }

    // selection
    var selection = function () {
        // init form controls
        //$('#kt_form_status, #kt_form_type').selectpicker();

        // event handler on check and uncheck on records
        datatable.on('kt-datatable--on-check kt-datatable--on-uncheck kt-datatable--on-layout-updated', function (e) {
            var checkedNodes = datatable.rows('.kt-datatable__row--active').nodes(); // get selected records
            var count = checkedNodes.length; // selected records count

            $('#kt_subheader_group_selected_rows').html(count);

            if (count > 0) {
                $('#kt_subheader_search').addClass('kt-hidden');
                $('#kt_subheader_group_actions').removeClass('kt-hidden');
            } else {
                $('#kt_subheader_search').removeClass('kt-hidden');
                $('#kt_subheader_group_actions').addClass('kt-hidden');
            }
        });
    };

    // fetch selected records
    var changePassword = function () {
        // event handler on selected records fetch modal launch
        $('#kt_datatable_records_fetch_modal').on('show.bs.modal', function (e) {
            // show loading dialog
            var loading = new KTDialog({'type': 'loader', 'placement': 'top center', 'message': 'Loading ...'});
            loading.show();

            setTimeout(function () {
                loading.hide();
            }, 1000);

            // fetch selected IDs
            var ids = datatable.rows('.kt-datatable__row--active').nodes().find('.kt-checkbox--single > [type="checkbox"]').map(function (i, chk) {
                return $(chk).val();
            });
            var id = [];
            $.map(ids, function (a) {
                id.push(a);
            });

            $('#submit-pass').click(function () {
                $('#form-password').validate({
                    rules: {
                        id: id,
                        password_new: "pwcheck",

                    },
                    messages: {
                        password_new: {
                            required: $('#enterPass').val()
                        },

                    },
                    submitHandler: function () {
                        $.ajax({
                            url: laroute.route('user.submit-new-password'),
                            dataType: 'JSON',
                            method: 'POST',
                            data: {
                                password: $('#password_new').val(),
                                id: id
                            }, success: function (res) {
                                if ($('#lang_hide').val() == 'vi') {
                                    if (res.error == true) {
                                        swal.fire("Thay đổi mật khẩu thất bại!", "", "error");
                                    } else {
                                        swal.fire("Thay đổi mật khẩu thành công!", "", "success").then(function (result) {
                                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                                window.location.reload();
                                            }
                                            if (result.value == true) {
                                                window.location.reload();
                                            }
                                        });
                                    }
                                } else {
                                    if (res.error == true) {
                                        swal.fire("Change password fail!", "", "error");
                                    } else {
                                        swal.fire("Change password success!", "", "success").then(function (result) {
                                            if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                                window.location.reload();
                                            }
                                            if (result.value == true) {
                                                window.location.reload();
                                            }
                                        });
                                    }
                                }

                            }
                        })
                    }
                });
            });

        });
    };

    // selected records status update
    var selectedStatusUpdate = function () {
        $('#kt_subheader_group_actions_status_change').on('click', "[data-toggle='status-change']", function () {
            var status = $(this).find(".kt-nav__link-text").html();

            var statusid = $(this).attr('data-status');

            // fetch selected IDs
            var ids = datatable.rows('.kt-datatable__row--active').nodes().find('.kt-checkbox--single > [type="checkbox"]').map(function (i, chk) {
                return $(chk).val();
            });

            if (ids.length > 0) {
                var id = [];
                $.map(ids, function (a) {
                    id.push(a);
                });
                if ($('#lang_hide').val() == 'vi') {
                    swal.fire({
                        buttonsStyling: false,

                        html: "Bạn có muốn cập nhật " + ids.length + " người dùng sang trạng thái " + status + " ?",
                        type: "info",

                        confirmButtonText: "Cập nhật",
                        confirmButtonClass: "btn btn-sm btn-bold btn-brand",

                        showCancelButton: true,
                        cancelButtonText: "Hủy",
                        cancelButtonClass: "btn btn-sm btn-bold btn-default"
                    }).then(function (result) {
                        if (result.value) {
                            $.post(laroute.route('user.change-status'), {id: id, status: statusid}, function () {
                                swal.fire("Cập nhật trạng thái thành công!", "", "success").then(function (result) {
                                    if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                        window.location.reload();
                                    }
                                    if (result.value == true) {
                                        window.location.reload();
                                    }
                                });

                            });

                        }
                    });
                } else {
                    // learn more: https://sweetalert2.github.io/
                    swal.fire({
                        buttonsStyling: false,

                        html: "Are you sure to update " + ids.length + " selected records status to " + status + " ?",
                        type: "info",

                        confirmButtonText: "Yes, update!",
                        confirmButtonClass: "btn btn-sm btn-bold btn-brand",

                        showCancelButton: true,
                        cancelButtonText: "No, cancel",
                        cancelButtonClass: "btn btn-sm btn-bold btn-default"
                    }).then(function (result) {
                        if (result.value) {
                            $.post(laroute.route('user.change-status'), {id: id, status: statusid}, function () {
                                swal.fire("Change status success!", "", "success").then(function (result) {
                                    if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                        window.location.reload();
                                    }
                                    if (result.value == true) {
                                        window.location.reload();
                                    }
                                });

                            });

                        }
                    });
                }
            }
        });
    };

    // selected records delete
    var selectedDelete = function () {
        $('#kt_subheader_group_actions_delete_all').on('click', function () {
            // fetch selected IDs
            var ids = datatable.rows('.kt-datatable__row--active').nodes().find('.kt-checkbox--single > [type="checkbox"]').map(function (i, chk) {
                return $(chk).val();
            });
            if (ids.length > 0) {
                var id = [];
                $.map(ids, function (a) {
                    id.push(a);
                });
                if ($('#lang_hide').val() == 'vi') {
                    // learn more: https://sweetalert2.github.io/
                    swal.fire({
                        buttonsStyling: false,

                        text: "Bạn có muốn xóa " + ids.length + " người dùng ?",
                        type: "danger",

                        confirmButtonText: "Xóa",
                        confirmButtonClass: "btn btn-sm btn-bold btn-danger",

                        showCancelButton: true,
                        cancelButtonText: "Hủy",
                        cancelButtonClass: "btn btn-sm btn-bold btn-brand"
                    }).then(function (result) {
                        if (result.value) {
                            $.post(laroute.route('user.remove'), {id: id}, function () {
                                swal.fire("Xóa thành công!", "", "success").then(function (result) {
                                    if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                        window.location.reload();
                                    }
                                    if (result.value == true) {
                                        window.location.reload();
                                    }
                                });

                            });

                        }
                    });
                } else {
                    // learn more: https://sweetalert2.github.io/
                    swal.fire({
                        buttonsStyling: false,

                        text: "Are you sure to delete " + ids.length + " user ?",
                        type: "danger",

                        confirmButtonText: "Yes, delete!",
                        confirmButtonClass: "btn btn-sm btn-bold btn-danger",

                        showCancelButton: true,
                        cancelButtonText: "No, cancel",
                        cancelButtonClass: "btn btn-sm btn-bold btn-brand"
                    }).then(function (result) {
                        if (result.value) {
                            $.post(laroute.route('user.remove'), {id: id}, function () {
                                swal.fire("Delete success!", "", "success").then(function (result) {
                                    if (result.dismiss == 'esc' || result.dismiss == 'backdrop') {
                                        window.location.reload();
                                    }
                                    if (result.value == true) {
                                        window.location.reload();
                                    }
                                });

                            });

                        }
                    });
                }

            }
        });
    };

    var updateTotal = function () {
        datatable.on('kt-datatable--on-layout-updated', function () {
            //$('#kt_subheader_total').html(datatable.getTotalRows() + ' Total');
        });
    };


    return {
        // public functions
        init: function () {
            init();
            search();
            selection();
            changePassword();
            selectedStatusUpdate();
            selectedDelete();
            updateTotal();
        },
        setHeading: function (arrHeading) {
            setHeading(arrHeading);
        }
    };
}();

// On document ready
KTUtil.ready(function () {
    KTAppUserListDatatable.init();
});

if ($.validator) {
    $.validator.addMethod("check_date_of_birth", function (value, element) {

        var day = $("#dob_day").val();
        var month = $("#dob_month").val();
        var year = $("#dob_year").val();
        var age = 18;

        var mydate = new Date();
        mydate.setFullYear(year, month - 1, day);

        var currdate = new Date();
        currdate.setFullYear(currdate.getFullYear() - age);

        return currdate > mydate;

    }, "Bạn phải trên 18 tuổi.");
    let securePass;
    if ($('#lang_hide').val() == 'vi') {
        securePass = 'Mật khẩu chưa bảo mật';
    } else {
        securePass = 'Password is not secure';
    }
    $.validator.addMethod("pwcheck", function (pswd) {

        var rulePass = 0;
        //validate letter
        if (pswd.match(/[a-z]/)) {
            rulePass = rulePass + 1;
        }

        if (pswd.match(/[A-Z]/)) {
            rulePass = rulePass + 1;
        }
        if (pswd.match(/\d/)) {
            rulePass = rulePass + 1;
        }
        if (pswd.match(/[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/)) {
            rulePass = rulePass + 1;
        }

        return rulePass >= 2;
    }, securePass);
}
