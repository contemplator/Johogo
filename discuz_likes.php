<?php 
require("db_config.php");
require("db_class.php");
session_start();
if(isset($_SESSION["authen"])){
	$return = array();
	$d_id = $_POST["d_id"];
	$dr_id = $_POST["dr_id"];
	$order = $_POST["order"];

	$db = new DB();
	$sql_pre = "SELECT `id` FROM `johogo`.`likes` WHERE `student_id` = '".$_SESSION["authen"]."' AND `d_id` = '".$_POST["d_id"]."' AND `dr_id` IS NULL";
	$counts = $db->getOnly("SELECT COUNT(1) FROM `johogo`.`likes` WHERE `d_id` = '".$d_id."' AND `dr_id` IS NULL");
	if(($_POST["response_like"]=='y')){
		$sql_pre = "SELECT `id` FROM `johogo`.`likes` WHERE `student_id` = '".$_SESSION["authen"]."' AND `dr_id` = '".$dr_id."'";
		$counts = $db->getOnly("SELECT COUNT(1) FROM `johogo`.`likes` WHERE `dr_id` = '".$dr_id."'");
	}
	$result = $db->getOnly($sql_pre);
	
	$return["dr_id"] = $dr_id;
	$return["counts"] = $counts["COUNT(1)"];
	$return["likes_id"] = $result["id"];
	if($order=="add"){
		$likes = $counts["COUNT(1)"]+1;
		$sql = "INSERT INTO `johogo`.`likes` (`id`, `like_datetime`, `student_id`, `d_id`, `dr_id`) VALUES (NULL, CURRENT_TIMESTAMP, '".$_SESSION["authen"]."', '".$_POST["d_id"]."', NULL)";
		if(($_POST["response_like"]=='y')){
			$sql = "INSERT INTO `johogo`.`likes` (`id`, `like_datetime`, `student_id`, `d_id`, `dr_id`) VALUES (NULL, CURRENT_TIMESTAMP, '".$_SESSION["authen"]."', '".$_POST["d_id"]."','".$dr_id."')";
		}
		if($db->query($sql)){
			$return["likes"] = $likes;
			$return["order"] = "add";
		}
	}elseif($order=="minus") {
		$likes = $counts["COUNT(1)"]-1;
		$sql = "DELETE FROM `johogo`.`likes` WHERE `likes`.`id` = '".$result["id"]."'";
		if($db->query($sql)){
			$return["likes"] = $likes;
			$return["order"] = "minus";
		}
	}
}else{
	$return["error"] = "login";
}
echo json_encode($return);
?>