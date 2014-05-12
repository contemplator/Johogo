<?php include ('header.php'); ?>


			<link rel="stylesheet" type="text/css" media="all" href="css/logfrm.css" />
			<script language="VBScript">

			sub datacheck()
			if frmlogin.username.value="" then
				Msgbox"您必須完成帳號的輸入！"
				document.frmlogin.elements(0).focus()
				exit sub
			end if

			if frmlogin.userpassword.value="" then
				Msgbox"您必須完成密碼的輸入！"
				document.frmlogin.elements(1).focus()
				exit sub
			end if	

			frmlogin.submit

			end sub		


			</script>


			<div class="container_16">
			
			<div class="grid_16" style="margin: 20px;"></div>

			<div class="td_left grid_1"></div>

			<div class="maintable grid_14">
				<div class="tittle grid_14">會員登入</div>
				<div class="grid_14" style="margin: 20px;"></div>
				<form action="login.php" method="post" name="frmlogin"></form>
				<div class="grid_14">帳號：<input name="username" type="text" placeholder="enter the username"></div>
				<div class="grid_14">密碼：<input name="userpassword" type="password" placeholder="enter the password"></div>

				<input type="button" value="登入" onclick=datecheck>
				<br>
				<a href="sign_up.php">還沒有會員? (會員註冊)</a>
				


			</div>
		</div>






<?php include ('footer.php'); ?>