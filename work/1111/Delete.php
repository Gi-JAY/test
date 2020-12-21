<?php 
require 'class/db_config.php';
$id = $_GET["id"];
$sql = "DELETE FROM Book3 WHERE id =" . $id;
$mysqli->query($sql);
header("location:index.php");
?>