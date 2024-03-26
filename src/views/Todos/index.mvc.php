<!DOCTYPE html>
<html lang="js">
<head>
  <title><?= $title ?></title>
  <meta charset="UTF-8">
</head>
<body>

<h1>Todos</h1>

<a href="/todos/new">New Todo</a>

<p>Total: <?= $total ?></p>

<?php foreach ($todos as $todo): ?>
  <h2>
    <a href="/todos/<?= $todo["id"] ?>/show">
        <?= htmlspecialchars($todo["title"]) ?>
    </a>
  </h2>
  <p><?= htmlspecialchars($todo["description"]) ?></p>
<?php endforeach; ?>

</body>
</html>