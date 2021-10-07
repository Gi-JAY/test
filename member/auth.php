<?php
session_start();
try {
    include("pdo.php");
    $user = $_POST["user"];
    $pw = md5(sha1($_POST["pw"]));

    if ($user == "" || $pw == "") {
        header("location:index.php");
    }

    $sql = "SELECT *FROM members WHERE user = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user]);
    $row = $stmt->fetch();

    if ($row["pw"] == $pw) {
        $_SESSION["ID"] = $row["id"];
        $_SESSION["USER"] = $user;
        $_SESSION["LEVEL"] = $row["level"];
        if ($row["level"] == 0) {
            header("location:backend/index.php");
        } else {
            header("location:index.php?logoin=succese");
        }
    } else {
        echo "帳號或密碼錯誤";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
