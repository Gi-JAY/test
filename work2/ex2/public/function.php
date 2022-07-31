<?php
function js_alert($str){
    echo "<script>alert('${str}');</script>\n";
}
function js_history_go(int $n){
    echo "<script>window.history.go(${n})</script>\n";
}
function go_index(){
    echo "<script>window.location.href = 'index.php'</script>\n";
}
function write_log($log_str){
    $fp = fopen('log/book_error_log.txt', 'r+');
    if($fp){
        $log_str = str_replace("\\n", "\r", $log_str);
        fwrite($fp, date('Y-m-d').' ');
        fwrite($fp, $log_str."-----------------------\r");
        fclose($fp);
    }
}
