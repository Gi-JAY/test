<?php
require 'class/db_config.php';

$sql = "SELECT * FROM user";
$mysql->query($sql);
include("xhtml/showaccount.html");
?>