<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
         $x =100;
        // if($x >50){
        //     echo "Success";
        // }
        // if($x >200){
        //     echo "good";
        // }else{
        //     echo "bad";
        // }
        // $result = $x > 0 ? "Success":"Error";
        // echo $result;
        $y = 1;
        switch($y){
            case 0:
                echo 0;
                break;
            case 1:
                echo 1;
                break;
            case 2:
                echo 2;
                break;
            default:
                echo"error";
        }
         switch(true){
            case $y > 0:
                echo "正整數";
                break;
            case $y < 0:
                echo "負整數";
                break;
            default:
                echo "Error";
         }
    ?>
</body>
</html>