<?php
session_start();
if (isset($_POST["id"]) && $_POST["id"] == $_SESSION["ID"]) {
    session_destroy();
    header("location:index.php");
}
