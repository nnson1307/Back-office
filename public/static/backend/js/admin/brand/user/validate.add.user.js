$(document).ready(function () {
    $('#form-register-user').validate({
        rules: {
            email:'required',
        },
        messages: {
            email:{
                required: "chua dien email"
            },
        },


    });
});