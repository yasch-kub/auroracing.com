<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Autoracer</title>

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,700,500italic,500,900italic,900,700italic,300italic,300,100italic,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    {% if user.theme %}
        <link rel="stylesheet" href="../css/theme/{{ user.theme }}">
    {% else %}
        <link rel="stylesheet" href="../css/theme/{{ theme }}">
    {% endif %}
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/jquery-2.1.4.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    {% for link in links %}
        <link rel="stylesheet" href="../css/{{ link }}">
    {% endfor %}

    {% for script in scripts %}
    <script src="../js/{{ script }}"></script>
    {% endfor %}
</head>
<body>
<header>
    {% include "header.php" %}
    {% include "login.php" %}
    {% include "registration.php" %}
</header>
<div class="container">
    {% include template %}
</div>
</body>
</html>