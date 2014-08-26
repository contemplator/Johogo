<?php
session_start();
require("db_config.php");
require_once("db_class.php");

if(isset($_SESSION["authen"])){
	$cur_popular = $_POST["cur_popular"];
	$p_id = $_POST["p_id"];
	$aftr_popular = $cur_popular+1;
	$vote_list = $_POST["vote_list"];
	$vote_list_arr = explode(';', $vote_list);
	if (in_array($_SESSION["authen"], $vote_list_arr)) {
    	echo ("<SCRIPT LANGUAGE='JavaScript'>
			    window.alert('You have done it before!')
			    window.location.href='product_info.php?pid=".$p_id."';
		    </SCRIPT>");
    	return false;
	}

	$new_vote_list = $_SESSION["authen"];
	if((isset($vote_list))&&(trim($vote_list)!="")){
		$new_vote_list = $vote_list.';'.$_SESSION["authen"];
	}
	$db = new DB();
	$db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);

	$sql = "UPDATE `product` SET `popular` = ".$aftr_popular.",`vote_list` = '".$new_vote_list."' WHERE `p_id` = '".$p_id."'";
	// echo $sql;
	$db->query($sql);
	echo ("<SCRIPT LANGUAGE='JavaScript'>
			    window.alert('Vote success!')
			    window.location.href='product_info.php?pid=".$p_id."';
		    </SCRIPT>");
}else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
			    window.alert('Please login!')
			    window.location.href='login.php';
		    </SCRIPT>");
}

?>