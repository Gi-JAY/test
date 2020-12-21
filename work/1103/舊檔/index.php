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
  <?php
  while($meta = mysqli_fetch_field($result)){
    if($meta->name != "Id"){
      echo "<option>".$meta->name."</option>";
    }
    array_push($fielde_name,$meta->name);
  }
  ?>
</select>
<input type="text" name="key" onkeypress="if (event.keyCode == 13) {return submit;}">
</form>
</span>
<table width=1000>
  <?php
  if(!isset($_POST["sort"])){//預設將所有資料印出
    //印出欄位名
    echo "<tr>";
    for($i=0; $i<$total_fields; $i++){
      echo "<td>".$fielde_name[$i]."</td>";
    }
    echo "</tr>";
    //印出資料
    while($row = mysqli_fetch_row($result)){
      echo "<tr>";
      for($i=0; $i<$total_fields; $i++){
        echo "<td>".$row[$i]."</td>";
      }
      echo "</tr>";
    }
  }else{//當表單送出查詢過濾條件
    $sort = $_POST["sort"];
    $key = $_POST["key"];
    $sql = "SELECT * FROM contact WHERE ".$sort."=".'\''.$key.'\'';
    $result = mysqli_query($link,$sql);
    echo "<tr>";
    for($i=0; $i<$total_fields; $i++){
      echo "<td>".$fielde_name[$i]."</td>";
    }
    echo "</tr>";
    //印出資料
    while($row = mysqli_fetch_row($result)){
      echo "<tr>";
      for($i=0; $i<$total_fields; $i++){
        echo "<td>".$row[$i]."</td>";
      }
      echo "</tr>";
    }
  }
  ?>
</table>
<hr>
<a href="AddRecord.php"><button>Add Record</button></a>