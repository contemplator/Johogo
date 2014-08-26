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

	$db_usr = new DB();
	$sql_usr = "SELECT `m_account` FROM `member` WHERE `student_id`='".$_SESSION["authen"]."'";
	$member = $db_usr->getOnly($sql_usr);

	$account = $_SESSION["authen"];
	if( (isset($member["m_account"])) && (trim($member["m_account"]!="")) ) {
		$account = $member["m_account"];
	}
	if(!isset($_SESSION["authen"])){
		$account = "訪客";
		$login_status = "<a id=\"login\" href=\"login.php\">會員登入</a> | <a id=\"signup\" href=\"signup.php\">點我註冊</a>";
	}else{
		$login_status = "<a id=\"login\" href=\"modify_data.php\">會員資料修改</a> | <a id=\"signup\" href=\"logout.php\">會員登出</a>";
	}
?>
<html>
	<title>Johogo</title>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">	
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/text.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/960.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/header.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/login.css" />
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
		</script>
		<script type="text/javascript">
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
						<a id="about_us" href="#" onFocus>關於我們</a>
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
			<div class="panel-heading">
		    	<h3 class="panel-title">會員登入</h3>
		  	</div>
		  	<div class="login-body">
		    	<form class="form-horizontal panel-body" role="form" action="login_action.php" method="post" id="frmlogin">
		    		<div class="form-group">
		    			<label class="col-sm-1 control-label">帳號：</label>
		    			<div class="col-sm-10">
		    				<input class="form-control" id="username" name="username" type="text" placeholder="enter the username">
		    			</div>
		    		</div>
		    		<div class="form-group">
		    			<label class="col-sm-1 control-label">密碼：</label>
		    			<div class="col-sm-10">
		    				<input class="form-control" id="userpassword" name="userpassword" type="password" placeholder="enter the password">
		    			</div>
		    		</div>
				</form>
		  	</div>
		  	<div class="panel-footer" id="form-footer">
		  		<button type="button" class="btn btn-info" onclick="datacheck()">登入</button>
		    	<button type="button" class="btn btn-warning"><a id="form-signup" href="signup.php">還沒有會員? (會員註冊)</a></button>
		  	</div>
		</div>

		<div class="footerbg">
			<div class="footer">JOHOGO版權所有 2014</div>
		</div>

	</body>
</html>
