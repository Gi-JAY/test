<?php
while(true){
	echo "<script>\n";
	echo "alert(1);\n";
	echo "</script>\n";
	set_time_limit(0); 
	sleep(3);
}
?>