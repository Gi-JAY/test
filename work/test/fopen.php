<?php
$line = 0;
$filename = 'aabbc';
if($fp = fopen('aabbc','r')){
	echo "yo";
	while(!feof($fp)){
		if(fgets($fp,1024)){
			$line++;
		}
	}
}
fclose($fp);
echo $line;
if($line < 20){
	exec("echo test2 >> $filename");
}
?>