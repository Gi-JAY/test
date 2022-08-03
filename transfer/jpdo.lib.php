<?php

/* ~20210208 函式 connect 添加 $port 參數 */

/* +20200624 PDO 版本 */

class jpdo
{
    /* @var PDO $pdo */
    private static $pdo;

    /* @var PDOStatement $stmt */
    private static $stmt;
    private static $errs;

	//////////////////////////////////////////////////////////////////////////

	public static function connect($user = NULL, $pass = NULL, $host = NULL, $dbname = NULL, $port = 3306)
	{
        if(empty(self::$pdo)) {
            $dsn = 'mysql:host='.$host.';port='.(intval($port) ?: 3306).';dbname='.$dbname; //~20210208 添加 $port 參數
            $options = array(
                PDO::ATTR_PERSISTENT => false,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                //PDO::MYSQL_ATTR_INIT_COMMAND => "SET time_zone = '+07:00', NAMES utf8" #(若使用不同時區)
            );
            //連線資料庫
            try {
                self::$pdo = new PDO($dsn, $user, $pass, $options);
            } catch (Exception $e) {
                exit('[ERROR] '.__CLASS__.'::'.__FUNCTION__.'() !'.PHP_EOL);
                //throw new Exception(__CLASS__.'::'.__FUNCTION__.'()!');
            }
        }
        return self::$pdo;
	}
    
    public static function disconnect(& $pdo = NULL) {
        if(is_null($pdo))
            self::$pdo = NULL;
        $pdo = NULL;
    }

    public static function statement(& $stmt) {
        if(self::$stmt) {
            $err = self::$stmt->errorCode(); //string
            preg_match('/[^0]/',$err) and self::$errs[] = $err;
        }
        self::$stmt = $stmt;
    }

    public static function errors() {
        $errors = self::$errs; //self::$errs 並未記錄到最新 self::$stmt 的錯誤
        if(self::$stmt) {
            $err = self::$stmt->errorCode(); //string
            preg_match('/[^0]/',$err) and $errors[] = $err;
        }
        return $errors;
    }

	//////////////////////////////////////////////////////////////////////////

    public static function query($sql, array $binds = [])
	{
        return self::execute($sql, $binds);
    }

    public static function execute($sql, array $binds = [])
	{
	    $pdo  = self::connect();
        $stmt = $pdo->prepare($sql) and self::statement($stmt);
        return boolval($stmt->execute($binds));
	}

	//////////////////////////////////////////////////////////////////////////

    public static function count_all($sql, array $binds = [])
    {
        if(! self::execute($sql,$binds))
            return -1;
        return intval(self::$stmt->fetchColumn());
    }

	//單一欄位資料(字串)
    public static function fetch_col($sql, array $binds = [], $default = NULL)
	{
	    if(! self::execute($sql,$binds))
	        return $default;
	    return self::$stmt->fetchColumn();
	}

	//同一欄位陣列(一維陣列)
    public static function fetch_cols($sql, array $binds = [])
	{
        if(! self::execute($sql,$binds))
            return NULL;
        return self::$stmt->fetchAll(PDO::FETCH_COLUMN);
	}

	//單一筆資料陣列(一維陣列)
    public static function fetch_row($sql, array $binds = [])
	{
        if(! self::execute($sql,$binds))
            return NULL;
        return self::$stmt->fetch(PDO::FETCH_ASSOC);
	}

	//複數筆資料陣列(二維陣列)
    public static function fetch_rows($sql, array $binds = [])
	{
        if(! self::execute($sql,$binds))
            return NULL;
        return self::$stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	//////////////////////////////////////////////////////////////////////////

    public static function last_insert_id()
	{
		return self::connect()->lastInsertId();
	}

}
