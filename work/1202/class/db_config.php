<?php
class db
{
	var $_dbConn = 0;
	var $_queryResource = 0;
	function connect_db($host, $user, $pwd, $dbname){
		$dbConn = mysql_connect($host, $user, $pwd);
		if (! $dbConn)
			die ("mysqli Connect Error");
		mysql_query("SET NAMES utf8",$dbConn);
		if (! mysql_select_db($dbname,$dbConn))
			die ("mysqli Select DB Error");
		$this->_dbConn = $dbConn;
		return true;
	}
	function query($sql){
		if (! $queryResource = mysql_query($sql,$this->_dbConn))
			die ("mysqli Query Error");
		$this->_queryResource = $queryResource;
		return $queryResource;        
	}
	/** Get array return by mysqli */
	function fetch_assoc(){
		return mysql_fetch_assoc($this->_queryResource);
	}
	function fetch_array(){
		return mysql_fetch_array($this->_queryResource);
	}
	function fetch_row(){
		return mysql_fetch_row($this->_queryResource);
	}
	function get_num_fields(){
	  return mysql_num_fields($this->_queryResource);
	}
	function get_num_rows(){
		return mysql_num_rows($this->_queryResource);
	}
	/** Get the cuurent id */    
	function get_insert_id(){
		return mysql_insert_id($this->_dbConn);
	} 
}

$mysql = new db;
$mysql->connect_db(":/tmp/mysql.sock", "root", "l7fwmysql", "test");
?>
