<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>String</h1>
    <?php
        $s = "Lorem ipsum dolor sit amet consectetur, adipisicng elit.Beats ";
        $s2 = strtoupper($s);
        // echo strtoupper($s);//全部大寫
        // echo "</br>";
        // echo strtolower($s);//全部小寫
        // echo "</br>";
        // echo ucfirst($s);//第一個字大寫
        // echo "</br>";
        // echo ucwords($s);//單字大寫
        // echo "</br>";


        $fruits = ["Banana","Apple","Kiwi","Melon","Orange","Peach","Tomato"];
        #implode 集中
        $f_string = implode(",",$fruits);
        //$f_string = implode($fruits);
        // echo $f_string;
        echo "</br>";
        #explode 爆炸
        // $s_array = explode(" ",$s);
        // foreach($s_array as $s_a){
        //     echo $s_a;
        //     echo "</br>";
        // }
        #substr 擷取字串
        $c = "曾經是大陸首富、目前牌棉第14的大陸地產大亨王近鄰獨子、萬達集團董事長王思聰";
        $new_s = substr($s,0,15);
        echo $new_s;
        echo "</br>";
        $new_c = mb_substr($c,0,5,"utf-8");
        echo $new_c;
        echo "</br>";
    ?>
</body>
</html>