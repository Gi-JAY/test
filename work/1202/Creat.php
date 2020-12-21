<?php
session_start();
header("Content-Type:text/html; charset=utf-8");
require 'class/db_config.php';

if(isset($_POST["user"]) && isset($_POST["pwd"]) && isset($_POST["pwd_ck"]) && isset($_POST["refresh"])){
	$user = $_POST["user"];
	$pwd = $_POST["pwd"];
	$pwd_ck = $_POST["pwd_ck"];
	if($pwd != $pwd_ck){
		echo "<script>\n";
		echo "alert('密碼與確認密碼不同');\n";
		echo "history.go(-1);\n";
		echo "</script>\n";
	}
	$refresh = $_POST["refresh"];
	$sql = "INSERT INTO user(user,password,refresh) VALUES ('$user','$pwd','$refresh')";
}

require 'check.php';

if($check){
	$mysql->query($sql);
	header("location:showinfo.php");
}
?>