<?php
if(isset($_GET["id"])){
	$id = $_GET["id"];	
}else{
	header("location:showinfo.php");
}
include("xhtml/setpassword.html");
?>