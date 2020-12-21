<?php
$line = 0;
$filename = "abcde";
$fp = fopen($filename,'r');
while(!feof($fp)){
	if(fgets($fp,1024)){
		$line++;
	}
}
fclose($fp);
if($line > 15){
	exec("sed -i 1d $filename");
}
$fp = fopen($filename,'a');
fwrite($fp,"test\n");
fclose($fp);
?>