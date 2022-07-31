<?php
include("function.php");
$title = $_POST["title"];
$content = $_POST["content"];
$c_id = $_POST["c_id"];
$id = $_POST["id"];

updatePost($title, $content, $c_id, $id);
header("location:index.php");
