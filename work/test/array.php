<?php
$a = [1,2,3,4];
$b = [5,7,7,8];
$count = count($a);
for($i=0; $i<$count; $i++){
	$c[$i] = $a[$i]+$b[$i];
}
foreach($c as $v){
	if($v%2 == 0) echo 1;
	else					echo 0;
}
?>