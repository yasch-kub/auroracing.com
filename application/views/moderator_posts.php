<table class="table table-striped">
    <thead>
    <tr>
        <th>id</th>
        <th>{{ dict.title }}</th>
        <th>{{ dict.header }}</th>
        <th>{{ dict.content }}</th>
        <th>{{ dict.user }}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    {% for post in posts %}
    <tr>
        <form method="post" role="form">
            <td>{{ post.id }}</td>
            <td>{{ post.title }}</td>
            <td>{{ post.header }}</td>
            <td>{{ post.text }}</td>
            <td>{{ post.login }}</td>
            <td>
                <button class="btn btn-success" type="submit" formaction="/publishPost/{{ post.id }}">{{ dict.add }}</button>
                <button class="btn btn-danger" type="submit" formaction="/deletePost/{{ post.id }}">{{ dict.delete }}</button>
            </td>
        </form>
    </tr>
    {% endfor %}
    </tbody>
</table>