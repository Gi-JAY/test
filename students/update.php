<?php
include("db.php");
include("function.php");
$name = $_POST["name"];
$email = $_POST["email"];
$edu = $_POST["edu"];
$gender = $_POST["gender"];
$skills = implode(",", $_POST["skills"]);
$id = $_POST["id"];
updateStudent($id, $name, $email, $edu, $gender, $skills);
header("location:index.php");
