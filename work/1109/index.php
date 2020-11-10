<?php 
session_start(); 
?>
<?php
require 'class/db_config.php';
$sql = 'SELECT * FROM Book2 ORDER BY ISBN ASC';
if(isset($_GET["sort"]) && isset($_GET["method"])){//如果使用排序功能
  $sql = "SELECT * FROM Book2 ORDER BY ".$_GET["sort"]." ".$_GET["method"];
}
$result = $mysqli->query($sql);
$total_fields = $mysqli->get_num_fields();
include("xhtml/index.html");
?>