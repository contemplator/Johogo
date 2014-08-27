<?php 
include ('header.php'); 
global $pages;
?>

<link rel="stylesheet" type="text/css" media="all" href="css/discuz.css" />
<div class="container_12">
	<nav id="discuz_search">
		<form class="form-inline" action="" method="GET" style="display: inline;">
			<div class="form-group">
				<label class="sr-only" for="keyword">Email address</label>
				<select name="srch_type" class="form-control">
					<option value="d_title">標題</option>
					<option value="d_id">編號</option>
					<option value="m_account">作者</option>
				</select>
				<input type="text" class="form-control" id="discuz_keyword" name="discuz_keyword" placeholder="請輸入關鍵字">
		  	</div>
		  	<button type="submit" class="btn btn-warning">搜尋</button>
		</form>
		<a href="discuz.php"><button class="btn btn-success">查詢全部</button></a>
		<a href="discuz_new.php" id="discuz_post" style=""><button class="btn btn-primary" onclick="post()">我要發文</button></a>
	</nav>
	<br>
	<div id="tab_test">
		<ul class="nav nav-tabs" role="tablist" id="myTab">
	  		<li class="active"><a style="" href="#all" role="tab" data-toggle="tab">全部</a></li>
	  		<li><a class="" name="talk" href="#talk" role="tab" data-toggle="tab">閒聊</a></li>
	  		<li><a class="" href="#hate" role="tab" data-toggle="tab">黑特</a></li>
	  		<li><a class="" href="#recommend" role="tab" data-toggle="tab">推薦</a></li>
	  		<li><a class="" href="#group" role="tab" data-toggle="tab">揪團</a></li>
	  		<li><a class="" href="#debate" role="tab" data-toggle="tab">討論</a></li>
	  		<li><a class="" href="#question" role="tab" data-toggle="tab">問題</a></li>
		</ul>
	</div>

	<div id="tab_content" class="tab-content">
		<div class="tab-pane fade in active" id="all">
			<table id="discuz-body" class="table table-hover table-striped">
				<tr id="discuz_column">
					<td id="discuz_num">分類</td>
					<td id="discuz_title">標題</td>
					<td id="discuz_poster">張貼者</td>
					<td id="discuz_datetime">張貼時間</td>
					<td id="discuz_popular">點閱</td>
				</tr>
				<?php
					$db = new DB();
					$sql = "SELECT * FROM `discuz` WHERE 1";
					if(isset($_GET["discuz_keyword"])){
						$_SESSION["srch_type"] = $_GET["srch_type"];
						$_SESSION["discuz_keyword"] = $_GET["discuz_keyword"];
						if($_GET["srch_type"]=='d_id'){
							$sql=$sql." AND `d_id` LIKE '".$_GET["discuz_keyword"]."'";
						}elseif($_GET["srch_type"]=='d_title'){
							$sql=$sql." AND `d_title` LIKE '%".$_GET["discuz_keyword"]."%'";
						}elseif($_GET["srch_type"]=='m_accout'){
							$sql=$sql." AND `m_account` LIKE '%".$_GET["discuz_keyword"]."%'";
						}
					}
					if(isset($_GET['p'])){
						$now_page = $_GET['p'];
						$resultss = ($now_page*10)-10;
						$sql = $sql." ORDER BY `datetime` DESC LIMIT ".$resultss.", 10";
					}else{
						$sql = $sql." ORDER BY `datetime` DESC LIMIT 0, 10";
					}
					// echo $_GET["srch_type"];
					// echo '<hr>';
					// echo $sql;
					$db->query($sql); 
					$total_counts = $db->get_num_rows();
					if($total_counts>0){
						while($result = $db->fetch_array()){
							echo '<tr>';
							// echo '<td class="discuz_id"><a onclick="acc_pop('.$result["d_id"].')">'.$result["d_id"].'</a></td>';
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
							echo '<td class="discuz_poster">'.$result["m_account"].'</td>';
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
				?>
			</table>
			<div id="pagination">
				<?php
					$sql_num = "SELECT count(1) FROM `discuz` WHERE 1";
					if(isset($_GET["discuz_keyword"])){
						$_SESSION["srch_type"] = $_GET["srch_type"];
						$_SESSION["discuz_keyword"] = $_GET["discuz_keyword"];
						if($_GET["srch_type"]=='d_id'){
							$sql_num=$sql_num." AND `d_id` LIKE '".$_GET["discuz_keyword"]."'";
						}elseif($_GET["srch_type"]=='d_title'){
							$sql_num=$sql_num." AND `d_title` LIKE '%".$_GET["discuz_keyword"]."%'";
						}elseif($_GET["srch_type"]=='m_accout'){
							$sql_num=$sql_num." AND `m_account` LIKE '%".$_GET["discuz_keyword"]."%'";
						}
					}
					$result = $db->getOnly($sql_num);
					$sum_counts = $result["count(1)"];
					$pages = 1+(($sum_counts-$sum_counts%10)/10);
					//設定總頁數
					pageList($pages);
					
					function pageList($total, $range=2, $page=0){
						//將GET參數保留
						if(!empty($_GET) || !empty($HTTP_GET_VARS)){
							$_get_vars = '';
							$_GET = empty($_GET) ? $HTTP_GET_VARS : $_GET;
							foreach ($_GET as $_get_name => $_get_value) {
								if($_get_name != "p") $_get_vars .= empty($_get_vars) ? "$_get_name=$_get_value"
								: "&$_get_name=$_get_value";
							}
						}
					 
						if($page <= 0) $page = (isset($_GET["p"])) ? $page = $_GET["p"] : 1;
					 
						if($page != 1)
							echo "<span><a class=\"page\" href='?{$_get_vars}&p=1'><input type=\"button\" class=\"page btn\" value=\"第一頁\">&nbsp;</a><a class=\"page\" href='?{$_get_vars}&p=".($page - 1).
							"'><input type=\"button\" class=\"page btn btn\" value=\"上一頁\"></a></span>";
					 
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
								echo ($i == $page) ? "<span class=\"page btn btn-warning\"><strong>$i</strong></span>" : "<span class=\"page btn\" href='?{$_get_vars}&p={$i}'>$i</span>";
						}
					 
						if($page != $total){
							echo "<span><a class=\"page\" href='?{$_get_vars}&p=".($page + 1).
								"'><input type=\"button\" class=\"page btn\" value=\"下一頁\"></a> <a class=\"page\" href='?{$_get_vars}&p=".$total."'><input type=\"button\" class=\"page btn\" value=\"最後頁\"></a></span>";
							 
						}
					}
				?>
			</div>
		</div>
		<div class="tab-pane fade" id="talk"></div>
		<div class="tab-pane fade" id="hate"></div>
		<div class="tab-pane fade" id="recommend"></div>
		<div class="tab-pane fade" id="group"></div>
		<div class="tab-pane fade" id="debate"></div>
		<div class="tab-pane fade" id="question"></div>
	</div>
</div>

<script type="text/javascript">
	function acc_pop(d_id){
		var xmlhttp;
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else{// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.location.href="http://www.idlefox.idv.tw/Johogo/discuz_info.php?d_id="+d_id;
		  	}
		}
		
		xmlhttp.open("GET","accumlate_popular.php?d_id="+d_id,true);
		xmlhttp.send();
	}
</script>
<script type="text/javascript">
	function ajax_query(sequence,category,page,srch_type,discuz_keyword){
		var xhr = $.ajax({
			type: "POST",
			url: "query_discuss.php",
			data: "category="+category+"&sequence="+sequence+"&page="+page,
				
			success: function(msg){
				$('.tab-pane:eq('+sequence+')').html(msg);
			},
		});
	}
	window.onload = function(e){
		$('#myTab li:nth-child(2)').click(function(){
			ajax_query(1,'閒聊',1);
		});
		$('#myTab li:nth-child(3)').click(function(){
			ajax_query(2,'黑特',1);
		});
		$('#myTab li:nth-child(4)').click(function(){
			ajax_query(3,'推薦',1);
		});
		$('#myTab li:nth-child(5)').click(function(){
			ajax_query(4,'揪團',1);
		});
		$('#myTab li:nth-child(6)').click(function(){
			ajax_query(5,'討論',1);
		});
		$('#myTab li:nth-child(7)').click(function(){
			ajax_query(6,'問題',1);
		});
		$('#myTab li:eq(0) a').tab('show');
	};
</script>

<?php include ('footer.php'); ?>