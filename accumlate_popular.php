<?php
	session_start();
	require("db_class.php");
	$db = new DB();

	if(isset($_GET["d_id"])){
		$sql = "SELECT * FROM `discuz` WHERE `discuz`.`d_id` =".$_GET["d_id"];
		$result = $db->getOnly($sql); 
		$new_r = $result["popular"]+1;

		$sql_1 = "UPDATE `johogo`.`discuz` SET `popular` = '".$new_r."' WHERE `discuz`.`d_id` =".$_GET["d_id"];
		$db->query($sql_1);
		echo 'ok';
	}
	
?>