<?php
$str = ""; //檢查哪個欄位為空
$check_str = ""; //檢查哪個欄位格式出錯
$check = false; //是否使用sql
$check_publishday = false; //確認publishday格式

if(preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/",$publishday)){
    if (preg_match("/([^-]+)-([^-]+)-([^-]+)/", $publishday, $mch)) {  //$mch[1]為年 $mch[2]為月  $mch[3]為日
      $check_publishday = true;
    if($mch[1]<1000 || $mch[2]>12 || $mch[3]>31){
      $check_publishday = false; 
    }
    else if($mch[2] == 1 || 3 || 5 || 7 || 8 || 10 || 12){
      if($mch[3] > 31){
        $check_publishday = false;; 
      }
    }
    else if($mch[2] == 2){
      if($mch[3] > 29){
        $check_publishday = false;
      }
    }
    else if($mch[2] == 4 || 6 || 9 || 11){
      if($mch[3] > 30){
        $check_publishday = false;
      }
    }
  }
}else{
  $check_publishday = false;
}

//檢查欄位是否有填寫
if(empty($ISBN) || empty($publish) || empty($bookname) || empty($author) || empty($price) || empty($publishday)){
  if(empty($ISBN)){
    $str .= "ISBN ";
  }
  if(empty($publish)){
    $str .= "出版社 ";
  }
  if(empty($bookname)){
    $str .= "書名 ";
  }
  if(empty($author)){
    $str .= "作者 ";
  }
  if(empty($price)){
    $str .= "定價 ";
  }
  if(empty($publishday)){
    $str .= "發行日 ";
  }
  echo "<script>";
  echo "alert('$str,還未填寫');";
  echo "history.go(-1)";
  echo "</script>";
}else if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{1}$/",$ISBN) || 
 !preg_match("/^[\\W]+$/",$author) || !preg_match("/^[0-9]+$/",$price)  || 
 !$check_publishday){
  if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{1}$/",$ISBN)){
    $check_str .= "ISBN格式錯誤\\n";
  }
  if(!preg_match("/^[\\W]+$/",$author)){
    $check_str .= "作者格式錯誤\\n";
  }
  if(!preg_match("/^[0-9]+$/",$price)){
    $check_str .= "價格格式錯誤\\n";
  }
  if(!$check_publishday){
    $check_str .= "出版日期格式錯誤\\n";
  }
  echo "<script>";
  echo "alert('$check_str');";
  echo "history.go(-1)";
  echo "</script>";
}else{
  $check =true;
}
//!preg_match("/^[1-2]{1}[0-9]{3}\-[0-9]{2}\-[0-3]{1}[0-9]{1}$/",$birthday) 
?>