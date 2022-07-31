<?php
// echo $_POST["user"];
// echo "</br>";
// echo $_POST["email"];
// echo "</br>";
// echo $_GET["user"];
// echo "</br>";
// echo $_GET["email"];
if (empty($_POST["user"])) {
    // echo "請輸入USER";
    // echo "</br>";
    header("location:form.php?error=0");
} else {
    echo $_POST["user"];
    echo "</br>";
}
if (empty($_POST["email"])) {
    // echo "請輸入EMAIL";
    // echo "</br>";
    header("location:form.php?error=1");
} else {
    echo $_POST["email"];
    echo "</br>";
}
if (empty($_POST["edu"])) {
    header("location:form.php?error=2");
} else {
    echo $_POST["edu"];
    echo "</br>";
}
echo $_POST["gender"];
echo "</br>";
// $skills = $_POST["skills"];
// foreach ($skills as $skill) {
//     echo $skill;
// }
if (isset($_POST["skills"])) {
    $skills = $_POST["skills"];
    $skill = implode("--", $skills);
    echo $skill;
} else {
    $skill = "未選擇";
    echo $skill;
}
echo "</br>";
echo $_POST["comment"];
