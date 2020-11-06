<form action="/dashboard/phpTest/work/1105/testread2.php" method="post" enctype="multipart/form-data">
  選擇上傳檔案：<input type="file" name="Filename" >
  </br>
  資料匯出：<input type="submit" value="匯出">
</form>
<hr>
<?php
if(isset($_FILES["Filename"])){
  $filename = "testr.txt";
  $fp = fopen($_FILES["Filename"]["name"],'r');
  $content = fread($fp, filesize($_FILES["Filename"]["name"])-1);
  fclose($fp);
  $fp = fopen($filename,'a');
  fwrite($fp, $content);
  fclose($fp);
  echo nl2br($content);
}
?>