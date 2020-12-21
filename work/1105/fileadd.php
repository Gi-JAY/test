<?php
$new_content = mb_split("\n",$content_import);
for($i=0; $i<count($new_content); $i++){//檢查字尾是否為空
  if($i>0){
    if($new_content[$i] == ""){
      unset($new_content[$i]);
    }
  }
}

for($i=0; $i<count($new_content); $i++){ //總共幾筆資料
  $row[$i] = mb_split(",",$new_content[$i]);
  for($j=0; $j<count($row[$i]); $j++){
    switch($j){
      case 0:
        $ISBN = $row[$i][$j];
      break;
      case 1:
        $publish = $row[$i][$j];
      break;
      case 2:
        $bookname = $row[$i][$j];
      break;
      case 3:
        $author = $row[$i][$j];
      break;
      case 4:
        $price = $row[$i][$j];
      break;
      case 5:
        $publishday = $row[$i][$j];
      break;
    }
  }
  $publishday = trim($publishday); //清除空白字元
  require 'check.php';
  if($check){
    $sql = "INSERT INTO Book (ISBN,publish,bookname,author,price,publishday) VALUES ('$ISBN','$publish','$bookname','$author','$price','$publishday')";
    mysqli_query($link,$sql);
    if($i == count($new_content)-1){
      header("location:index.php");  //刷新顯示新加入的資料
    }
  }
}
?>