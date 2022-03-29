<?php

namespace App;

use Doctrine\DBAL\DriverManager;

class Connection
{
    private static $connection = null;
    public static function connection()
    {
        if (self::$connection === null) {
            $connectionParams = [
                'dbname' => 'new_project',
                'user' => 'kristaps',
                'password' => 'zxc12345',
                'host' => 'localhost',
                'driver' => 'pdo_mysql',
            ];
            self::$connection = DriverManager::getConnection($connectionParams);

        }
        return self::$connection;
    }
}