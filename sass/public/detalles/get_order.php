<?php

$dsn = 'mysql:host='.$GLOBALS['CFG']->dbhost.';dbname='.$GLOBALS['CFG']->dbname;
$username = $GLOBALS['CFG']->dbuser;
$password = $GLOBALS['CFG']->dbpass;

try {
    $pdo = new PDO($dsn, $username, $password);


    $stmt = $pdo->query("SELECT * FROM orden ORDER BY codigo");
    $orderData = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode($orderData);
} catch (PDOException $e) {
    echo "ERROR：" . $e->getMessage();
}
