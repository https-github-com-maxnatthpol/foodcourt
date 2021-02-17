
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require __DIR__.'/mail/vendor/autoload.php';


require_once '../../engine/lib/connect.php';
require_once '../../engine/lib/config.php';
$db = new DB();


//header('Content-Type: text/html; charset=utf-8');

$idcard = $_POST['idcard']; 

$sqlpro2 = "SELECT `OTP` FROM `member` WHERE `id_card`='".$idcard."' ";
$queryPro2 = $db->Query($sqlpro2);
$resultPro2 = mysqli_fetch_array($queryPro2);  

$otp = $resultPro2['OTP'];
$mailname = $_POST['email'];



$name_to_data = '';



$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->CharSet = "utf-8";
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = ''.Host_e_mail;  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = ''.e_mail;                 // SMTP username
    $mail->Password = ''.pass_e_mail;                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, ssl also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    //$mail->SMTPSecure = false;

    //Recipients
    $mail->setFrom(e_mail, from_e_mail);
    $mail->addAddress($mailname , $name_to_data);     // Add a recipient


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'รหัส OTP';
    $mail->Body    = "".$otp;


    // $mail->AddAttachment( 'example_test.pdf' );

    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

   // $mail->send();
    if(!$mail->send()) {
echo 'Message was not sent.';
echo 'ยังไม่สามารถส่งเมลล์ได้ในขณะนี้ ' . $mail->ErrorInfo;
exit;
} else {
echo 'ส่งเมลล์สำเร็จ';
}
    //echo 'Message has been sent';
} catch (Exception $e) {
    //echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}




//}//-----------------------------------------------------------------------------------------









?>