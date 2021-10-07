<form action="" method="post" onsubmit="return check()">
    <input id='num' name="num" type="text" minlength="4" maxlength="4">
    <input id='sub' type="submit" value="傳送">
</form>
<script>
    document.getElementById('num').focus();
    function check(){
        const input = document.getElementById('num').value;
        if(!/^[0-9]{4}$/.test(input)){
            alert('請輸入4個不重複的數字');
            return false;
        }else{
            let arr = [];
            for(let i = 0; i < input.length; i++){
                arr[i] = input[i];
            }
            let checkArr = arr.filter( (item, index, array) => array.indexOf(item) !== index );
            if(checkArr.length !== 0){
                console.log(checkArr);
                alert('4個數字皆不可重複');
                return false;
            }
        }
    }
</script>
<?php
session_start();
if(!isset($_SESSION['ANS'])){
    $ans = array();
    while( count($ans) < 4 ){
        $ans[] = rand(0, 9);
        $ans = array_values(array_unique($ans));
    }
    $_SESSION['ANS'] = $ans;
}
// echo "Answer:";
// for($i = 0; $i < 4; $i++){
//     echo $_SESSION['ANS'][$i];
// }
echo "<br>";

if(isset($_POST['num'])){
    $A = 0;
    $B = 0;
    $ans = $_SESSION['ANS'];
    for($i = 0; $i < 4; $i++){
        $input[$i] = $_POST['num'][$i];
    }
    $result = array_intersect($input, $ans);
    foreach($result as $key => $value){
        if($key === array_search($value, $ans))
            $A++;
        else
            $B++;
    }
    $_SESSION['Record'][] = $_POST['num']."-----${A}A${B}B<br>";
    echo "<hr>";
    for($i = 0; $i < count($_SESSION['Record']); $i++){
        echo $_SESSION['Record'][$i];
    }
    if($A === 4){
        echo "恭喜答對";
        $_POST = array();
        session_destroy();
    }
}

