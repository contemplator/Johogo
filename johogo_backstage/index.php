
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

			<center><form action="view.php">
			    <span class="input">信箱：</span><input type="email" class="form-control" id="email" placeholder="contemplation8213@gmail.com">
			  	<span class="input">密碼：</span><input type="password" class="form-control" id="password">
			  	<input class="btn btn-default" type="submit" id="submit" value="登入">
			</form></center>
		</div>
	</body>
</html>