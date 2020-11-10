<?php 
session_start(); 
require 'db_config.php';
$id = $_GET["edit"];
$sql = "SELECT * FROM contact WHERE Id = '$id'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_assoc($result);

$row["Address"] = str_replace("\"","&quot;",$row["Address"]); //防止"符號無法印出
?>
<link rel="stylesheet" href="./css/style.css">
<h1>Contact List</h1>
<h3>Add Record</h3>
<hr>
<form action="/dashboard/phpTest/work/1103/Update.php" method="POST">
  <table>
  <tr>
      <td>Id</td>
      <td><?php echo $row["Id"]; ?></td>
    </tr>
    <tr>
      <td>Name</td>
      <td><input type="text" name="Name" value="<?php echo $row["Name"]; ?>"></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td>
      <label><input type="radio" name="Gender" value="Male" <?php if($row["Gender"] == "Male") echo "checked=true"?> >Male</label>
      <label><input type="radio" name="Gender" value="Female"<?php if($row["Gender"] == "Female") echo "checked=true"?> >Female</label>
      </td>
    </tr>
    <tr>
      <td>Phone</td>
      <td><input type="text" name="Phone" value="<?php echo $row["Phone"]; ?>"></td>
    </tr>
    <tr>
      <td>Birthday</td>
      <td><input type="text" name="Birthday" value="<?php echo $row["Birthday"]; ?>"></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><input type="text" name="Address" value="<?php echo $row["Address"]; ?>"></td>
    </tr>
    <tr>
      <td>E-mail</td>
      <td><input type="text" name="E-mail" value="<?php echo $row["E-mail"]; ?>"></td>
    </tr>
    <input type="hidden" name="Id" value="<?php echo $row["Id"]; ?>">
  </table>
  <button type="submit">Edit Record</button>
</form>
<hr>