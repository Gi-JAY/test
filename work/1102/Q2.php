<?php
    session_start();
?>
<form action="/dashboard/phpTest/work/1102/Q2.php" method="POST">
    <input type="text" name="guess" id="">
    <input type="submit" value="送出">
</form>
<?php
//製造4碼不重複的答案
    function mkAns(){
        $a = rand(1,9);
        $b = rand(1,9);
        $c = rand(1,9);
        $d = rand(1,9);
        if ($b!==$a && $c!==$b && $c!==$a && $d!==$a && $d!==$b && $d!==$c ){
            return $a*1000+$b*100+$c*10+$d;
        }else{
            mkAns();
        }
    }
    if(empty($_SESSION["ans"])){
        $_SESSION["ans"] = (string)mkAns();
    }
    $ans = $_SESSION["ans"];
    echo $ans."</br>";
    $a=0;
    $b=0;

    if(empty($_SESSION["total"])){
        $_SESSION["total"]="";
    }

    if(isset($_POST["guess"])){
        $guess =$_POST["guess"];
        if(strlen($guess)===4){
            for($i=0; $i<4; $i++){
                if($ans[$i] === $guess[$i]){
                    $a++;
                }
                for($j=0; $j<4; $j++){
                    if($ans[$i] === $guess[$j] && $i !== $j){
                        $b++;
                    }
                }
            }
        }
            if($a!=4){
                if(strlen($guess)!=4){
                    $_SESSION["total"]=$_SESSION["total"]."請輸入4碼</br>";
                    echo $_SESSION["total"];
                }else{
                    $_SESSION["total"]=$_SESSION["total"].$guess."---".$a."A".$b."B<br>";//用SESSION的方式，把前面所猜的答案存起來    
                    echo $_SESSION["total"];
                }
                }else{       
                echo "猜對了!答案是".$ans;        
                unset($_SESSION["ans"]);//猜對以後，把SESSION拿掉
                unset($_SESSION["total"]);
                $_SESSION["ans"] = (string)mkAns();
                }
}
?>