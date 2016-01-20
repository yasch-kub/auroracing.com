<?php

class Db
{
    public static function connect()
    {
        $param = include(root . '/application/config/db_config.php');
        extract($param);

        $dsn = sprintf("mysql:dbname=%s;host=%s", $dbname, $host);
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}