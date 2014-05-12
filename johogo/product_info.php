<?php include ('header.php'); ?>

	<link rel="stylesheet" type="text/css" media="all" href="css/product_info.css" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

	<script type="text/javascript">
		// $('#myTab a').click(function (e) {
		//   e.preventDefault();
		//   $(this).tab('show');
		// })
		$(function() {
    $( "#tabs" ).tabs();
  });
	</script>

		<div class="container_12">
			<div class="content">
				<!-- <div class="grid_2 alpha">
						<div class="accordion-group">
		                    <div class="accordion-heading">
		                        <a href="index.php" class="accordion-toggle" >
		                            <i class="icon-home"></i><span>首頁</span>
		                        </a>
		                    </div>
			            </div>
						<div class="accordion-group">
		                    <div class="accordion-heading">
		                        <a class="accordion-toggle" data-toggle="collapse" href="#collapseTwo">
		                            <i class="icon-th"></i>美食
		                        </a>
		                    </div>
			                <div id="collapseTwo" class="accordion-body  collapse" style="height: 0px; ">
			                    <div class="accordion-inner">
			                        <table class="table table-bordered">
										<tr><td><a href="product.php?m_class=01&s_class=01">甜點蛋糕</a></td></tr>
										<tr><td><a href="product.php?m_class=01&s_class=02">餅乾零食</a></td></tr>
									</table>
			                    </div>
			                </div>	
			            </div>
			            <div class="accordion-group">
		                    <div class="accordion-heading">
		                        <a class="accordion-toggle" data-toggle="collapse"  href="#collapseThree">
		                            <i class="icon-th"></i>服飾
		                        </a>
		                    </div>
			                <div id="collapseThree" class="accordion-body collapse" style="height: 0px; ">
			                    <div class="accordion-inner">
			                       <table class="table table-bordered">
										<tr><td><a href="search.php?category=輕小說">流行女裝</a></td></tr>
										<tr><td><a href="search.php?category=文藝愛情">時尚男裝</a></td></tr>
									</table>
			                    </div>
			                </div>	
			            </div>
			            <div class="accordion-group">
		                    <div class="accordion-heading">
		                        <a class="accordion-toggle" data-toggle="collapse"  href="#collapseFour">
		                            <i class="icon-th"></i>日常居家
		                        </a>
		                    </div>
			                <div id="collapseFour" class="accordion-body collapse" style="height: 0px; ">
			                    <div class="accordion-inner">
			                       <table class="table table-bordered">
			                       		<tr><td><a href="search.php?category=輕小說">生活日用品</a></td></tr>
										<tr><td><a href="search.php?category=文藝愛情">餐廚用品</a></td></tr>
										<tr><td><a href="search.php?category=輕小說">傢俱家飾</a></td></tr>
										<tr><td><a href="search.php?category=文藝愛情">3C家電</a></td></tr>
									</table>
			                    </div>
			                </div>	
			            </div>
			             <div class="accordion-group">
		                    <div class="accordion-heading">
		                        <a class="accordion-toggle" data-toggle="collapse"  href="#collapseFive">
		                            <i class="icon-th"></i>保養
		                        </a>
		                    </div>
			                <div id="collapseFive" class="accordion-body collapse" style="height: 0px; ">
			                    <div class="accordion-inner">
			                       <table class="table table-bordered">
			                       		<tr><td><a href="search.php?category=輕小說">臉部保養</a></td></tr>
										<tr><td><a href="search.php?category=文藝愛情">沐浴洗髮乳</a></td></tr>
										<tr><td><a href="search.php?category=輕小說">化妝品</a></td></tr>
									</table>
			                    </div>
			                </div>	
			            </div>
			             <div class="accordion-group">
		                    <div class="accordion-heading">
		                        <a class="accordion-toggle" data-toggle="collapse"  href="#collapseSix">
		                            <i class="icon-th"></i>親子
		                        </a>
		                    </div>
			                <div id="collapseSix" class="accordion-body collapse" style="height: 0px; ">
			                    <div class="accordion-inner">
			                       <table class="table table-bordered">
			                       		<tr><td><a href="search.php?category=輕小說">嬰幼兒用品</a></td></tr>
										<tr><td><a href="search.php?category=文藝愛情">童書玩具/a></td></tr>
										<tr><td><a href="search.php?category=輕小說">孕婦裝及用品</a></td></tr>
									</table>
			                    </div>
			                </div>	
			            </div>
			             <div class="accordion-group">
		                    <div class="accordion-heading">
		                        <a class="accordion-toggle" data-toggle="collapse"  href="#collapseSeven">
		                            <i class="icon-th"></i>休閒
		                        </a>
		                    </div>
			                <div id="collapseSeven" class="accordion-body collapse" style="height: 0px; ">
			                    <div class="accordion-inner">
			                       <table class="table table-bordered">
			                       		<tr><td><a href="search.php?category=輕小說">票劵</a></td></tr>
										<tr><td><a href="search.php?category=文藝愛情">圖書雜誌</a></td></tr>
										<tr><td><a href="search.php?category=輕小說">音樂影片</a></td></tr>
									</table>
			                    </div>
			                </div>	
			            </div> -->
			        </div>

				<div class="product grid_12">
					<div class="grid_9">
						<span class="title alpha">
						<?php 
							require 'connect_db.php';
							if(($_GET['prdct_id'])){
								$product_id = $_GET['prdct_id'];
								$product_name = $_GET['prdct_name'];
								$sql = "SELECT * FROM `product_info` WHERE `product_id` LIKE '$product_id'";
								if($query_run = mysql_query($sql)){
				        			if (mysql_num_rows($query_run) == NULL) {
										echo 'Search Nothing!';
									}
									else{
										while ($query_row = mysql_fetch_assoc($query_run)) {
											$product_info_popularity = $query_row[ 'popularity' ];
											$product_info_have_sold = $query_row[ 'have_sold' ];		
											$product_info_remain_time = $query_row[ 'remain_time' ];		
											$product_info_special_price = $query_row[ 'special_price' ];	
											echo $product_name;
					        			}
					        		}
			        			}
			        			$sql2 = "SELECT * FROM `product` WHERE `product_id` LIKE '$product_id'";
								if($query_run2 = mysql_query($sql2)){
				        			if (mysql_num_rows($query_run2) == NULL) {
										echo 'Search Nothing!';
									}
									else{
										while ($query_row2 = mysql_fetch_assoc($query_run2)) {
											$product_price = $query_row2[ 'price' ];		
											$product_img_url = $query_row2[ 'img_url' ];		
											$product_description = $query_row2[ 'description' ];	
					        			}
					        		}
			        			}
							}
						?>
						</span>
					</div>
					<hr/>
					<div class="grid_2">&nbsp;</div>
					<div class="pic grid_6"><img class="pic" src="<?php echo $product_img_url;?>"></div>
					<div class="info grid_2">
						<ul>
							<li><span class="item">人氣</span>: <span class="content"><?php echo $product_info_popularity;?></span></li>
							<br><hr>
							<li><span class="item">已賣出</span>: <span class="content"><?php echo $product_info_have_sold;?></span></li>
							<br><hr>
							<li><span class="item">剩餘時間</span>: <span class="content"><?php echo $product_info_remain_time;?></span></li>
							<br><hr>
							<li><span class="item">價格</span>: <span class="content"><?php echo $product_info_special_price;?></span></li>
							<br><hr>
							<li><span class="item">原價</span>: <span class="content"><?php echo $product_price;?></span></li>
							<br><hr>
							<li><span class="item">折價</span>: <span class="content"><?php echo  $product_price-$product_info_special_price;?></span></li>
						</ul>
					</div>	
					<hr/>

					<button name="buy" onclick="">我要買</button><br><br>

					<div id="tabs" class="info grid_12">
  <ul>
    <li><a href="#tabs-product_info">商品資訊</a></li>
    <li><a href="#tabs-product_discuss">商品討論</a></li>
  </ul>
  <div id="tabs-product_info">
    <p><?php echo $product_description;?></p>
  </div>
  <div id="tabs-product_discuss">
    <p><?php
			$sql3 = "SELECT * FROM `product_info_board` WHERE `product_id` LIKE '$product_id'";
			    if($query_run3 = mysql_query($sql3)){
				    if (mysql_num_rows($query_run3) == 0) {
						echo '#########暫無留言#########';
						echo '<br><br><hr>';
						}
				else{
					while ($query_row3 = mysql_fetch_assoc($query_run3)) {
							$board_user_id = $query_row3[ 'user_id' ];		
							$board_innertext = $query_row3[ 'innertext' ];
							$board_date = $query_row3[ 'date' ];
							echo '<ul>';
							echo '<li><span class="board_discuss_tle">'.$board_date.'</span>&nbsp&nbsp<span class="board_discuss_tle">'.$board_user_id.'<strong>&nbsp:&nbsp</strong></span><span>'.$board_innertext.'</span></li>';
							echo '</ul>';
							echo '<hr>';
					       		}
					       	}
			       		}
		?>
			<form action="discuss_submit.php" method="POST">
				<div class="grid_5">
					<label>姓名:</label>
					<input name="dicuss_name" type="text" size="5">
					<label>留言串:</label>
					<input name="dicuss_innertext" type="text" size="30">
						<?php
							echo '<input name="product_id" type="hidden" value="'.$product_id.'">';
							echo '<input name="product_name" type="hidden" value="'.$product_name.'">';
						?>
				</div>
					<input id="dicuss_submit" class="grid_3" type="submit" value="留言">
			</form>
				</div>
	</p>
  </div>
</div>
				</div>	
			</div>



			<!-- <div class="tab-content info grid_12">
				<ul class="nav nav-tabs" id="myTab">
				  <li class="active"><a href="#product_info" data-toggle="tab">商品資訊</a></li>
				  <li><a href="#discuss" data-toggle="tab">商品討論</a></li>
				</ul>
				
				<div class="tab-content grid_9">
					<div id="product_info"  class="tab-pane active">
						<p><?php echo $product_description;?></p>
					</div>
					<div id="discuss"  class="tab-pane board_discuss">
						<?php
			       			$sql3 = "SELECT * FROM `product_info_board` WHERE `product_id` LIKE '$product_id'";
			       			if($query_run3 = mysql_query($sql3)){
				       			if (mysql_num_rows($query_run3) == 0) {
									echo '#########暫無留言#########';
									echo '<br><br><hr>';
								}
								else{
									while ($query_row3 = mysql_fetch_assoc($query_run3)) {
										$board_user_id = $query_row3[ 'user_id' ];		
										$board_innertext = $query_row3[ 'innertext' ];
										$board_date = $query_row3[ 'date' ];
										echo '<ul>';
										echo '<li><span class="board_discuss_tle">'.$board_date.'</span>&nbsp&nbsp<span class="board_discuss_tle">'.$board_user_id.'<strong>&nbsp:&nbsp</strong></span><span>'.$board_innertext.'</span></li>';
										echo '</ul>';
										echo '<hr>';
					       			}
					       		}
			       			}
						?>
						<form action="discuss_submit.php" method="POST">
							<div class="grid_5">
								<label>姓名:</label>
								<input name="dicuss_name" type="text" size="5">
								<label>留言串:</label>
								<input name="dicuss_innertext" type="text" size="30">
								<?php
									echo '<input name="product_id" type="hidden" value="'.$product_id.'">';
									echo '<input name="product_name" type="hidden" value="'.$product_name.'">';
								?>
							</div>
							<input id="dicuss_submit" class="grid_3" type="submit" value="留言">
						</form>
					</div>
				</div>
			</div>

		</div> -->
	</body>
<?php include ('footer.php'); ?>
