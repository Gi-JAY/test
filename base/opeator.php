<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>運算子</h1>
    <?php
        $x = 100;
        $y = 50;

        echo $x + $y;
        echo "</br>";
        echo $x - $y;
        echo "</br>";
        echo $x * $y;
        echo "</br>";
        echo $x / $y;
        echo "</br>";
        echo $x % $y;

        #比較運算子
        echo "</br>";
        var_dump($x > $y);
        echo "</br>";
        var_dump($x == $y);//值相等即可
        echo "</br>";
        var_dump($x === $y);//值與資料型態皆須相同
        echo "</br>";

        #邏輯運算值 /* and,or,||,&&,xor */
        var_dump(isset($x));//isset判斷元素是否存在
    ?>
</body>
</html>