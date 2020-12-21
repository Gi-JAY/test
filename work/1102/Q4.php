<?php
$str = "Hellow World!!!!";
    function reverse_str($str){
        if(strlen($str)>0){
            reverse_str(substr($str,1));
        }
        echo substr($str,0,1);
        return;
    }
    reverse_str($str);
?>