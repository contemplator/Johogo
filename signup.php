<?php require("header.php"); ?>
<link rel="stylesheet" type="text/css" media="all" href="css/signup.css" />
<script type="text/javascript">
	$(document).ready(function(){
		$("input[name='school_email']").blur(function(){
			id_check($(this).val());
		});
	});
	
	function id_check(student_id){
			var xhr = $.ajax({
				type: "POST",
				url: "signup_check.php",
				data: "student_id="+student_id,
				
			success: function(msg){
				if(msg=="此帳號已申請過"){
					setTimeout(function() {
						$("#id_checkimg").attr("src","img/fail.png");
						$("#id_checkimg").css({
						    "width" : "30px"
						});
					}, 300);
					$("#student_id_div").addClass("has-error");
					$("#id_check_alert").css({
						"color" : "red"
					});
				}else{
					setTimeout(function() {
						$("#id_checkimg").attr("src","img/ok_1.png");
						$("#id_checkimg").css({
						    "width" : "30px"
						});
					}, 300);
					$("#student_id_div").addClass("has-success");
					$("#id_check_alert").css({
						"color" : "black"
					});
				}
				$("#id_check_alert").text(msg);
			},beforeSend:function(){
				$("#id_checkimg").css({
					"width" : "60px"
				});
	 			$('#id_checkimg').attr('src', 'img/page_status.gif');
	   		},
		});
	}

	function datacheck(){
		if(document.getElementById("username").value == ""){
			alert("您必須完成帳號的輸入！");
			document.getElementById("username").focus();
			return false;
		}
		else if(document.getElementById("userpassword").value == ""){
			alert("您必須完成密碼的輸入！");
			document.getElementById("userpassword").focus();
			return false;
		}
		document.getElementById("frmlogin").submit();
	}
</script>
<div class="panel panel-primary container_12">
	<div id="signup-title" class="panel-heading">
		<h3 class="panel-title">加入Johogo以獲得更多優惠</h3>
  	</div>
  	<div class="panel-body">
  		<form class="form-horizontal" role="form" action="signup_action.php" method="post">
			<div class="form-group">
				<label class="col-sm-2 control-label">帳號：</label>
				<div id="student_id_div" class="col-sm-5">
					<nav><input type="text" class="form-control" name="school_email" placeholder="學校信箱"/></nav>
				</div>
				<span class="col-sm-1 control-label">@nccu.edu.tw</span>
				<span class="col-sm-2 control-label" id="id_check_alert"></span>
				<span class="col-sm-1"><img id="id_checkimg"></span>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">密碼：</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="password" name="password" placeholder="密碼"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">再次確認密碼：</label>
				<div class="col-sm-10">
					<input type="password" class="form-control" id="check_password" name="check_password" placeholder="再輸入一次密碼"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">身分類別：</label>
				<div class="col-sm-10">
					<select class="form-control">
					  	<option>請選擇帳號身分...</option>
					  	<option>學士班學生</option>
					  	<option>碩博班學生</option>
					  	<option>教職員工</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="submit" value="確認送出" class="btn btn-info" id="signup-submit"/>
			</div>
		</form>
	</div>
  	<div class="panel-footer" id="signup-footer">
  		<div>
			<ul>
				<li><strong><font color="red">註冊後系統即自動寄出認證信，One-Click開通趴趴走!</font></strong></li>
				<li>只要一個帳戶即可輕鬆購買所有好康</li>
				<li>打造專屬個人服務<br><!-- <embed width="200" height="120" src="resource/格式工廠Let It Go_Let Her Go (Frozen_Passenger MASHUP) - Sam Tsui.mp4" autostart="false"/> --></li>
				<li>下載App隨時隨地使用所有服務</li>
			</ul>
		</div>
  	</div>
</div>

<?php require("footer.php"); ?>