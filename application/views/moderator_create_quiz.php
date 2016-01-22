<form role="form" method="post" class="col-md-6 col-md-offset-3" action="/addQuiz/{{ id }}">
    <div class="form-group">
        <strong>{{ dict.question }}: </strong>
        <div class="form-group">
            <input type="text" name="question" class="form-control">
        </div>
        {% for i in 1..number %}
        <strong> {{ dict.answer }} {{ loop.index }}: </strong>
            <div class="form-group">
                <input type="text" name="answer{{ loop.index }}" class="form-control">
            </div>
        {% endfor %}
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ dict.create }}</button>
        </div>
    </div>
</form>