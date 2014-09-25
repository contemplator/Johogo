<?php
require("db_config.php");
require("db_class.php");
session_start();

$data = array();
$data_tmp = array();
    // get request
    if(!is_null($_POST['m_id'])){
        // $_POST['student_id'] = "100306020";
        $sql = "SELECT * FROM buy, product WHERE buy.product_id = product.p_id And `student_id` = '".$_SESSION["authen"]."'";
        $db = new DB();
        $db->query($sql);
        while($result = $db->fetch_array()){
            $data_tmp['b_status'] = $result["b_status"];
            $data_tmp['student_id'] = $result["student_id"];
            $data_tmp['p_id'] = $result['p_id'];
            $data_tmp['datetime'] = $result['datetime'];
            $data_tmp['number'] = $result['number'];
            $data_tmp['product_name'] = $result["p_name"];
            $data_tmp['category'] = $result['category_1'];
            $data_tmp['matruity'] = $result['matruity'];
            $data_tmp['payway'] = $result['payway'];
            $data_tmp['paycode'] = $result['paycode'];
            $data_tmp['c_account'] = $result['c_account'];
            // $data_tmp['popular'] = $result['popular'];

            $sql_img = "SELECT `url` FROM `image` WHERE `p_id`='".$result["p_id"]."'";
            $db_img = new DB();
            $db_img->query($sql_img);
            while($result_img = $db_img->fetch_array()){
                $data_tmp['imgurl'] = $result_img["url"];
            }
            array_push($data, $data_tmp);
        }
    }
    echo "<table class=\"table table-bordered table-hover\">";
    echo "<thead>";
    echo "<tr>";
        echo "<td>時間</td>";
        echo "<td>產品名稱</td>";
        echo "<td>購買狀態</td>";
        echo "<td>訂購數量</td>";
        echo "<td>訂購日期</td>";
        echo "<td>交易方式</td>";
        echo "<td>訂購期限</td>";
        echo "<td>交易代碼</td>";
        echo "<td>公司名稱</td>";
        echo "<td>功能</td>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    for($i=0;$i<sizeof($data);$i++){
        echo "<tr>";
            echo "<td>";
            echo $data[$i]["datetime"];
            echo "</td>";
            echo "<td style=\"text-align:left;\">";
            echo "<img style=\"width:30px;\" src=\"../johogo_backstage/".$data[$i]["imgurl"]."\">";
            echo $data[$i]["product_name"];
            echo "</td>";
            echo "<td>";
            echo $data[$i]['b_status'];
            echo "</td>";
            echo "<td>";
            echo $data[$i]["number"];
            echo "</td>";
            echo "<td>";
            echo $data[$i]["datetime"];
            echo "</td>";
            echo "<td>";
            echo $data[$i]["payway"];
            echo "</td>";
            echo "<td>";
            echo $data[$i]["matruity"];
            echo "</td>";
            echo "<td>";
            if((isset($data[$i]["paycode"]))&&(trim($data[$i]["paycode"])!="")){
            	echo $data[$i]["paycode"];
            }else{
            	echo "<button>取得代碼</button>";
            }
            echo "</td>";
            echo "<td>";
            echo $data[$i]["c_account"];
            echo "</td>";
            echo "<td>";
            echo "<button>聯絡廠商</button>";
            if($data[$i]['b_status']=='y'){
                echo "<button onclick=\"Query_update(this,'smBSN',null,'".$data[$i]["p_id"]."','".$data[$i]["datetime"]."')\">取消訂購</button>";    
            }else{
                echo "<button onclick=\"Query_update(this,'smBSY',null,'".$data[$i]["p_id"]."','".$data[$i]["datetime"]."')\">回復訂購</button>";
            }
            
            echo "<button onclick=\"Query_delete(this,'sdB',null,'".$data[$i]['p_id']."','".$data[$i]["datetime"]."')\">刪除記錄</button>";
            echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    // print_r($data);

?>