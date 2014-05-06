<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" media="all" href="css/text.css" />
        <link rel="stylesheet" type="text/css" media="all" href="css/960.css" />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  		<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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
		#input{
			margin-left: 50px;
		}
		#final{
			float: right;
		}
		#preview{
			margin-right: 15px;
		}
		.footer{
			margin-top: 50px;
			background-color: #E1E1E1;
			vertical-align: center;
		}
	</style>
	<script type="text/javascript">
		$(function() {
	    	$( "#progressbar" ).progressbar({
	      		value: 33
	    	});
	  	});
	</script>
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

		<div class="content container_12">
			<h2>新增商品</h2>
			<!--<div id="progressbar" class="prefix_1 grid_10 suffix_1"></div>-->
			<p class="grid_1 alpha"></p><div id="progressbar" class="grid_10"></div><p class="grid_1 omega"></p>
			<br/>
			<br/>
			<br/>
			<form>
				<h5>請選擇一張圖檔作為商品的截圖：</h5>
				<div id="input">
					<input class="radio" type="radio" name="photo" value="url">網路上的圖檔<br><br>
					圖檔網址：<input type="text" name="url" placeholder="https://lh3.googleusercontent.com/legbcoV0zE4f-xEIdrjjU6Tgnc_2SvfF1DiV2HS7rSE=w410-h547-no"><br>
					<input class="radio" type="radio" name="photo" value="file">電腦中的圖檔<br><br>
					圖檔路徑：<input type="file" name="file"><br>
				</div>
				<br>
				<hr>
				<div id="final">
					<input class="btn btn-default" type="button" name="preview" value="預覽" id="preview">
					<input class="btn btn-primary" type="submit" name="preview" value="下一步" id="next">
				</div>
			</form>

		</div>

		<div class="footer">
			<div class="container_12">
				<br>
				<center><p>Copyright By Leo Lin</p></center>
			</div>
		</div>
	</body>
</html>
