<table class="table table-striped">
    <thead>
    <tr>
        <th>id</th>
        <th>{{ dict.login }}</th>
        <th>{{ dict.email }}</th>
        <th>{{ dict.about }}</th>
        <th>{{ dict.role }}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    {% for user in users %}
        <tr>
            <form method="post" role="form">
                <td>{{ user.id }}</td>
                <td>{{ user.login }}</td>
                <td>{{ user.email }}</td>
                <td>{{ user.about }}</td>
                <td>
                    <select name="role" class="form-control">
                        <option value="1" {% if user.role == 1 %} selected {% endif %}>
                            {{ dict.user }}
                        </option>
                        <option value="2" {% if user.role == 2 %} selected {% endif %}>
                            {{ dict.moderator }}
                        </option>
                        <option value="3" {% if user.role == 3 %} selected {% endif %}>
                            {{ dict.admin }}
                        </option>
                    </select>
                </td>
                <td>
                    <button class="btn btn-success" type="submit" formaction="/changeUserRole/{{ user.id }}">{{ dict.update }}</button>
                    <button class="btn btn-danger" type="submit" formaction="/deleteUser/{{ user.id }}">{{ dict.delete }}</button>
                </td>
            </form>
        </tr>
    {% endfor %}
    </tbody>
</table>