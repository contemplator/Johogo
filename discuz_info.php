<?php include ('header.php');?>
<style type="text/css">
	.discuz-body{
		margin: 20px;
	}
</style>
<script>
   function checkrows(node){
        var rows = node.value.split("\n").length ;
        if(rows < 3){
        }else{
        	node.rows=rows;
        }
        return true;
   }
</script>
<div class="container_12">
<?php
	$sql = "SELECT * FROM `discuz` WHERE `d_id` =".$_GET["d_id"];
	$result = $db->getOnly($sql); 
?>
	<div class="grid_12">
		<div class="panel panel-primary">
			<div class="panel-heading">
		    	<h3 class="panel-title"><?php echo '['.$result["category"].']&nbsp&nbsp'.$result["d_title"]; ?></h3>
		  	</div>
		  	<div class="discuz-body">
		    	<?php echo $result["content"];?>
		  	</div>
		  	<div class="panel-footer" id="form-footer">
		  		<span><?php echo $result["m_account"]?></span>
		  		<span><?php echo $result["datetime"];?></span>
		  	</div>
	  	</div>
	</div>

	<div class="response grid_12">
		<div class="panel panel-primary">
		  	<div class="discuz-body">
		    	<?php echo $result["content"];?>
		  	</div>
		  	<div class="panel-footer" id="form-footer">
		  		<span><?php echo $result["m_account"]?></span>
		  		<span><?php echo $result["datetime"];?></span>
		  	</div>
	  	</div>
	</div>

	<div class="response-form grid_12">
		<form action="discuz_response.php" method="POST">
	    	<textarea class="form-control" rows="3" onkeydown="checkrows(this)" placeholder="write a comment" style="overflow:hidden"></textarea>
	    	<input class="btn btn-primary" type="submit" name="submit" value="送出" style="margin: 10px;">
		</form>
	</div>
</div>

<?php include ('footer.php');?>