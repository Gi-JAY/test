<?php
$str = "";
$check_str = "";
$check = false; //是否使用sql
$check_birthday = false; //確認birthday格式

if(preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/",$birthday)){
    if (preg_match("/([^-]+)-([^-]+)-([^-]+)/", $birthday, $mch)) {  //$mch[1]為年 $mch[2]為月  $mch[3]為日
      $check_birthday = true;
    if($mch[1]<1000 || $mch[2]>12 || $mch[3]>31){
      $check_birthday = false; 
    }
    else if($mch[2] == 1 || 3 || 5 || 7 || 8 || 10 || 12){
      if($mch[3] > 31){
        $check_birthday = false;; 
      }
    }
    else if($mch[2] == 2){
      if($mch[3] > 29){
        $check_birthday = false;
      }
    }
    else if($mch[2] == 4 || 6 || 9 || 11){
      if($mch[3] > 30){
        $check_birthday = false;
      }
    }
  }
}else{
  $check_birthday = false;
}

//檢查欄位是否有填寫
if(empty($name) || empty($gender) || empty($phone) || empty($birthday) || empty($address) || empty($email)){
  if(empty($name)){
    $str .= "Name ";
  }
  if(empty($gender)){
    $str .= "Gender ";
  }
  if(empty($phone)){
    $str .= "Phone ";
  }
  if(empty($birthday)){
    $str .= "Birthday ";
  }
  if(empty($address)){
    $str .= "Address ";
  }
  if(empty($email)){
    $str .= "E-mail ";
  }
  echo "<script>";
  echo "alert('$str,還未填寫');";
  echo "history.go(-1)";
  echo "</script>";
}else if(!preg_match("/^[a-zA-Z ]*$/",$name) || !preg_match("/^09[0-9]{2}\-[0-9]{6}$/",$phone) || !preg_match("/^[\\D\'\"\s]+$/",$address)
         || !$check_birthday ||!preg_match("/^[^.][A-Za-z0-9_.]+[^.]*\@[a-zA-Z.]+[^.]$/",$email)){ //檢查書寫格式
  if (!preg_match("/^[a-zA-Z ]*$/",$name)) { 
    $check_str .="Name只允許字母和空格\\n"; 
  }
  if (!preg_match("/^09[0-9]{2}\-[0-9]{6}$/",$phone)) { 
    $check_str .= "Phone格式錯誤\\n";
  }
  if(!$check_birthday){
    $check_str .="Birthday格式錯誤\\n";
  }
  if (!preg_match("/^[\\D\'\"\s]+$/",$address)) { 
    $check_str .= "Adress不允許數字\\n";
  }
  if (!preg_match("/^[^.][A-Za-z0-9_.]+[^.]*\@[a-zA-Z.]+[^.]$/",$email)) { 
    $check_str .= "Email格式錯誤\\n";
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