<?php
session_start();
require 'class/db_config.php';
$id = $_POST["id"];
$ISBN = $_POST["ISBN"];
$publish = $_POST["publish"];
$bookname = $_POST["bookname"];
$author = $_POST["author"];
$price = $_POST["price"];
$publishday = $_POST["publishday"];
require 'check.php';

if($check){
  $sql = "UPDATE Book3 Set ISBN = '$ISBN', publish = '$publish', bookname = '$bookname', author = '$author', price = '$price', publishday = '$publishday' WHERE id = '$id'";
  $mysqli->query($sql);
  header("location:index.php");
}
?>