<?php
session_start();
if($_POST["export"] == 0){
  header("location:index.php");
}
require 'class/db_config.php';

$id = [];
if(isset($_POST["check"])){
	$id = $_POST["check"];
	print_r($id);
}
$sql = $_POST["sql"];
$export = $_POST["export"];
$row_start = $_POST["rowStart"];
$row_end = $_POST["rowEnd"];

$mysqli->query($sql);
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
		$row_count = 0;
		while($row = $mysqli->fetch_row()){
			if($row_count >= $row_start && $row_count < $row_end){
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
			$row_count++;
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