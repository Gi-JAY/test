<?php
session_start();
require 'class/db_config.php';
$ISBN = $_POST["ISBN"];
$publish = $_POST["publish"];
$bookname = $_POST["bookname"];
$author = $_POST["author"];
$price = $_POST["price"];
$publishday = $_POST["publishday"];

require 'check.php'; //檢查格式
if($check){
    $sql = "INSERT INTO Book2 (ISBN,publish,bookname,author,price,publishday) VALUES ('$ISBN','$publish','$bookname','$author','$price','$publishday')";
    $mysqli->query($sql);
    echo "<script>";
    echo "history.go(-2);";
    echo "</script>";

    //將新增的資料寫入csv檔
    $filename = "bookInfo.csv";
    $content = "'$ISBN','$publish','$bookname','$author','$price','$publishday'\n";
    $fp = fopen($filename,'a') or exit("檔案 $filename 開啟錯誤</br>");
    fputcsv($fp, split(',', $content));
    fclose($fp); 
}
?>