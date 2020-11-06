<?php session_start(); ?>
<link rel="stylesheet" href="./css/style.css">
<form action="/dashboard/phpTest/work/1105/index.php" method="POST" enctype="multipart/form-data">
  <p>匯入資料：<input type="file" name="Filename"></p>
  <p>資料匯出：<input type="submit" value="匯出"></p>
</form>
<form action="/dashboard/phpTest/work/1105/index.php" method="GET">
  <p>
    排序
    <select name="sort">
      <option>ISBN</option>
      <option>出版社</option>
      <option>書名</option>
      <option>作者</option>
      <option>定價</option>
      <option>發行日</option>
    </select>
    方向
    <select name="method">
      <option>ASC</option>
      <option>DESC</option>
    </select>
  </p>
</form>
<?php
require 'db_config.php';
$sql = 'SELECT * FROM Book';
$result = mysqli_query($link,$sql);
$total_fields = mysqli_num_fields($result);
$content = "";
$content_import = "";
?>
<?php
if(isset($_FILES["Filename"])){
  if(empty($_FILES["Filename"]["name"])){
    header("location:index.php");
  }
  $fp = fopen($_FILES["Filename"]["name"],'r');
  $content_import = fread($fp, filesize($_FILES["Filename"]["name"])-1);
  fclose($fp);
  require 'fileadd.php';
}
?>
<table border=1>
<tr>
  <td>ISBN</td>
  <td>出版社</td>
  <td>書名</td>
  <td>作者</td>
  <td>定價</td>
  <td>發行日</td>
  <td>編輯/刪除</td>
</tr>
<?php
while($row = mysqli_fetch_row($result)){
  echo "<tr>";
  for($i=0; $i<$total_fields; $i++){
    if($i != 0){
      echo "<td>".$row[$i]."</td>";
      $content .= $row[$i];
      if($i != $total_fields-1){
        $content .= ",";
      }
    }
  }
  $content .= "\n";
?>
<td>
  <a href="edit.php?id=<?php echo $row[0] ?>"><button name="edit">EDIT</button></a>
  <a href="delete.php?id=<?php echo $row[0] ?>"><button>DEL</button></a>
</td>
<?php
echo "</tr>";
}
//將所有書籍資料寫入txt檔
$filename = "bookInfo.txt";
$fp = fopen($filename,'w') or exit("檔案 $filename 開啟錯誤</br>");
fwrite($fp,$content);
?>
</table>
<a href="add.php"><button>ADD</button></a>