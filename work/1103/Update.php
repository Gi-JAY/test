<?php
session_start();
require 'db_config.php';
$id = $_POST["Id"];
$name = $_POST["Name"];
$gender = $_POST["Gender"];
$phone = $_POST["Phone"];
$birthday = $_POST["Birthday"];
$address = $_POST["Address"];
$email = $_POST["E-mail"];
require 'check.php';

$address = addslashes($address);

if($check){
  $sql = "UPDATE contact Set Name = '$name', Gender = '$gender', Phone = '$phone', Birthday = '$birthday', Address = '$address', `E-mail` = '$email' WHERE Id = '$id'";
  mysqli_query($link, $sql);
  header("location:index.php");
}
?>