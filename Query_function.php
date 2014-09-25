<?php
require("db_config.php");
require("db_class.php");
session_start();

$order = $_POST["order"];
$d_id = $_POST["d_id"];
$product_id = $_POST["p_id"];
$datetime = $_POST["datetime"];

$db = new DB();
if($order=='sdD'){
	$sql_delete_Dresponese = "DELETE FROM `johogo`.`d_response` WHERE `d_response`.`d_id` = '".$d_id."' AND `d_response`.`student_id` = '".$_SESSION["authen"]."' AND `d_response`.`datetime` = '".$datetime."'";
	if($db->query($sql_delete_Dresponese)){
		echo "ok";
	}
	// echo $sql_delete_Dresponese;
}else if($order=='sdZ'){
	$sql_delete_discuZ = "DELETE FROM `johogo`.`discuz` WHERE `discuz`.`d_id` = '".$d_id."' AND `discuz`.`student_id` = '".$_SESSION["authen"]."' AND `discuz`.`datetime` = '".$datetime."'";
	if($db->query($sql_delete_discuZ)){
		echo "ok";
	}
	// echo $sql_delete_Dresponese;
}else if($order=='sdF'){
	$sql_delete_Follow = "DELETE FROM `follow` WHERE `p_id`='".$product_id."' AND `student_id`='".$_SESSION["authen"]."' AND `datetime`='".$datetime."'";
	if($db->query($sql_delete_Follow)){
		echo "ok";
	}
	// echo $sql_delete_Follow;
}else if($order=='sdC'){
	$sql_delete_Comment = "DELETE FROM `comment` WHERE `student_id`='".$_SESSION["authen"]."' AND `datetime`='".$datetime."'";
	if($db->query($sql_delete_Comment)){
		echo "ok";
	}
	// echo $sql_delete_Follow;
}else if($order=='sdB'){
	$sql_delete_Buy = "DELETE FROM `buy` WHERE `product_id`='".$product_id."' AND `student_id`='".$_SESSION["authen"]."' AND `datetime`='".$datetime."'";
	if($db->query($sql_delete_Buy)){
		echo "ok";
	}
	// echo $sql_delete_Buy;
}else if($order=='smFSN'){
	$sql_modify_FollowStatusN = "UPDATE `johogo`.`follow` SET `f_status` = 'n',`datetime` = '".$datetime."' WHERE `p_id`='".$product_id."' AND `student_id`='".$_SESSION["authen"]."' AND `datetime`='".$datetime."'";
	if($db->query($sql_modify_FollowStatusN)){
		echo "ok";
	}
	// echo $sql_delete_Buy;
}else if($order=='smBSN'){
	$sql_modify_BuyStatusN = "UPDATE `johogo`.`buy` SET `b_status` = 'n',`datetime` = '".$datetime."' WHERE `product_id`='".$product_id."' AND `student_id`='".$_SESSION["authen"]."' AND `datetime`='".$datetime."'";
	if($db->query($sql_modify_BuyStatusN)){
		echo "ok";
	}
	// echo $sql_delete_Buy;
}else if($order=='smFSY'){
	$sql_modify_FollowStatusY = "UPDATE `johogo`.`follow` SET `f_status` = 'y',`datetime` = '".$datetime."' WHERE `p_id`='".$product_id."' AND `student_id`='".$_SESSION["authen"]."' AND `datetime`='".$datetime."'";
	if($db->query($sql_modify_FollowStatusY)){
		echo "ok";
	}
	// echo $sql_delete_Buy;
}else if($order=='smBSY'){
	$sql_modify_BuyStatusY = "UPDATE `johogo`.`buy` SET `b_status` = 'y',`datetime` = '".$datetime."' WHERE `product_id`='".$product_id."' AND `student_id`='".$_SESSION["authen"]."' AND `datetime`='".$datetime."'";
	if($db->query($sql_modify_BuyStatusY)){
		echo "ok";
	}
	// echo $sql_delete_Buy;
}
?>