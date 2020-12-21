<?php
$test = 1;
function getv(){
	global $test;
	$test = 2;
	
	echo $test;
}
getv();
echo $test;
?>