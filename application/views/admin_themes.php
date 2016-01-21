<form role="form" method="post" class="col-md-6 col-md-offset-3" action="/changeStandartTheme">
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
<form role="form" enctype="multipart/form-data" action="/addTheme" method="post" class="col-md-6 col-md-offset-3">
    <strong>Download: </strong>
    <div class="form-group">
        <input type="text" name="name" placeholder="Theme name..." class="form-control">
    </div>
    <div class="form-group">
        <input type="file" name="files[]">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Add</button>
    </div>
</form>
