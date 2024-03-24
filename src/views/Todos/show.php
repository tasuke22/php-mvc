<h1><?= $todo["title"] ?></h1>
<p><?= $todo["description"] ?></p>

<p>
  <a href="/todos/<?= $todo["id"] ?>/edit">Edit</a>
</p>

<p>
  <a href="/todos/<?= $todo["id"] ?>/delete">Delete</a>
</p>

</body>
</html>
