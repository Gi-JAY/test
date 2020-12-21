<?php 
require 'db_config.php';
$id = $_GET["Id"];
$sql = "DELETE FROM contact WHERE Id =" . $id;
mysqli_query($link, $sql);
header("location:index.php");
?>