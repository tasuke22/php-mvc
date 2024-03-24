<h1>Delete Todo</h1>

<form method="post" action="/todos/<?= $todo["id"] ?>/delete">
    <?php require "form.php"; ?>
</form>

<p>Delete this todo?</p>
<button>Yes</button>

<p>
  <a href="/todos/<?= $todo["id"] ?>/show">Cancel</a>
</p>

</body>
</html>
