<form action="/dashboard/phpTest/work/1105/testCopy.php" method="post" enctype="multipart/form-data">
  選擇上傳檔案：<input type="file" name="Filename" >
  </br>
  資料匯出：<input type="submit" value="匯出">
</form>
<hr>
<?php
if(isset($_FILES["Filename"])){
  echo $_FILES["Filename"]["tmp_name"];
  if(copy($_FILES["Filename"]["tmp_name"],$_FILES["Filename"]["name"])){
    echo "檔案上傳成功</br>";
    unlink($_FILES["Filename"]["tmp_name"]);
  }else{
    echo "檔案上傳失敗</br>";
  }
}
?>