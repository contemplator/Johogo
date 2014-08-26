<?php
	require ("header.php");
    session_start();
	if($_POST["submit"]) {
		$sql = "UPDATE `johogo`.`member` SET `m_account`='{$_POST["m_account"]}',`m_name`='{$_POST["m_name"]}',`nickname`='{$_POST["nick_name"]}',`password`='{$_POST["password"]}',`identity`='{$_POST["identity"]}',`department`='{$_POST["department"]}',`gender`='{$_POST["gender"]}',`birthday`='{$_POST["birthday"]}' WHERE `student_id` = {$_SESSION["authen"]}";
		$dbs = new DB();
		$dbs->query($sql);
		
		echo "<SCRIPT>";
		echo 'window.location.replace("http://www.idlefox.idv.tw/Johogo/index.php");';
		echo "</SCRIPT>";

	}
    $dbk = new DB();
    $sql = "SELECT * FROM `member` WHERE `student_id` = '".$_SESSION["authen"]."'";
    $member = $dbk->getOnly($sql);
?>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            $( "#birthday" ).datepicker({ dateFormat: 'yy-mm-dd' });
        });
        <?php echo '$( "select option[value=\''.$member["identity"].'\']").first().attr("selected",true);'?>

         <?php echo '$( "select option[value=\''.$member["department"].'\']").first().attr("selected",true);'?>
        
        <?php echo '$("input[value=\''.$member["gender"].'\']").first().attr("checked",true);'?>
    });
</script>
<style type="text/css">
#modify-submit{
	float: right;
	margin-right: 30px;
}
</style>

<div class="panel panel-primary container_12">
	<div class="panel-heading">
    	<h3 class="panel-title">修改會員資料</h3>
  	</div>
  	<div class="login-body">
    	<form class="form-horizontal panel-body" role="form" action="#" method="post">
            <div class="form-group">
                <label class="col-sm-2 control-label">帳號：</label>
                <div class="col-sm-10">
                    <input class="form-control" name="m_account" type="text" placeholder="請輸入帳號" <?php echo "value=\"".$member["m_account"]."\">"?>
                </div>
            </div>
    		<div class="form-group">
    			<label class="col-sm-2 control-label">真實姓名：</label>
    			<div class="col-sm-10">
    				<input class="form-control" name="m_name" type="text" placeholder="請輸入真實姓名" <?php echo "value=\"".$member["m_name"]."\">"?>
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-2 control-label">暱稱：</label>
    			<div class="col-sm-10">
    				<input class="form-control" name="nick_name" type="text" placeholder="請輸入暱稱" <?php echo "value=\"".$member["nickname"]."\">"?>
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-2 control-label">身分類別：</label>
    			<div class="col-sm-10">
    				<select class="form-control" name="identity">
					  	<option>請選擇帳號身分...</option>
					  	<option value="學士班學生">學士班學生</option>
					  	<option value="碩博班學生">碩博班學生</option>
					  	<option value="教職員工">教職員工</option>
					</select>
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-2 control-label">科系：</label>
    			<div class="col-sm-10">
    				<select class="form-control" name="department">
					  	<option>請選擇帳號身分...</option>
					  	<option value="資管系">資管系</option>
					  	<option value="會計系">會計系</option>
					  	<option value="風管系">風管系</option>
                        <option value="金融系">金融系</option>
					</select>
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-2 control-label">性別：</label>
    			<div class="col-sm-10">
    				<label class="radio-inline">
					  	<input type="radio" name="gender" value="n"> 不說
					</label>
					<label class="radio-inline">
					  	<input type="radio" name="gender" value="m" selected> 男
					</label>
					<label class="radio-inline">
					  	<input type="radio" name="gender" value="f"> 女
					</label>
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-2 control-label">生日：</label>
    			<div class="col-sm-10">
    				<input class="form-control" name="birthday" type="text" id="birthday" <?php echo "value=\"".$member["birthday"]."\">"?>
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-2 control-label">密碼：</label>
    			<div class="col-sm-10">
    				<input class="form-control" name="password" type="password" placeholder="請輸入密碼" <?php echo "value=\"".$member["password"]."\">"?>
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-2 control-label">確認密碼：</label>
    			<div class="col-sm-10">
    				<input class="form-control" name="password_check" type="password" placeholder="請輸入一次密碼" <?php echo "value=\"".$member["password"]."\">"?>
    			</div>
    		</div>
    		<div class="form-group">
    			<input type="submit" name="submit" value="確認送出" class="btn btn-info" id="modify-submit"/>
    		</div>
		</form>
  	</div>
  	<div class="panel-footer" id="form-footer">
  	</div>
</div>

<?php
	include("footer.php");
?>