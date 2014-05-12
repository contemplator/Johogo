<?php include ('header.php'); ?>

		<script src="http://code.jquery.com/jquery-latest.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		<script src="js/bootstrap.min.js"></script> 
  		<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" media="all" href="css/product.css" />

		<script type="text/javascript">
		$('#myTab a').click(function (e) {
		  e.preventDefault();
		  $(this).tab('show');
		})
		$(function() {
		    $( document ).tooltip();
		});
		</script>

		<div class="container_12">
		 
			<div class="content"> 
				 <div class="grid_2 alpha" style="margin: 10px;"> 
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
									<tr><td><a href="search.php?category=文藝愛情">童書玩具</a></td></tr>
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
		            </div>
		        </div>

		        <table class="table table-striped grid_10" style="margin: 10px;">
		        <?php
		        	require 'connect_db.php';
		        	// if(($_GET['m_class'])&&($_GET['s_class'])){
		        	// 	$m_class = $_GET['m_class'];
		        	// 	$s_class = $_GET['s_class'];
		        		
		        		global $pages;
		        		$result = mysql_query("SELECT COUNT('1') FROM product");
		        		$total_counts = mysql_result($result, 0);
		        		$pages = 1+(($total_counts-$total_counts%9)/9);

		        		if($_GET['p']){
		        			$now_page = $_GET['p'];
		        			$resultss = ($now_page*9)-9;
		        			$sql = "SELECT * FROM `product` ORDER BY sequence ASC LIMIT ".$resultss.", 9";
		        		}else{
		        			$sql = "SELECT * FROM `product` ORDER BY sequence ASC LIMIT 0, 9";
		        		}
		        		
		        		if($query_run = mysql_query($sql)){
		        			if (mysql_num_rows($query_run) == NULL) {
								echo 'Search Nothing!';
							}
							else{
								$i = 1;
								while ($query_row = mysql_fetch_assoc($query_run)) {
									$product_id = $query_row[ 'product_id' ];
									$product_name = $query_row[ 'name' ];
									$product_price = $query_row[ 'price' ];		
									$product_img_url = $query_row[ 'img_url' ];		
									$product_description = $query_row[ 'description' ];	
									if($i%3==1){
										echo '<tr>';
									}
									echo	'<td>
												<table>
													<tr><td><a href="product_info.php?prdct_id='.$product_id.'&prdct_name='.$product_name.'"><img class="pic grid_3" src="'.$product_img_url.'"/></a></td></tr>
													<tr><td class="product_name"><a href="product_info.php?prdct_id='.$product_id.'&prdct_name='.$product_name.'" title="'.$product_description.'">'.$product_name.'</href></td></tr>
													<tr><td class="product_descr"><span>售價:  </span><span>'.$product_price.'</span><span>元</span></td></tr>
												</table> 
											</td>';
									if($i%3==0){
										echo '</tr>';
									}
									$i = $i+1;
			        			}
			        		}
		        		}
		        	// }
		        	// else{
		        	// 	echo 'Cant get $_GET!';
		        	// }
		        ?>
				</table>
			</div>
			<div class="grid_10 cp_pages">
				<?php
			        //設定總頁數
			        pageList($pages);

			        function pageList($total, $range=2, $page=0){
			            //將GET參數保留
			            if(!empty($_GET) || !empty($HTTP_GET_VARS)){
			                $_get_vars = '';
			                $_GET = empty($_GET) ? $HTTP_GET_VARS : $_GET;
			                foreach ($_GET as $_get_name => $_get_value) {
			                    if($_get_name != "p") $_get_vars .= empty($_get_vars) ? "$_get_name=$_get_value"
			                    : "&$_get_name=$_get_value";
			                }
			            }
			         
			            if($page <= 0) $page = (isset($_GET["p"])) ? $page = $_GET["p"] : 1;
			         
			            if($page != 1)
			                echo "<span><a href='?{$_get_vars}&p=1'>第一頁</a><a href='?{$_get_vars}&p=".($page - 1).
			                "'>上一頁</a></span>";
			         
			            $start = $page - $range;
			            $end = $page + $range;
			         
			            if($start < 1){
			                $end = $end - $start + 1;
			                $start = 1;
			            }
			         
			            if($end > $total){
			                $start = $start - ($end - $page);
			                $end = $total;
			            }
			         
			            for ($i = $start; $i <= $end; $i++){
			                if($i > 0)
			                    echo ($i == $page) ? "<strong>$i</strong>" : "<span>  <a href='?{$_get_vars}&p={$i}'>$i</a>  </span>";
			            }
			         
			            if($page != $total){
			                echo "<span><a href='?{$_get_vars}&p=".($page + 1).
			                    "'>下一頁</a> <a href='?{$_get_vars}&p=".$total."'>最後頁</a></span>";
			                 
			            }
			        }
			        ?>
			<div class="grid_12">
				<br>
				<span class="page_button grid_12">共<?php echo $pages;?>頁</span>
				<br>
			</div>
		</div> 
	</div>
	<?php include ('footer.php'); ?>