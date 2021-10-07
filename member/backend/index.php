<?php
session_start();
if (!isset($_SESSION["ID"]) || $_SESSION["LEVEL"] != 0) {
    header("location:../index.php");
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
    <h1><?php echo $_SESSION["USER"] . "你好" ?></h1>
</body>

</html>