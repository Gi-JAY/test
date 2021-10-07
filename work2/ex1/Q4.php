<form action="" method="post">
    請輸入文字: <input type="text" name="str">
    <input type="submit" value="送出">
</form>
<?php
if(isset($_POST['str'])){
    $str = $_POST['str'];
    $strlength = strlen($str);
    output($str, $strlength);
}
function output($str, $strlength){
    if($strlength > 0){
        echo $str[$strlength-1];
        output($str, $strlength-1);
    }
}