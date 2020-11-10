<?php
$new_content = mb_split("\n",$content);
for($i=0; $i<count($new_content); $i++){//檢查字尾是否為空
  if($i>0){
    if($new_content[$i] == ""){
      unset($new_content[$i]);
    }
  }
}
?>