<?php
require 'public/function.php';
if(isset($_FILES['bookMark']['name'])){
    $bookContent = array();
    $fp = fopen($_FILES['bookMark']['tmp_name'],'r');
    if($fp){
        while(!feof($fp)){
            $bookContent[] = fgets($fp, 1024);
        }
        foreach($bookContent as $value){
            contentCheck($value);
        }
        // header('location:index.php');
    }else{
        exit('無法開啟檔案');
    }
    fclose($fp);

}

function contentCheck($content){
    $check = false;
    $input_value = explode(',', $content);
    //刪除空白行
    $input_key = ['ISBN', 'publish', 'bookname', 'author', 'price', 'publishday'];
    if(count($input_value) === 6)
        $input = array_combine($input_key, $input_value);
    else{
        js_alert('格式有誤');
        go_index();
        return;
    }

    foreach($input as $key => $value){
        if(trim($value) === '') 
            unset($input[$key]);
    }
    print_r($input);
    $check_empty = array();
    $check_colum = array();
    $check_str = "";
    unset($input_tmp);
    unset($input_value);

    //檢查空白字元
    foreach($input as $key => $value){
        $value = trim($value);
        $input[$key] = $value;
        if($value === '') $check_empty[] = $key;
    }
    if(!empty($check_empty)){
        foreach($check_empty as $key => $vlaue){
            switch($value){
                case 'publish':
                    $check_empty[$key] = '出版社';
                    break;
                case 'bookname':
                    $check_empty[$key] = '書名';
                    break;
                case 'author':
                    $check_empty[$key] = '作者';
                    break;
                case 'price':
                    $check_empty[$key] = '價值';
                    break;
                case 'publishday':
                    $check_empty[$key] = '發行日';
                    break;
            }
        }

        foreach($check_empty as $value){
            $check_str += "${value}尚未填寫\\n";
        }
        js_alert($check_str);
        header('location:index.php');
    }
    if(preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{3}-{0-9}{1}$/',$input['ISBN'])) 
        $check = true;
    if(preg_match('/\w+/', $input['publish']));
        $check = true;

    return $check;
}