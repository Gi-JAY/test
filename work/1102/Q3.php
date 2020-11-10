<?php 
$light = array();
$person = array();
$n=15;//燈數
$k=3; //人數
    
    //預設所有燈為off
    for($i=0; $i<$n; $i++){
        $light [$i] = false;
    }
    for($i=0; $i<$k; $i++){
        $person[$i] = false;
    }

    //判斷誰按了開關
    for($i=0; $i<$k; $i++){
        $person[$i] = 1;
        if($person[$i] ===1){
            echo "第".($i+1)."人按了開關</br>";
            //判斷燈為幾的倍數須動作
            for($j=0; $j<$n; $j++){
                if($i === 0){
                    $light[$j] = !$light[$j];
                }
                else if (($j+1)%($i+1) === 0){
                    $light[$j] = !$light[$j];
                }
                if($light[$j] === true ){
                    echo "亮的燈為：第".($j+1)."燈</br>";
                }
            }
            }
        }
?>