<?php
	require("header.php");
?>
<link rel="stylesheet" type="text/css" media="all" href="css/index.css" />
<script type="text/javascript" src="js/jssor/jssor.core.js"></script>
<script type="text/javascript" src="js/jssor/jssor.utils.js"></script>
<script type="text/javascript" src="js/jssor/jssor.slider.js"></script>
<script type="text/javascript">
	$(document).ready(function ($) {
		var options = {
			$AutoPlay: true,                                   //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $DragOrientation: 1,                               //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
            $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
            $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
            $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
            $AutoCenter: 0,                                 //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
            $Steps: 1,                                       //[Optional] Steps to go for each navigation request, default value is 1
        }};

        var jssor_slider1 = new $JssorSlider$("slider1_container", options);
    });
</script>	

<div class="container_12">
	<div id="slider1_container" style="position: relative; top:0 px; left: 0px; width: 960px; height:450px;">

    	<!-- Slides Container -->
        <div id="slider-jssor" u="slides" style="position: absolute; top:0 px; left: 0px; cursor: move; width: 960px; height: 400px; overflow: hidden;">
            <div><img u="image" src="resource/ad_cp1.jpg" /></div>
            <div><img u="image" src="resource/ad_cp4.jpg" /></div>       
            <div><img u="image" src="resource/ad_cp10.jpg" /></div>
            <div><img u="image" src="resource/ad_cp3.jpg" /></div>   
            <div><img u="image" src="resource/ad_cp11.jpg" /></div>
            <div><img u="image" src="resource/ad_cp9.jpg" /></div>
            <div><img u="image" src="resource/ad_cp5.gif" /></div>
            <div><img u="image" src="resource/ad_cp6.jpg" /></div>
            <div><img u="image" src="resource/ad_cp12.jpg" /></div>
            <div><img u="image" src="resource/ad_cp7.jpg" /></div>
            <div><img u="image" src="resource/ad_cp13.jpg" /></div>
            <div><img u="image" src="resource/ad_cp8.jpg" /></div>
            <div><img u="image" src="resource/ad_cp2.jpg" /></div>
        </div>

        <!-- Arrow Navigator Skin Begin -->
        <style>
            /* jssor slider arrow navigator skin 03 css */
            /*
            .jssora03l              (normal)
            .jssora03r              (normal)
            .jssora03l:hover        (normal mouseover)
            .jssora03r:hover        (normal mouseover)
            .jssora03ldn            (mousedown)
            .jssora03rdn            (mousedown)
            */
            .jssora03l, .jssora03r, .jssora03ldn, .jssora03rdn
            {
            	position: absolute;
            	cursor: pointer;
            	display: block;
                background: url(resource/slide_arrow.png) no-repeat;
                overflow:hidden;
            }
            .jssora03l { background-position: -3px -33px; }
            .jssora03r { background-position: -63px -33px; }
            .jssora03l:hover { background-position: -123px -33px; }
            .jssora03r:hover { background-position: -183px -33px; }
            .jssora03ldn { background-position: -243px -33px; }
            .jssora03rdn { background-position: -303px -33px; }
        </style>
        <!-- Arrow Left -->
        <span u="arrowleft" class="jssora03l" style="width: 55px; height: 55px; top: 173px; left: 8px;">
        </span>
        <!-- Arrow Right -->
        <span u="arrowright" class="jssora03r" style="width: 55px; height: 55px; top: 173px; right: 8px">
        </span>

        <!-- Bullet Navigator Skin End -->
    	<a style="display: none" href="http://www.jssor.com">javascript</a>
	</div>
</div>


<div class="container_12" style="margin-top: 0px;">
	<table style="table-layout: fixed; margin: 0px auto;">
		<?php
			$db = new DB();
			$db_img = new DB();
			$sql = "SELECT * FROM `product` WHERE 1";
			$db->query($sql);
			$count = 1;
			
			while($result = $db->fetch_array()){
				$sql = "SELECT `url` FROM `image` WHERE p_id=".$result["p_id"];
				$db_img->query($sql);
				$resultimg = $db_img->fetch_array();
				$discount = (round(($result["s_price"]/$result["o_price"]),2)*100);
				if($discount%10==0){
					$discount = $discount/10;
				}
				$discount = $discount."折";
				if($result["goal"] !== "0"){
					$complete_rate = $result["popular"]/$result["goal"]*100;
				}else{
					$complete_rate = 100;
				}
				
				if($count == 1){
					echo "<tr>";
				}
				if($result['isgroup'] == "1"){
					echo "<td class=\"status-group\" style=\"text-align: center;\">\r\n" ;
				}else{
					echo "<td class=\"status-nongroup\" style=\"text-align: center;\">\r\n" ;
				}
				
						echo "<div class=\"panel panel-default cabinet\">\r\n".
							"<div class=\"panel-heading\">\r\n".
								"<div class=\"panel-title\">".mb_substr($result["p_name"], 0, 17, 'utf-8')."</div>\n\r".
							"</div>\r\n".
							"<div class=\"panel-body product-body\" onClick='top.location.href=\"product_info.php?pid=".$result["p_id"]."\"'>".
								"<img src=\"../johogo_backstage/".$resultimg["url"]."\"/>".
								"<table>\n\r".
									"<tr>\n\r".
										"<td>\n\r".
											"<div class=\"s_price\">".$result["s_price"]."</div>\n\r".
											"<span class=\"o_price\">".$result["o_price"]."</span>&nbsp;\n\r".
											"省下<span class=\"save\">".((int)$result["o_price"]-(int)$result["s_price"])."</span>\n\r".
										"</td>\n\r".
										"<td class=\"discount\">\n\r".
											"<div class=\"discount\" style=\"\">".$discount."</div>\n\r".
										"</td>\n\r".
										"<td>\n\r".
											"<div class=\"popular\">".$result["popular"]."</div>人已跟團\n\r".
										"</td>\n\r".
									"</tr>\n\r".
								"</table>\n\r".
								"<div class=\"progress\">\n\r".
									"<div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"".$complete_rate."\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width: ".$complete_rate."%;\">".$complete_rate."%</div>\n\r".
								"</div>\n\r".
							"</div>\n\r".
						"</div>\n\r".
					"</td>\n\r";
				$count++;

				if($count == 4){
					echo "</tr>";
					$count = 1;
				}
			}
		?>
	</table>
</div>

<?php
	require("footer.php");
?>