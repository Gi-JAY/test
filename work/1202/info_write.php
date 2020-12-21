#!/PGRAM/php/bin/php -q
<?php
require '/PDATA/apache/class/db_config.php';
$filepath = "/HDD/STATUSLOG/";

exec("top -b -n 1 | egrep 'top -|Tasks'",$msg0);
exec("ps -eo pid,cmd,%cpu --sort=-%cpu | head -n 4",$msg1);

$aTmp = preg_split("/[\s,]+/",$msg0[0]);
$info["time"] = $aTmp[2];
$info["loadavg"] = $aTmp[11].",".$aTmp[12].",".$aTmp[13];

$aTmp = preg_split("/[\s,]+/",$msg0[1]);
$info["tasks"] = $aTmp[1].", ".$aTmp[3];

for($i=1,$count=count($msg1); $i<$count; $i++){
	$aTmp = preg_split("/[\s]+/",trim($msg1[$i]));
	$pid[$i-1] = $aTmp[0];
	$aCount = count($aTmp);
	$cpuloading[$i-1] = $aTmp[$aCount-1];
	for($j=1; $j<$aCount-1; $j++){
		$cmd[$i-1] .= $aTmp[$j]." ";  
	}
}

for($i=0,$count=count($pid); $i<$count; $i++){
	$info["pid"][$i] = $pid[$i].", ".$cmd[$i].", ".$cpuloading[$i];
}
$info["cpuusage"] = get_cpu_usagerate();

$sql = "SELECT * FROM user";
$mysql->query($sql);
while($row = $mysql->fetch_assoc()){
	$user = $row["user"];
	$refresh = $row["refresh"];
	info_write();
}

function get_cpu_usagerate(){
	$fd = fopen("/proc/stat", "r");
	if ($fd) {
		$statinfo = explode("\n", fgets($fd, 1024));
		fclose($fd);
		foreach($statinfo as $line) {
			$info = split(" +", $line);
			if ($info[0] == "cpu") {
				$user = $info[1];
				$nice = $info[2];
				$system = $info[3];
				$idle = $info[4];
				break;
			}
		}
	}
	$usage = $user + $nice + $system;
	$total = $usage + $idle;
	$usagerate = round(($usage/$total),2);
	return $usagerate;
}

function info_write(){
	global $info,$filepath,$user,$refresh;
	$filename = $filepath.$user;
	$timestamp = time();
	$Min = date("i", $timestamp);
	$line = 0;
	if(intval($Min) % $refresh == 0) { 
		if($fp = fopen($filename,'r')){
			while( !feof($fp)){
				if (fgets($fp)){//讀取一行內容
					$line++;
				}
			}
		}
		fclose($fp);
		list($pid1,$pid2,$pid3) = $info["pid"];
		$content = $info["time"].", ".$info["loadavg"].", ".$info["tasks"].", ";
		$content .= $info["cpuusage"].", ".$pid1.", ".$pid2.", ".$pid3."\n";
		if($line >= 3500){
			exec("sed -i 1d $filename");
		}
		$fp = fopen($filename,'a');
		fwrite($fp,$content);
		fclose($fp);
	}
}
?>