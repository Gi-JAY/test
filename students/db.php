<?php
$db_host = "localhost";
$db_user = "admin";
$db_pw = "admin";
$db_name = "sunday";

$conn = mysqli_connect($db_host, $db_user, $db_pw, $db_name);
mysqli_query($conn, "SET NAMES utf8");

$sql = "SELECT*FROM students";
$result = mysqli_query($conn, $sql);
