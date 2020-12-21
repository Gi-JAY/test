<?php
function c(&$v1,$v2){
	$v1 ++;
	$v2 ++;
	echo $v1 + $v2."</br>";
}
$a = 3;
$b = 7;
c($b,$b-$a);
echo"$a*$b";
?>