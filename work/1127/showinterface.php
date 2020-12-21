<?php
		$devs = array('eth0','eth3','eth1','eth2');
		if(is_file("/ram/tmp/wanstatus")) {//read the file if it exists,or set it default
			$wanstatus = file("/ram/tmp/wanstatus");
		} else {
			$wanstatus = array(
				0 => "WAN1=OFF=OFF",
				1 => "WAN2=OFF=OFF",
				2 => "WAN3=OFF=OFF",
				3 => "WAN4=OFF=OFF",
				4 => "WAN5=OFF=OFF"
			);
		}

		foreach($devs as $dev){
			exec("ifconfig '$dev'",$msg0);			
			foreach($msg0 as $line){
				$tmp = preg_split('/[\s]+/',$line);
				if(strpos($line,'Mask') !== false){
					$info[$dev]["mask"] = str_replace("Mask:","",$tmp[4]);
					break;
				}
			}

			if($dev == 'eth1' || $dev == 'eth2'){
				$a = explode("=",trim($wanstatus[0]));
				if($dev == 'eth2'){
					$a = explode("=",trim($wanstatus[1]));
				}
				$info[$dev]["ip"] = $a[2];
				if($a[1] == "OFF"){
					$info[$dev]["connect"] = "down";
				}else{
					$info[$dev]["connect"] = "up";
				}
				$info[$dev]["link"] = get_ethlink($dev);
				$ethflow = get_ethflow($dev);
				$info[$dev]["rx_bytes"] = $ethflow["rx_bytes"];
				$info[$dev]["rx_packets"] = $ethflow["rx_packets"];
				$info[$dev]["rx_error"] = $ethflow["rx_error"];
				$info[$dev]["tx_bytes"] = $ethflow["tx_bytes"];
				$info[$dev]["tx_packets"] = $ethflow["tx_packets"];
				$info[$dev]["tx_error"] = $ethflow["tx_error"];
			}else if($dev == 'eth0' || $dev == 'eth3'){
				$infolan = get_landev($dev);
				$info[$dev]["ip"] = $infolan["ip"];
				$ethflow = get_ethflow($dev);
				$xx = get_ethlink($dev);
				$info[$dev]["connect"] = ($xx == "yes") ? "up" : "down";
				$info[$dev]["link"] = $xx;
				$info[$dev]["rx_bytes"] = $ethflow["rx_bytes"];
				$info[$dev]["rx_packets"] = $ethflow["rx_packets"];
				$info[$dev]["rx_error"] = $ethflow["rx_error"];
				$info[$dev]["tx_bytes"] = $ethflow["tx_bytes"];
				$info[$dev]["tx_packets"] = $ethflow["tx_packets"];
				$info[$dev]["tx_error"] = $ethflow["tx_error"];
			}
		}
	include('xhtml/showinterface.html');

	function get_ethlink($dev) {//check the dev is linked
		exec("/bin/cat /sys/class/net/$dev/carrier", $retCont, $retCode);
		if($retCode == 0 && $retCont[0] == "1")	{
			return "yes";
		} else {
			return "no";
		}
	}

	function get_ethflow($dev) {
		exec("/sbin/ip -s link show $dev",$msg1);
		$ethflow = array();

		$arx = preg_split('/[\s,]+/',trim($msg1[3]));
		$rxbytes = trim($arx[0]);
		$rxpackets = trim($arx[1]);
		$rxerror = trim($arx[2]); //rx errors
		$atx = preg_split('/[\s,]+/',trim($msg1[5])); 
		$txbytes = trim($atx[0]);
		$txpackets = trim($atx[1]);
		$txerror = trim($atx[2]);  //tx erros
		if(trim($rxbytes)) $ethflow["rx_bytes"] = trim($rxbytes);
		else $ethflow["rx_bytes"] = 0;
		if(trim($rxpackets)) $ethflow["rx_packets"] = trim($rxpackets);
		else $ethflow["rx_packets"] = 0;
		if(trim($rxerror)) $ethflow["rx_error"] = trim($rxerror);
		else $ethflow["rx_error"] = 0;
		if(trim($txbytes)) $ethflow["tx_bytes"] = trim($txbytes);
		else $ethflow["tx_bytes"] = 0;
		if(trim($txpackets)) $ethflow["tx_packets"] = trim($txpackets);
		else $ethflow["tx_packets"] = 0;
		if(trim($txerror)) $ethflow["tx_error"] = trim($txerror);
		else $ethflow["tx_error"] = 0;
		
		return $ethflow;
	}

	function get_landev($dev) {
		exec("ifconfig '$dev'",$msg);
		for($i=0,$count=count($msg); $i<$count; $i++){
			if(strpos($msg[$i],'inet ') !== false){
				$tmp = preg_split('/[\s]+/',trim($msg[$i]));
				$info["ip"] = str_replace("addr:","",trim($tmp[1]));
				break;
			}
		}
		return $info;
	}
?>