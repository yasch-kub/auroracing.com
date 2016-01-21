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
                        Події
                    </a>
                </li>
                {% if user.isLoggedIn %}
                    <li>
                        <a href="/suggestPost">
                            Запропонувати подію
                        </a>
                    </li>
                {% endif %}
                <li>
                    <a href="">
                        Про нас
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {% if not user.isLoggedIn %}
                    <li class="active">
                        <a href="" data-toggle="modal" data-target="#logModal">
                            Вхід
                            <i class="fa fa-sign-in"></i>
                        </a>
                    </li>
                    <li>
                        <a href="" data-toggle="modal" data-target="#regModal">
                            Регістрація
                            <i class="fa fa-user-plus"></i>
                        </a>
                    </li>
                {{ user.isLoggedIn }}
                {% else %}
                    <li>
                        <a>
                            Ласкаво просимо, <b> {{ user.name }}</b>
                        </a>
                    </li>
                    <li>
                        {% if user.isAdmin %}
                            <a href="/adminPanel">
                                Панель адміністратора
                                <i class="fa fa-wrench"></i>
                            </a>
                        {% endif %}
                    </li>
                    <li class="active">
                        <a href="/profile">
                            Профіль
                            <i class="fa fa-user"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/signOut">
                            Вихід
                            <i class="fa fa-sign-out"></i>
                        </a>
                    </li>
                {% endif %}
            </ul>
        </div>
    </div>
</nav>