<?php

$orderData = $_POST['orderData'];

$dsn = 'mysql:host='.$GLOBALS['CFG']->dbhost.';dbname='.$GLOBALS['CFG']->dbname;
$username = $GLOBALS['CFG']->dbuser;
$password = $GLOBALS['CFG']->dbpass;

try {
    $pdo = new PDO($dsn, $username, $password);

    $pdo->exec("TRUNCATE TABLE orden");

    $order = 1;
    foreach ($orderData as $itemId) {
        $stmt = $pdo->prepare("INSERT INTO orden (codigo) VALUES (?)");
        $stmt->execute([$itemId]); // 使用 $itemId 来插入当前元素的值
        $order++;
    }
    echo "排序顺序保存成功";
} catch (PDOException $e) {
    echo "错误：" . $e->getMessage();
}
