<div class="row">
    <div class="col-lg-8">
        <h1>{{ post.title }}</h1>
        <p class="lead">
            by <a href="/user/{{ post.author.id }}">{{ post.author.login }}</a>
        </p>
        <hr>
        <p>
            <i class="fa fa-clock-o"></i>
            Posted on {{ post.date }}
        </p>
        <hr>
        <div id="slider" class="row">
            <div class="col-md-1 arrow">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="col-md-10" id="slidePhoto">
                <div id="containerPhoto">
                    {% for photo in post.photos %}
                    <div>
                        <a href="#" class="thumbnail">
                            <img num="{{ loop.index }}" src="/application/data/posts/{{ post.id }}/{{ photo }}">
                        </a>
                    </div>
                    {% endfor %}
                </div>
            </div>
            <div class="col-md-1 arrow">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
        <hr>
        <p class="lead">
            {{ post.header }}
        </p>
        <p>
            {{ post.text }}
        </p>
        <hr>
        <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form" action="/addComment/{{ post.id }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="text"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" {% if not user.isLoggedIn %} disabled {% endif %}>Submit</button>
            </form>
        </div>
        <hr>
        {% for comment in post.comments %}
            <div class="media">
                <a class="pull-left" href="/user/{{ comment.id }}">
                    <img class="media-object" src="/application/data/users/{{ comment.id }}/avatar.jpg" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">
                        {{ comment.login }}
                        <small> {{ comment.date }}</small>
                    </h4>
                    {{ comment.text }}
                </div>
            </div>
        {% endfor %}
    </div>
    <!--Search-->
    <div class="col-md-4">
        <div class="well">
            <h4>Blog Search</h4>
            <div class="input-group">
                <input type="text" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">
                    <i class="fa fa-search"></i>
                </button>
            </span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    What type of services do you provide on the marketplaces?                                                            <span class="label label-primary">Required</span>
                </h3>
            </div>
            <div class="panel-body">
                <div class="row spacing-elements">
                    <div class="col-md-12">
                        <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" name="question-checkbox-2-9" value="1" class="requiredField checkbutton question-checkbox-2">
                              </span>
                            <input type="text" class="form-control" value="Programming" disabled="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" name="question-checkbox-2-10" value="1" class="requiredField checkbutton question-checkbox-2">
                              </span>
                            <input type="text" class="form-control" value="Graphic Design" disabled="">
                        </div>
                    </div>
                </div>
                <div class="row spacing-elements">
                    <div class="col-md-12">
                        <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" name="question-checkbox-2-11" value="1" class="requiredField checkbutton question-checkbox-2">
                              </span>
                            <input type="text" class="form-control" value="Music Making" disabled="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" name="question-checkbox-2-12" value="1" class="requiredField checkbutton question-checkbox-2">
                              </span>
                            <input type="text" class="form-control" value="3D Design" disabled="">
                        </div>
                    </div>

                </div>
                <div class="row spacing-elements">
                    <div class="col-md-12">
                        <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" name="question-checkbox-2-13" value="1" class="requiredField checkbutton question-checkbox-2">
                              </span>
                            <input type="text" class="form-control" value="Support" disabled="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                              <span class="input-group-addon">
                                <input type="checkbox" name="question-checkbox-2-14" value="1" class="requiredField checkbutton question-checkbox-2">
                              </span>
                            <input type="text" class="form-control" value="Other" disabled="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-offset-5 col-md-6">
        <ul class="pagination">
            {% for i in 1..postCount %}
            <li
                {% if post.id == i %}
                    class="active"
                {% endif %}>
                <a href="/event/{{ i }}">
                    {{ i }}
                </a>
            </li>
            {% endfor %}
        </ul>
    </div>
</div>