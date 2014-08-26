<?php
session_start();
require("db_class.php");
$db = new DB();
$db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);

if((isset($_POST["username"]))&&(isset($_POST["userpassword"]))){

	$usr = $_POST["username"];
	$pwd = $_POST["userpassword"];
	$sql = "SELECT * FROM `member` WHERE `student_id` = ".$_POST["username"];
	$result = $db->getOnly($sql);
	$real_pwd = $result["password"];
	if($real_pwd==$pwd){
		if($result["isverified"]==1){
			$_SESSION["authen"] = $usr;
			header("Location: index.php");
		}else{
			header("Content-Type:text/html; charset=utf-8");
			echo '尚未認證!請至信箱收信並認證或點選<a href="">此處</a>重新寄發認證碼!';
		}
		
	}else{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			    window.alert('Searth nothing!')
			    window.location.href='signup.php';
		    </SCRIPT>");
	}
}

?>