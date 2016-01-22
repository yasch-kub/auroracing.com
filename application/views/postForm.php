<div class="row">
    <div class="col-lg-4 col-md-offset-4 col-md-4 centered">
        <form role="form" action="/addPost" method="post">
            <div class="form-group">
                <label for="title">{{ dict.title }}:</label>
                <input name="title" type="text" class="form-control" id="title">
            </div>
            <div class="form-group">
                <label for="header">{{ dict.header }}:</label>
                <textarea name="header" class="form-control" id="header"></textarea>
            </div>
            <div class="form-group">
                <label for="content">{{ dict.content }}:</label>
                <textarea name="content" id="content" class="form-control"></textarea>
            </div>
            <input type="hidden" id="uploadedPhotos" value="" name="photos">
            <div class="dropZone" id="postImageDropzone" class="form-group">
                {{ dict.proHere }}
            </div>
            <div class="row">
                <div class="form-group" id="photosPreview">
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default center-block">{{ dict.add }}</button>
            </div>
        </form>
    </div>
</div>