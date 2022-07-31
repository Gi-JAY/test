<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>陣列 Array</h1>
    <?php
        //$fruits = array("Apple","Banana","Kiwi","melon","orange","peach");
        // $x[0] = "Apple";
        // $x[1] = "Banana";
        // $x[2] = "Kiwi";

         //var_dump($fruits);
        // echo $x[0];
        // echo $x[1];
        // echo $x[2];
        // echo $x[3];

         $fruits = ["Banana","Apple","Kiwi","Melon","Orange","Peach","Tomato"];
        // count($fruits);
        // for($i=0;$i<count($fruits);$i++){
        //     echo $fruits[$i]."</br>";
        // }

        #排序
        //sort($fruits);//遞增
        //rsort($fruits);//遞減
        //shuffle($fruits);//隨機

        // foreach($fruits as $fruit){
        //     echo $fruit."</br>";
        // }


        $foods = ["滷肉飯"=>30,"雞肉飯"=>30,"排骨飯"=>80,"雞腿飯"=>90];
        //ksort($foods);
        //krsort($foods);
        //arsort($foods);

        // var_dump($foods);
        // echo "</br>".$foods["滷肉飯"];
        
        //key=>value    

        // foreach($foods as $food => $price){
        //     echo "<div>{$food}:{$price}元</div>";
        // }

        #in_array() 判斷陣列是否存在指定元素
        // if(in_array("Apple",$fruits)){
        //     echo "Sussce!";
        // }

        #is_array() 判斷是否為陣列
        // var_dump(is_array($fruits));
        // $x=20;
        // if(is_array($x)){
        //     echo "Array";
        // }else{
        //     echo "Not Array";
        // }

        // array_push($fruits,"TEST");//在陣列後方新增一個值
        // array_pop($fruits);//移除陣列最後一個值
        // array_unshift($fruits,"QQQQ");//新增陣列第一個值
        // array_shift($fruits);//移除陣列第一個值

        
        // foreach($fruits as $fruit){
        //     echo $fruit."</br>";
        // }

        #compact
        $name = "John";
        $mail = "johon@sdas.com";
        $phone = "84984510";
        $people = compact("name","mail","phone");
        foreach($people as $key => $value){
            echo "{$key}:{$value}</br>";
        }
    ?>
</body>
</html>