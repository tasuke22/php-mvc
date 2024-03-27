{% extends "base.mvc.php" %}

{% block title %}New Todo{% endblock %}

{% block body %}

<h1>Edit Todo</h1>

<form method="post" action="/todos/{{ todo["id"] }}/update">
  {% include "Todos/form.mvc.php" %}
</form>

<p>
  <a href="/todos/<?= $todo["id"] ?>/show">Cancel</a>
</p>

</body>
</html>

{% endblock %}
