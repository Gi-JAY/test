<?php
class db
{
	var $_dbConn = 0;
	var $_queryResource = 0;
	private $host;
	private $user;
	private $pwd;
	private $dbname;

	function __construct($host, $user, $pwd, $dbname){
		$this->host = $host;
		$this->user = $user;
		$this->pwd = $pwd;
		$this->dbname = $dbname;

		$dbConn = mysqli_connect($host, $user, $pwd);
		if (! $dbConn)
			die ("mysqli Connect Error");
		mysqli_query($dbConn,"SET NAMES utf8");
		if (! mysqli_select_db($dbConn,$dbname))
			die ("mysqli Select DB Error");
		$this->_dbConn = $dbConn;
		return true;
	}
	// function connect_db($host, $user, $pwd, $dbname){
	// 	$dbConn = mysqli_connect($host, $user, $pwd);
	// 	if (! $dbConn)
	// 		die ("mysqli Connect Error");
	// 	mysqli_query($dbConn,"SET NAMES utf8");
	// 	if (! mysqli_select_db($dbConn,$dbname))
	// 		die ("mysqli Select DB Error");
	// 	$this->_dbConn = $dbConn;
	// 	return true;
	// }
	function query($sql){
		if (! $queryResource = mysqli_query($this->_dbConn,$sql))
			echo mysqli_error($this->_dbConn);
		$this->_queryResource = $queryResource;
		return $queryResource;        
	}
	/** Get array return by mysqli */
	function fetch_array(){
		return mysqli_fetch_array($this->_queryResource);
	}
	function fetch_row(){
		return mysqli_fetch_row($this->_queryResource);
	}
    function fetch_assoc(){
        return  mysqli_fetch_assoc($this->_queryResource);
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

?>