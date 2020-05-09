$(function () {
    $("#txtFile").change(function () {
        var url = $('#frm').attr('action');
        //alert(url);
        var frm = $('#frm');

        var data = new FormData();
        if (frm.find('#txtFile[type="file"]').length === 1) {
            data.append('file', frm.find('#txtFile')[0].files[0]);
        }

        //data.append('title', frm.find('#txtTitle').val());
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener('progress', function (evt) {
            var percentage = (evt.loaded / evt.total) * 100;
            upadte_progressbar(Math.round(percentage));
        }, false);

        ajax.addEventListener('load', function (evt) {
            //console.log(evt);
            if (evt.target.responseText.toLowerCase().indexOf('error') >= 0) {
                //alert(evt.target.responseText);
                show_error(evt.target.responseText);
            } else {
               // alert(evt.target.responseText);
               // alert("jay jagannath");
                preview_image(evt.target.responseText);
            }
            upadte_progressbar(0);
            frm[0].reset();

        }, false);
        ajax.addEventListener('error', function (evt) {
            show_error('upload failed');
            upadte_progressbar(0);
        }, false);
        ajax.addEventListener('abort', function (evt) {
            show_error('upload aborted');
            upadte_progressbar(0);
        }, false);
        ajax.open('POST', url);
        ajax.send(data);

        return false;
    });
});

function upadte_progressbar(value) {
    $('#progressBar').css('width', value + '%').html(value + '%');
    if (value == 0) {
        $('.progress').hide();
    } else {
        $('.progress').show();
    }
}

function preview_image(src) {
    $('.thumbnail').show();
    var d = new Date();
    $('#img-preview').removeAttr('src').attr('alt', 'loading image');
    $('#img-preview').attr('src', src + '?random=' + d.getTime());
    $('#img-previewq').removeAttr('src').attr('alt', 'loading image');
    $('#img-previewq').attr('src', src + '?random=' + d.getTime());
}

function show_error(error) {
    $('.thumbnail, #progressBar').hide();
    $('#imageUploading').modal('show');
    //$('#error').html(error);
}