<?php
date_default_timezone_set("Asia/Taipei");
function showAll()
{
    try {
        include("pdo.php");
        $sql = "SELECT * FROM students";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $rows = array();
        while ($row = $stmt->fetch()) {
            $rows[] = $row;
        }
        return $rows;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function showStudent($id)
{
    try {
        include("pdo.php");
        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function storeStudent($name, $email, $edu, $gender, $skills, $created_at, $updated_at)
{
    try {
        include("pdo.php");
        if (isset($_POST["skills"])) {
            $skills = implode(",", $_POST["skills"]);
        } else {
            $skills = "";
        }
        $sql = "INSERT INTO students(name,email,edu,gender,skill,created_at,updated_at)VALUES(?,?,?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $edu, $gender, $skills, $created_at, $updated_at]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function deleteStudent($id)
{
    try {
        include("pdo.php");
        $sql = "DELETE FROM students WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        header("location:index.php");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function updateStudent($name, $email, $edu, $gender, $skills, $updated_at, $id)
{
    try {
        include("pdo.php");
        $sql = "UPDATE students SET name =?,email=?,edu=?,gender=?,skill=?
        ,updated_at=?WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $email, $edu, $gender, $skills, $updated_at, $id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
