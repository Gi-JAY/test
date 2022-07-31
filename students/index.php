<?php
include("db.php");
include("function.php");
$rows = showAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>學生資料</h1>
    <a href="create.php">新增資料</a>
    <table>
        <tr>
            <th>ID</th>
            <th>姓名</th>
            <th>E-Mail</th>
            <th>教育程度</th>
            <th>性別</th>
            <th>技能</th>
            <th>動作</th>
        </tr>
        <?php
        // while ($row = mysqli_fetch_assoc($result)) 
        foreach ($rows as $row) { ?>
            <tr>
                <td><?php echo $row["id"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["edu"]; ?></td>
                <td><?php echo $row["gender"]; ?></td>
                <td><?php echo $row["skill"]; ?></td>
                <td>
                    <a href="delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('確認刪除?')">刪除</a>
                    <a href="edit.php?id=<?php echo $row["id"]; ?>">編輯</a>
                </td>

            </tr>
        <?php } ?>
        <?php
        // while ($row = mysqli_fetch_assoc($result)) {
        //     echo "<tr>";
        //     echo "<td>" . $row["id"] . "</td>";
        //     echo "<td>" . $row["name"] . "</td>";
        //     echo "<td>" . $row["email"] . "</td>";
        //     echo "<td>" . $row["edu"] . "</td>";
        //     echo "<td>" . $row["gender"] . "</td>";
        //     echo "<td>" . $row["skill"] . "</td>";
        //     echo "</tr>";
        // }
        ?>
    </table>
</body>

</html>