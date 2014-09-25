<?php include ('header.php'); ?>
<link rel="stylesheet" type="text/css" media="all" href="css/product.css" />
<div class="container_12" style="margin-top: 0px;">
	<!-- 查詢所有商品 -->
	<table style="table-layout: fixed; width: 100%;">
	<?php
		global $pages;
		$db = new DB();
		$db_img = new DB();

		// check whether the user get into product.php from search functiob
		if((isset($_GET["keyword"]))&&(trim($_GET["keyword"])!="")) {
			$result = mysql_query("SELECT COUNT('1') FROM `product` WHERE `p_name` LIKE '%".$_GET["keyword"]."%'");
			$total_counts = mysql_result($result, 0);
			if($total_counts==0){
				echo '查無資料';
				$pages=1;
			}else{
				$sql = "SELECT * FROM `product` WHERE `p_name` LIKE '%".$_GET["keyword"]."%' ORDER BY p_id ASC LIMIT 0, 8";
				$pages = 1+(($total_counts-$total_counts%8)/8);
				if(isset($_GET['p'])){
					$now_page = $_GET['p'];
					$resultss = ($now_page*8)-8;
					$sql = "SELECT * FROM `product` WHERE `p_name` LIKE '%".$_GET["keyword"]."%' ORDER BY p_id ASC LIMIT ".$resultss.", 8";
				}
				$db->query($sql);
				$count = 1;
				while($result = $db->fetch_array()){
					$sql = "SELECT `url` FROM `image` WHERE p_id=".$result["p_id"];
					$db_img->query($sql);
					$resultimg = $db_img->fetch_array();
					$discount = (round(($result["s_price"]/$result["o_price"]),2)*100);
					if($discount%10==0){
						$discount = $discount/10;
					}
					$discount = $discount."折";
					$complete_rate = $result["popular"]/$result["goal"]*100;
					if($count == 1){
						echo "<tr>";
					}

					echo "<td style=\"text-align: center;\">\r\n".
							"<div class=\"panel panel-default cabinet\">\r\n";
								if($result['isgroup'] == "1"){
									echo "<div class=\"panel-heading\" style=\"background-color:orange\">\r\n<img src=\"\">";
								}else{
									echo "<div class=\"panel-heading\">\r\n";
								}

					echo "<h3 class=\"panel-title\">".mb_substr($result["p_name"], 0, 17, 'utf-8')."</h3>".
								"</div>\r\n".
								"<div class=\"panel-body product-body\" onClick='top.location.href=\"product_info.php?pid=".$result["p_id"]."\"'>".
									"<img src=\"../johogo_backstage/".$resultimg["url"]."\"/>\n\r".
									"<table>\n\r".
										"<tr>\n\r".
											"<td>\n\r".
												"<div class=\"s_price\">".$result["s_price"]."</div>\n\r".
												"<span class=\"o_price\">".$result["o_price"]."</span>&nbsp;\n\r".
												"省下<span class=\"save\">".((int)$result["o_price"]-(int)$result["s_price"])."</span>\n\r".
											"</td>\n\r".
											"<td>\n\r".
												"<div class=\"discount\">".$discount."</div>\n\r".
											"</td>\n\r".
											"<td>\n\r".
												"<div class=\"popular\">".$result["popular"]."</div>人已跟團\n\r".
											"</td>\n\r".
										"</tr>\n\r".
									"</table>\n\r".
									"<div class=\"progress\">\n\r".
										"<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"".$complete_rate."\" aria-valuemin=\"0\" aria-valuemax=\"100\"  style=\"width: ".$complete_rate."%;\">".$complete_rate."%</div>\n\r".
									"</div>\n\r".
								"</div>\n\r".
							"</div>\n\r".
						"</td>\n\r";
					$count++;

					if($count == 4){
						echo "</tr>";
						$count = 1;
					}
				}
			}
		}
		// check whether user get into product.php from choose category
		else if(isset($_GET["category_1"])){

			$result = mysql_query("SELECT COUNT('1') FROM product WHERE `category_1` LIKE '".$_GET["category_1"]."'");
			$total_counts = mysql_result($result, 0);
			$sql = "SELECT * FROM `product` WHERE `category_1` LIKE '".$_GET["category_1"]."' ORDER BY p_id ASC LIMIT 0, 8";
			if(isset($_GET["category_2"])){
				$result = mysql_query("SELECT COUNT('1') FROM product WHERE `category_1` LIKE '".$_GET["category_1"]."' AND `category_2` LIKE '".$_GET["category_2"]."'");
				$total_counts = mysql_result($result, 0);
				$sql = "SELECT * FROM `product` WHERE `category_1` LIKE '".$_GET["category_1"]."' AND `category_2` LIKE '".$_GET["category_2"]."' ORDER BY p_id ASC LIMIT 0, 8";
			}
			$pages = 1+(($total_counts-$total_counts%8)/8);

			if(isset($_GET['p'])){
				$now_page = $_GET['p'];
				$resultss = ($now_page*8)-8;
				$sql = "SELECT * FROM `product` WHERE `category_1` LIKE '".$_GET["category_1"]."' ORDER BY p_id ASC LIMIT ".$resultss.", 8";
			}
			if((isset($_GET['p']))&&((isset($_GET["category_2"])))) {
				$now_page = $_GET['p'];
				$resultss = ($now_page*8)-8;
				$sql = "SELECT * FROM `product` WHERE `category_1` LIKE '".$_GET["category_1"]."' AND `category_2` LIKE '".$_GET["category_2"]."' ORDER BY p_id ASC LIMIT ".$resultss.", 8";
			}
			// echo $sql;
			$db->query($sql); 
			
			$count = 1;
			while($result = $db->fetch_array()){
				$sql = "SELECT `url` FROM `image` WHERE p_id=".$result["p_id"];
				$db_img->query($sql);
				$resultimg = $db_img->fetch_array();
				$discount = (round(($result["s_price"]/$result["o_price"]),2)*100);
				if($discount%10==0){
					$discount = $discount/10;
				}
				$discount = $discount."折";
					$complete_rate = $result["popular"]/$result["goal"]*100;
					if($count == 1){
						echo "<tr>";
					}

					echo "<td style=\"text-align: center;\">\r\n".
							"<div class=\"panel panel-default cabinet\">\r\n";
								if($result['isgroup'] == "1"){
									echo "<div class=\"panel-heading\" style=\"background-color:orange\">\r\n<img src=\"\">";
								}else{
									echo "<div class=\"panel-heading\">\r\n";
								}

					echo "<h3 class=\"panel-title\">".mb_substr($result["p_name"], 0, 17, 'utf-8')."</h3>".
								"</div>\r\n".
								"<div class=\"panel-body product-body\" onClick='top.location.href=\"product_info.php?pid=".$result["p_id"]."\"'>".
									"<img src=\"../johogo_backstage/".$resultimg["url"]."\"/>\n\r".
									"<table>\n\r".
										"<tr>\n\r".
											"<td>\n\r".
												"<div class=\"s_price\">".$result["s_price"]."</div>\n\r".
												"<span class=\"o_price\">".$result["o_price"]."</span>&nbsp;\n\r".
												"省下<span class=\"save\">".((int)$result["o_price"]-(int)$result["s_price"])."</span>\n\r".
											"</td>\n\r".
											"<td>\n\r".
												"<div class=\"discount\">".$discount."</div>\n\r".
											"</td>\n\r".
											"<td>\n\r".
												"<div class=\"popular\">".$result["popular"]."</div>人已跟團\n\r".
											"</td>\n\r".
										"</tr>\n\r".
									"</table>\n\r".
									"<div class=\"progress\">\n\r".
										"<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"".$complete_rate."\" aria-valuemin=\"0\" aria-valuemax=\"100\"  style=\"width: ".$complete_rate."%;\">".$complete_rate."%</div>\n\r".
									"</div>\n\r".
								"</div>\n\r".
							"</div>\n\r".
						"</td>\n\r";
					$count++;
				if($count == 3 && $total_counts == "2"){
					echo "<td></td>";
					echo "</tr>";
				}
				if($count == 4){
					echo "</tr>";
					$count = 1;
				}
			}
		}else{
			echo '查無資料';
			$pages=1;
		}
	?>
	</table>

	<!-- 設定總頁數 -->
	<div class="cp_pages">
	<?php
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
	</div>
	<div class="grid_12">
		<br>
		<span class="page_button grid_12">共<?php echo $pages;?>頁</span>
		<br>
	</div>
</div>
		
<?php include ('footer.php'); ?>