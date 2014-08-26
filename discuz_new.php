<?php 
include ('header.php'); 
session_start();
if(isset($_SESSION["authen"])){
	if(isset($_POST["decide_post"])){
		$db = new DB();
		$topic = $_POST["d_topic"];
		$post_content = $_POST["d_content"];
		$d_categories = $_POST["d_categories"];
		
		$sql_srchm = "SELECT * FROM `member` WHERE `student_id`=".$_SESSION["authen"];
		$member = $db->getOnly($sql_srchm);
		$m_account = $_SESSION["authen"];
		if(isset($member["nickname"])){
			$m_account = $member["m_account"];
		}
		$sql_newd = "INSERT INTO `johogo`.`discuz` (`d_id`, `m_account`, `d_title`, `category`, `content`, `datetime`, `popular`) 
		VALUES (NULL, '".$m_account."', '".$topic."', '".$d_categories."', '".$post_content."', CURRENT_TIMESTAMP, '0')";

		if($db->query($sql_newd)) {
			echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('發文成功!')
				window.location.href='discuz.php';
			</SCRIPT>");
		}
	}
}
else{
	echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Please login!')
				window.location.href='login.php';
			</SCRIPT>");
}
?>

		<link rel="stylesheet" type="text/css" media="all" href="css/discuz_new.css" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

		<div class="content container_16">
	

			<div class="grig_16" style="text-align:right">
				<nav id="discuz_search">
					<form class="form-inline" action="discuz.php" method="GET" style="display: inline;">
						<div class="form-group">
							<label class="sr-only" for="keyword">Email address</label>
							<select name="srch_type" class="form-control">
								<option value="d_id">編號</option>
								<option value="d_title">標題</option>
								<option value="m_account">作者</option>
							</select>
							<input type="text" class="form-control" id="discuz_keyword" name="discuz_keyword" placeholder="請輸入關鍵字">
						</div>
						<button type="submit" class="btn btn-warning">搜尋</button>
					</form>
			</nav>
			</div>

			<div class="grid_13">
				<form action="" method="post">
				<!-- <div class="tittle" style="margin:10px;">&nbsp;本版名稱</div> -->
				<div class="grid_13" style="margin:10px;"></div>
				<div class="grid_13" style="margin:10px;">
					<h2 class="grid_2">標題</h2><input class="form-control grid_10" type="text" name="d_topic" placeholder="請輸入標題">
				</div>
				<div class="grid_13" style="margin:10px;">
					<h2 class="grid_2">類別</h2><select class="form-control grid_2" name="d_categories">
						<option>閒聊</option>
						<option>黑特</option>
						<option>推薦</option>
						<option>揪團</option>
						<option>討論</option>
						<option>問題</option>
					</select>
				</div>
				<div class="grid_13" style="margin:10px;">
					<h2 class="grid_2">文章內容</h2>
					<div class="grid_4">&nbsp;</div>
					<div class="btn-toolbar grid_7 omega alpha" style="margin-bottom:0px;">
					 	<table class="btn-group">
					 		<tr>
						    	<td style="border-width:1px;border-style:solid;border-color:gray"><a class="btn" href="#"><i class="glyphicon glyphicon-align-left"></i></a></td>
						    	<td style="border-width:1px;border-style:solid;border-color:gray"><a class="btn" href="#"><i class="glyphicon glyphicon-align-center"></i></a></td>
						    	<td style="border-width:1px;border-style:solid;border-color:gray"><a class="btn" href="#"><i class="glyphicon glyphicon-align-right"></i></a></td>
						    	<td style="border-width:1px;border-style:solid;border-color:gray"><a class="btn" href="#"><i class="glyphicon glyphicon-align-justify"></i></a></td>
						    	<td style="border-width:1px;border-style:solid;border-color:gray"><a class="btn" href="#"><i class="glyphicon glyphicon-bold"></i></a></td>
						    	<td style="border-width:1px;border-style:solid;border-color:gray"><a class="btn" href="#"><i class="glyphicon glyphicon-font"></i></a></td>
						    	<td style="border-width:1px;border-style:solid;border-color:gray"><a class="btn" href="#"><i class="glyphicon glyphicon-italic"></i></a></td>
						    	<td style="border-width:1px;border-style:solid;border-color:gray"><a class="btn" href="#"><i class="glyphicon glyphicon-picture"></i></a></td>
						    	<td style="border-width:1px;border-style:solid;border-color:gray"><a class="btn" href="#"><i class="glyphicon glyphicon-pencil"></i></a></td>
					    	</tr>
					  	</table>
					</div>
					<div>
						<textarea class="grid_13 form-control" name="d_content" style="height:300px;" placeholder="請輸入文章內容"></textarea>
					</div>
				</div>
				<div class="grid_13" style="margin:10px;"></div>
				<div class="grid_9">&nbsp;</div>
				<div class="grid_3" style="text-align:right">
					<div class="grid_7" >
						<input class="btn btn-primary" type="submit" name="decide_post" value="確定發文">&nbsp;
						<input class="btn btn-danger" type="button" id="cancel" name="cancel" value="取消發文">
						<div class="grid_3">&nbsp;</div>
					</div>
				</div>
				</form>
			</div>	
		</div>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#cancel").click(function(){
					window.location.replace("http://www.idlefox.idv.tw/johogo/discuz.php");
				});
			});
		</script>

<?php include ('footer.php'); ?>