<?php include ('header.php'); ?>


		<link rel="stylesheet" type="text/css" media="all" href="css/discuz_new.css" />
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css">
			<script>
				$(function() {
				$( "#accordion" ).accordion();
				});
			</script>

		<div class="content container_16">
		
		<div class="space grid_16"></div>

		<div class="grig_3">搜尋: 
			<select style="width: 100px;">
		       <option>標題</option>
		       <option>作者</option>
		       <option>內文</option>
		    </select>
		    <input type="text" name="search" placeholder="請輸入關鍵字" style="width: 150px;  height: 30px;">
		    <input type="submit" name="check_sexrch" value="搜尋">
		<div class="grid_10">&nbsp;<div class="grid_3">&nbsp;</div></div></div>

		<div class="grid_3" id="accordion">
			<h3><a href="">美食</a></h3>
				<div>
					<ul>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					</ul>				
				</div>
			<h3><a href="">服飾</a></h3>
				<div>
					<ul>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					</ul>
				</div>
			<h3><a href="">生活</a></h3>
				<div>
					<ul>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					</ul>
				</div>
			<h3><a href="">3C</a></h3>
				<div>
					<ul>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					<li><a href="">item</a></li>
					</ul>
				</div>
		</div>
		<div class="grid_13">
			<div class="tittle" style="margin:10px;">&nbsp;本版名稱</div>
			<div class="grid_13" style="margin:10px;">&nbsp;標題：<input class="" type="text" name="topic" placeholder="請輸入標題"></div>
			<div class="grid_13" style="margin:10px;">&nbsp;文章內容：<div style="margin:10px;"><textarea class="" name="post_content" style="width:500px;height:300px;" placeholder="請輸入文章內容"></textarea></div></div>
			<div class="grid_13" style="margin:10px;"></div>
			<div class="grid_3"><div class="grid_7"><input type="submit" name="preview_post" value="預覽貼文">&nbsp;<input type="submit" name="decide_post" value="確定發文">&nbsp;<input type="submit" name="cancel" value="取消發文"><div class="grid_3"></div></div></div>
			<!-- <table>
				<tr><td class="tittle grid_3">&nbsp;本版名稱</td><td class="grid_4"><input class="content" type="submit" name="want_to_post" value="回到討論版"></td><tdclass="grid_6">&nbsp;</td></tr>
				<tr class="space"></tr>
				<tr class="grid_13">
					<td class="grid_13">&nbsp;標題：<input class="" type="text" name="topic" placeholder="請輸入標題"></td>
					<td class="grid_13" style="height:20px;"></td>
					<td class="grid_3" style="height:25px;">&nbsp;文章內容<td/><td class="grid_10"><textarea class="" name="post_content" style="width:500px;height:300px;" placeholder="請輸入文章內容"></textarea></td>
				</tr>
				<tr class="space"></tr>
				<tr><td class="grid_3">&nbsp;</td><td class="grid_4"><input type="submit" name="preview_post" value="預覽貼文">&nbsp;<input type="submit" name="decide_post" value="確定發文">&nbsp;<input type="submit" name="cancel" value="取消發文"></td></tr>
				


			</table> -->
		</div>
		

		</div>

<?php include ('footer.php'); ?>