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
			background-color: #E1E1E1;
			height: 100px;
			vertical-align: center;
		}
		#title{
			margin-top: 40px;
			font-size: 40px;
			font-style: bolder;
			vertical-align: center;
		}
		.description{
			margin-top: -10px;
			margin-bottom: 20px;
			font-size: 12px;
		}
		.cell{
			display: table-cell;
			vertical-align: center;
		}
		.login_info{
			text-align: right;
		}
		.menu{
			background-color: red;
			height:80px;
		}
		.menu_link{
			margin-top: 30px;
		}
		button{
			text-align: right;
		}
		table{
			border-collapse: collapse;
			border: 1px solid black;
			width: 100%;
		}
		th, td {
 		   border: solid black 1px;
		}
	</style>
	<body>
		<div class="header">
			<div class="container_12">
				<div class="cell">
					<span id="title">Johogo</span>
					<span id="description">輕鬆團購 買到所有你想的到的</span>
				</div>
				<div class="login_info">
					<span>您好,</span>
					<span><?php echo "user_name"; ?></span>
					<span>|</span>
					<span><a href="">活動管理</a></span>
					<span>|</span>
					<span><a href="">登出</a></span>
				</div>
			</div>
		</div>
		<div class="menu">
			<div class="container_12">
				<a class="btn btn-primary menu_link" href="">管理商品</a>
				<a class="btn btn-info menu_link" href="">管理討論</a>
				<a class="btn btn-info menu_link" href="">管理店家</a>
			</div>
		</div>
		<div class="content">
			<div class="container_12">
				<div class="option grid_12">
					<button class="btn" style="text-align: right;">新增商品</button>
				</div>

				<div class="list grid_12">
					<table border="1">
						<tr>
							<th>名稱</th>
							<th>圖片</th>
							<th>描述</th>
							<th>原價</th>
							<th>特價</th>
							<th>功能</th>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="container_12">
				<center><p>Copyright By Leo Lin</p></center>
			</div>
		</div>
	</body>
</html>
