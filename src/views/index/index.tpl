<html>
<head>
</head>
<body>


{% block content %}

<h1>{{ 'Home' }}</h1>

<div class="alert alert-info">Terminal!</div>

<ul>
    {% for key, item in result %}
    <li>{{loop.index}} {{key}} - {{ item }}</li>
    {% endfor %}
</ul>


<div class="row">
    <form action="/test2/web/" method="post">
        <input type="text" name="product_id" />

        <input type="submit" name="submit" />
    </form>
</div>

{% endblock %}

</body>
</html>

