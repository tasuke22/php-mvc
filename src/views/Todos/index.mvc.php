<!DOCTYPE html>
<html>
<head>
  <title>{{ title }}</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>
<body>

<h1>Todos</h1>

<a href="/todos/new">New Todo</a>

<p>Total: {{ total }}</p>

{% foreach ($todos as $todo): %}

  <h2>
    <a href="/todos/{{ todo["id"] }}/show">
    {{ todo["title"] }}
    </a>
  </h2>

{% endforeach; %}