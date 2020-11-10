<?php session_start(); ?>
<link rel="stylesheet" href="./css/style.css">
<h1>Contact List</h1>
<h3>List View</h3>
<hr>
<?php
  require 'db_config.php';
  $sql = 'SELECT * FROM contact';
  $result = mysqli_query($link,$sql);
  $total_fields = mysqli_num_fields($result);
  $fielde_name = array();
?>
<span>
<form action="/dashboard/phpTest/work/1103/index.php" method="POST">
<p>Search:</p>
<select name="sort">
 <option <?php if(isset($_POST["sort"]) && $_POST["sort"] == "Name"){echo "selected";} ?>>Name</option>
  <option <?php if(isset($_POST["sort"]) && $_POST["sort"] == "Gender"){echo "selected";} ?>>Gender</option>
  <option <?php if(isset($_POST["sort"]) && $_POST["sort"] == "Phone"){echo "selected";} ?>>Phone</option>
  <option <?php if(isset($_POST["sort"]) && $_POST["sort"] == "Birthday"){echo "selected";} ?>>Birthday</option>
  <option <?php if(isset($_POST["sort"]) && $_POST["sort"] == "Address"){echo "selected";} ?>>Address</option>
  <option <?php if(isset($_POST["sort"]) && $_POST["sort"] == "E-mail"){echo "selected";} ?>>E-mail</option>
</select>
<input type="text" name="key" onkeypress="if (event.keyCode == 13) {return submit;}" value="<?php if(isset($_POST["key"])) 
echo $_POST["key"]; ?>">
</form>
</span>
<table width=1000>
  <?php
  if(!isset($_POST["key"]) || empty($_POST["key"])){//預設將所有資料印出
    //印出欄位名
    echo "<tr>";
    while($meta = mysqli_fetch_field($result)){
        echo "<td>".$meta->name."</td>";
        array_push($fielde_name,$meta->name);
    }
    echo "<td>Edit/Delete</td>";
    echo "</tr>";
    //印出資料
    while($row = mysqli_fetch_row($result)){
      echo "<tr>";
      for($i=0; $i<$total_fields; $i++){
        echo "<td>".$row[$i]."</td>";
      }
    ?>
    <form action="/dashboard/phpTest/work/1103/EditRecord.php" method="GET">
      <td>
        <button name="edit" value="<?php echo $row[0] ?>">Edit</button>
    </form>
        <a href="/dashboard/phpTest/work/1103/Delete.php?Id=<?php echo $row[0] ?>"><button>Delete</button></a>
      </td>
  <?php
      echo "</tr>";
    }
  }else{//當表單送出查詢過濾條件
      $sort = $_POST["sort"];
      $key = $_POST["key"];
      $sql = "SELECT * FROM contact WHERE $sort LIKE '%$key%'";
      $result = mysqli_query($link,$sql);
      echo "<tr>";
      while($meta = mysqli_fetch_field($result)){
        echo "<td>".$meta->name."</td>";
        array_push($fielde_name,$meta->name);
    }
      echo "<td>Edit/Delete</td>";
      echo "</tr>";
      //印出資料
      while($row = mysqli_fetch_row($result)){
        echo "<tr>";
        for($i=0; $i<$total_fields; $i++){
          echo "<td>".$row[$i]."</td>";
        }
  ?>
      <form action="/dashboard/phpTest/work/1103/EditRecord.php" method="GET">
      <td>
        <button name="edit" value="<?php echo $row[0] ?>">Edit</button>
    </form>
        <a href="/dashboard/phpTest/work/1103/Delete.php?Id=<?php echo $row[0] ?>"><button>Delete</button></a>
      </td>
  <?php
        echo "</tr>";
      }
  }
  ?>
</table>
<hr>
<a href="AddRecord.php"><button>Add Record</button></a>