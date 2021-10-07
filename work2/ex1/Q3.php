<form action="" method="post" onsubmit="return check()">
    <p>人數:<input type="text" name="people" <?php if(isset($_POST['people'])) echo "value=${_POST['people']}";?>></p>
    <p>燈數:<input type="text" name="light" <?php if(isset($_POST['light'])) echo "value=${_POST['light']}";?>></p>
    <input type="submit" value="送出">
</form>
<script>
    function check(){
        const people = document.getElementsByName('people')[0].value;
        const light = document.getElementsByName('light')[0].value;
        if(!/^[0-9]+$/.test(people) || !/^[0-9]+$/.test(light)){
            alert('請輸入數字');
            return false;
        }
    }
</script>
<?php
if(isset($_POST['people']) && isset($_POST['light'])){
    $k = (int)$_POST['people'];
    $n = (int)$_POST['light'];
    $lightArr = array();
    
    if($k > 0 && $n > 0){
        for($i = 0; $i < $k; $i++){
            echo "第".($i+1)."個人按了開關<br>";
            for($j = 0; $j < $n; $j++){
                if($i === 0){
                    $lightArr[$j] = true;
                }else if( ($j+1)%($i+1) == 0 ){
                    $lightArr[$j] = !$lightArr[$j];
                }
                if($lightArr[$j] === true){
                    echo "1 ";
                }else{
                    echo "0 ";
                }
            }
            echo "<br>";
        }
    }
}
