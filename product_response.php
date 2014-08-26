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
		$member = $db->getOnly("SELECT `m_account` FROM `member` WHERE `student_id`='".$_SESSION["authen"]."'");
		$sql = "INSERT INTO `comment`(`m_account`, `p_id`, `content`, `isgood`) VALUES 
		('".$member["m_account"]."','".$_POST["p_id"]."','".$_POST["p_repcontent"]."','".$_POST["rep_img_val"]."')"; //1=>good 0=>bad
		$db->query($sql);

		$sql = "SELECT `m_account`,`datetime`,`content`,`isgood`,`response`,`r_datetime` FROM `comment` WHERE `p_id`= '".$_POST["p_id"]."'";
		$db->query($sql);
		if($db->get_num_rows()>0){
			echo '<table class="grid_12">';
			while($resultcomt = $db->fetch_array($sql)){
				$imgsrc="img/good.png";
				if($resultcomt["isgood"]==0){
					$imgsrc="img/bad.png";
				}
				echo '<tr><td class="grid_3">'.$resultcomt["m_account"].'</td><td class="grid_5">'.$resultcomt["content"].'</td><td class="grid_1"><img style="height:50px;" src="'.$imgsrc.'"></td><td class="grid_3">'.$resultcomt["datetime"].'</td></tr>';
			}
			echo '</table>';
		}
	}
}

?>