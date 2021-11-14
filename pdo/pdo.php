<?php
$db_host = "localhost";
$db_user = "root";
$db_pw = "";
$db_name = "sunday";
$db_charest = "utf8mb4";


try {
    $dsn = "mysql:host={$db_host};dbname={$db_name};charset={$db_charest}";
    $pdo = new PDO($dsn, $db_user, $db_pw);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$pdo->date_default_timezone_get("Asia/Taipei");
} catch (PDOException $e) {
    echo $e->getMessage();
}
