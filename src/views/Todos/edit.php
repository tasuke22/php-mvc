<h1>Edit Todo</h1>

<form method="post" action="/todos/<?= $todo["id"] ?>/update">
    <?php require "form.php"; ?>
</form>

<p>
  <a href="/todos/<?= $todo["id"] ?>/show">Cancel</a>
</p>

</body>
</html>
