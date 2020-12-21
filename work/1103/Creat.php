<?php
session_start();
require 'db_config.php';
$name = $_POST["Name"];
$gender = $_POST["Gender"];
$phone = $_POST["Phone"];
$birthday = $_POST["Birthday"];
$address = $_POST["Address"];
$email = $_POST["E-mail"];

$address = addslashes($address);
require 'check.php';

if($check){
    $sql = "INSERT INTO contact (Name,Gender,Phone,Birthday,Address,`E-mail`) VALUES ('$name','$gender','$phone','$birthday','$address','$email')";
    if(mysqli_query($link,$sql)){
        echo "<script>";
        echo "history.go(-2);";
        echo "</script>";
    }
}
?>