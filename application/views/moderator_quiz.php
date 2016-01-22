<form role="form" method="post" class="col-md-6 col-md-offset-3" action="/moderatorPanel/createQuiz">
    <div class="form-group">
        <strong>{{ dict.post }}: </strong>
        <div class="form-group">
            <select name="id" class="form-control">
                {% for post in postsId %}
                <option value="{{ post.id }}">
                    {{ post.id }}
                </option>
                {% endfor %}
            </select>
        </div>
        <strong>{{ dict.answersNum }}: </strong>
        <div class="form-group">
            <input type="text" class="form-control" name="number" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ dict.create }}</button>
        </div>
    </div>
</form>