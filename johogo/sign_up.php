<?php include ('header.php'); ?>


				


		<link rel="stylesheet" type="text/css" media="all" href="css/sign_up.css" />
			<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
			<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
			<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
			<link rel="stylesheet" href="/resources/demos/style.css">
			<script>
			$(function() 
			{
			$( "#datepicker" ).datepicker({ dateFormat: "yy/mm/dd", changeYear: true, changeMonth: true, yearRange:"-70:+0" });
			});
			</script>

	
			
		<div class="container_16">
			<div class="space grid_16"></div>

			<div class="td_left grid_1"></div>

			<div class="maintable grid_14">
				<div class="tittle grid_14">加入Johogo以獲得更多優惠</div>
				<div class="container_16">
				<div class="grid_7">
					<table>
						<tr><td class="td4">只要一個帳戶即可輕鬆購買所有好康</td></tr>
						<tr><td><img src="resource/johogo_logo.png"></td></tr>
						<tr><td class="space"></td></tr>
						<tr><td class="td4">打造專屬個人服務</td></tr>
						<tr><td><embed width="200" height="120" src="resource/格式工廠Let It Go_Let Her Go (Frozen_Passenger MASHUP) - Sam Tsui.mp4" autostart="false"/></td></tr>
						<tr><td class="space"></td></tr>
						<tr><td class="td4">下載App隨時隨地使用所有服務</td></tr>
						<tr><td><img src="resource/johogo_logo.png"></td></tr>

					</table>
				</div>
    			<div class="grid_6">
					<div class="subtittle grid_6">會員註冊</div>
					<table>
		              <form action="" method="">
		              <tr>
		              	<td></td>
		                <td class="td1">姓名&nbsp;&nbsp;</td>
		                <td class="td2">&nbsp;<input type="text" name="name" style="width: 150px;"/></td>
		              </tr>
		              <tr>
		              	<td></td>
		              	<td class="td1">暱稱&nbsp;&nbsp;</td>
		                <td class="td2">&nbsp;<input type="text" name="nickname" style="width: 150px;"/></td>
		              </tr>
		              <tr>
		              	<td></td>
		                <td class="td1">會員帳號&nbsp;&nbsp;</td>
		                <td class="td2">&nbsp;<input  type="text" name="account" style="width: 150px;"/></td>                
		              </tr>
		              <tr>
		                <td ></td>
		                <td class="td1">密碼&nbsp;&nbsp;</td>
		                <td class="td2">&nbsp;<input type="text" name="password" style="width: 150px;"/></td>
		              </tr>
		              <tr>
		                <td ></td>
		                <td class="td1">再輸入一次密碼&nbsp;&nbsp;</td>
		                <td class="td2">&nbsp;<input type="text" name="check_password" style="width: 150px;"/></td>
		              </tr>
		              <tr>
		                <td ></td>
		                <td class="td1">學校信箱&nbsp;&nbsp;</td>
		                <td class="td2">&nbsp;<input type="text" name="school_email" style="width: 150px;"/>@nccu.edu.tw</td>
		              </tr>
		              <tr>
		                <td ></td>
		                <td class="td1">帳號身分&nbsp;&nbsp;</td>
		                <td class="td2">
		                  &nbsp;<select style="width: 150px;">
		                    <option>請選擇身分...</option>
		                    <option>學士班學生</option>
		                    <option>碩士班學生</option>
		                    <option>教職員工</option>
		                    </select>
		                </td>
		              </tr>
		              <tr>
		                <td ></td>
		                <td class="td1">科系&nbsp;&nbsp;</td>
		                <td class="td2">
		                  &nbsp;<select style="width: 150px;">
		                    <option>請選擇科系...</option>
		                    <option>資訊管理學系</option>
		                    <option>會計學系</option>
		                  </select>
		                </td>
		              </tr>
		              <tr>
		                <td ></td>
		                <td class="td1">性別&nbsp;&nbsp;</td>
		                <td class="td2">
		                  &nbsp;<select style="width: 150px;">
		                    <option>請選擇性別...</option>
		                    <option>男</option>
		                    <option>女</option>
		                  </select>
		                </td>
		              </tr>
		              <tr>
		                <td ></td>
		                <td class="td1">生日&nbsp;&nbsp;</td>
		                <td class="td2">&nbsp;<input type="date" id="datepicker" name="birthday" style="width: 150px;"/></td>
		              </tr>
		              <tr>
		                <td ></td>
		                <td class="td1">手機&nbsp;&nbsp;</td>
		                <td class="td2">&nbsp;<input type="text" name="cellphone" style="width: 150px;"/></td>
		              </tr>
		              </form>
		              <tr>
		                <form action="" method="">
		                <td ></td>
		                <td></td>
		                <td class="td3"><input type="submit" name="submit" value="確認送出"/></td>
		              </form>
		              </tr>
            		</table>

				</div>
								
				</div>
			
			</div>

			<div class="grid_1"></div>


	</div>






<?php include ('footer.php'); ?>