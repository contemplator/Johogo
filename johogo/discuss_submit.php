<?php
	require 'connect_db.php';

	if(($_POST['dicuss_name'])&&($_POST['dicuss_innertext'])){

		$user_id = $_POST['dicuss_name'];
		$innertext = $_POST['dicuss_innertext'];
		$product_id = $_POST['product_id'];
		$product_name = $_POST['product_name'];
		$current_date = GetCurrent_date();

		$sql = "INSERT INTO `johogo`.`product_info_board` 
		(`product_id`, `user_id`, `innertext`, `date`) 
		VALUES ('$product_id', '$user_id', '$innertext', '$current_date');";
		mysql_query($sql);
		header("location:product_info.php?prdct_id=".$product_id."&prdct_name=".$product_name);
	// }else{
	// 	echo "<SCRIPT Language=javascript>"; 
 //    	echo "window.alert('請輸入留言')"; 
 //    	echo "</SCRIPT>"; 
	// 	$product_id = $_POST['product_id'];
	// 	$product_name = $_POST['product_name'];
	// 	header("location:product_info.php?prdct_id=".$product_id."&prdct_name=".$product_name);
	}

	function GetCurrent_date(){
		$curr_time = date ("Y-m-d H" , mktime(date('H')+15, date('i'), date('s'), date('m'), date('d'), date('Y'))); 
		return $curr_time.'時';
	}
?>