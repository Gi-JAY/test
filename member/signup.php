<?php
if (isset($_POST["submit"])) {
    try {
        include("pdo.php");
        $user = $_POST["user"];
        $pw = md5(sha1($_POST["pw"]));

        $sql_check = "SELECT * FROM members WHERE user=?";
        $stmt_check = $pdo->prepare($sql_check);
        $stmt_check->execute([$user]);

        // $row_check = $stmt_check->fetch();
        // if ($row_check["user"] == $user) {
        //     echo "帳號重複，請重新申請";
        // } else {
        //     $sql = "INSERT INTO members(user,pw)VALUES(?,?)";
        //     $stmt = $pdo->prepare($sql);
        //     $stmt->execute([$user, $pw]);
        //     header("location:index.php?signup=success");
        // }

        if ($stmt_check->rowCount() > 0) {
            echo "帳號重複，請重新申請";
        } else {
            $sql = "INSERT INTO members(user,pw)VALUES(?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user, $pw]);
            header("location:index.php?signup=success");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div>
        <form action="" method="post">
            <label for="user">帳號</label>
            <input type="text" name="user" id="user">
            <label for="pw">密碼</label>
            <input type="password" name="pw" id="pw">
            <input type="submit" name="submit" value="申請">
            <input type="button" value="取消" onclick="history.back()">
        </form>
    </div>
</body>

</html>