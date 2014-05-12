<?php
	require("db_config.php");
    require("db_class.php");

    // judge who login
    if(!is_null(@$_POST['submit'])){
    	$db = new DB();
	    $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
		$sql = "SELECT * FROM company WHERE 1";
		$db->query($sql);

		// search and compare all company
    	while($company = $db->fetch_array()){
    		if($company['email'] == $_POST['email'] && $company['password'] == $_POST['password']){
    			$_SESSION['identity'] = "company";
    			$_SESSION['account'] = $company['c_account'];
    			header('Location: http://localhost:8080/johogo/johogo_backstage/index.php');
    		}
    	}

    	// judge whether it is author ot not
    	if($_POST['email'] == "root@gmail.com" && $_POST['password'] == "qweqwe"){
    		$_SESSION['identity'] = "johogo";
    		$_SESSION['account'] = "johogo";
    		header('Location: http://localhost:8080/johogo/johogo_backstage/index.php');
    	}

    }
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" media="all" href="css/text.css" />
        <link rel="stylesheet" type="text/css" media="all" href="css/960.css" />
        <script src="http://code.jquery.com/jquery-latest.js"></script>
	</head>
	<style type="text/css">
		.header{
			background: url("resource/header.jpg");
			height: 19%;
		}
		#title{
			margin: 20px;
			margin-left: 40px; 
		}
		.description{
			font-size: 14px;
			margin-left: 50px;
		}
		#welcome{
		 	height: 50%;
			margin: 20px;
		}
		.input{
			font-size: 24px;
			font-family: 微軟正黑體;
		}
		input{
			width: 300px;
			font-size: 24px;
		}
	</style>
	<body>
		<div class="header container_12">
			<h1 id="title">Johogo</h1>
			<h3 class="description">輕鬆團購 買到所有你想的到的</h3>
		</div>

		<div class="content container_12">
			<center><img id="welcome" src="resource/welcome.jpg"></center>

			<center><form action="login.php" method="post">
			    <span class="input">信箱：</span><input type="email" class="form-control" name="email" placeholder="contemplation8213@gmail.com">
			  	<span class="input">密碼：</span><input type="password" class="form-control" name="password">
			  	<input class="btn btn-default" type="submit" name="submit" value="登入">
			</form></center>
		</div>
	</body>
</html>