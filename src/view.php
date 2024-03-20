<!DOCTYPE html>
<html>
<head>
  <title>Todo List</title>
</head>
<body>
<?php foreach ($todos as $todo): ?>
  <h2><?= $todo['title'] ?></h2>
  <p><?= $todo['description'] ?></p>
<?php endforeach; ?>
</body>
</html>