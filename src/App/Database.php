<?php

namespace App;

use PDO;

class Database
{
    public function __construct(
        private string $host,
        private string $dbname,
        private string $username,
        private string $password
    )
    {
    }

    public function getConnection(): PDO
    {
        $host = $this->host;
        $dbname = $this->dbname;
        $username = $this->username;
        $password = $this->password;

        $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

        # 新しいPDOオブジェクトを作成し、MySQLデータベースに接続
        return new PDO($dsn, $username, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

}