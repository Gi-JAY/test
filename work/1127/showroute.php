<?php
exec('route -n',$mesg0);
foreach($mesg0 as $key => $line){
	$route[$key] = preg_split('/[\s]+/',$line); 
}
include('xhtml/showroute.html');
?>