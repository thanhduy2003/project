<?php
class Db
{
public static $connection;
public function __construct() {
        if (!self::$connection) {
            self::$connection = new mysqli(DB_HOST,DB_USER,DB_PASSWORD, DB_NAME,3306);
            self::$connection->set_charset("utf8mb4");
        }
    }
}
