<table class="table table-striped">
    <thead>
    <tr>
        <th>id</th>
        <th>login</th>
        <th>email</th>
        <th>about</th>
        <th>role</th>
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
                            User
                        </option>
                        <option value="2" {% if user.role == 2 %} selected {% endif %}>
                            Moderator
                        </option>
                        <option value="3" {% if user.role == 3 %} selected {% endif %}>
                            Admin
                        </option>
                    </select>
                </td>
                <td>
                    <button class="btn btn-success" type="submit" formaction="/changeUserRole/{{ user.id }}">Update</button>
                    <button class="btn btn-danger" type="submit" formaction="/deleteUser/{{ user.id }}">Delete</button>
                </td>
            </form>
        </tr>
    {% endfor %}
    </tbody>
</table>