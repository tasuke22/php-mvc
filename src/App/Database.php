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

        # 新しいPDOオブジェクトを作成し、MySQLデータベースに接続
        return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    }

}