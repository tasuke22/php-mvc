<h1>Todos</h1>

<body>

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