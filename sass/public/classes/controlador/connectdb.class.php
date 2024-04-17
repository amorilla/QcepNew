<?php
class ConnectDB
{
    private static $db;

    const HOST = 'localhost';
    const ROOT = 'usr_generic';
    const PASSRINSERT = '2024@Thos';
    const DB = 'qcep';

    private function __construct()
    {
    }

    public static function getInstance()
    {
        $dsn = "mysql:host=" . self::HOST . ";dbname=" . self::DB;
        try {
            self::$db = new PDO($dsn, self::ROOT, self::PASSRINSERT);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$db;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
