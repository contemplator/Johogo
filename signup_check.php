<?php
	session_start();
	require("db_class.php");
	$db = new DB();
	$return = array();
	if(isset($_POST["student_id"])){
		$sql = "SELECT * FROM `member` WHERE `student_id`='".$_POST["student_id"]."'";
		$db->getOnly($sql);
		if($db->get_num_rows()>0){
			$return["debug"]=1;
			$return["msg"]="此帳號已申請過";
		}else if($_POST["student_id"]==''){
			$return["debug"]=1;
			$return["msg"]="帳號為必填欄位";
		}else{
			$return["debug"]=0;
			$return["msg"]="此帳號可以申請";
		}
	}
	echo json_encode($return);
?>