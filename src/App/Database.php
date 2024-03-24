<?php

namespace App;

use PDO;

class Database
{
    private ?PDO $pdo = null;

    public function __construct(
        private string $host,
        private string $dbname,
        private string $username,
        private string $password
    )
    {
        echo "Created Database object";
    }

    public function getConnection(): PDO
    {
        if ($this->pdo === null) {
            $host = $this->host;
            $dbname = $this->dbname;
            $username = $this->username;
            $password = $this->password;

            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";

            # 新しいPDOオブジェクトを作成し、MySQLデータベースに接続
            $this->pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }

        return $this->pdo;
    }
}