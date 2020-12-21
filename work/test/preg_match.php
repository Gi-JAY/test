<?php
/* 模式中的\b标记一个单词边界，所以只有独立的单词"web"会被匹配，而不会匹配
 * 单词的部分内容比如"webbing" 或 "cobweb" */
if (preg_match("/\bweb\b/i", "PHP is the web scripting language of choice.",$matches)) {
		echo "A match was found.</br>";
		print_r($matches);
} else {
    echo "</br>A match was not found.";
}

if (preg_match("/\bweb\b/i", "PHP is the website scripting language of choice.")) {
    echo "A match was found.";
} else {
    echo "A match was not found.";
}
?>
<?php
echo "</br>";
//从URL中获取主机名称
preg_match('@^(?:http://)?([^/]+)@i',
    "http://www.php.net/index.html", $matches);
$host = $matches[1];
echo $host."</br>";

//获取主机名称的后面两部分
preg_match('/[^.]+\.[^.]+$/', $host, $matches);
echo "domain name is: {$matches[0]}</br>";
?>
<?php 
   // 從 URL 中取得主機名 
   preg_match("/^(http:\/\/)?([^\/]+)/i","http://www.5idev.com/index.html", $matches); 
	 $host = $matches[2]; // 從主機名中取得後面兩段 
	 print_r($matches);
	 echo "</br>";
   preg_match("/[^.]+\.[^.]+$/", $host, $matches); 
   echo "域名為：{$matches[0]}"; 
?> 