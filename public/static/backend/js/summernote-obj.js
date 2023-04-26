var Summernote = {
    generate: function (elementId) {
        $('#'+elementId).summernote({
            placeholder: '',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname', 'fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
            callbacks: {
                onImageUpload: function(files) {
                    for(let i=0; i < files.length; i++) {
                        $.upload(files[i]);
                    }
                }
            }
        });
    },

    uploadImg: function (elementId) {
        $.upload = function (file) {
            let out = new FormData();
            out.append('file', file, file.name);

            $.ajax({
                method: 'POST',
                url: laroute.route('admin.upload-img-summernote'),
                contentType: false,
                cache: false,
                processData: false,
                data: out,
                success: function (img) {
                    // var image = $('<img>').attr('src', '/uploads/image/' + img['file']);
                    $("#"+elementId).summernote('insertImage', img['file']);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.error(textStatus + " " + errorThrown);
                }
            });
        };
    }
};
