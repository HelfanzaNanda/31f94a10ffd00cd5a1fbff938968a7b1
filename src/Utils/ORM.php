<?php
namespace App\Utils;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;

class ORM
{

    public static function manager()
    {

        Dotenv::createUnsafeImmutable(__DIR__, '/')->load();
        $connectionParams = [
            'dbname'        => Config::getDB('DB_NAME'),
            'user'          => Config::getDB('DB_USER'),
            'password'      => Config::getDB('DB_PASSWORD'),
            'host'          => Config::getDB('DB_HOST'),
            'port'          => Config::getDB('DB_PORT'),
            'driver'        => Config::getDB('DB_DRIVER'),
            // 'sslmode'       => 'TCP',
        ];
        
        // Create a simple "default" Doctrine ORM configuration for Attributes
        $config = ORMSetup::createAttributeMetadataConfiguration(
            paths: array(__DIR__."/src"),
            isDevMode: true,
        );
        // or if you prefer XML
        // $config = ORMSetup::createXMLMetadataConfiguration(
        //    paths: array(__DIR__."/config/xml"),
        //    isDevMode: true,
        //);
        
        
        
        // print_r($connectionParams);
        
        // configuring the database connection
        $connection = DriverManager::getConnection($connectionParams, $config);
        
        // obtaining the entity manager
        $entityManager = new EntityManager($connection, $config);

        return $entityManager;
    }
}
