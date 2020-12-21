<?php
$str = "TX packets:962 errors:0 dropped:0 overruns:0 carrier:0";
$str = listStringSplit(trim($str));
$arr = explode(":",$str[1]);
print_r($arr);
function listStringSplit($sList) {//用空白逗號分割字串 返回非空白的部份
	$aList = preg_split("/[\s,]+/", $sList , -1, PREG_SPLIT_NO_EMPTY);
	return $aList;
}
?>