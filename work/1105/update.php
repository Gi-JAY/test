<?php
session_start();
require 'db_config.php';
$id = $_POST["id"];
$ISBN = $_POST["ISBN"];
$publish = $_POST["publish"];
$bookname = $_POST["bookname"];
$author = $_POST["author"];
$price = $_POST["price"];
$publishday = $_POST["publishday"];
require 'check.php';

//防止sql衝突'和"符號
$publish = addslashes($publish);
$bookname = addslashes($bookname);
$author = addslashes($author);

if($check){
  $sql = "UPDATE Book Set ISBN = '$ISBN', publish = '$publish', bookname = '$bookname', author = '$author', price = '$price', publishday = '$publishday' WHERE id = '$id'";
  mysqli_query($link, $sql);
  header("location:index.php");
}
?>