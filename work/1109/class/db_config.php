<?php
class db
{
    var $_dbConn = 0;
    var $_queryResource = 0;
    function connect_db($host, $user, $pwd, $dbname){
        $dbConn = mysqli_connect($host, $user, $pwd);
        if (! $dbConn)
            die ("mysqli Connect Error");
        mysqli_query($dbConn,"SET NAMES utf8");
        if (! mysqli_select_db($dbConn,$dbname))
            die ("mysqli Select DB Error");
        $this->_dbConn = $dbConn;
        return true;
    }
    function query($sql){
        if (! $queryResource = mysqli_query($this->_dbConn,$sql))
            die ("mysqli Query Error");
        $this->_queryResource = $queryResource;
        return $queryResource;        
    }
    /** Get array return by mysqli */
    function fetch_array(){
        return mysqli_fetch_array($this->_queryResource, mysqli_ASSOC);
    }
    function fetch_row(){
        return mysqli_fetch_row($this->_queryResource);
    }
    function get_num_fields(){
      return mysqli_num_fields($this->_queryResource);
    }
    function get_num_rows(){
        return mysqli_num_rows($this->_queryResource);
    }
    /** Get the cuurent id */    
    function get_insert_id(){
        return mysqli_insert_id($this->_dbConn);
    } 
}

$mysqli = new db;
$mysqli->connect_db("localhost", "root", "", "Work");

// $mysqlii = new db("localhost","root","","Work");
// $mysqlii -> query("SET NAMES 'utf8'");
// $mysqlii -> select_db("Work");
?>
