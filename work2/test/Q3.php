<!-- Q3 -->
<form action="" method="post">
    n: <input type="text" name="input">
    <input type="submit" value="sumbit">
</form>
<?php
if(isset($_POST['input'])){
    $input = (int)$_POST['input'];
    echo "input:${input}<br>";
    echo "output:".flib($input);
}
function flib(int $n){
    if($n >= 0) $flib = array(0, 1);
    else exit('Please enter a positive integer');
    
    for($i = 2; $i <= $n; $i++){
        $flib[$i] = $flib[$i-1] + $flib[$i-2];
    }
    return $flib[$n];
}