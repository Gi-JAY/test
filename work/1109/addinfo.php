<?php
$filename = "bookInfo.txt";
$content = "'$ISBN','$publish','$bookname','$author','$price','$publishday'\n";
$fp = fopen($filename,'a') or exit("檔案 $filename 開啟錯誤</br>");
fwrite($fp,$content);
fclose($fp);
?>