<form action="" method="post" onsubmit="return check()">
    請輸入一個奇數: <input type="text" name="num">
    <input type="submit" value="送出">
</form>
<script>
    function check(){
        const input = document.getElementsByName('num')[0].value;
        if(!/^[\d]+$/.test(input)){
            alert('請輸入正整數');
            return false;
        }else{
            if(input%2 == 0){
                alert('請輸入奇數');
                return false;
            }
        }
    }
</script>
<?php
if(isset($_POST['num'])){
    $input = $_POST['num'];
    $result = array();
    $x = ($input + 1)/2-1;
    $y = 0;

    for($k = 1; $k <= $input**2; $k++){
        $result[$y][$x] = $k;
        $x++;
        $y--;
        if($y < 0) $y = $input - 1;
        if($x == $input) $x = 0;
        if(!empty($result[$y][$x])){
            $x--;
            $y+=2;
            if($x < 0) $x = $input - 1;
            if($y >= $input) $y = $y-$input;
        }
    }
    echo "<table border=1>";
    for($i = 0; $i < $input; $i++){
        echo "<tr>";
        for($j = 0; $j < $input; $j++){
            echo "<td>".str_pad($result[$i][$j], strlen($input**2), "0", STR_PAD_LEFT)."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";

}
