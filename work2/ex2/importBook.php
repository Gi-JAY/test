<?php
require 'public/function.php';
if(isset($_FILES['bookMark']['name'])){
    $rowCounter = 1;
    $bookContent = array();
    $fp = fopen($_FILES['bookMark']['tmp_name'],'r');
    if($fp){
        while(!feof($fp)){
            $bookContent[] = fgets($fp, 1024);
        }
        foreach($bookContent as $value){
            contentCheck($value, $rowCounter);
            $rowCounter ++;
        }
    }else{
        exit('無法開啟檔案');
    }
    fclose($fp);

}

function contentCheck($content, $rowCounter){
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

    $check_empty = array();
    $check_str = "";
    unset($input_tmp);
    unset($input_value);

    //檢查空白字元
    foreach($input as $key => $value){
        $value = trim($value);
        $input[$key] = $value;
        if($value === '') {
            switch($key){
                case 'ISBN':
                    $check_empty[$key] = 'ISBN';
                    break;
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
    }
    // print_r($input);
    if(!empty($check_empty)){
        foreach($check_empty as $value){
            $check_str .= "${value}尚未填寫\\n";
        }
        write_log("第${rowCounter}筆資料\r".$check_str);
        js_alert('資料輸入有誤，請至日誌查看');
        // go_index();
    }
    if(preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{3}-{0-9}{1}$/',$input['ISBN'])) 
        $check = true;
    if(preg_match('/\w+/', $input['publish']));
        $check = true;

    return $check;
}