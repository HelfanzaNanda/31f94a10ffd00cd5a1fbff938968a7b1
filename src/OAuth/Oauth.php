<?php

namespace App\OAuth;

use App\Utils\Config;
use App\Utils\DB;
use OAuth2\GrantType\UserCredentials;
use OAuth2\Server;
use OAuth2\Storage\Pdo;

class Oauth
{
    public $server;
    public function __construct()
    {
        $this->init();
    }

    

    public function init()
    {

        $driver = Config::getDB('DB_DRIVER');
        $database = Config::getDB('DB_NAME');
        $user = Config::getDB('DB_USER');
        $password = Config::getDB('DB_PASSWORD');
        $host = Config::getDB('DB_HOST');
        $port = Config::getDB('DB_PORT');

        // $storage = new CustomOauthStorage(['dsn' => $dsn, 'username' => $username, 'password' => $password]);
        $storage = new Pdo([
            "dsn" => "pgsql:dbname=$database;host=$host",
            "username" => $user,
            "password" => $password
        ]);
        $this->server = new Server($storage);
        $this->server->addGrantType(new UserCredentials($storage));

        // return $this;
    }
}
