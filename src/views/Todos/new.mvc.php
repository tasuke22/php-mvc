{% extends "base.mvc.php" %}

{% block title %}New Todo{% endblock %}

{% block body %}

<h1>New Todo</h1>

<form method="post" action="/todos/create">

  {% include "Todos/form.mvc.php" %}

</form>

{% endblock %}