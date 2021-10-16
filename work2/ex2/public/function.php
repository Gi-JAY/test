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
