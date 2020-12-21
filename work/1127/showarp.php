<?php
session_start();

if(isset($_POST["del"])){
	$del = $_POST["del"];
	$aTmp = explode(",",$del);
	$ip = $aTmp[0];
	$iface = $aTmp[1];
	if(!preg_match("/^[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}$/",$ip) || !preg_match("/^eth[0-3]{1}$/",$iface)){
	}else{
		exec("arp -d {$ip} -i {$iface}");
		header("location:showarp.php");
	}
}

if(isset($_POST["ip_add"]) && isset($_POST["mac"]) && isset($_POST["interface"]) && is_null($_POST["del"])){
	$ip = $_POST["ip_add"];
	$mac = $_POST["mac"];
	$interface = $_POST["interface"];
	$empty_ck = "";
	$str_ck = "";

	if(empty($ip)){
		$empty_ck .= "ip尚未填寫\\n";
	}
	if(empty($mac)){
		$empty_ck .= "mac尚未填寫\\n";
	}
	if(empty($interface)){
		$empty_ck .= "interface尚未選擇\\n";
	}
	if(!empty($empty_ck)){
		echo "<script>\n";
		echo "alert('{$empty_ck}');\n";
		echo "</script>\n";
	}else{
		if(!preg_match("/^[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}$/",$ip)){
			$str_ck .= "ip格式錯誤\\n";
		}
		if(!preg_match("/^[a-zA-z0-9]{2}:[a-zA-z0-9]{2}:[a-zA-z0-9]{2}:[a-zA-z0-9]{2}:[a-zA-z0-9]{2}:[a-zA-z0-9]{2}$/",$mac)){
			$str_ck .= "mac格式錯誤\\n";
		}

		if(!empty($str_ck)){
			echo "<script>\n";
			echo "alert('$str_ck');\n";
			echo"</script>\n";
		}else{
			exec("arp -s $ip $mac -i $interface");
			header("location:showarp.php");
		}
	}
}

exec('arp',$msg0);
for($i=1,$aCount=count($msg0); $i<$aCount; $i++){
	$aTmp = preg_split("/[\s]+/",$msg0[$i]);
	$bCount = count($aTmp);
	if($bCount == 5){
		$info[$i-1]["ip"] = $aTmp[0];
		$info[$i-1]["mac"] = $aTmp[2];
		$info[$i-1]["ifc"] = $aTmp[4];
	}
	if($bCount == 3){
		$info[$i-1]["ip"] = $aTmp[0];
		$info[$i-1]["mac"] = $aTmp[1];
		$info[$i-1]["ifc"] = $aTmp[2];
	}
}
include("xhtml/showarp.html"); 
?>