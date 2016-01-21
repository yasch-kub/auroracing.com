<div class="container-fluid main-container">
    <div class="col-md-2 sidebar">
        <ul class="nav nav-pills nav-stacked">
            {% if (user.isAdmin) %}
                <li><a href="/adminPanel/users">Users</a></li>
            {% endif %}
            {% if (user.isAdmin) %}
                <li><a href="/adminPanel/themes">Theme</a></li>
            {% endif %}
        </ul>
    </div>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <div class="panel-heading">
                Dashboard
            </div>
            <div class="panel-body">
                {% include panel_template %}
            </div>
        </div>
    </div>
</div>