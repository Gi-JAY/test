<?php
include("db.php");
include("function.php");
$name = $_POST["name"];
$email = $_POST["email"];
$edu = $_POST["edu"];
$gender = $_POST["gender"];
$skill = implode(",", $_POST["skills"]);
storeStudent($name, $email, $edu, $gender, $skill);
header("location:index.php");

// echo $name;
// echo "<br>";
// echo $email;
// echo "<br>";
// echo $edu;
// echo "<br>";
// echo $gender;
// echo "<br>";
// echo $skill;
// echo "<br>";
