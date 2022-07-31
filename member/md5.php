<?php
$pw = "admin";

echo $pw;
echo "<br>";
echo md5($pw);
echo "<br>";
echo sha1($pw);
echo "<br>";
echo md5(md5($pw));
echo "<br>";
echo md5(sha1($pw));
