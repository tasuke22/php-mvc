{% extends "base.mvc.php" %}

{% block title %}Todos{% endblock %}

{% block body %}

<a href="/todos/new">New Todo</a>

<p>Total: {{ total }}</p>

{% foreach ($todos as $todo): %}

  <h2>
    <a href="/todos/{{ todo["id"] }}/show">
    {{ todo["title"] }}
    </a>
  </h2>

{% endforeach; %}

{% endblock %}
