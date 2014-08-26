<?php include ('header.php');?>
<div class="container_12">
<?php
	$sql = "SELECT * FROM `discuz` WHERE `d_id` =".$_GET["d_id"];
	$result = $db->getOnly($sql); 
?>
	<div class="grid_12">
		<div class="panel panel-primary container_12">
			<div class="panel-heading">
		    	<h3 class="panel-title"><?php echo $result["d_title"].'['.$result["category"].']'; ?></h3>
		  	</div>
		  	<div class="login-body">
		    	<?php echo $result["content"];?>
		  	</div>
	  	<div class="panel-footer" id="form-footer">
	  		<span><?php echo $result["m_account"]?><span>
	  		<span><?php echo $result["datetime"];?><span>
	  	</div>
	  </div>
	</div>
</div>

<?php include ('footer.php');?>