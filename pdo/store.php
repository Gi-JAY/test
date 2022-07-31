<?php
include("function.php");
$name = $_POST["name"];
$email = $_POST["email"];
$edu = $_POST["edu"];
$gender = $_POST["gender"];
$created_at = date("Y-m-d H:i:s");
$updated_at = date("Y-m-d H:i:s");
storeStudent($name, $email, $edu, $gender, $skills, $created_at, $updated_at);
header("location:index.php");

// date_default_timezone_set("Asia/Taipei");
// try {
//     include("pdo.php");
//     $name = $_POST["name"];
//     $email = $_POST["email"];
//     $edu = $_POST["edu"];
//     $gender = $_POST["gender"];
//     if (isset($_POST["skills"])) {
//         $skills = implode(",", $_POST["skills"]);
//     } else {
//         $skills = "";
//     }
//     $created_at = date("Y-m-d H:i:s");
//     $updated_at = date("Y-m-d H:i:s");
//     $sql = "INSERT INTO students(name,email,edu,gender,skill,created_at,updated_at)VALUES(?,?,?,?,?,?,?)";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([$name, $email, $edu, $gender, $skills, $created_at, $updated_at]);

//     header("location:index.php");
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }

    // try{
    //     include("pdo.php");
    //     $name = $_POST["name"];
    //     $email = $_POST["email"];
    //     $edu = $_POST["edu"];
    //     $gender = $_POST["gender"];
    //     $skills = implode(",",$_POST["skills"]);
    //     $created_at = date("Y-m-d H:i:s");
    //     $updated_at = date("Y-m-d H:i:s");
    //     $sql = "INSERT INTO students(name,email,edu,gender,skill,created_at,updated_at)VALUES(:name,:email,:edu,:gender,:skill,:created_at,:updated_at)";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->bindParam(":name",$name);
    //     $stmt->bindParam(":email",$email);
    //     $stmt->bindParam(":edu",$edu);
    //     $stmt->bindParam(":gender",$gender);
    //     $stmt->bindParam(":skill",$skills);
    //     $stmt->bindParam(":created_at",$created_at);
    //     $stmt->bindParam(":updated_at",$updated_at);
    //     $stmt->execute();
        
    //     header("location:index.php");
    // }catch(PDOException $e){
    //     echo $e->getMessage();
    // }
