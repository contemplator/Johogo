<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" media="all" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
        <link rel="stylesheet" type="text/css" media="all" href="css/text.css" />
        <link rel="stylesheet" type="text/css" media="all" href="css/960.css" />
</head>
<style>
body{
	min-width:600px;
	width:610px;
	height:600px;
}
.cp_pages{
	width:600px;
	text-align: center;
}
</style>
<table class="table-striped" >
	<?php
		require 'connect_db.php';

		global $pages;
		$result = mysql_query( "SELECT COUNT('1') FROM product WHERE `m_class` LIKE '01' AND `s_class` LIKE '02'" );
		$total_counts = mysql_result( $result, 0 );
		$pages = 1+( ( $total_counts-$total_counts%9 )/9 );

		if ( $_GET['p'] ) {
			$now_page = $_GET['p'];
			$resultss = ( $now_page*9 )-9;
			$sql = "SELECT * FROM `product` WHERE `m_class` LIKE '01' AND `s_class` LIKE '02' ORDER BY sequence ASC LIMIT ".$resultss.", 9";
		}else {
			$sql = "SELECT * FROM `product` WHERE `m_class` LIKE '01' AND `s_class` LIKE '02' ORDER BY sequence ASC LIMIT 0, 9";
		}


		if ( $query_run = mysql_query( $sql ) ) {
			if ( mysql_num_rows( $query_run ) == NULL ) {
				echo 'Search Nothing!';
			}
			else {
				$i = 1;
				while ( $query_row = mysql_fetch_assoc( $query_run ) ) {
					$product_id = $query_row[ 'product_id' ];
					$product_name = $query_row[ 'name' ];
					$product_price = $query_row[ 'price' ];
					$product_img_url = $query_row[ 'img_url' ];
					$product_description = $query_row[ 'description' ];
					if ( $i%3==1 ) {
						echo '<tr >';
					}
					echo	'<td >
								<table>
									<tr><td><a href="product_info.php?prdct_id='.$product_id.'&prdct_name='.$product_name.'" target="_parent"><img class="pic" style="width:250px;height:150px" src="'.$product_img_url.'"/></a></td></tr>
									<tr><td class="product_name"><a href="product_info.php?prdct_id='.$product_id.'&prdct_name='.$product_name.'" target="_parent">'.$product_name.'</href></td></tr>
									<tr ><td class="product_descr"><span>售價:  </span><span>'.$product_price.'</span><span>元</span></td></tr>
								</table>
							</td>';
					if ( $i%3==0 ) {
						echo '</tr>';
					}
					$i = $i+1;
				}
			}
		}
		else {
			echo 'Cant get $_GET!';
		}
	?>
</table>
<div class="grid_12 cp_pages">
	<?php
		//設定總頁數
		pageList( $pages );

		function pageList( $total, $range=2, $page=0 ) {
			//將GET參數保留
			if ( !empty( $_GET ) || !empty( $HTTP_GET_VARS ) ) {
				$_get_vars = '';
				$_GET = empty( $_GET ) ? $HTTP_GET_VARS : $_GET;
				foreach ( $_GET as $_get_name => $_get_value ) {
					if ( $_get_name != "p" ) $_get_vars .= empty( $_get_vars ) ? "$_get_name=$_get_value"
						: "&$_get_name=$_get_value";
				}
			}

			if ( $page <= 0 ) $page = ( isset( $_GET["p"] ) ) ? $page = $_GET["p"] : 1;

			if ( $page != 1 )
				echo "<span><a href='?{$_get_vars}&p=1'>第一頁</a><a href='?{$_get_vars}&p=".( $page - 1 ).
				"'>上一頁</a></span>";

			$start = $page - $range;
			$end = $page + $range;

			if ( $start < 1 ) {
				$end = $end - $start + 1;
				$start = 1;
			}

			if ( $end > $total ) {
				$start = $start - ( $end - $page );
				$end = $total;
			}

			for ( $i = $start; $i <= $end; $i++ ) {
				if ( $i > 0 )
					echo ( $i == $page ) ? "<strong>$i</strong>" : "<span>  <a href='?{$_get_vars}&p={$i}'>$i</a>  </span>";
			}

			if ( $page != $total ) {
				echo "<span><a href='?{$_get_vars}&p=".( $page + 1 ).
					"'>下一頁</a> <a href='?{$_get_vars}&p=".$total."'>最後頁</a></span>";

			}
		}
	?>
</div>
<?php
	echo '<div class="grid_12"><br><span class="page_button grid_12 cp_pages">共'.$pages.'頁</span><br></div>';
?>