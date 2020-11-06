<?php
$filename = 'test2.txt';
// $filename = '/home/sharetech/文件/test2.txt';
$content = "PHP 寫入文字測試\n";
$fp = fopen($filename,'w') or exit("檔案 $filename 開啟錯誤</br>");
// $fp = fopen($filename,'w');
if(fwrite($fp,$content)){
  echo "寫入成功</br>";
}
?>