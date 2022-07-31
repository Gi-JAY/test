<?php
    // function test(){
    //     echo "Hollow";
    // }
    // test();

    function hello($name){
        $x = "HELLOW!!{$name}";
        return $x;
    }
    echo hello("JOHN");
    function eat($food=""){
        return "晚餐吃{$food}";
    }
    echo eat("香蕉");
?>