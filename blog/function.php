<?php
date_default_timezone_set("Asia/Taipei");
session_start();
// $currentD = date("Y-m-d H:i:s");
function showAllPosts()
{
    include("backend/pdo.php");
    $sql = "SELECT posts.* , category.title 
                AS c_title 
                FROM posts 
                LEFT JOIN category 
                ON posts.c_id = category.id 
                ORDER BY id DESC";
    // $sql = "SELECT * FROM posts ORDER BY id ASC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rows = array();
    while ($row = $stmt->fetch()) {
        $rows[] = $row;
    }
    return $rows;
}
function showPost($id)
{
    include("backend/pdo.php");
    $sql = "SELECT * FROM posts WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch();
    return $row;
}
function storePost($title, $content, $c_id, $u_id)
{
    include("backend/pdo.php");
    // global $currentD;
    // $created_at = date("Y-m-d H:i:s");
    // $updated_at = date("Y-m-d H:i:s");
    $sql = "INSERT INTO posts(title,content,c_id,u_id,created_at,updated_at)VALUES(?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $content, $c_id, $u_id, $currentD, $currentD]);
}
function updatePost($title, $content, $c_id, $id)
{
    include("backend/pdo.php");
    $sql = "UPDATE posts SET title=?,content=?,c_id=?,updated_at=? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $content, $c_id, $currentD, $id]);
}
function deletePost($id)
{
    include("backend/pdo.php");
    $sql = "DELETE FROM posts WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}
function showAllCates()
{
    include("backend/pdo.php");
    $sql = "SELECT * FROM category";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $rows = array();
    while ($row = $stmt->fetch()) {
        $rows[] = $row;
    }
    return $rows;
}
function auth($user, $pw)
{
    try {
        include("backend/pdo.php");
        $sql = "SELECT * FROM users WHERE user = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user]);
        $row = $stmt->fetch();
        if ($row["pw"] == $pw) {
            $_SESSION["ID"] = $row["id"];
            $_SESSION["NAME"] = $row["name"];
            $_SESSION["LEVEL"] = $row["level"];
            if ($row["level"] == 0) {
                header("location:backend/index.php");
            } else {
                header("location:index.php?login=success");
            }
        } else {
            echo "帳號或密碼錯誤";
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
function logout()
{
    if (isset($_GET["logout"]) && $_GET["logout"] == "true") {
        session_destroy();
    }
}
function storeUser($user, $pw, $name, $email)
{
    try {
        include("backend/pdo.php");
        $sql_check = "SELECT * FROM users WHERE user = ?";
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->execute([$user]);

        if ($stmt_check->rowCount() > 0) {
            header("location:register.php?error=user");
        } else {
            $sql = "INSERT INTO users(user,pw,name,email,created_at,updated_at)VALUES(?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user, $pw, $name, $email, $currentD, $currentD]);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
