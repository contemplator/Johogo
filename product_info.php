<?php include ('header.php'); ?>

<link rel="stylesheet" type="text/css" media="all" href="css/product_info.css" />
<link rel="stylesheet" href="css/colorbox.css" />
<link rel="stylesheet" href="css/kkcountdown-dark.css" />
<script src="js/kkcountdown.min.js"></script>
<script src="js/jquery.colorbox.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".test").colorbox();
	$(".kkcountdown").kkcountdown({
		dayText		: ' day ',
	    daysText 	: ' days ',
	    hoursText	: ' h ',
	    minutesText	: ' m ',
	    secondsText	: ' s',
	});
	$("#p_response").click(function(){
		$("#introduce_content").hide();
		$("#p_introduce").removeClass("active");
		$("#response_content").show();
		$("#p_response").addClass("active");
	});
	$("#p_introduce").click(function(){
		$("#response_content").hide();
		$("#p_response").removeClass("active");
		$("#introduce_content").show();
		$("#p_introduce").addClass("active");
	});
	$("#p_ressubmit").click(function(){
		var p_repcontent = $("#p_repcontent").val();
		var p_id = $("#p_id").val();
		var rep_img_val = $("#rep_img_val").val();
		var xhr = $.ajax({
			type: "POST",
			url: "product_response.php",
			data: "p_id="+p_id+"&p_repcontent="+p_repcontent+"&rep_img_val="+rep_img_val,
			
			success: function(msg){
				$("#response_list").html(msg);
			},
			beforeSend:function(){
            	$('#page_status').attr('src', 'img/page_status.gif');
            },
		    complete:function(){
		    	setTimeout(function() {
		    		alert('success');
		        	$('#page_status').attr('src','');
				}, 500);
		    },
		});
	});
	$("#rep_img").click(function(){
		$("#rep_img").css({opacity:1.0});
		$("#rep_Nimg").css({opacity:0.5});
		$("#rep_img_val").val(1); //good
	});
	$("#rep_Nimg").click(function(){
		$("#rep_img").css({opacity:0.5});
		$("#rep_Nimg").css({opacity:1.0});
		$("#rep_img_val").val(0); //bad
	});
});
</script>
	
<div class="container_12" style="padding-bottom:200px;">
	<div class="content">
		<div class="product grid_12">
			<div class="grid_9">
				<span class="p_title alpha">
				<?php 
					require("db_config.php");
					require_once("db_class.php");
					$db = new DB();
					$db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
					$db_img = new DB();
					$db_img->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
					
					$sql0 = "SELECT * FROM `product` WHERE `p_id`=".$_GET["pid"];
					$prduct = $db->getOnly($sql0);

					$sql = "SELECT * FROM `image` WHERE `p_id`=".$_GET["pid"];
					$img = $db->getOnly($sql);
					echo $prduct["p_name"];
				?>
				</span>
			</div>
			<hr/>
			
			<div class="pic grid_6"><img class="pic" src="<?php echo "../Johogo_backstage/".$img["url"];?>"></div>
			<div class="grid_1">&nbsp;</div>
			<div class="info grid_4">
				<ul>
					<li>
					<div class="grid_1" style="float:left"><span class="item">原價<br><?php echo $prduct["o_price"];?></span></div>
					<div class="grid_1" style="float:left"><span class="item">折扣<br><?php 
					$discount = (round(($prduct["s_price"]/$prduct["o_price"]),2)*100);
					if($discount%10==0){
						$discount = $discount/10;
					}
					$discount = $discount."折";
					echo $discount;
					?></span></div>
					<div class="grid_1" style="float:left"><span class="item">現省<br><?php echo $prduct["o_price"]-$prduct["s_price"];?></span></div></li>
					<br><hr>
					<li><span style="color:red;font-size:30px;vertical-align:middle;">促銷價</span>&nbsp;&nbsp;&nbsp;<span style="color:red;font-size:40px;vertical-align:middle;">$<?php echo $prduct["s_price"];?></span></li>
					<br><hr>
					<li>
							<form action="vote_product.php" method="POST">
								<?php
									$goal = $prduct["goal"];
									$cur_popular = $prduct["popular"];
									$complete_rate = $prduct["popular"]/$prduct["goal"]*100;

									$db_follow = new DB();
									$sql_follow = "SELECT `student_id` FROM `follow` WHERE `p_id`='".$_GET["pid"]."'";
									$db_follow->query($sql_follow);
									while($result_follow = $db_follow->fetch_array()){
										$vote_list = $result_follow["student_id"].';'.$vote_list;
									}
									
									if(($goal<=$cur_popular)&&($goal!=0)) {
										echo '當前進度('.$cur_popular.'/'.$goal.'人): <br>
										<div class="progress">'.
											'<div class=" progress progress-bar" role="progressbar" aria-valuenow="'.$complete_rate.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$complete_rate.'%">'.$complete_rate.'%</div>'.
										'</div>';	
										echo '已達出貨標準!!!';
										echo '<br><br><input style="width:260px;height:40px" type="button" value="點此購買">';
									}else{
										echo '當前進度('.$cur_popular.'/'.$goal.'人): <br>
										<div class="progress">'.
											'<div class=" progress progress-bar" role="progressbar" aria-valuenow="'.$complete_rate.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$complete_rate.'%">'.$complete_rate.'%</div>'.
										'</div>';
										echo '<input type="hidden" name="p_id" value="'.$_GET["pid"].'">';
										echo '<input type="hidden" name="vote_list" value="'.$vote_list.'">';
										echo '<input type="hidden" name="cur_popular" value="'.$cur_popular.'">';
										if(!isset($_SESSION["authen"])){
											echo '<input style="width:260px;height:40px" type="submit" value="加入團購">';
										}else if (in_array($_SESSION["authen"], explode(';', $vote_list) ) )  {
											echo '<button type="button" style="color:gray;width:260px;height:40px" disabled>已於團購名單</button>';
										}else{
											echo '<input style="width:260px;height:40px" type="submit" value="加入團購">';
										}
									}
									
								?>
							</form>
					</li>
					<br><hr>
					<li><img style="height:30px;vertical-align:middle;" src="../Johogo_backstage/images/hourglass.gif">&nbsp;&nbsp;&nbsp;
						<?php
						$time_gap = (strtotime($prduct["d_datetime"])-strtotime(date("Y-m-d H:i:s", strtotime('+15 hours'))));
						$time_alert="";
						if($time_gap<0){
							echo '<span>商品已過期!</span>';
						}else{
							echo '<span class="kkcountdown" data-seconds="'.$time_gap.'">'.$time_alert.'</span>'; 
						}
						?>
					</li>	
						
				</ul>
			</div>	
			<hr/>
		</div>
	</div>
	<div class="grid_12 p_intro_comment">
		<ul class="nav nav-pills grid_12">
		  	<li id="p_introduce" class="active intro grid_2"><a style="cursor:hand;">商品介紹</a></li>
		  	<li id="p_response" class="comment grid_2"><a style="cursor:hand;">網友評論</a></li>
		  	<li class="grid_7"><img id="page_status" style="height:40px;"></li>
		</ul>
		<br>
		<br>
		<br>
		<div id="introduce_content" class="grid_12" style="height:200px;font-size: 25px;;font-family:Microsoft JhengHei;">
			<?php echo $prduct["description"];?>
		</div>
		<div id="response_content" class="grid_12" style="height:200px;font-size: 25px;;font-family:Microsoft JhengHei;display:none;">
				<textarea id="p_repcontent" name="p_repcontent" class="grid_8" style="width:620px;height:115px;"></textarea>
				<?php 
					echo '<input id="p_id" type="hidden" name="p_id"  value="'.$prduct["p_id"].'">';
				?>
				<div class="grid_1">
					<img id="rep_img" style="height:60px;cursor:hand" src="img/good.png">
					<img id="rep_Nimg" style="height:60px;cursor:hand;opacity:0.5" src="img/bad.png">
				</div>
				<input id="rep_img_val" name="rep_img_val" type="hidden" value="1">
				<input id="p_ressubmit" class="grid_2" type="button" style="height:80px;margin-top:10px" value="提交"/>
				<div id="response_list">
					<?php
						$sql = "SELECT `student_id`,`datetime`,`content`,`isgood`,`response`,`r_datetime` FROM `comment` WHERE `p_id`= '".$prduct["p_id"]."'";
						$db->query($sql);
						if($db->get_num_rows()>0){
							echo '<div class="grid_12">';
							$count = 0;
							while($resultcomt = $db->fetch_array($sql)){
								$count++;
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
								echo '<div class="grid_12" style="background-color:#f7f7f7">';
								echo '<div class="grid_12"><div style="text-align:left;font-size:17px;color:#abaeb7;" class="grid_1 alpha">'.$name.'</div><div style="text-align:left;" class="grid_5"><img style="height:30px;" src="'.$imgsrc.'"/></div>'.'<div class="grid_5 alpha omega" style="font-size:16px;text-align:right;">'.$resultcomt["datetime"].'</div>'.'</div>';
								echo '<div style="text-align:left;font-size:20px;" class="grid_12">'.$resultcomt["content"].'</div>';
								echo '</div>';
								if(isset($resultcomt["response"])){
									echo '<div class="grid_12">';
									echo '<div class="grid_12"><div style="text-align:left;font-size:17px;color:#abaeb7;" class="grid_6 omega">廠商回覆</div>'.'<div class="grid_5 omega alpha" style="font-size:16px;text-align:right;">'.$resultcomt["r_datetime"].'</div>'.'</div>';
									echo '<div class="grid_12"><div class="grid_6" style="text-align:left;font-size:20px;">'.$resultcomt["response"].'</div></div>';
									echo '</div>';
								}else{
									echo '<div class="grid_12" style="height:20px;">&nbsp;</div>';
								}
							}
							echo '</div>';
						}
					?>
				</div>
		</div>
	</div>
</div>
<?php include ('footer.php'); ?>
