<?php

class DbConnection{
    private static $pdo;

    const HOST = 'localhost';
    const DB = 'qcep';

    const DBUSER = 'usr_generic';
    const DBPASSWORD = '2024@Thos';

    private function __construct() {
       
    }

    public static function getInstance() {
        if(self::$pdo == null){
            $dsn = 'mysql:dbname='. self::DB .';host='. self::HOST;
            self::$pdo = new PDO($dsn, self::DBUSER, self::DBPASSWORD);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        
        return self::$pdo;
    }

    private function __clone(){
        
    }
}