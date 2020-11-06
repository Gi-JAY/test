<?php
$filename = 'testr';
$fp = fopen($filename,'r');
$content = fread($fp,filesize($filename));
echo filesize($filename);
echo nl2br ($content);
?>