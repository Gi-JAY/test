<?php
include("function.php");
$name = $_POST["name"];
$email = $_POST["email"];
$edu = $_POST["edu"];
$gender = $_POST["gender"];
$skills = implode(",", $_POST["skills"]);
$updated_at = date("Y-m-d H:i:s");
$id = $_POST["id"];
updateStudent($name, $email, $edu, $gender, $skills, $updated_at, $id);
header("location:index.php");
// try {
//     include("pdo.php");
//     $name = $_POST["name"];
//     $email = $_POST["email"];
//     $edu = $_POST["edu"];
//     $gender = $_POST["gender"];
//     $skills = implode(",", $_POST["skills"]);
//     $updated_at = date("Y-m-d H:i:s");
//     $id = $_POST["id"];
//     $sql = "UPDATE students SET name =?,email=?,edu=?,gender=?,skill=?
//         ,updated_at=?WHERE id=?";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([$name, $email, $edu, $gender, $skills, $updated_at, $id]);
//     header("location:index.php");
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }
