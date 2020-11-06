<?php 
require 'db_config.php';
$id = $_GET["id"];
$sql = "DELETE FROM Book WHERE id =" . $id;
mysqli_query($link, $sql);
header("location:index.php");
?>