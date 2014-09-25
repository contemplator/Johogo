<?php
include_once ("db_class.php");
session_start();
global $pages;
$db = new DB();
if(isset($_POST["category"])){
	echo '<table id="discuz-body" class="table table-hover table-striped">
			<tr id="discuz_column">
				<td id="discuz_category">分類</td>
				<td id="discuz_title">標題</td>
				<td id="discuz_poster">張貼者</td>
				<td id="discuz_datetime">張貼時間</td>
				<td id="discuz_popular">點閱</td>
			</tr>';
	$db = new DB();
	$sql = "SELECT * FROM `discuz` WHERE `category`='".$_POST["category"]."'";

	if(isset($_SESSION["discuz_keyword"])){
						if($_SESSION["srch_type"]=='d_id'){
							$sql=$sql." AND `d_id` LIKE '".$_SESSION["discuz_keyword"]."'";
						}elseif($_SESSION["srch_type"]=='d_title'){
							$sql=$sql." AND `d_title` LIKE '%".$_SESSION["discuz_keyword"]."%'";
						}elseif($_SESSION["srch_type"]=='m_accout'){
							$sql=$sql." AND `student_id` LIKE '%".$_SESSION["discuz_keyword"]."%'";
						}
					}
					if(isset($_POST['page'])){
						$now_page = $_POST['page'];
						$resultss = ($now_page*10)-10;
						$sql = $sql." ORDER BY `datetime` DESC LIMIT ".$resultss.", 10";
					}else{
						$sql = $sql." ORDER BY `datetime` DESC LIMIT 0, 10";
					}
	$db->query($sql); 
	$total_counts=$db->get_num_rows();
	if($total_counts>0){
		while($result = $db->fetch_array()){
			echo '<tr>';
			$tag_color = 'wheat';
			$discuz_category = "discuz_talk";
			$category = $result["category"];
			if($category=='閒聊'){
				$tag_color = '#FFFF33';
			}elseif($category=='黑特'){
				$tag_color = '#444444';
				$discuz_category = "discuz_hate";
			}elseif($category=='推薦'){
				$tag_color = '#CC0000';
				$discuz_category = "discuz_recommend";
			}elseif($category=='揪團'){
				$tag_color = '#FFAA33';
				$discuz_category = "discuz_group";
			}elseif($category=='討論'){
				$tag_color = '#00BBFF';
				$discuz_category = "discuz_debate";
			}elseif($category=='問題'){
				$tag_color = '#FFB7DD';
				$discuz_category = "discuz_question";
			}else{
				$tag_color = 'wheat';
				$discuz_category = "discuz_talk";
			}
			echo '<td class="discuz_category"><div class="'.$discuz_category.'">'.$result["category"].'</div></td>';
			echo '<td class="discuz_title"><a onclick="acc_pop('.$result["d_id"].')">'.$result["d_title"].'</a></td>';
			echo '<td class="discuz_poster">'.$result["student_id"].'</td>';
			echo '<td class="discuz_datetime">'.$result["datetime"].'</td>';
			echo '<td class="discuz_popular">'.$result["popular"].'</td>';
			// echo '<td class="category grid_1 alpha" style="background-color : #ddd">'.$result["category"].'</td>';
			
			echo '</tr>';
		}
	}else{
		echo '<tr>';
			echo '<td class="discuz_id">查無資料</td>';
			echo '<td class="discuz_title">N/A</td>';
			echo '<td class="discuz_poster">N/A</td>';
			echo '<td class="discuz_datetime">N/A</td>';
			echo '<td class="discuz_popular">N/A</td>';
			echo '<td class="discuz_category">N/A</td>';	
		echo '</tr>';
	}
	echo '</table>';
		echo '<div id="pagination">';
		$sql_num = "SELECT count(1) FROM `discuz` WHERE `category`='".$_POST["category"]."'";
		if(isset($_SESSION["discuz_keyword"])){
			if($_SESSION["srch_type"]=='d_id'){
				$sql	=$sql_num." AND `d_id` LIKE '".$_SESSION["discuz_keyword"]."'";
			}elseif($_SESSION["srch_type"]=='d_title'){
				$sql_num=$sql_num." AND `d_title` LIKE '%".$_SESSION["discuz_keyword"]."%'";
			}elseif($_SESSION["srch_type"]=='m_accout'){
				$sql_num=$sql_num." AND `student_id` LIKE '%".$_SESSION["discuz_keyword"]."%'";
			}
		}
		$result = $db->getOnly($sql_num);
		$sum_counts = $result["count(1)"];

		$pages = 1+(($sum_counts-$sum_counts%10)/10);
		//設定總頁數
		pageList($pages,$_POST["category"],$_POST["sequence"]);
	echo '</div>';
}

function pageList($total,$category,$sequence,$range=2, $page=0){
	//將GET參數保留
	if(!empty($_GET) || !empty($HTTP_GET_VARS)){
		$_get_vars = '';
		$_GET = empty($_GET) ? $HTTP_GET_VARS : $_GET;
		foreach ($_GET as $_get_name => $_get_value) {
			if($_get_name != "p") $_get_vars .= empty($_get_vars) ? "$_get_name=$_get_value"
			: "&$_get_name=$_get_value";
		}
	}
 
	if($page <= 0) $page = (isset($_POST["page"])) ? $page = $_POST["page"] : 1;
	if($page != 1)
		// echo "<span><a class=\"page\" href='?{$_get_vars}&p=1'>第一頁</a><a class=\"page\" href='?{$_get_vars}&p=".($page - 1)."'>上一頁</a></span>";
		echo "<input type=\"button\" class=\"page btn\" value=\"第一頁\" onclick=\"ajax_query('1','".$category."',".(1).")\">&nbsp;<input type=\"button\" class=\"page btn btn\" value=\"上一頁\" onclick=\"ajax_query('1','".$category."',".($page - 1).")\">";
	$start = $page - $range;
	$end = $page + $range;
	if($start < 1){
		$end = $end - $start + 1;
		$start = 1;
	}
	if($end > $total){
		$start = $start - ($end - $page);
		$end = $total;
	}
	for ($i = $start; $i <= $end; $i++){
		if($i > 0)
			echo ($i == $page) ? "<span class=\"page btn btn-warning\"><strong>$i</strong></span>" : "<span class=\"page btn\" onclick=\"ajax_query('1','".$category."',".$i.")\"><strong>$i</strong></span>";
	}
	if($page != $total){
		// echo "<span><a class=\"page\" href='?{$_get_vars}&p=".($page + 1)."'>下一頁</a> <a class=\"page\" href='?{$_get_vars}&p=".$total."'>最後頁</a></span>";
		echo "<input type=\"button\" class=\"page btn\" value=\"下一頁\" onclick=\"ajax_query('1','".$category."',".($page + 1).")\">&nbsp;<input type=\"button\" class=\"page btn\" value=\"最後頁\" onclick=\"ajax_query('1','".$category."',".$total.")\">";
	}
}

?>