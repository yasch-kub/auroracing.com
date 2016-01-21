<div class="row">
    <div class="col-lg-4 col-md-offset-4 col-md-4 centered">
        <form role="form" action="/addPost" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input name="title" type="text" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="header">Header:</label>
                <textarea name="header" class="form-control" id="header"></textarea>
            </div>
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" id="content" class="form-control"></textarea>
            </div>
            <input type="hidden" id="uploadedPhotos" value="" name="photos">
            <div class="dropZone" id="postImageDropzone" class="form-group">
                Drop photos here
            </div>
            <div class="row">
                <div class="form-group" id="photosPreview">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default center-block">Submit</button>
            </div>
        </form>
    </div>
</div>