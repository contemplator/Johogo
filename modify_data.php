<?php
	require ("header.php");
    session_start();
	if($_POST["submit"]) {
		$sql = "UPDATE `johogo`.`member` SET `m_name`='{$_POST["m_name"]}',`nickname`='{$_POST["nick_name"]}',`password`='{$_POST["password"]}',`identity`='{$_POST["identity"]}',`department`='{$_POST["department"]}',`gender`='{$_POST["gender"]}',`birthday`='{$_POST["birthday"]}' WHERE `student_id` = {$_SESSION["authen"]}";
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
            $( "#birthday" ).datepicker({ 
                changeMonth: true,
                changeYear: true,
                yearRange:'c-30:c+10',
                dateFormat: 'yy-mm-dd',
            });
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
    			<label class="col-sm-2 control-label">真實姓名：</label>
    			<div class="col-sm-10">
    				<input class="form-control" name="m_name" type="text" placeholder="請輸入真實姓名" <?php echo "value=\"".$member["m_name"]."\""?>>
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-2 control-label">暱稱：</label>
    			<div class="col-sm-10">
    				<input class="form-control" name="nick_name" type="text" placeholder="請輸入暱稱" <?php echo "value=\"".$member["nickname"]."\""?>>
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
                        <option value="中國文學系">中國文學系</option>
                        <option value="歷史學系">歷史學系</option>
                        <option value="哲學系">哲學系</option>
                        <option value="圖書資訊與檔案學研究所">圖書資訊與檔案學研究所</option>
                        <option value="宗教研究">宗教研究所</option>
                        <option value="台灣史研究所">台灣史研究所</option>
                        <option value="台灣文學研究所">台灣文學研究所</option>
                        <option value="華語文教學碩/博士學位學程">華語文教學碩/博士學位學程</option>
                        <option value="國文教學碩士在職專班">國文教學碩士在職專班</option>
                        <option value="圖書資訊學數位碩士在職專班">圖書資訊學數位碩士在職專班</option>
                        <option value="應用數學系">應用數學系</option>
                        <option value="心理學系">心理學系</option>
                        <option value="資訊科學系">資訊科學系</option>
                        <option value="神經科學研究所">神經科學研究所</option>
                        <option value="應用物理研究所">應用物理研究所</option>
                        <option value="數學教學碩士在職專班">數學教學碩士在職專班</option>
                        <option value="資訊科學系碩士在職專班">資訊科學系碩士在職專班</option>
                        <option value="數位內容碩士學位學程">數位內容碩士學位學程</option>
                        <option value="輔導與諮商碩士學位學程">輔導與諮商碩士學位學程</option>
                        <option value="數位內容與科技學士學位學程">數位內容與科技學士學位學程</option>
                        <option value="社群網路與人智計算國際研究生博士學位學程">社群網路與人智計算國際研究生博士學位學程</option>
                        <option value="政治學系">政治學系</option>
                        <option value="社會學系">社會學系</option>
                        <option value="財政學系">財政學系</option>
                        <option value="公共行政學系">公共行政學系</option>
                        <option value="地政學系">地政學系</option>
                        <option value="經濟學系">經濟學系</option>
                        <option value="民族學系">民族學系</option>
                        <option value="國家發展研究所">國家發展研究所</option>
                        <option value="勞工研究所">勞工研究所</option>
                        <option value="社會工作研究所">社會工作研究所</option>
                        <option value="行政管理碩士學程">行政管理碩士學程</option>
                        <option value="亞太研究英語碩士學位學程">亞太研究英語碩士學位學程</option>
                        <option value="亞太研究英語博士學位學程">亞太研究英語博士學位學程</option>
                        <option value="應用經濟與社會發展英語碩士學位學程">應用經濟與社會發展英語碩士學位學程</option>
                        <option value="法律學系">法律學系</option>
                        <option value="法律科際整合研究所">法律科際整合研究所</option>
                        <option value="法學院碩士在職專班">法學院碩士在職專班</option>
                        <option value="金融學系">金融學系</option>
                        <option value="國際經營與貿易學系">國際經營與貿易學系</option>
                        <option value="會計學系">會計學系</option>
                        <option value="統計學系">統計學系</option>
                        <option value="企業管理學系">企業管理學系</option>
                        <option value="資訊管理學系">資訊管理學系</option>
                        <option value="財務管理學系">財務管理學系</option>
                        <option value="風險管理與保險學系">風險管理與保險學系</option>
                        <option value="經營管理碩士學程">經營管理碩士學程</option>
                        <option value="國際經營管理碩士學程">國際經營管理碩士學程</option>
                        <option value="商管專業學院碩士學程">商管專業學院碩士學程</option>
                        <option value="企業管理研究所（MBA學位學程）">企業管理研究所（MBA學位學程）</option>
                        <option value="科技管理與智慧財產研究所">科技管理與智慧財產研究所</option>
                        <option value="英國語文學系">英國語文學系</option>
                        <option value="阿拉伯語文學系">阿拉伯語文學系</option>
                        <option value="斯拉夫語文學系">斯拉夫語文學系</option>
                        <option value="日本語文學系">日本語文學系</option>
                        <option value="韓國語文學系">韓國語文學系</option>
                        <option value="土耳其語文學系">土耳其語文學系</option>
                        <option value="歐洲語文學系">歐洲語文學系</option>
                        <option value="語言學研究所">語言學研究所</option>
                        <option value="外文中心">外文中心</option>
                        <option value="英語教學碩士在職專班">英語教學碩士在職專班</option>
                        <option value="新聞學系">新聞學系</option>
                        <option value="廣告學系">廣告學系</option>
                        <option value="廣播電視學系">廣播電視學系</option>
                        <option value="碩士在職專班">碩士在職專班</option>
                        <option value="國際傳播英語碩士學程">國際傳播英語碩士學程</option>
                        <option value="傳播學院學士學位學程">傳播學院學士學位學程</option>
                        <option value="數位內容碩士學位學程">數位內容碩士學位學程</option>
                        <option value="實習廣播電台">實習廣播電台</option>
                        <option value="外交學系">外交學系</option>
                        <option value="東亞研究所">東亞研究所</option>
                        <option value="俄羅斯研究所">俄羅斯研究所</option>
                        <option value="日本研究碩士學位學程">日本研究碩士學位學程</option>
                        <option value="國際研究英語碩士學位學程">國際研究英語碩士學位學程</option>
                        <option value="戰略與國際事務碩士在職專班">戰略與國際事務碩士在職專班</option>
                        <option value="國家安全與大陸研究碩士在職專班">國家安全與大陸研究碩士在職專班</option>
                        <option value="教育學系">教育學系</option>
                        <option value="幼兒教育研究所">幼兒教育研究所</option>
                        <option value="教育行政與政策研究所">教育行政與政策研究所</option>
                        <option value="師資培育中心">師資培育中心</option>
                        <option value="教師研習中心">教師研習中心</option>
                        <option value="學校行政碩士在職專班">學校行政碩士在職專班</option>
                        <option value="輔導與諮商碩士學位學程">輔導與諮商碩士學位學程</option>

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
    				<input class="form-control" name="birthday" type="text" id="birthday" <?php echo "value=\"".$member["birthday"]."\""?>>
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-2 control-label">密碼：</label>
    			<div class="col-sm-10">
    				<input class="form-control" name="password" type="password" placeholder="請輸入密碼" <?php echo "value=\"".$member["password"]."\""?>>
    			</div>
    		</div>
    		<div class="form-group">
    			<label class="col-sm-2 control-label">確認密碼：</label>
    			<div class="col-sm-10">
    				<input class="form-control" name="password_check" type="password" placeholder="請輸入一次密碼" <?php echo "value=\"".$member["password"]."\""?>>
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