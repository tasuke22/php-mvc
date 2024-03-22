<?php

namespace App;

use PDO;

class Database
{
    public function getConnection(): PDO
    {
        $host = 'db'; // MySQLコンテナのサービス名
        $dbname = "mydatabase";
        $username = "myuser";
        $password = "mypassword";

        # 新しいPDOオブジェクトを作成し、MySQLデータベースに接続
        return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    }

}