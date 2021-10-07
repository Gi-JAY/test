<?php
session_start();
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
        <?php
        if (isset($_SESSION["USER"])) {
            echo $_SESSION["USER"] . "你好";
        }
        ?>
    </div>
    <?php
    if (!isset($_SESSION["ID"])) { ?>
        <div>
            <form action="auth.php" method="post">
                <label for="user">帳號</label>
                <input type="text" name="user" id="user">
                <label for="pw">密碼</label>
                <input type="password" name="pw" id="pw">
                <input type="submit" value="登入">
            </form>
        </div>

    <?php } else { ?>
        <form action="logout.php" method="post" value="">
            <input type="hidden" name="id" value="<?php echo $_SESSION["ID"] ?>">
            <input type="submit" value="登出">
        </form>
    <?php } ?>
    <div>
        <a href="signup.php">申請會員</a>
    </div>

    <div>
        <?php
        if (isset($_GET["signup"])) {
            if ($_GET["signup"] == "success") {
                echo "申請成功，請重新登入。";
            }
        }
        ?>
    </div>
</body>

</html>