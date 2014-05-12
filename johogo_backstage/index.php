<?php
	require("db_config.php");
    require("db_class.php");
    if($_SESSION['account'] == "johogo"){
    	$account = 1;
    }else{
    	$account = $_SESSION['account'];
    }
    $db = new DB();
    $db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);
	$sql = "SELECT * FROM product WHERE c_account = '".$account."'";
	$db->query($sql);
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
		.option{
			margin-top: 30px;
			margin-bottom: 30px;
			border:2px #ccc solid;
			border-radius:10px;
		}
		select{
			margin-top: 10px;
		}
		.new{
			text-align: right;
			float: right;
			margin-top: 10px;
			margin-right: 10px;
		}
		img{
			width: 100px;
			height: 100px;
		}
		th{
			text-align: middle;
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
					<span><?php echo $_SESSION['account']; ?></span>
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
		<div class="option container_12">
			<select class="form-control grid_2" >
				<option>已成為團構商品</option>
				<option>未成為團構商品</option>
			</select>
			<select class="form-control grid_2">
				<option>----請選擇分類----</option>
			</select>
			<select class="form-control grid_2">
				<option>----請選擇分店----</option>
			</select>
			<select class="form-control grid_2">
				<option>----請選擇狀態----</option>
			</select>
			<a class="btn new" style="text-align: right;" href="post_product.php">新增商品</a>
		</div>

		<div class="content container_12">
			<table class="table table-bordered">
				<tr>
					<th>名稱</th>
					<th>圖片</th>
					<th>描述</th>
					<th>原價</th>
					<th>特價</th>
					<th>狀況</th>
					<th>時間</th>
					<th width="50px">功能</th>
				</tr>
				<?php while($result = $db->fetch_array()){ ?>
					<tr>
						<td><?php echo $result['p_name']?></td>
						<td><img src="resource/champagne.jpg"></td>
						<td><?php echo nl2br($result['description'])?></td>
						<td><?php echo $result['o_price']?></td>
						<td><?php echo $result['s_price']?></td>
						<td><?php 
							echo "未達";
							echo "(".$result['popular']."/".$result['goal'].")"?>
						</td>
						<td><?php echo $result['u_datetime']." ~ ".$result['d_datetime']?></td>
						<td><button>編輯</button><button>報告</button><button>下架</button></td>
					</tr>
				<?php } ?>
				
				<tr>
					<td>香檳</td>
					<td><img src="resource/champagne.jpg"></td>
					<td><article>1909年出產。</article></td>
					<td>760</td>
					<td>500</td>
					<td>未達(1/10)</td>
					<td>2014-04-21 08:00:00 ~ 2014-04-30 23:59:00</td>
					<td><button>編輯</button><button>報告</button><button>下架</button></td>
				</tr>
			</table>
		</div>
		<div class="footer">
			<div class="container_12">
				<center><p>Copyright By Leo Lin</p></center>
			</div>
		</div>
	</body>
</html>
