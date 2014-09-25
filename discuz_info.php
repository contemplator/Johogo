<?php include ('header.php');?>

<style type="text/css">
	.discuz-body{
		margin: 20px;
	}
</style>

<div style="background-color:#2D3E50;margin-bottom:20px;margin-top:0px;">
<div class="container_12" style="background-color:#f9f9f9;height:100%;">
<?php
	$sql = "SELECT * FROM `discuz` WHERE `d_id` =".$_GET["d_id"];
	$result = $db->getOnly($sql); 
?>
	<div class="grid_12">
		<div class=" panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title"><?php echo '['.$result["category"].']&nbsp&nbsp'.$result["d_title"]; ?></h3>
		  	</div>
		  	<div class="discuz-body">
		  		<div style="font-size:16px;">
		  			<span style="margin-bottom:20px;text-align:left;">發文時間:<?php echo $result["datetime"];?></span><br><br>
		  			<i class="glyphicon glyphicon-user" style="margin-right:12px;"></i>
		  			<span><?php 
		  			$db_m = new DB();
		  			$sql_m = "SELECT `nickname` FROM `member` WHERE `student_id` = '".$result["student_id"]."'";
		  			$result_m = $db_m->getOnly($sql_m);
		  			$member = $result["student_id"];
		  			if($result_m["nickname"]!=NULL){
		  				$member = $result_m["nickname"];
		  			}
		  			echo $member;
		  			$db_counts = new DB();
					$sql_counts = 'SELECT COUNT(1) FROM `likes` WHERE `d_id` = \''.$_GET["d_id"].'\' AND `dr_id` IS NULL';
					$counts = $db_counts->getOnly($sql_counts);
					$db_check = new DB();
					$sql_check = 'SELECT COUNT(1) FROM `likes` WHERE `d_id` = \''.$_GET["d_id"].'\' AND `student_id`=\''.$_SESSION["authen"].'\'  AND `dr_id` IS NULL';
					$check_counts = $db_check->getOnly($sql_check);
		  			?></span>
		  		</div>
		  		<a href="discuz.php" class="btn btn-default hyper-button button-back-list" style="width:100%;text-align:left;background-color:#f9f9f9;color:#428BCA;border-width:0px;padding-top:6px;padding-bottom:6px;"><i class="glyphicon glyphicon-arrow-left" style="margin-left:4px;margin-right:6px;"></i>返回</a>
		  		<br>
				<div class="discuz-content" style="font-size:16px;">
					<?php echo $result["content"];?>
				</div>
		  	</div>
	  	</div>
	  	<div style="text-align:center;padding-bottom:1%;">
		  	<div class="btn-group">
		  		<?php
		  			if($check_counts["COUNT(1)"]>0){
		  				echo '<button type="button" class="btn btn-danger btn-Plike" style="font-size:12px;"><i class="glyphicon glyphicon-heart"></i><span style="font-weight: bold;">喜歡'.$counts["COUNT(1)"].'</span></button>';
		  			}else{
		  				echo '<button type="button" class="btn btn-default btn-Plike" style="font-size:12px;"><i class="glyphicon glyphicon-heart"></i><span style="font-weight: bold;">喜歡'.$counts["COUNT(1)"].'</span></button>';
		  			}
		  		?>
				<button type="button" id="rtext" class="btn btn-default" style="font-weight: bold;font-size:12px;"><i class="glyphicon glyphicon-share-alt"></i>回應</button>
				<button type="button" id="rpost" class="btn btn-default" style="font-weight: bold;font-size:12px;"><i class="glyphicon glyphicon-edit"></i>新文章回覆</button>
				<button type="button" id="d_follow" class="btn btn-default btn-follow" style="font-size:12px;"><i class="glyphicon glyphicon-eye-open"></i><span style="font-weight: bold;font-size:12px;">追蹤</span></button>
			</div>
		</div>
	</div>
	<div id="response_form" class="response-form grid_12" style="display:none;">
		<form action="discuz_response.php" method="POST" style="text-align:center;">
			<?php echo '<input type="hidden" name="o_discuzID" value="'.$_GET["d_id"].'">';?>
			<textarea name="response_content" class="form-control" rows="3" onkeydown="checkrows(this)" placeholder="write a comment" style="overflow:hidden"></textarea>
			<input class="btn btn-primary" type="submit" name="submit" value="送出" style="margin: 10px;width:50%">
		</form>
	</div>
	<?php
		$db_rank = new DB();
		$sql_rank = "SELECT * FROM `d_response` WHERE `d_id` =".$_GET["d_id"];
		$db_rank->query($sql_rank);
		$rank_counts = 0;
		$rank_id = "";
		while($result = $db_rank->fetch_array()){
			$qury_rank = "SELECT COUNT(1) FROM `likes` WHERE `dr_id` =".$result["d_response_id"];

			$db_qryrk =new DB();
			$query_result = $db_qryrk->getOnly($qury_rank);
			if(($query_result["COUNT(1)"]>$rank_counts)&&($query_result["COUNT(1)"]>0)) {
				$rank_counts = $query_result["COUNT(1)"];
				$rank_id = $result["d_response_id"];
			}
		}
		$sql_rank = "SELECT * FROM `d_response` WHERE `d_id` =".$_GET["d_id"]." AND `d_response_id` =".$rank_id;
		$result_rank = $db_rank->getOnly($sql_rank);

		$sql_sm = "SELECT `nickname` FROM `member` WHERE `student_id` = '".$result_rank["student_id"]."'";
		$result_sm = $db_m->getOnly($sql_sm);
		$member_s = $result["student_id"];
		if($result_sm["nickname"]!=NULL){
			$member_s = $result_sm["nickname"];
		}
		$db_counts = new DB();
		$sql_counts = 'SELECT COUNT(1) FROM `likes` WHERE `dr_id` = \''.$result_rank["d_response_id"].'\'';
		$counts = $db_counts->getOnly($sql_counts);
		$db_check = new DB();
		$sql_check = 'SELECT COUNT(1) FROM `likes` WHERE `dr_id` = \''.$result_rank["d_response_id"].'\' AND `student_id`=\''.$_SESSION["authen"].'\'';
		$check_counts = $db_check->getOnly($sql_check);
		if($db_rank->get_num_rows()>0){
			echo '<div class="grid_12" style="background-color:#6F6E78;color:#fff;text-align:center;padding:8px;">人氣回應</div>';
			echo '<div class="response grid_12">
						<input type="hidden" class="hidden_likeClass" value="'.$result_rank["d_response_id"].'">
						<div class="panel-primary">
							<div class="panel-footer" id="form-footer">
						  		<span style="text-align:left;color:#777;"><i class="glyphicon glyphicon-user" style="margin-right:10px;"></i>'.$member_s.'</span>
						  		<span class="pull-right" style="padding-left:20px;color:#777;">'.$result_rank["datetime"].'</span>';
						  		if($check_counts["COUNT(1)"]>0){
									echo '<button class="pull-right btn btn-danger btn-like" type="button" value="'.$result_rank["d_response_id"].'"><i class="glyphicon glyphicon-heart"></i><span style="font-weight: bold;font-size:12px;">喜歡'.$counts["COUNT(1)"].'</span></button>';
								}else{
									echo '<button class="pull-right btn btn-default btn-like" type="button" value="'.$result_rank["d_response_id"].'"><i class="glyphicon glyphicon-heart"></i><span style="font-weight: bold;font-size:12px;">喜歡'.$counts["COUNT(1)"].'</span></button>';
								}
					echo '</div>
						  	<hr>
						  	<div class="discuz-body">
								'.$result_rank["content"].'
						  	</div>
					  	</div>
					  </div>';			
		}

		$db_r = new DB();
		$sql_r = "SELECT * FROM `d_response` WHERE `d_id` =".$_GET["d_id"]." ORDER BY `d_response`.`datetime` DESC";
		$db_r->query($sql_r);
		echo '<div class="grid_12" style="background-color:#6F6E78;color:#fff;text-align:center;padding:8px;">共'.$db_r->get_num_rows().'則回應</div>';
		while($result_r = $db_r->fetch_array()){
		  	$sql_rm = "SELECT `nickname` FROM `member` WHERE `student_id` = '".$result_r["student_id"]."'";
		  	$result_rm = $db_m->getOnly($sql_rm);
		  	$member_r = $result["student_id"];
		  	if($result_rm["nickname"]!=NULL){
		  		$member_r = $result_rm["nickname"];
		  	}
		  	$db_counts = new DB();
		  	$sql_counts = 'SELECT COUNT(1) FROM `likes` WHERE `dr_id` = \''.$result_r["d_response_id"].'\'';
		  	$counts = $db_counts->getOnly($sql_counts);
		  	$db_check = new DB();
			$sql_check = 'SELECT COUNT(1) FROM `likes` WHERE `dr_id` = \''.$result_r["d_response_id"].'\' AND `student_id`=\''.$_SESSION["authen"].'\'';
			$check_counts = $db_check->getOnly($sql_check);
			echo '<div class="response grid_12">
					<input type="hidden" class="hidden_likeClass" value="'.$result_r["d_response_id"].'">
					<div class="panel-primary">
						<div class="panel-footer" id="form-footer">
					  		<span style="text-align:left;color:#777;"><i class="glyphicon glyphicon-user" style="margin-right:10px"></i>'.$member_r.'</span>
					  		<span class="pull-right" style="padding-left:20px;color:#777;">'.$result_r["datetime"].'</span>';
					  		if($check_counts["COUNT(1)"]>0){
								echo '<button class="pull-right btn btn-danger btn-like" type="button" value="'.$result_r["d_response_id"].'"><i class="glyphicon glyphicon-heart"></i><span style="font-weight: bold;font-size:12px;">喜歡'.$counts["COUNT(1)"].'</span></button>';
							}else{
								echo '<button class="pull-right btn btn-default btn-like" type="button" value="'.$result_r["d_response_id"].'"><i class="glyphicon glyphicon-heart"></i><span style="font-weight: bold;font-size:12px;">喜歡'.$counts["COUNT(1)"].'</span></button>';
							}
					echo '</div>
					  	<hr>
					  	<div class="discuz-body">
							'.$result_r["content"].'
					  	</div>
				  	</div>
				  </div>';
		}

	?>
</div>
</div>
<script>
	$(document).ready(function(){
		$('.btn-Plike').click(function(){likes_update($(this),'y');});
		$('.btn-like').click(function(){likes_update($(this),'n');});
		$('#rtext').click(function(){r_FormControlDisplay($('#rtext'),$('#response_form'),"btn-warning");})
		$('#rpost').click(function(){
			var url = 'discuz_new.php?d_titleR=RE: '+<?php echo '\''.$result["d_title"].'&d_categoryR='.$result["category"].'\''; ?>;
			console.log(url);
			window.location.replace(url);
		})
		$('#d_follow').click(function(){r_FormControlDisplay($('#d_follow'),null,"btn-success");})
	})
	function r_FormControlDisplay(trigger_obj,target_object,change_class){
		if(target_object==null){
			if(trigger_obj.hasClass(change_class)){
				trigger_obj.removeClass(change_class);
			}else{
				trigger_obj.addClass(change_class);
			}
			
		}else{
			if(target_object.css('display')=='none'){
				trigger_obj.addClass(change_class);
				target_object.show();
			}else if(target_object.css('display')=='block'){
				trigger_obj.removeClass(change_class);
				target_object.hide();
			}
		}
		
	}
	function likes_update(object,original_post){
		console.log(object);
		console.log(object.val());
		var order = "add";
		var array = $('.hidden_likeClass');
		var obj = $('.btn-like');
		if(object.hasClass("btn-danger")){
			order = "minus";
		}else{
			order = "add";
		}
		order = order+"&d_id="+<?php echo $_GET["d_id"]?>;
		if(original_post=="n"){
			order = order+"&response_like=y";
		}
		var xhr = $.ajax({
		    type: "POST",
		    url: "discuz_likes.php",
		    data: "dr_id="+object.val()+"&order="+order,
			dataType: 'json',						    

			success: function(msg){
				console.log(msg);
				if(msg["error"]=="login"){
					alert("請先登入!");
					window.location.href="login.php";
				}
				if(msg["order"]=="add"){
					for(var i=0;i<array.length;i++){
						if(array[i].value==object.val()){
							obj.eq(i).removeClass("btn-default");
							obj.eq(i).addClass("btn-danger");
							obj.eq(i).children("span").text("喜歡"+msg["likes"]);
						}
					}
					object.children("span").text("喜歡"+msg["likes"]);
					object.removeClass("btn-default");
					object.addClass("btn-danger");
				}else{
					for(var i=0;i<array.length;i++){
						if(array[i].value==object.val()){
							obj.eq(i).removeClass("btn-danger");
							obj.eq(i).addClass("btn-default");	
							obj.eq(i).children("span").text("喜歡"+msg["likes"]);
						}
					}
					object.children("span").text("喜歡"+msg["likes"]);
					object.removeClass("btn-danger");
					object.addClass("btn-default");	
				}
			},
			beforeSend:function(){
	        	// $('#QueryLoading').css('display', 'block');
			},
			complete:function(){
			},
		});
	}
   function checkrows(node){
		var rows = node.value.split("\n").length ;
		if(rows < 3){
		}else{
			node.rows=rows;
		}
		return true;
   }
</script>
<?php include ('footer.php');?>