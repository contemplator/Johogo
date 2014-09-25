<?php
require("db_config.php");
require("db_class.php");
session_start();

$data = array();
$data_tmp = array();
echo "<input type=\"button\" id=\"but_discuz\" class=\"btn btn-primary\" value=\"發文\" onclick=\"D_show('#m_discuz');\">&nbsp;&nbsp;&nbsp;";
echo "<input type=\"button\" id=\"but_Dresponse\" class=\"btn btn-primary\" value=\"留言\" onclick=\"D_show('#m_Dresponse');\">&nbsp;&nbsp;&nbsp;";
echo "<input type=\"button\" id=\"but_comment\" class=\"btn btn-primary\" value=\"商品留言\" onclick=\"D_show('#m_comment');\">";
	// get request
	if(!is_null($_POST['m_id'])){
		// $_POST['student_id'] = "100306020";
		$sql = "SELECT * FROM `d_response` WHERE `student_id` = '".$_SESSION["authen"]."'";
		$db = new DB();
		$db->query($sql);
		echo "<div id=\"m_Dresponse\">";
		echo "<table class=\"table table-bordered table-hover\">";
			echo "<thead>";
				echo "<tr>";
					echo "<td>文章標題</td>";
					echo "<td>回應內容</td>";
					echo "<td>讚數</td>";
					echo "<td>回應時間</td>";
					echo "<td>功能</td>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
		
		while($result = $db->fetch_array()){
			$db_discuz = new DB();
			$sql_discuz = "SELECT `d_title` FROM `discuz` WHERE `d_id`=".$result["d_id"];
			$result_discuz = $db_discuz->getOnly($sql_discuz);
			$db_likes = new DB();
			$sql_likes = "SELECT COUNT(1) FROM `likes` WHERE `d_id`='".$result["d_id"]."' AND `dr_id` IS NOT NULL";
			$result_likes = $db_likes->getOnly($sql_likes);
			echo "<tr>";
				echo "<td>";
					echo $result_discuz["d_title"];
				echo "</td>";
				echo "<td>";
					echo $result["content"];
				echo "</td>";
				echo "<td>";
					echo $result_likes["COUNT(1)"];
				echo "</td>";
				echo "<td>";
					echo $result["datetime"];
				echo "</td>";
				echo "<td>";
					echo "<button><a href=\"discuz_info.php?d_id=".$result["d_id"]."\">查看原文</a></button>";
					echo "<button onclick=\"Query_delete(this,'sdD','".$result["d_id"]."',null,'".$result["datetime"]."')\">刪除留言</button>";
				echo "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
		// echo '<hr>';

		$sql = "SELECT * FROM `discuz` WHERE `student_id` = '".$_SESSION["authen"]."'";
		$db->query($sql);
		echo "<div id=\"m_discuz\">";
		echo "<table class=\"table table-bordered table-hover\">";
			echo "<thead>";
				echo "<tr>";
					echo "<td>文章標題</td>";
					echo "<td>類別</td>";
					echo "<td>內容</td>";
					echo "<td>發文時間</td>";
					echo "<td>讚數</td>";
					echo "<td>功能</td>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
		
		while($result_z = $db->fetch_array()){
			$db_likes = new DB();
			$sql_likes = "SELECT COUNT(1) FROM `likes` WHERE `d_id`='".$result_z["d_id"]."' AND `dr_id` IS NULL";
			$result_likes = $db_likes->getOnly($sql_likes);
			echo "<tr>";
				echo "<td>";
					echo $result_z["d_title"];
				echo "</td>";
				echo "<td>";
					echo $result_z["category"];
				echo "</td>";
				echo "<td>";
					echo $result_z["content"];
				echo "</td>";
				echo "<td>";
					echo $result_z["datetime"];
				echo "</td>";
				echo "<td>";
					echo $result_likes["COUNT(1)"];
				echo "</td>";
				echo "<td>";
					echo "<button><a href=\"discuz_info.php?d_id=".$result_z["d_id"]."\">查看文章</a></button>";
					echo "<button onclick=\"Query_delete(this,'sdZ','".$result_z["d_id"]."',null,'".$result_z["datetime"]."')\">刪除文章</button>";
				echo "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";


		$sql = "SELECT * FROM `comment` WHERE `student_id` = '".$_SESSION["authen"]."'";
		$db->query($sql);
		echo "<div id=\"m_comment\">";
		echo "<table class=\"table table-bordered table-hover\">";
			echo "<thead>";
				echo "<tr>";
					echo "<td>評價</td>";
					echo "<td>留言內容</td>";
					echo "<td>留言時間</td>";
					echo "<td>商家回應內容</td>";
					echo "<td>商家回應時間</td>";
					echo "<td>功能</td>";
				echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
		
		while($result_p = $db->fetch_array()){
			echo "<tr>";
				echo "<td>";
					echo $result_p["isgood"];
				echo "</td>";
				echo "<td>";
					echo $result_p["content"];
				echo "</td>";
				echo "<td>";
					echo $result_p["datetime"];
				echo "</td>";
				echo "<td>";
					echo $result_p["response"];
				echo "</td>";
				echo "<td>";
					echo $result_p["r_datetime"];
				echo "</td>";
				echo "<td>";
					echo "<button><a href=\"product_info.php?pid=".$result_p["p_id"]."\">查看商品</a></button>";
					echo "<button onclick=\"Query_delete(this,'sdC',null,'".$result_p["p_id"]."','".$result_p["datetime"]."')\">刪除留言</button>";
				echo "</td>";
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
	}


?>