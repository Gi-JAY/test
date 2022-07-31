<?php
include("function.php");
$id = $_GET["id"];
deletePost($id);
header("location:index.php");
