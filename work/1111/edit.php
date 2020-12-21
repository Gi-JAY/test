<?php 
session_start(); 
require 'class/db_config.php';
$id = $_GET["id"];
$sql = "SELECT * FROM Book3 WHERE id = '$id'";
$result = $mysqli->query($sql);
$row = $mysqli->fetch_array();

//防止"符號無法印出
$row["bookname"] = str_replace("\"","&quot;",$row["bookname"]); 
$row["publish"] = str_replace("\"","&quot;",$row["publish"]); 
$row["author"] = str_replace("\"","&quot;",$row["author"]);

include('xhtml/edit.html');
?>