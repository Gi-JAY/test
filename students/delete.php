<?php
include("db.php");
include("function.php");
$id = $_GET["id"];
deletdStudent($id);
header("location:index.php");
