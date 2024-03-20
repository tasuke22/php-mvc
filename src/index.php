<?php

$host = 'db'; // MySQLコンテナのサービス名
$dbname = "mydatabase";
$username = "myuser";
$password = "mypassword";

# 新しいPDOオブジェクトを作成し、MySQLデータベースに接続
$db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

# SQL　文を実行
$stmt = $db->prepare('SELECT * FROM todos');
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $result) {
    echo $result['title'] . "<br>" . $result['description'];

}
