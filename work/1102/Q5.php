<?php
    session_start();
?>
<form action="" method="POST">
    <input type="text" name="n">
    <input type="submit" value="送出">
</form>
<?php
if(isset($_POST["n"])){
    $n = $_POST["n"];

    //判斷輸入的值必須為奇數
    if($n%2 != 0){
        //1的初始位置
        $x = 0;
        $y = ($n-1)/2;
        
        $max = $n*$n;
        $ans = array();
        
        //預設矩陣值皆為0
        for($i=0;$i<$n;$i++){
            for($j=0;$j<$n;$j++){
                $ans[$i][$j] = 0;
            }
        }
        //將所有數字填入方陣
        for($i=0;$i<$max;$i++){
            if($ans[$x][$y] == 0){
                $ans[$x][$y] = $i+1;
                //向右上移一格
                $x--;
                $y++;
                if($x < 0){
                    $x = $n-1;
                }
                if($y>$n-1){
                    $y = 0;
                }
            }else{
                //向下移一格
                $i--;
                $x+=2;
                $y--;
                if($x>$n-1){
                    $x = $x%$n;
                }
                if($y < 0){
                    $y = $n-1;
                }
            }            
        }
        
        //印出陣列
        for($i=0;$i<$n;$i++){
            if($i>0){
                echo "</br>";
            }
            for($j=0;$j<$n;$j++){
                echo $ans[$i][$j]."  ";
            }
        }
    }else{
        echo '請輸入奇數';
    }
}
?>