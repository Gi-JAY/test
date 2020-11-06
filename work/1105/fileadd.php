<?php
$new_content = mb_split(",",$content_import);

  $ISBN = $new_content[0];
  $publish = $new_content[1];
  $bookname = $new_content[2];
  $author = $new_content[3];
  $price = $new_content[4];
  $publishday = $new_content[5];
  require 'check.php';
  if($check){
    $sql = "INSERT INTO Book (ISBN,publish,bookname,author,price,publishday) VALUES ('$ISBN','$publish','$bookname','$author','$price','$publishday')";
    mysqli_query($link,$sql);
    // header("location:index.php");
  }

?>