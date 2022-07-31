<?php session_start(); ?>
<link rel="stylesheet" href="./css/style.css">
<form action="" method="POST" enctype="multipart/form-data">
  <p>
    匯入資料：<input type="file" name="Filename">
    <input type="submit" value="匯入" class="import">
  </p>
</form>
資料匯出：<a href="getInfo.php" class="export"><button>匯出</button></a>
<form action="" method="GET" class="sort">
  <p>
    排序
    <select name="sort" onchange="submit()">
      <option value="ISBN" <?php if(isset($_GET["sort"]) && $_GET["sort"] == "ISBN") echo "selected" ?>>ISBN</option>
      <option value="publish" <?php if(isset($_GET["sort"]) && $_GET["sort"] == "publish") echo "selected" ?>>出版社</option>
      <option value="bookname" <?php if(isset($_GET["sort"]) && $_GET["sort"] == "bookname") echo "selected" ?>>書名</option>
      <option value="author" <?php if(isset($_GET["sort"]) && $_GET["sort"] == "author") echo "selected" ?>>作者</option>
      <option value="price" <?php if(isset($_GET["sort"]) && $_GET["sort"] == "price") echo "selected" ?>>定價</option>
      <option value="publishday" <?php if(isset($_GET["sort"]) && $_GET["sort"] == "publishday") echo "selected" ?>>發行日</option>
    </select>
    方向
    <select name="method" onchange="submit()">
      <option <?php if(isset($_GET["method"]) && $_GET["method"] == "ASC") echo "selected" ?>>ASC</option>
      <option <?php if(isset($_GET["method"]) && $_GET["method"] == "DESC") echo "selected" ?>>DESC</option>
    </select>
  </p>
</form>
<?php
require 'db_config.php';
$sql = 'SELECT * FROM Book';
if(isset($_GET["sort"]) && isset($_GET["method"])){//如果使用排序功能
  $sql = "SELECT * FROM Book ORDER BY ".$_GET["sort"]." ".$_GET["method"];
}
$result = mysqli_query($link,$sql);
$total_fields = mysqli_num_fields($result);
$content = "";
$content_import = "";
?>
<?php
if(isset($_FILES["Filename"])){
  if(empty($_FILES["Filename"]["name"])){
    header("location:index.php"); //防止沒有檔案的POST  發生表單錯誤
  }
  copy($_FILES["Filename"]["tmp_name"],$_FILES["Filename"]["name"]);  //複製一個檔案到伺服器
  $fp = fopen($_FILES["Filename"]["name"],'r');
  $content_import = fread($fp, filesize($_FILES["Filename"]["name"]));
  unlink($_FILES["Filename"]["tmp_name"]);
  require 'fileadd.php';
  unlink($_FILES["Filename"]["name"]); //新增完畢後刪除複製過來的檔案
  fclose($fp);
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
if(empty($_GET["sort"]) && empty($_GET["method"])){
  //將所有書籍資料寫入txt檔
  $filename = "bookInfo.txt";
  $fp = fopen($filename,'w') or exit("檔案 $filename 開啟錯誤</br>");
  fwrite($fp,$content);
}
?>
</table>
<a href="add.php" class="addBtn"><button>ADD</button></a>