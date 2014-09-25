<?php
session_start();
require("db_config.php");
require("db_class.php");
$db = new DB();
$db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);

if((isset($_GET["vfn"]))&&(isset($_GET["id"]))){
	$verification = $_GET["vfn"];
	$student_id = $_GET["id"];

	$sql = "SELECT * FROM `member` WHERE `student_id` LIKE '".$student_id."'";

		$result = $db->getOnly($sql); 
		if($result["verification"]==$verification){
			$verify_sql = "UPDATE `johogo`.`member` SET `isverified` = '1' WHERE `member`.`student_id` = '".$student_id."'";
			$db->query($verify_sql);
			$_SESSION["authen"] = $student_id;
			echo "<SCRIPT>";
			echo "alert('請先完成個人詳細資料!');";
			echo "window.location = \"modify_data.php\";";
			echo "</SCRIPT>";
			// header("Location: index.php");
		}else{
			header("Content-Type:text/html; charset=utf-8");
			echo '認證無效!請點選<a href="">此處</a>重新寄發認證碼!';
			echo '<hr>';
			echo $verification;
			
			echo '<hr>';
			echo $result["verification"];
			echo '<hr>';
			echo $student_id;
		}
}

?>