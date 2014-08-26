<?php
require_once ('db_config.php');
class DB 
{
    var $_dbConn = 0;
    var $_queryResource = 0;
    
    function DB()
    {
        global $_DB;
        $host = $_DB['host'];
        $user = $_DB['username'];
        $pwd = $_DB['password'];
        $dbname = $_DB['dbname'];

        $this->connect_db($host,$user,$pwd,$dbname);
    }
    
    function connect_db($host, $user, $pwd, $dbname)
    {
        $dbConn = mysql_connect($host, $user, $pwd);
        if (! $dbConn)
            die ("MySQL Connect Error");
        mysql_query("SET NAMES utf8");
        if (! mysql_select_db($dbname, $dbConn))
            die ("MySQL Select DB Error");
        $this->_dbConn = $dbConn;
        return true;
    }
    
    function query($sql)
    {
        if (! $queryResource = mysql_query($sql, $this->_dbConn))
            die (mysql_error());
        $this->_queryResource = $queryResource;
        return $queryResource;        
    }

    /** Get array return by MySQL */
    function fetch_array()
    {
        return mysql_fetch_array($this->_queryResource, MYSQL_ASSOC);
    }
    
    function get_num_rows()
    {
        return mysql_num_rows($this->_queryResource);
    }

    /** Get the cuurent id */    
    function get_insert_id()
    {
        return mysql_insert_id($this->_dbConn);
    }
    
    function orderBook($sql)
    {
        mysql_query($sql, $this->_dbConn);
    }
    
    function order_times($book)
    {
        $sql = "SELECT COUNT(*) FROM orderbook WHERE book_No = '".$book."'";
        $queryResource = mysql_query($sql, $this->_dbConn);
        $this->_queryResource = $queryResource;
        $result = mysql_fetch_array($queryResource, MYSQL_ASSOC);
        return $result['COUNT(*)'];
    }
    
    function queue($book)
    {
        $sql = "SELECT MAX(queue) FROM orderbook WHERE book_No = '".$book."'";
        $queryResource = mysql_query($sql, $this->_dbConn);
        $this->_queryResource = $queryResource;
        $result = mysql_fetch_array($queryResource, MYSQL_ASSOC);
        return $result['MAX(queue)'];
    }
    
    function getOnly($query){
        $queryResource = mysql_query($query, $this->_dbConn);
        $this->_queryResource = $queryResource;
        $result = mysql_fetch_array($queryResource, MYSQL_ASSOC);
        return $result;
    }
}
?>