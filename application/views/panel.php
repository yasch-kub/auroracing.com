<div class="container-fluid main-container">
    <div class="col-md-2 sidebar">
        <ul class="nav nav-pills nav-stacked">
            {% if (user.isAdmin) %}
                <li><a href="/adminPanel/users">{{ dict.users }}</a></li>
            <li><a href="/adminPanel/themes">{{ dict.themes }}</a></li>
            {% endif %}

            {% if (user.isModerator) %}
                <li><a href="/moderatorPanel/posts">{{ dict.posts }}</a></li>
                <li><a href="/moderatorPanel/quiz">{{ dict.quizes }}</a></li>
            {% endif %}
        </ul>
    </div>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ dict.dashboard }}
            </div>
            <div class="panel-body">
                {% include panel_template %}
            </div>
        </div>
    </div>
</div>