<?php
$file = '/opt/lampp/htdocs/dashboard/phpTest/work/1105/temp/copytesto.txt';
$newfile = '/opt/lampp/htdocs/dashboard/phpTest/work/1105/temp/copytestn.txt';

if (!copy($file, $newfile)) {
    echo "failed to copy $file...\n";
}
?>