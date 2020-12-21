<?php
session_start();
require 'class/db_config.php';

if(isset($_GET["id"])){
	$id = $_GET["id"];
}
$sql = "SELECT * FROM user WHERE id='$id'";
$mysql->query($sql);
$row = $mysql->fetch_assoc();
include("xhtml/edit.html");
?>