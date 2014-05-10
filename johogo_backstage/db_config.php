<?php
	//1. start session
	//2. set up the configuration of database

	session_start();
	global $_DB;
    $_DB['host'] = "localhost";
    $_DB['username'] = "root";
    $_DB['password'] = "nccu6020";
    $_DB['dbname'] = "rentbook";
?>