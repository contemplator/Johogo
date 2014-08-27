<?php require("header.php"); ?>
<link rel="stylesheet" type="text/css" media="all" href="css/login.css" />
<script type="text/javascript">
	function datacheck(){
		if(document.getElementById("username").value == ""){
			alert("您必須完成帳號的輸入！");
			document.getElementById("username").focus();
			return false;
		}
		else if(document.getElementById("userpassword").value == ""){
			alert("您必須完成密碼的輸入！");
			document.getElementById("userpassword").focus();
			return false;
		}
		document.getElementById("frmlogin").submit();
	}
</script>

<div class="panel panel-primary container_12">
	<div class="panel-heading">
    	<h3 class="panel-title">會員登入</h3>
  	</div>
  	<div class="login-body">
    	<form class="form-horizontal panel-body" role="form" action="login_action.php" method="post" id="frmlogin">
    		<div class="form-group">
    			<label class="col-sm-1 control-label">帳號：</label>
    			<div class="col-sm-10">
    				<input class="form-control" id="username" name="username" type="text" placeholder="enter the username">
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-1 control-label">密碼：</label>
    			<div class="col-sm-10">
    				<input class="form-control" id="userpassword" name="userpassword" type="password" placeholder="enter the password">
    			</div>
    		</div>
		</form>
  	</div>
  	<div class="panel-footer" id="form-footer">
  		<button type="button" class="btn btn-info" onclick="datacheck()">登入</button>
    	<button type="button" class="btn btn-warning"><a id="form-signup" href="signup.php">還沒有會員? (會員註冊)</a></button>
  	</div>
</div>
<?php require("footer.php"); ?>