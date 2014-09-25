<?php
require("db_config.php");
require("db_class.php");
session_start();

$data = array();
$data_tmp = array();
    // get request
    if(!is_null($_POST['m_id'])){
        // $_POST['student_id'] = "100306020";
        $sql = "SELECT * FROM follow, product WHERE follow.p_id = product.p_id And `student_id` = '".$_SESSION["authen"]."'";
        $db = new DB();
        $db->query($sql);
        while($result = $db->fetch_array()){
            $data_tmp['f_status'] = $result["f_status"];
            $data_tmp['student_id'] = $result["student_id"];
            $data_tmp['p_id'] = $result['p_id'];
            $data_tmp['datetime'] = $result['datetime'];
            $data_tmp['product_name'] = $result["p_name"];
            $data_tmp['category'] = $result['category_1'];
            $data_tmp['goal'] = $result['goal'];
            $data_tmp['s_price'] = $result['s_price'];
            $data_tmp['o_price'] = $result['o_price'];
            $data_tmp['c_account'] = $result['c_account'];
            $data_tmp['popular'] = $result['popular'];

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
        echo "<td>追蹤狀態</td>";
        echo "<td>產品類別</td>";
        echo "<td>產品目標</td>";
        echo "<td>產品人氣</td>";
        echo "<td>特價</td>";
        echo "<td>原價</td>";
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
            echo "<td>";
            echo "<img style=\"width:30px;\" src=\"../johogo_backstage/".$data[$i]["imgurl"]."\">";
            echo $data[$i]["product_name"];
            echo "</td>";
            echo "<td>";
            echo $data[$i]['f_status'];
            echo "</td>";
            echo "<td>";
            echo $data[$i]["category"];
            echo "</td>";
            echo "<td>";
            echo $data[$i]["goal"];
            echo "</td>";
            echo "<td>";
            echo $data[$i]["popular"];
            echo "</td>";
            echo "<td>";
            echo $data[$i]["s_price"];
            echo "</td>";
            echo "<td>";
            echo $data[$i]["o_price"];
            echo "</td>";
            echo "<td>";
            echo $data[$i]["c_account"];
            echo "</td>";
            echo "<td>";
            if($data[$i]['f_status']=='y'){
                echo "<button onclick=\"Query_update(this,'smFSN',null,'".$data[$i]["p_id"]."','".$data[$i]["datetime"]."')\">取消跟團</button>";    
            }else{
                echo "<button onclick=\"Query_update(this,'smFSY',null,'".$data[$i]["p_id"]."','".$data[$i]["datetime"]."')\">回復跟團</button>";    
            }
            
            echo "<button onclick=\"Query_delete(this,'sdF',null,'".$data[$i]["p_id"]."','".$data[$i]["datetime"]."')\">刪除記錄</button>";
            echo "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
    // print_r($data);

?>