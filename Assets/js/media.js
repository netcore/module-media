$(function () {
    var managerClass = '.js-file-manager';
    var fileManagerButton = $(managerClass);
    fileManagerButton.prop('disabled', false);
    $(document).on('click', managerClass, function (e) {
        e.preventDefault();
        $('#file-manager-modal').modal('toggle');
    });

    var FileManagerButton = function () {
        var ui = $.summernote.ui;

        // create button
        var button = ui.button({
            contents: '<i class="fa fa-folder-open"/>',
            tooltip: 'filemanager',
            click: function () {
                $('#file-manager-modal').modal('toggle');
            }
        });

        return button.render();   // return button as jquery object
    };

    $('.summernote-with-filemanager').summernote({
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['mybutton', ['filemanager']]
        ],

        buttons: {
            filemanager: FileManagerButton
        }
    });

    window.cripFilesystemManager = function (fileUrl, params) {

        // will recive params.flag and params.one parameter as they are
        // presented in href below
        var url = window.location.href;
        var arr = url.split("/");
        var result = arr[0] + "//" + arr[2] + fileUrl;

        if($('.summernote-with-filemanager').length) {
            $('.summernote-with-filemanager').summernote('editor.insertText', result);
        } else {
            fileManagerButton.parent().parent().find('input[type="text"]').val(result);
        }
        $('#file-manager-modal').modal('toggle');

        $('.js-media-url').val(result);

        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($('.js-media-url').val()).select();
        document.execCommand("copy");
        $temp.remove();

        $.growl({
            title : 'Success!',
            type: 'success',
            message : 'Media url successfully copied!'
        });
    };
});