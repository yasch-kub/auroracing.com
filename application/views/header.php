<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/">Autoracer</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/">
                        {{ dict.events }}
                    </a>
                </li>
                {% if user.isLoggedIn %}
                    <li>
                        <a href="/suggestPost">
                            {{ dict.suggestEvent }}
                        </a>
                    </li>
                {% endif %}
                <li>
                    <a href="">
                        {{ dict.aboutUs }}
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {% if not user.isLoggedIn %}
                    <li class="active">
                        <a href="" data-toggle="modal" data-target="#logModal">
                            {{ dict.logIn }}
                            <i class="fa fa-sign-in"></i>
                        </a>
                    </li>
                    <li>
                        <a href="" data-toggle="modal" data-target="#regModal">
                            {{ dict.registration }}
                            <i class="fa fa-user-plus"></i>
                        </a>
                    </li>
                {{ user.isLoggedIn }}
                {% else %}
                    <li>
                        <a>
                            {{ dict.welcome }}, <b> {{ user.name }}</b>
                        </a>
                    </li>
                    <li>
                        {% if user.isAdmin %}
                            <a href="/adminPanel">
                                {{ dict.adminPanel }}
                                <i class="fa fa-wrench"></i>
                            </a>
                        {% endif %}
                        {% if user.isModerator %}
                            <a href="/moderatorPanel">
                                {{ dict.moderatorPanel }}
                                <i class="fa fa-wrench"></i>
                            </a>
                        {% endif %}
                    </li>
                    <li class="active">
                        <a href="/profile">
                            {{ dict.profile }}
                            <i class="fa fa-user"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/signOut">
                            {{ dict.logOut }}
                            <i class="fa fa-sign-out"></i>
                        </a>
                    </li>
                {% endif %}
            </ul>
        </div>
    </div>
</nav>