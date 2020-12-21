<?php
    function getNum(){
        $max=101;
        $min=73;
        for($i=0;$i<5;$i++){
            for($j=0;$j<=($i*2); $j++){
                echo $max+($j*10)." ";
            }
            $max -= 7;
            echo "</br>";
        }
    }
    getNum();
?>