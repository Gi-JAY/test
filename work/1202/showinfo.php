<?php
session_start();
require 'class/db_config.php';

$filepath = "/HDD/STATUSLOG/";
if(isset($_POST["user"]) && isset($_POST["pwd"])){
	$user = $_POST["user"];
	$pwd = $_POST["pwd"];
	$sql = "SELECT * FROM user WHERE user='$user' and password='$pwd'";
	$mysql->query($sql);
	$row = $mysql->fetch_assoc();
	$id =$row["id"];
	$refresh = $row["refresh"];
	$_SESSION["ID"] = $id;
	$_SESSION["USER"] = $user;
if($mysql->get_num_rows() == 0){ //login check
		echo "<script>\n";
		echo "alert('登入失敗');\n";
		echo "history.go(-1);\n";
		echo "</script>\n";
	}
}
if($_SESSION["ID"]){
	$id = $_SESSION["ID"];
	$user = $_SESSION["USER"];
}else{
	header("location:index.php");
}

if(isset($_GET["sort"])){
	$sort = $_GET["sort"];
	$hour = $_GET["hour"];
	$minute = $_GET["minute"];
	$schpage = $_GET["schpage"];
	require 'check.php';
}

$page = 1; //current page
if(isset($_GET["page"])){
	$page = $_GET["page"];
}else if(isset($schpage)){
	$page = $schpage;
}
if($page < 1){
	$page = 1;
}
$row_max = 20; //read limit
$row_total = get_row_total();
$row_start = $row_max*($page-1);
$row_end = $row_max*$page;
$info_show = info_read();
if($row_total != 0){
	if($row_total%$row_max != 0){
		$page_end = floor($row_total/$row_max)+1;
	}else{
		$page_end = floor($row_total/$row_max);
	}
}
if($page > $page_end){
	// echo "<script>\n";
	// echo "alert('已超出頁尾,將返回頁尾');\n";
	// echo "</script>\n";
	$page = $page_end;
}

function info_read(){
	global $filepath,$row_start,$row_end,$row_total,$user,$sort,$hour,$minute;
	$filename = $filepath.$user;
	if($sort == "DESC"){
		$tmpFile = $filename."_tmp";
		exec("tac $filename > $tmpFile");
		$filename = $tmpFile;
	}

	if($hour != "" || $minute != ""){
		$cmd_sch = "^$hour:$minute";
		if($hour == ""){
			$cmd_sch = ":$minute:";
		}
		if($minute == ""){
			$cmd_sch = "^$hour:";
		}
		exec("grep $cmd_sch $filename",$msg);
		$count = count($msg);
		$row_total = $count;
		for($i=$row_start; $i<$row_end+1; $i++){
			if($i < $count){
				$content[$i] = $msg[$i];
			}else{
				break;
			}
		}
		if(file_exists($tmpFile)){
			unlink($tmpFile);
		}
	}else{
		$fp = fopen($filename,'r');
		for($i =0; $i<$row_start; $i++){ //skip line
			fgets($fp,1024);
		}
		for($i = $row_start; $i<$row_end+1; $i++){ //start read info
			if(!feof($fp)){
				$content[] = fgets($fp,1024);
			}else{
				fclose($fp);
				break;
			}
		}
		if(file_exists($tmpFile)){
			unlink($tmpFile);
		}
	}
	return $content;
}

function get_row_total(){
	global $filepath,$user;
		$filename = $filepath.$user;
		if(file_exists($filename)){
			$count = 0;
			$fp = fopen($filename,'r');
			while(!feof($fp)){
				if(fgets($fp,1024)){
					$count ++;
				}
			}
		}else{
			$count = 0;
		}
	return $count;
}
include("xhtml/showinfo.html");
?>