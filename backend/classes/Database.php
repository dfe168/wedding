<?php
class Database{

    private static function dbConfig() {
        return [
            'driver'    => $_ENV['DB_DRIVER'],
            'host'      => $_ENV['DB_HOST'],
            'database'  => $_ENV['DB_DATABASE'],
            'username'  => $_ENV['DB_USERNAME'],
            'password'  => $_ENV['DB_PASSWORD'],
            'charset'   => $_ENV['DB_CHARSET'],
            'collation' => $_ENV['DB_COLLATION'],
            'prefix'    => '',
            'options'   => [],
        ];
    }
    
    public static function db() {
        $db = new \Buki\Pdox(self::dbConfig());
        return $db;
    }
}



?>