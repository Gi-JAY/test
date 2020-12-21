<?php
session_start();
if($_POST["export"] == 0){
  header("location:index.php");
}
require 'class/db_config.php';
date_default_timezone_set('Asia/Taipei');
$filename = date("Y-m-d")."(".date("h:i:sa").").csv";
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=$filename");
header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
header('Expires:0');
header('Pragma:public');

$id = [];
if(isset($_POST["check"])){
	$id = $_POST["check"];
}
$sql = 'SELECT * FROM Book3';
if(isset($_POST["sort"]) && !empty($_POST["method"])) {//如果使用排序功能
	$sort = $_POST["sort"];
	$method = $_POST["method"];
	$sql = "SELECT * FROM Book3 ORDER BY ".$sort." ".$method;
}
$mysqli->query($sql);
$export = $_POST["export"];
$row_start = $_POST["rowStart"];
$row_max = $_POST["rowMax"];

$total_fields = $mysqli->get_num_fields();
$content = "ISBN,出版社,書名,作者,定價,發行日\n";

// echo "ISBN,出版社,書名,作者,定價,發行日\n";//輸出標頭

switch($export){
	case 1:
		while($row = $mysqli->fetch_row()){
			for($i=0; $i<$total_fields; $i++){
				if($i != 0){//不需要ID
					$content .= $row[$i];
					if($i != $total_fields-1){//不是字尾
						$content .= ",";
					}
				}
			}
			$content .= "\n";
		}
		echo $content;
	break;

	case 2:
		$sql = 'SELECT * FROM Book3 LIMIT $row_max';
		if(isset($_POST["sort"]) && !empty($_POST["method"])) {//如果使用排序功能
		$sort = $_POST["sort"];
		$method = $_POST["method"];
		$sql = "SELECT * FROM Book3 ORDER BY ".$sort." ".$method." LIMIT $row_start,$row_max";
		}
		$mysqli->query($sql);
		while($row = $mysqli->fetch_row()){
			for($j=0; $j<$total_fields; $j++){
				if($j != 0){
					$content .= $row[$j];
					if($j != $total_fields-1){//不是字尾
						$content .= ",";
					}
				}
			}
			$content .= "\n";
		}
		echo $content;
	break;

	case 3:
		for($i=0; $i<count($id); $i++){
			$sql = "SELECT * FROM Book3 WHERE id=".$id[$i];
			$mysqli->query($sql);
			while($row = $mysqli->fetch_row()){
				for($j=0; $j<$total_fields; $j++){
					if($j != 0){
						$content .= $row[$j];
						if($j != $total_fields-1){//不是字尾
							$content .= ",";
						}
					}
				}
				$content .= "\n";
			}
		}
		echo $content;
	break;
}
?>