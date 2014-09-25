<?php
header("Content-Type:text/html; charset=utf-8");
session_start();
require("db_config.php");
require_once("db_class.php");


if(isset($_SESSION["authen"])){
	$cur_popular = $_POST["cur_popular"];
	$p_id = $_POST["p_id"];
	$aftr_popular = $cur_popular+1;

	$db_q = new DB();
	$sql_q = "SELECT `c_account` FROM `product` WHERE `p_id` = '".$p_id."'";
	$result = $db_q->getOnly($sql_q);

	$db = new DB();
	$sql = "INSERT INTO `johogo`.`follow` (`id`, `student_id`, `p_id`, `c_account`, `datetime`) VALUES (NULL, '".$_SESSION["authen"]."', '".$p_id."', '".$result["c_account"]."', CURRENT_TIMESTAMP)";
	$sql2 = "UPDATE `product` SET `popular` = ".$aftr_popular." WHERE `p_id` = '".$p_id."'";
	// echo $sql;
	if($db->query($sql)) {
		if(($db->query($sql2))){
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				    window.alert('成功加入團購!')
				    window.location.href='product_info.php?pid=".$p_id."';
			    </SCRIPT>");
		}
	}
}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
			    window.alert('請先登入!')
			    window.location.href='login.php';
		    </SCRIPT>");
}

?>