<?php
session_start();
$_POST = array();
$_GET = array();
session_destroy();
header("location:index.php");
?>