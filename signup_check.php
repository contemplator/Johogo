<?php
	session_start();
	require("db_class.php");
	$db = new DB();

	if(isset($_POST["student_id"])){
		$sql = "SELECT * FROM `member` WHERE `student_id`='".$_POST["student_id"]."'";
		$db->getOnly($sql);
		if($db->get_num_rows()>0){
			echo "此帳號已申請過";
		}else{
			echo "此帳號可以申請";
		}
	}
?>