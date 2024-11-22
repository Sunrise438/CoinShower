<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require_once __DIR__.'/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    
function sendMail($subject, $body, $to){
    $msql = "SELECT * FROM mail WHERE id = '1'";
    $mresult = $GLOBALS['conn']->query($msql);
    $mrow = $mresult->fetch_assoc();
    
    if(!$mrow['status']){
        return 0;
    }

    $secure = $mrow['secure'];
    $host = $mrow['host'];
    $mailuname = $mrow['uname'];
    $mailpass = $mrow['pass'];
    $mailfrom = $mrow['sender'];
    $fromName = $mrow['sender_name'];
    $port = $mrow['port'];
    $is_smtp = $mrow['is_smtp'];
    $mail_status = $mrow['status'];

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions

        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        if($is_smtp){
            $mail->isSMTP();
        }                                         // Set mailer to use SMTP
        $mail->Host = $host;  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $mailuname;                 // SMTP username
        $mail->Password = $mailpass;                           // SMTP password
        $mail->SMTPSecure = $secure;                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = $port;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom($mailuname, $fromName); 

    $mail->addAddress($to);     // Add a recipient    // Name is optional
    
    $footer = '<a href="'.$GLOBALS['site_info_row']['site_url'].'"><b>'.$GLOBALS['site_info_row']['site_name'].'</b></a>';
    
    $body = $body.'<br><br>'.$footer;

    //Content
    $mail->isHTML(true);     // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = $body;

    if ($mail_status){
        if ($mail->send()){
           return 1;
       }else  {
           return 0;;
       }

    } else {
        return 0;
    }

}