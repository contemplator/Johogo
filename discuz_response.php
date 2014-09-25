<?php
header("Content-Type:text/html; charset=utf-8");
require("db_config.php");
require("db_class.php");
session_start();

if(isset($_SESSION["authen"])){
	$db = new DB();
	$response_content = $_POST["response_content"];
	$o_discuzID = $_POST["o_discuzID"];

	$sql = "INSERT INTO `johogo`.`d_response` (`d_id`, `student_id`, `content`, `datetime`) VALUES ('".$o_discuzID."', '".$_SESSION["authen"]."', '".$response_content."', CURRENT_TIMESTAMP)";
	// echo $sql;
	if($db->query($sql)){
		echo ("<SCRIPT LANGUAGE='JavaScript'>
					window.alert('回文成功!')
					window.location.href='discuz_info.php?d_id=".$o_discuzID."'
				</SCRIPT>");
	}else{
		echo mysql_error();
	}	
}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
			    window.alert('請先登入!')
			    window.location.href='login.php';
		    </SCRIPT>");
}


?>