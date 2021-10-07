<?php
include("function.php");
deleteStudent($_GET["id"]);
header("location:index.php");



// try {
//     include("pdo.php");
//     $id = $_GET["id"];
//     $sql = "DELETE FROM students WHERE id = ?";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([$id]);
//     header("location:index.php");
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }


// try {
//     include("pdo.php");
//     $id = $_GET["id"];
//     $sql = "DELETE FROM students WHERE id = :id";
//     $stmt = $pdo->prepare($sql);
//     $stmt->bindParam(":id", $id);
//     $stmt->execute();
//     header("location:index.php");
// } catch (PDOException $e) {
//     echo $e->getMessage();
// }
