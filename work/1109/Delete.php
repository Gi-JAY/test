<?php 
require 'class/db_config.php';
$id = $_GET["id"];
$sql = "DELETE FROM Book2 WHERE id =" . $id;
$mysqli->query($sql);
header("location:index.php");
?>