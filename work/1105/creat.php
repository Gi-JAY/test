<?php
session_start();
require 'db_config.php';
$ISBN = $_POST["ISBN"];
$publish = $_POST["publish"];
$bookname = $_POST["bookname"];
$author = $_POST["author"];
$price = $_POST["price"];
$publishday = $_POST["publishday"];
echo $ISBN;
require 'check.php'; //檢查格式
if($check){
    $sql = "INSERT INTO Book (ISBN,publish,bookname,author,price,publishday) VALUES ('$ISBN','$publish','$bookname','$author','$price','$publishday')";
    mysqli_query($link,$sql);
    echo "<script>";
    echo "history.go(-2);";
    echo "</script>";
    require 'addinfo.php';   
}
?>