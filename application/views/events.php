<div class="row">
    <div class="col-lg-8">
        <h1>{{ post.title }}</h1>
        <p class="lead">
            {{ dict.by }} <a href="/user/{{ post.author.id }}">{{ post.author.login }}</a>
        </p>
        <hr>
        <p>
            <i class="fa fa-clock-o"></i>
            {{ dict.postedOn }} {{ post.date }}
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
            <h4>{{ dict.leaveComment }}</h4>
            <form role="form" action="/addComment/{{ post.id }}" method="post">
                <div class="form-group">
                    <textarea class="form-control" rows="3" name="text"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" {% if not user.isLoggedIn %} disabled {% endif %}>{{ dict.add }}</button>
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
            <h4>{{ dict.blogSearch }}</h4>
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
    {% for quiz in quizes %}
        <div class="col-md-4">
            <form role="form" action="saveQuizAnswer/{{ quiz.id }}" method="post">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{ quiz.question }}
                            <span class="label label-primary">Required</span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        {% for answer in quiz.answers %}
                            <div class="row spacing-elements">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <input type="checkbox" name="{{ loop.index }}" value="1" class="requiredField checkbutton">
                                        </span>
                                        <input type="text" class="form-control" value="{{answer}}" disabled="">
                                    </div>
                                </div>
                            </div>
                        {% endfor %}
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-primary center-block">{{ dict.save }}</button>
                    </div>
                </div>
            </form>
        </div>
    {% endfor %}
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