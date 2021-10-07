<?php
require 'class/mysqli.php';

if(isset($_GET['group']) && isset($_GET['sort'])){
    $groupCheck = array('ISBN','publish','bookname','author','price','publishday');
    $sortCheck = array('ASC','DESC');
    $group = $_GET['group'];
    $sort = $_GET['sort'];

    if(in_array($group, $groupCheck) && in_array($sort, $sortCheck))
        $sql = "SELECT * FROM Book ORDER BY ${group} ${sort}";
    else
        exit('搜尋值異常');
}else{
    $sql = "SELECT * FROM Book";
}
$mysqli -> query($sql);
$data = array();

while($row = $mysqli -> fetch_row(1)){
    $data[] = $row;
}

$data_total = count($data);

require 'html/index.html';


