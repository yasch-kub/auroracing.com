<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-9">
        <div class="row" id="eventPost">
            <div id="slider">
                <div class="col-md-1 arrow">
                    <i class="fa fa-angle-left"></i>
                </div>
                <div class="col-md-10" id="slidePhoto">
                    <div id="containerPhoto">
                        {% for photo in post.photos %}
                            <div>
                                <a href="#" class="thumbnail">
                                    <img num="{{ loop.index + 1 }}" src="/application/data/posts/{{ post.id }}/photos{{ photo }}">
                                </a>
                            </div>
                        {% endfor %}
                    </div>
                </div>
                <div class="col-md-1 arrow">
                    <i class="fa fa-angle-right"></i>
                </div>
            </div>
        </div>

        <div class="row">
            <form role="form">
                <input>
            </form>
        </div>
    </div>
</div>