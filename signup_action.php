<?php
session_start();
require("db_config.php");
require("db_class.php");
include("PHPMailer/class.phpmailer.php");   // 匯入PHPMailer類別      
$db = new DB();
$db->connect_db($_DB['host'], $_DB['username'], $_DB['password'], $_DB['dbname']);

$db->getOnly("SELECT `student_id` FROM member WHERE `student_id`='".$_POST["school_email"]."'");
if($db->get_num_rows()>0){
    header("Content-Type:text/html; charset=utf-8");
    echo "<SCRIPT>";
    echo "alert(\"此會員已註冊過!\");";
    echo "location.href='http://www.idlefox.idv.tw/johogo/index.php';";
    echo "</SCRIPT>";
}else{
    $school_email = $_POST["school_email"];
    $password = $_POST["password"];
    $vfn = md5(rand());

 
    $student_id = $school_email;
    $mail = new PHPMailer();                        // 建立新物件        

    $mail->IsSMTP();                                // 設定使用SMTP方式寄信        
    $mail->SMTPAuth = true;                         // 設定SMTP需要驗證
    $mail->SMTPSecure = "ssl";                      // Gmail的SMTP主機需要使用SSL連線   
    $mail->Host = "smtp.gmail.com";                 // Gmail的SMTP主機        
    $mail->Port = 465;                              // Gmail的SMTP主機的port為465      
    $mail->CharSet = "utf-8";                       // 設定郵件編碼   
    $mail->Encoding = "base64";
    $mail->WordWrap = 50;                           // 每50個字元自動斷行 
    $mail->Username = "johogo.help@gmail.com";     // 設定驗證帳號        
    $mail->Password = "fourteen";              // 設定驗證密碼              
    $mail->From = "johogo.help@gmail.com";         // 設定寄件者信箱        
    $mail->FromName = "Johogo";                 // 設定寄件者姓名         
    $mail->Subject = "Johogo註冊認證信";                     // 設定郵件標題              
    $mail->IsHTML(true);                            // 設定郵件內容為HTML        
    // $mail->SMTPDebug = 1;                        //Debug tool
    $mailList =       // 代表收件者資訊的陣列   (信箱, 姓名, 代碼)
        array(
            array($student_id."@nccu.edu.tw","Johogo註冊者"),
        );
        
    foreach ($mailList as $receiver) {
        $mail->AddAddress($receiver[0], $receiver[1]);  // 收件者郵件及名稱 
        $mail->Body =                                   // AddAddress(receiverMail, receiverName)
            "
                親愛的Johogo使用者您好:
                <br>
                感謝您成為Johogo的眾多使用者之一，請點選下方連結來進行認證。
                <br>
                <a href=\"http://www.idlefox.idv.tw/johogo/verification.php?vfn=".$vfn."&id=".$student_id."\">點此來認證!</a>
            ";
        if($mail->Send()) {                             // 郵件寄出
            header("Content-Type:text/html; charset=utf-8");
            echo "<SCRIPT>";
            echo "alert(\"已成功寄出註冊認證信!\");";
            echo "location.href='http://www.idlefox.idv.tw/johogo/index.php';";
            // echo "document.location.href=\"http://www.idlefox.idv.tw/jogogo/index.php\";";
            echo "</SCRIPT>";
            $sql = "INSERT INTO `johogo`.`member` (`student_id`, `password`,`verification`,`isverified`) VALUES ('".$school_email."', '".$password."','".$vfn."','0')";
            $db->query($sql);
        } else {
            echo $mail->ErrorInfo . "<br/>";
        }             

    }    
}

?>