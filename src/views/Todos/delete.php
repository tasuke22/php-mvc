<h1>Delete Todo</h1>

<form method="post" action="/todos/<?= $todo["id"] ?>/destroy">
  <p>Delete this todo?</p>
  <button>Yes</button>
</form>


<p>
  <a href="/todos/<?= $todo["id"] ?>/show">Cancel</a>
</p>

</body>
</html>
