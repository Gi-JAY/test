<?php 
session_start(); 
?>
<?php
require 'class/db_config.php';
if(isset($_GET["id"])){
	$id = $_GET["id"];
}
$sort = 0;
$method =0;
$sql = 'SELECT * FROM Book3';
$mysqli->query($sql);
$row_total = $mysqli->get_num_rows();
//顯示的起始與結束
$page = 1;//當前頁數
$row_max = 16;//最多顯示幾筆
$page_end = floor($row_total/$row_max)+1;//頁尾
if($row_total%$row_max ==0 && $row_total != 0){
	$page_end = $row_total/$row_max;
}
if(isset($_GET["page"])){
	$page = $_GET["page"];
	if(!preg_match("/^[0-9]*$/",$page)){
		echo "<script>";
		echo "alert('請輸入數字');";
		echo "</script>";
	}
	if($page<1){
		$page = 1;
	}
	if($page>$page_end){
		$page = $page_end;
		echo "<script>";
		echo "alert('已超出頁尾,將返回頁尾');";
		echo "</script>";
	}
}
$row_start = ($page-1)*$row_max;

// 取得公司資訊
$publish_name = [];//取得所有表單有設定的出版社
$publish_info = [];//取得所有表單有設定的出版社資訊
$sql_info = "SELECT a.publish, b.info FROM (SELECT publish FROM Book3 LIMIT $row_start,$row_max ) as a INNER JOIN Book3_info as b ON a.publish= b.publish";
$mysqli->query($sql_info);
while($row = $mysqli->fetch_row()){
	for($i=0; $i<count($row); $i++){
		array_push($publish_name,$row[0]);
		array_push($publish_info,$row[1]);
	}
}
$publish_name = array_values(array_unique($publish_name));
$publish_info = array_values(array_unique($publish_info));

$sql = "SELECT * FROM Book3 LIMIT $row_start,$row_max";
if(isset($_GET["sort"]) && !empty($_GET["sort"])) {//如果使用排序功能
	$getSort = mb_split(':',$_GET["sort"]);
	$sort = $getSort[0];
	$method = $getSort[1];
	$sql = "SELECT * FROM Book3 ORDER BY ".$sort." ".$method." LIMIT $row_start,$row_max";
}
$mysqli->query($sql);
include('xhtml/index.html');
?>
