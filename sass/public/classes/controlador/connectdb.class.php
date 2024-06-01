<?php
class ConnectDB
{
    private static $db;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        $dsn = "mysql:host=" . $GLOBALS['CFG']->dbhost . ";dbname=" . $GLOBALS['CFG']->dbname;
        try {
            self::$db = new PDO($dsn, $GLOBALS['CFG']->dbuser, $GLOBALS['CFG']->dbpass);
            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return self::$db;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
