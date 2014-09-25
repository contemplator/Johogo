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
	
	if(!isset($_SESSION["authen"])){
		$account = "訪客";
		$login_status = "<a id=\"login\" href=\"login.php\">會員登入</a> | <a id=\"signup\" href=\"signup.php\">點我註冊</a>";
	}else{
		$db_usr = new DB();
		$sql_usr = "SELECT `nickname` FROM `member` WHERE `student_id`='".$_SESSION["authen"]."'";
		$member = $db_usr->getOnly($sql_usr);
		$account = $_SESSION["authen"];
		if( (isset($member["nickname"])) && (trim($member["nickname"]!="")) ) {
			$account = $member["nickname"];
		}
		$login_status = "<a id=\"modify_data\" href=\"modify_data.php\">會員資料修改</a> | <a id=\"logout\" href=\"logout.php\">會員登出</a>";
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
		<link rel="stylesheet" type="text/css" media="all" href="css/footer.css" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$(window).scroll(function(){
				if(document.body.scrollTop > 50){
					$("#data-sticky-column").css({
						position: "fixed",
						width: "100%",
						top: 0,
						"z-index": 10,
						opacity: 0.9
					});
					// $("#data-sticky-column-logo").show();
					// $("#data-sticky-column-logo").css({
					// 	position: "fixed",
					// 	width: "100%",
					// 	top: 0,
					// 	"z-index": 10,
					// 	opacity: 0.9
					// });
				}else{
					$("#data-sticky-column").css({
						position: "relative",
						"z-index": 10,
						opacity:1.0
						
					});
					// $("#data-sticky-column-logo").hide();
					// $("#data-sticky-column-logo").css({
					// 	position: "relative",
					// 	"z-index": 10,
					// 	opacity:1.0
						
					// });
				}
			});
			$("#srh_submit").click(function(){
				var keyword = $("#keyword").val();
				window.location.replace("http://www.idlefox.idv.tw/johogo/product.php?keyword="+keyword);
			});
			$("#logout").click(function(){
				alert("成功登出!");
			});
		});
		</script>
	</head>

	<body>
		<div id="header">
			<div id="logo">
				<a id="logo-img" href="index.php"><img src="resource/johogo-logo.png"></a>
				<div id="membership">
					<nav>
						<a id="member_center" href="memberQuery.php">會員中心</a> |
						<a id="about_us" href="aboutUs.php" onFocus>關於我們</a>
					</nav>
					<nav>
						<span><?php echo $account;?></span>&nbsp;&nbsp;&nbsp;您好，歡迎來到Johogo。
					</nav>
					<nav>
						<?php echo $login_status;?>
					</nav>
				</div>
			</div>
			<!-- <nav id="data-sticky-column-logo" class="navbar navbar-default" style="display:none">
				<div class="collapse navbar-collapse container_12">
					assd
				</div>
			</nav> -->
			<nav id="data-sticky-column" class="navbar navbar-default" style="margin-bottom:5px;">
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
					<input id="srh_submit" class="menu_input" type="submit" name="submit" value="搜尋">
					<input id="keyword" class="menu_input" type="text" name="keyword" placeholder="搜尋:商品">
				</div>
			</nav>
		</div>