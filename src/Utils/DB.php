<?php
namespace App\Utils;

use PDO;
use PDOException;

class DB
{
    private $connection;
    private static $instance = null;

    private function __construct()
    {
        $driver = Config::getDB('DB_DRIVER');
        $database = Config::getDB('DB_NAME');
        $user = Config::getDB('DB_USER');
        $password = Config::getDB('DB_PASSWORD');
        $host = Config::getDB('DB_HOST');
        $port = Config::getDB('DB_PORT');

        try {
            $this->connection = new PDO("pgsql:host=$host;dbname=$database", $user, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function connection()
    {
        if (self::$instance === null) {
            self::$instance = new DB();
        }

        return self::$instance->connection;
    }

}