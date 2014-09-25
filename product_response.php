<?php
session_start();
require("db_class.php");
if(!isset($_SESSION["authen"])){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
			    window.alert('Please login!')
			    window.location.href='login.php';
		    </SCRIPT>");
}else{
	if(isset($_POST["p_repcontent"])){
		$db = new DB();
		$sql = "INSERT INTO `comment`(`student_id`, `p_id`, `content`, `isgood`) VALUES 
		('".$_SESSION["authen"]."','".$_POST["p_id"]."','".$_POST["p_repcontent"]."','".$_POST["rep_img_val"]."')"; //1=>good 0=>bad
		$db->query($sql);

		$sql = "SELECT `student_id`,`datetime`,`content`,`isgood`,`response`,`r_datetime` FROM `comment` WHERE `p_id`= '".$_POST["p_id"]."'";
		$db->query($sql);
		if($db->get_num_rows()>0){
			echo '<table class="grid_12">';
			while($resultcomt = $db->fetch_array($sql)){
				$imgsrc="img/good.png";
				if($resultcomt["isgood"]==0){
					$imgsrc="img/bad.png";
				}
				$db_nickname = new DB();
				$sql_nickname = "SELECT `nickname` FROM `member` WHERE `student_id`='".$resultcomt["student_id"]."'";
				$member = $db_nickname->getOnly($sql_nickname);
				$name = $resultcomt["student_id"];
				if($member["nickname"]!=NULL){
					$name = $member["nickname"];
				}
				echo '<tr><td class="grid_3">'.$name.'</td><td class="grid_5">'.$resultcomt["content"].'</td><td class="grid_1"><img style="height:50px;" src="'.$imgsrc.'"></td><td class="grid_3">'.$resultcomt["datetime"].'</td></tr>';
			}
			echo '</table>';
		}
	}
}

?>