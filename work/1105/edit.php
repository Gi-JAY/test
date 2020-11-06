<?php 
session_start(); 
require 'db_config.php';
$id = $_GET["id"];
$sql = "SELECT * FROM Book WHERE id = '$id'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);
?>
<link rel="stylesheet" href="./css/style.css">
<form action="update.php" method="POST">
  <table border=1>
  <tr>
      <td>ISBN</td>
      <td><?php echo $row["ISBN"]; ?></td>
    </tr>
    <tr>
      <td>出版社</td>
      <td><input type="text" name="publish" value="<?php echo $row["publish"]; ?>"></td>
    </tr>
      <td>書名</td>
      <td><input type="text" name="bookname" value="<?php echo $row["bookname"]; ?>"></td>
    </tr>
    <tr>
      <td>作者</td>
      <td><input type="text" name="author" value="<?php echo $row["author"]; ?>"></td>
    </tr>
    <tr>
      <td>定價</td>
      <td><input type="text" name="price" value="<?php echo $row["price"]; ?>"></td>
    </tr>
    <tr>
      <td>發行日</td>
      <td><input type="text" name="publishday" value="<?php echo $row["publishday"]; ?>"></td>
    </tr>
    <input type="hidden" name="ISBN" value="<?php echo $row["ISBN"]; ?>">
    <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
  </table>
  <button type="submit">Edit Record</button>
</form>
<hr>