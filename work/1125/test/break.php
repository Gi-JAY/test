<?php
function test(){
	$arr = [1,2,3,4,5,6];
	foreach($arr as $v){
		if($v == 3){
		break;
		}
		echo $v;
	}
	echo "yo";
}
test();
echo "test";
?>