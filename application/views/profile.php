<div class="container">
    <div class="row">
        <div class="col-md-offset-2 col-md-8 col-lg-offset-3 col-lg-6">
            <div class="well profile">
                <div class="col-sm-12">
                    <div class="col-xs-12 col-sm-8">
                        <h2> {{ user.name }} </h2>
                            {% if user.id == profile.id %}
                                <form role="form" action="/changeUserProfile" method="post">
                                    <div class="form-group">
                                        <strong> Email:
                                        </strong>
                                        <input value="{{ profile.email }}" type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <strong> About:
                                        </strong>
                                        <textarea name="about" class="form-control">{{ profile.about }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger">
                                            Change
                                        </button>
                                    </div>
                                </form>
                                <form role="form" method="post" action="/changeTheme">
                                    <div class="form-group">
                                        <strong>Theme: </strong>
                                        <div class="form-group">
                                            <select name="theme" class="form-control">
                                                {% for theme in themes %}
                                                <option value="{{ theme.id }}">
                                                    {{ theme.name }}
                                                </option>
                                                {% endfor %}
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Change</button>
                                        </div>
                                    </div>
                                </form>
                            {% else %}
                                <p>
                                    <strong> Email:
                                    </strong>
                                    {{ profile.email }}
                                </p>
                                <p>
                                    <strong> About:
                                    </strong>
                                    {{ profile.about }}
                                </p>
                            {% endif %}
                    </div>
                    <div class="col-xs-12 col-sm-4 text-center">
                        <figure>
                            <img id="avatarDropzone" src="/application/data/users/{{ profile.id }}/avatar.jpg" alt="" class="img-circle img-responsive">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>