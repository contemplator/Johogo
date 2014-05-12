<?php include ('header.php'); ?>

		<link rel="stylesheet" type="text/css" media="all" href="css/index.css" />
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="js/bootstrap.min.js"></script> 
        <script type="text/javascript">
		$('#myTab a').click(function (e) {
			e.preventDefault();
			$(this).tab('show');
		})
	</script>




		<div class="container_12">

			<div class="content grid_12" style="margin: 10px;">
				
				<div class="grid_12">
					<div class="grid_2">&nbsp;</div>
					<div class="ad grid_8">
						<img src="resource/snow_fox.jpg" alt="QQ" width="100%">
					</div>
				</div>
				<div class="search grid_12">
					<form action="product_index_0.php" method="get" target="product_index_0_f">
						<span>商品名稱:</span>
						<input type="text" name="search_key_name"></input>
						<input type="submit" value="搜尋"></input>
					</form>
				</div>
				
				<div class="grid_2 alpha">
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
									<tr><td><a href="">流行女裝</a></td></tr>
									<tr><td><a href="">時尚男裝</a></td></tr>
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
		                       		<tr><td><a href="">生活日用品</a></td></tr>
									<tr><td><a href="">餐廚用品</a></td></tr>
									<tr><td><a href="">傢俱家飾</a></td></tr>
									<tr><td><a href="">3C家電</a></td></tr>
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
		                       		<tr><td><a href="">臉部保養</a></td></tr>
									<tr><td><a href="">沐浴洗髮乳</a></td></tr>
									<tr><td><a href="">化妝品</a></td></tr>
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
		                       		<tr><td><a href="">嬰幼兒用品</a></td></tr>
									<tr><td><a href="">童書玩具</a></td></tr>
									<tr><td><a href="">孕婦裝及用品</a></td></tr>
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
		                       		<tr><td><a href="">票劵</a></td></tr>
									<tr><td><a href="">圖書雜誌</a></td></tr>
									<tr><td><a href="">音樂影片</a></td></tr>
								</table>
		                    </div>
		                </div>	
		            </div>
		        </div>

		        <div class="tab-content grid_10 alpha omaga">

			        <div id="product_info0" class="tab-pane fade active in">
			        	<iframe name="product_index_0_f" src="product_index_0.php" style="height:680px;width:700px"></iframe>
					</div>
					<div id="product_info1" class="tab-pane fade in">
						<iframe src="product_index_1.php" style="height:680px;width:700px"></iframe>
					</div>
					<!-- <div id="product_info2" class="tab-pane fade in"> -->
					<div id="#" class="tab-pane fade in">
					</div>
					<!-- <div id="product_info3" class="tab-pane fade in"> -->
					<div id="#" class="tab-pane fade in">
					</div>
				</div>

			</div>

		</div>
		
		

		
		
	<?php include ('footer.php'); ?>