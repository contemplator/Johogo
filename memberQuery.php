<?php
include ('header.php');
session_start();
if(!isset($_SESSION["authen"])){
	echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('請先登入!')
			window.location.href='login.php';
			</SCRIPT>");
}
?>

<script type="text/javascript" src="js/jquery.textslider.min.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="css/memberQuery.css" />
<div id="memberQuery_container" style="width:960px;text-align:center;margin:0 auto;">
	<nav style="width:960px;">
		<div class="form-inline" style="text-align:right;">
			<a id="self_index" href="memberQuery.php" style="background-color:#EA3A5A;" class="btn btn-large btn-primary">個人首頁</a>
			<button id="follow" style="background-color:#6F6E78;" class="btn btn-large btn-success" type="button" value="followQuery.php">追蹤商品</button>
			<button id="buy" style="background-color:#6F6E78;" class="btn btn-large btn-danger" type="button" value="buyQuery.php">購買商品</button>
			<button id="discuss" style="background-color:#6F6E78;" class="btn btn-large btn-warning" type="button" value="discussQuery.php">發言紀錄追蹤</button>
		</div>
		<div style="text-align:left;">
			<img style="width:100px;" src="img/user-bg.png">
			<span style="padding-left:50px;font-size:40px;vertical-align:middle">韓宏光</span>
			<div class="slideText search-query" style="display:inline-block">
				<ul>
					<li><a href="http://www.idlefox.idv.tw/Johogo/product_info.php?pid=300000001">即將截止，加拿大楓葉冰酒!!</a></li>
					<li><a href="#">性感女神褲襪 復古短靴 甜心短裙 心動露肩洋 暖暖室內鞋</a></li>
					<li><a href="#">經典晚宴絲襪 學院窄裙 頂級細跟鞋 放電大眼妝 寶貝超Q服</a></li>
				</ul>
			</div>
			<span class="img-circle" style="background-color:red;width:50px;height:50px;display:inline-block;margin:0 auto;margin-left:100px;vertical-align:middle;font-size:36px;text-align:center;color:white;">5</div>
		</div>
		<hr>
		<div style="width:300px;float:left;margin:0 auto;text-align:center;">
			<span style="font-size:30px;"><img src="img/music_box.png">音樂播放區</span><br><br>
			<p style="padding-left:50px;text-align:left;color:gray">在這繁忙的都市生活中，<br>日復一日的單調生活令人喘不過氣
				<br>上一次何時聆聽自己喜愛的音樂都快想不起來了..<br><br>我們是Johogo<br>願您能放慢在這裡的腳步<br>用心細細的感受在這的每一刻。</p>
			<select id="DJmusic" style="width:250px;height:200px;" multiple="multiple">
			 	<option value="msc/msc4.mp3">被困在雨中的魏華</option>
			  	<option value="msc/msc3.mp3">明日英雄</option>
			  	<option value="msc/msc2.mp3">我不會讓你失望</option>
			  	<option value="msc/msc4.mp3">被困雨在中的魏華</option>
			  	<option value="msc/msc4.mp3">被困在中的雨魏華</option>
			  	<option value="msc/msc4.mp3">被困在中雨的魏華</option>
			  	<option value="msc/msc4.mp3">閉上雙眼的時候</option>
			  	<option value="msc/msc5.mp3">被雨困在中的魏華</option>
			  	<option value="msc/msc4.mp3">雨被困在中的魏華</option>
			  	<option value="msc/msc4.mp3">被困在中的魏華雨</option>
			  	<option value="msc/msc1.mp3">沒有菸抽的日子</option>
			</select>
			<br><br>
			<input id="music_Click" type="button" class="btn btn-success" style="width:300px" value="submit">
			<br><br>
			<div id="music_audio">
			<audio controls loop>
			  <source src="http://www.w3schools.com/html/horse.mp3" type="audio/mpeg">
				Your browser does not support the audio element.
			</audio>
			</div>
		</div>
		<nav id="QueryLoading" style="width:960px;background-color:black;opacity:0.3;display:none;text-align:center;margin:0 auto;"><div class="controls" style="font-size:20px;margin:0 auto;display:inline;"><img src="img/ajax-loader-M.gif" class="span2"><span class="span3">&nbsp;</span><span class="span3" style="color:white;font-weight: bold;margin:0 auto;">載入資料中，請稍候</span></div></nav>
		<div id="QueryResult" style="width:960px;text-align:center;margin:0 auto;"></div>
		<div></div>
	</nav>
</div>
<script type="text/javascript">
	function Query_pages(Dest){
		var xhr = $.ajax({
			type: "POST",
			url: Dest,
			data: "m_id="+<?php echo "\"".$_SESSION["authen"]."\""?>,
							
			success: function(msg){
				$('#QueryResult').html(msg);
			},
			beforeSend:function(){
				$('#QueryLoading').css('display', 'block');
			},
			complete:function(){
				setTimeout(function() {
					$('#QueryLoading').css('display', 'none');
				},100);
				$("#but_discuz").addClass("btn-info");
				$("#m_comment").hide();
				$("#m_Dresponse").hide();
			},
		});
	}
	function Query_delete(e,order,d_id,p_id,datetime){
		var r = confirm("確定刪除?");
			if (r == true) {
				var xhr = $.ajax({
					type: "POST",
					url: "Query_function.php",
					data: "order="+order+"&d_id="+d_id+"&p_id="+p_id+"&datetime="+datetime,
									
					success: function(msg){
						if(msg=='ok'){
							e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
							alert("刪除成功!");
						}
					},
					beforeSend:function(){
						
					},
					complete:function(){
						
					},
				});
		}
	}
	function Query_update(e,order,d_id,p_id,datetime){
		var r = confirm("確定更改?");
			if (r == true) {
				var xhr = $.ajax({
					type: "POST",
					url: "Query_function.php",
					data: "order="+order+"&d_id="+d_id+"&p_id="+p_id+"&datetime="+datetime,
									
					success: function(msg){
						if(msg=='ok'){
							alert("更改成功!");
							if(order=='smFSN'){
								new_order = 'smFSY';
								text = '回復跟團';
								e.parentNode.parentNode.getElementsByTagName("td")[2].innerText='n';
							}else if(order == 'smBSN'){
								new_order = 'smBSY';
								text = '回復購買';
								e.parentNode.parentNode.getElementsByTagName("td")[2].innerText='n';
							}else if(order == 'smBSY'){
								new_order = 'smBSN';
								text = '取消購買';
								e.parentNode.parentNode.getElementsByTagName("td")[2].innerText='y';
							}else if(order == 'smFSY'){
								new_order = 'smFSN';
								text = '取消跟團';
								e.parentNode.parentNode.getElementsByTagName("td")[2].innerText='y';
							}
							var new_element = document.createElement("button");
							var newContent = document.createTextNode(text); 
							new_element.appendChild(newContent);
							new_element.onclick = function onclick(event) {
													Query_update(this,new_order,d_id,p_id,datetime)
												  }
							e.parentNode.replaceChild(new_element,e);
						}
						
					},
					beforeSend:function(){
						
					},
					complete:function(){
						
					},
				});
		}
	}
	function D_show(target_id){
		$(target_id).show();
		if(target_id=="#m_discuz"){
			$("#but_discuz").addClass("btn-info");
			$("#but_comment").removeClass("btn-info");
			$("#but_Dresponse").removeClass("btn-info");
			$("#m_comment").hide();
			$("#m_Dresponse").hide();
		}else if(target_id=="#m_comment"){
			$("#but_comment").addClass("btn-info");
			$("#but_Dresponse").removeClass("btn-info");
			$("#but_discuz").removeClass("btn-info");
			$("#m_discuz").hide();
			$("#m_Dresponse").hide();
		}else{
			$("#but_Dresponse").addClass("btn-info");
			$("#but_comment").removeClass("btn-info");	
			$("#but_discuz").removeClass("btn-info");
			$("#m_comment").hide();
			$("#m_discuz").hide();
		}
		
	}
	$(document).ready(function(){
		$('#self_index').click(function(){
			$('#self_index,#follow,#buy,#discuss').css("background-color", "#6F6E78");
			$(this).css("background-color", "#EA3A5A");
		});
		$('#follow,#buy,#discuss').click(function(){
			$('#self_index,#follow,#buy,#discuss').css("background-color", "#6F6E78");
			$(this).css("background-color", "#EA3A5A");
			Query_pages($(this).val());
		});
		$('.slideText').textslider({
			direction : 'scrollUp', // 捲動方向: scrollUp向上, scrollDown向下
			scrollNum : 1, // 一次捲動幾個元素
			scrollSpeed : 800, // 捲動速度(ms)
			pause : 1000 // 停頓時間(ms)
		});
		$('#music_Click').click(function(){
			
			$('#music_audio').html(function() {
  				var m = $('#DJmusic').val();
  				return "<audio controls><source src=\""+m+"\">Your browser does not support the audio element.</audio>";
			});
		});
	})


</script>
<?php 
include ('footer.php');
?>