<?php 
	session_start();
	include_once ("db_class.php");
	$db = new DB();
	$sql_category_1 = "SELECT * FROM `category_1`";
	$db->query($sql_category_1);
	$category = array();
	while($result = $db->fetch_array()){
		$category[$result['c1_name']] = array();
	}

	foreach ($category as $key => $value) {
		$sql_category_2 = "SELECT * FROM `category_2` WHERE `c1_name`= \"";
		$sql_category_2 .= "$key\"";
		$db->query($sql_category_2);
		while($result = $db->fetch_array()){
			array_push($category[$key], $result['c2_name']);
		}
	}

	$account = "使用者";
	if(!isset($_SESSION["authen"])){
		$login_status = "<a id=\"login\" href=\"login.php\">會員登入</a> | <a id=\"signup\" href=\"signup.php\">點我註冊</a>";
	}else{
		$login_status = "<a id=\"login\" href=\"#\">會員資料修改</a> | <a id=\"signup\" href=\"#\">會員登出</a>";
	}
?>
<html>
	<title>Johogo</title>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">	
		<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/text.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/960.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/header.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/signup.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/footer.css" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jssor/jssor.core.js"></script>
		<script type="text/javascript" src="js/jssor/jssor.utils.js"></script>
		<script type="text/javascript" src="js/jssor/jssor.slider.js"></script>
		<script type="text/javascript">
			$(window).scroll(function(){
				if(document.body.scrollTop > 100){
					$("#data-sticky-column").css({
						position: "fixed",
						width: "100%",
						top: 0,
						"z-index": 10,
					});
				}else{
					$("#data-sticky-column").css({
						position: "relative",
						"z-index": 10,
					});
				}
			});
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
	</head>

	<body>
		<div id="header">
			<div id="logo">
				<a id="logo-img" href="index.php"><img src="resource/johogo_logo.png"></a>
				<div id="membership">
					<nav>
						<a id="member_center" href="#">會員中心</a> |
						<a id="about_us" href="#" onFocus>關於我們</a> |
						<a href="javascript:window.external.AddFavorite(\'http://www.idlefox.idv.tw/Johogo/index.php\',\'Johogo\')" style="text-align:right;">加入最愛</a>
					</nav>
					<nav>
						<span><?php echo $account;?></span>&nbsp&nbsp&nbsp您好，歡迎來到Johogo。
					</nav>
					<nav>
						<?php echo $login_status;?>
					</nav>
				</div>
			</div>
			<nav id="data-sticky-column" class="navbar navbar-default">
				<div class="collapse navbar-collapse container_12">
					<ul class="nav navbar-nav" role="navigation"> 
						<?php
							foreach ($category as $c1_name => $c1_value) {
								echo "<li class=\"dropdown menu-item\">\r\n".
										"<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">".$c1_name."<span class=\"caret\"></a>\r\n".
										"<ul class=\"dropdown-menu\" role=\"menu\">\r\n";
								foreach ($c1_value as $key => $c2_name) {
									echo "<li><a href=\"product.php?category_1=".$c1_name."&category_2=".$c2_name."\">".$c2_name."</a></li>\r\n";
								}
								echo 	"</ul>\r\n".
									 "</li>";
							}
						?>
						<li class="menu-item" onmoucsover="menu_detect()"><a href="discuz.php">討論區</a></li>
					</ul>
					<input class="menu_input" type="submit" name="submit" value="搜尋">
					<input class="menu_input" type="text" name="keyword" placeholder="搜尋:商品">
				</div>
			</nav>
		</div>

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

		<div class="footerbg">
			<div class="footer">JOHOGO版權所有 2014</div>
		</div>

	</body>
</html>