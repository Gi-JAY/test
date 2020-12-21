<?php
session_start();
require 'class/db_config.php';
date_default_timezone_set('Asia/Taipei');
$filename = date("Y-m-d")."(".date("h:i:sa").").csv";
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=$filename");
header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
header('Expires:0');
header('Pragma:public');

$rowmax = 6; //每筆資料幾個欄位
$sql = $_POST["sql"];
<<<<<<< HEAD
$mysqli->query($sql);
$total_fields = $mysqli->get_num_fields();
$content = "ISBN,出版社,書名,作者,定價,發行日\n";//輸出標頭

//存取要輸出的字串
while($row = $mysqli->fetch_row()){
  for($i=0; $i<$total_fields; $i++){
    if($i != 0){//不需要ID
      $content .= $row[$i];
      if($i != $total_fields-1){//不是字尾
=======
$result = $mysqli->query($sql);
$total_fields = $mysqli->get_num_fields();
$content = "";

while($row = $mysqli->fetch_row()){
  for($i=0; $i<$total_fields; $i++){
    if($i != 0){
      $content .= $row[$i];
      if($i != $total_fields-1){
>>>>>>> 926a028ac5ad1b1a9272bc2c37a70e74859962b8
        $content .= ",";
      }
    }
  }
  $content .= "\n";
}
<<<<<<< HEAD
echo $content;
=======


  //將所有書籍資料寫入txt檔
  $filename = "bookInfo.csv";
  $fp = fopen($filename,'w') or exit("檔案 $filename 開啟錯誤</br>");
  require 'csvInput.php';
  foreach ($new_content as $row) {
    fputcsv($fp, mb_split(',', $row));
  }
  fclose($fp);

if (($handle = fopen("bookInfo.csv", "r")) !== FALSE) {
  echo "ISBN,出版社,書名,作者,定價,發行日\n";
  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    for($i=0; $i<count($data); $i++){
      echo $data[$i].",";
      if($i!=0 && $i%($rowmax-1) == 0){
        echo "\n";
      }
    }
  }
  fclose($handle);
  unlink("bookInfo.csv");
}

>>>>>>> 926a028ac5ad1b1a9272bc2c37a70e74859962b8
?>