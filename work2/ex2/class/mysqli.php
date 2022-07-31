<?php
class db{
    public $link = 0;
    public $result = 0;

    function __construct($host, $account, $password, $dbname){
        @$link = mysqli_connect($host, $account, $password);
        if(!$link){
            die('mysqli error');
        }else{
            if(mysqli_select_db($link, 'work')){
                $this->link = $link;
                mysqli_query($link, "SET NAMES utf8");
            }
            else
                die('db is not exist');
        }
    }

    function query($sql){       
        if(!$result = mysqli_query($this->link, $sql))
            echo mysqli_error($this->link);
        $this->result = $result;
    }

    /** Get array return by mysqli */
    function fetch_row($action=0){
        if($this->result){
            switch($action){
                case 0:
                    return mysqli_fetch_row($this->result);
                case 1:
                    return mysqli_fetch_assoc($this->result);
                case 2:
                    return mysqli_fetch_array($this->result);
                default:
                    return mysqli_fetch_row($this->result);
            }
        }
        // match($action){
        //     0 => mysqli_fetch_row($this->result),
        //     1 => mysqli_fetch_assoc($this->result),
        //     2 => mysqli_fetch_array($this->result),
        //     default => mysqli_fetch_row($this->result);
        // }
    }


    // function fetch_array(){
    //     return mysqli_fetch_array($this->result);
    // }
    // function fetch_row(){
    //     return mysqli_fetch_row($this->result);
    // }
    // function fetch_assoc(){
    //     return mysqli_fetch_assoc($this->result);
    // }
    // function get_num_fields(){
    //     return mysqli_num_fields($this->result);
    // }
    // function get_num_rows(){
    //     return mysqli_num_rows($this->result);
    // }

}

$mysqli = new db('localhost','root','','work');

