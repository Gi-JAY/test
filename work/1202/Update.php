<?php
require 'class/db_config.php';

if(isset($_POST["refresh"]) && isset($_POST["id"])){ //from edit.php
	$id = $_POST["id"];
	$refresh = $_POST["refresh"];
	$sql = "UPDATE user SET refresh = '$refresh' WHERE id = '$id'";
}

if(isset($_POST["id"]) && isset($_POST["o_pwd"]) && isset($_POST["n_pwd"]) && isset($_POST["n_pwd_ck"])){
//form setpassword.php
$id = $_POST["id"];
$o_pwd = $_POST["o_pwd"];
$n_pwd = $_POST["n_pwd"];
$n_pwd_ck = $_POST["n_pwd_ck"];
$sql = "UPDATE user SET password = '$n_pwd_ck' WHERE id = '$id'";
}

require 'check.php';

if($check){
	$mysql->query($sql);
	header("location:showinfo.php");
}
?>