<?php include ('header.php'); ?>

       		<link rel="stylesheet" type="text/css" media="all" href="css/discuz.css" />
       		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
			<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
			<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
			<!-- <link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css" />
			<link rel="stylesheet" href="/resources/demos/style.css"> -->
			<script>
				$(function() {
				$( "#accordion" ).accordion();
				});
			</script>	




		<div class="content container_16">
		
		<div class="space grid_16"></div>

		<div class="grig_3">搜尋: 
			<select style="width: 100px; font-family: 微軟正黑體">
		       <option>標題</option>
		       <option>作者</option>
		       <option>內文</option>
		    </select>
		    <input type="text" name="search" placeholder="請輸入關鍵字" style="width: 150px;  height: 30px; font-family: 微軟正黑體">
		    <input type="submit" name="check_sexrch" value="搜尋" style="font-family: 微軟正黑體">
		<div class="grid_10">&nbsp;<div class="grid_3">&nbsp;</div></div></div>

		
		<div class="grid_3 alpha" id="accordion">
			<h3><a href="">美食</a></h3>
				<div>
					<ul>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					</ul>				
				</div>
			<h3><a href="">服飾</a></h3>
				<div>
					<ul>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					</ul>
				</div>
			<h3><a href="">生活</a></h3>
				<div>
					<ul>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					</ul>
				</div>
			<h3><a href="">3C</a></h3>
				<div>
					<ul>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					</ul>
				</div>
		</div>

		<div class="grid_12">
			<table class="grid_12">
				<tr><td class="tittle grid_3">&nbsp;本版名稱</td><td class="grid_4"><a href="discuz_new.php"><input class="content" type="submit" name="want_to_post" value="我要發文"></a></td></tr>
			</table>
			<table class="table table-hover table-striped">
				<tr style="height=30px;"></tr>
				<tr class="grid_12">
					<td class="maintable grid_1 omega">No.</td>
					<td class="maintable grid_4 alpha omega">標題</td>
					<td class="maintable grid_2 alpha omega">張貼者</td>
					<td class="maintable grid_3 alpha omega">張貼時間</td>
					<td class="maintable grid_1 alpha">點閱</td>
				</tr>
				
			</table>
			<div id="container">
				<div class="pagination ">
					<a href="#" class="page">first</a>
					<a href="#" class="page">2</a><a href="#" class="page">3</a>
					<span class="page active">4</span><a href="#" class="page">5</a>
					<a href="#" class="page">6</a><a href="#" class="page">last</a>
				</div>
			
			</div>
		

		</div>
</div>
	<?php include ('footer.php'); ?>