<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require __DIR__.'/mail/vendor/autoload.php';

require_once '../../engine/lib/connect.php';
require_once '../../engine/lib/config.php';
$db = new DB ();

header('Content-Type: text/html; charset=utf-8');

$mailname = $_POST['email_data'];

$name_data = $_POST['name_data'];

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->CharSet = "utf-8";
    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = Host_e_mail;					          // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = e_mail;            				  // SMTP username
    $mail->Password = pass_e_mail;               		  // SMTP password
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
    $mail->addAddress($mailname , $name_data);     // Add a recipient


    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['subject_data'];
    $mail->Body    = "  
  
  
  
  <table border='0' cellpadding='0' cellspacing='0' width='100%'> 
        <tr>
            <td style='padding: 10px 0 30px 0;'>
                <table align='center' border='0' cellpadding='0' cellspacing='0' width='800' style='border: 1px solid #cccccc; border-collapse: collapse;'>
                    <tr>
                        <td align='center' bgcolor='#70bbd9' style='padding: 40px 0 30px 0; color: #153643; font-size: 28px; font-weight: bold; font-family: Sarabun, sans-serif;'>
                            ".from_e_mail."
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor='#ffffff' style='padding: 40px 30px 40px 30px;'>
                            <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                <tr>
                                    <td style='color: #153643; font-family: Sarabun, sans-serif; font-size: 24px;'>
                                        <b>หัวข้อ</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='padding: 20px 0 30px 0; color: #153643; font-family: Sarabun, sans-serif; font-size: 16px; line-height: 20px;'>
                                        ".$_POST['subject_data']."
                                    </td>
                                </tr>
                            </table><hr>
							<table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                <tr>
                                    <td style='color: #153643; font-family: Sarabun, sans-serif; font-size: 24px;'>
                                        <b>ข้อความ (รายละเอียด)</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='padding: 20px 0 30px 0; color: #153643; font-family: Sarabun, sans-serif; font-size: 16px; line-height: 20px;'>
                                        ".$_POST['detail_data']."
                                    </td>
                                </tr>
                            </table><hr>
							<table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                <tr>
                                    <td style='color: #153643; font-family: Sarabun, sans-serif; font-size: 24px;'>
                                        <b>ข้อความ การตอบกลับ</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style='padding: 20px 0 30px 0; color: #153643; font-family: Sarabun, sans-serif; font-size: 16px; line-height: 20px;'>
                                        ".$_POST['mass_to_reply']."
                                    </td>
                                </tr>
                            </table><hr>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor='#ee4c50' style='padding: 30px 30px 30px 30px;'>
                            <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                                <tr>
                                    <td style='color: #ffffff; font-family: Sarabun, sans-serif; font-size: 14px;' width='75%'>
                                        Copyright &copy; ".Copyright_Year." All Right Reserved.<br/>
                                        Designed by <a href='".link_e_mail."' class='color-w1'>".from_e_mail."</a>
                                    </td>
                                    <td align='right' width='25%'>
                                        <table border='0' cellpadding='0' cellspacing='0'>
                                            <tr>
                                                <td style='font-size: 0; line-height: 0;' width='20'>&nbsp;</td>
                                                <td style='font-family: Sarabun, sans-serif; font-size: 12px; font-weight: bold;'>
                                                    <a href='".facebook_e_mail."' style='color: #ffffff;'>
                                                        <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/210284/fb.gif' alt='Facebook' width='38' height='38' style='display: block;' border='0' />
                                                    </a>
                                                </td>
												<td style='font-size: 0; line-height: 0;' width='20'>&nbsp;</td>
                                                <td style='font-family: Sarabun, sans-serif; font-size: 12px; font-weight: bold;'>
                                                    <a href='".link_e_mail."' style='color: #ffffff;'>
                                                        <img src='https://www.tnsgrand.com/wp-content/uploads/2019/03/Untitled-22.png' alt='Facebook' width='38' height='38' style='display: block;' border='0' />
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
  
    ";
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