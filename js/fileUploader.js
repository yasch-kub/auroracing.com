$(document).ready(function() {

    function fileUploader(dropzone, url, onover, onleave, success) {
        this.allowedFileTypes = ["image/jpeg"];
        this.data = new FormData();
        this.dropzone = document.getElementById(dropzone);
        this.url = url;
        this.onleave = onleave;
        this.onover = onover;
        this.success = success;

        if (this.dropzone != null
            && this.onleave != null
            && this.onover != null) {
            this.setUpListeners();
        }
    }

    fileUploader.prototype.setUpListeners = function() {
        this.dropzone.ondrop = $.proxy(function(event) {
            event.preventDefault();
            console.log(event.dataTransfer.files);
            if (event.dataTransfer.files.length != 0)
                this.upload(event.dataTransfer.files);
            this.onleave();
        }, this);

        this.dropzone.ondragover = this.onover;
        this.dropzone.ondragleave = this.onleave;
    }
;
    fileUploader.prototype.upload = function(files) {
        var isPhotoToSend = false;
        for(var i = 0; i < files.length; i++)
            if ($.inArray(files[i].type, this.allowedFileTypes) != -1) {
                this.data.append('files[]', files[i]);
                isPhotoToSend = true
            }
            else
                console.log('File "' + files[i].name
                    + '" has wrong type! Supported types: '
                    + this.allowedFileTypes.toString());

        if (isPhotoToSend)
            this.request();
    };

    fileUploader.prototype.request = function() {
        this.xhr = new XMLHttpRequest();
        var success = this.success;

        this.xhr.onload = function() {
            success(this.responseText);
        };

        this.xhr.upload.onprogress = function(event){
            if (event.lengthComputable) {
                var percentComplete = event.loaded * 100 / event.total;
                console.log(percentComplete + '%');
            }
        };

        this.xhr.upload.onerror = function(){
            console.log('Error occured!');
        };

        this.xhr.upload.onload = function(){
            console.log('File is uploaded!');
        };

        this.xhr.open('POST', this.url);
        this.xhr.send(this.data);
        this.data = new FormData();
    };

    var avatarUploader = new fileUploader('avatarDropzone', '/changeAvatar',
        avatarDragOver, avatarDragLeave, avatarUploadSuccess);

    var photosUploader = new fileUploader('postImageDropzone', '/savePostImages',
        photosDragEvent, photosDragEvent, photosUploadSuccess);

    window.photosUploader = photosUploader;
});

function avatarDragOver() {
    return false;
}

function avatarDragLeave() {
    return false;
}

function avatarUploadSuccess(response) {
    console.log(response);
    var date = new Date();
    $('#avatarDropzone').attr('src', response + '?' + date.getTime());
}

function photosUploadSuccess(response) {
    console.log(response);
    var images = JSON.parse(response);
    console.log(images);
    $('#uploadedPhotos').val(response);
    images.forEach(function(image) {
        console.log(image);
        var div = '<div class="col-md-3 col-lg-4 col-sm-4 col-xs-12 img-thumbnail"><a><img class="img-responsive" src="/application/data/posts/temp/' + image + '"></a></div>';
        $('#photosPreview').append(div);
    });
}

function photosDragEvent() {
    return false;
}