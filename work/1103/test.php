<?php

$string = "1993-05-29";

if(preg_match("/([^-]+)-([^-]+)-([^-]+)/", $string, $mch)) {
    echo "{$mch[1]} ";
    echo "{$mch[2]} ";
    echo "{$mch[3]} ";
} else {
    echo "不符合";
}
?>