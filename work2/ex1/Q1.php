<?php
$head = 101;
$value = 101;
$itemNum = 1;

for($i = 0; $i < 5; $i++){
    for($j = 0; $j < $itemNum; $j++){
        echo $value." ";
        $value += 10;
    }
    echo "<br>";
    $head -= 7;
    $value = $head;
    $itemNum += 2;
}