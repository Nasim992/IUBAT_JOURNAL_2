<?php 
include 'link/config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//require 'vendor/autoload.php';

// use PHPMailer\PHPMailer\PHPMailer;

function send_mail($to,$subject,$message,$FORM_EMAIL,$FORM_EMAIL_PASS){
     global $FORM_EMAIL_HOST;

 // Normal Php Mail Functions 
// ----------------------------------------------------------------------------------------------------------------------
    // $headers = "Content-type: text/html\r\n";

    // $headers .= 'From:'.$FORM_EMAIL . "\r\n" . 
    
    //     'Reply-To:'.$FORM_EMAIL . "\r\n" . 
    
    //     'X-Mailer: PHP/' . phpversion(); 
    
    //  return mail($to, $subject, $message, $headers); 
//-----------------------------------------------------------------------------------------------------------------

    // include('smtp/PHPMailerAutoload.php');
    // $mail = new PHPMailer();
    // $mail->IsSMTP();        
    // $mail->SMTPAuth = true;
    // $mail->SMTPSecure = 'tls';
    // $mail->Host = " according your domain ";
    // $mail->Port = 587;
    // $mail->IsHTML(true);
    // $mail->CharSet = 'UTF-8';
    // $mail->Username = "journal@iubat.net";
    // $mail->Password = " what you have given ";
    // $mail->SetFrom("journal@iubat.net");
    // $mail->Subject = $subject;
    // $mail->Body =$msg;
    // $mail->AddAddress($to);
    // $mail->SMTPOptions=array('ssl'=>array(
    // 'verify_peer'=>false,
    // 'verify_peer_name'=>false,
    // 'allow_self_signed'=>false
    // ));

    // if(!$mail->Send()){
    //     return 0;
    // }else{
    //     return 1;
    // }


// Php Mailer section starts
//--------------------------------------------------------------------------------------------------
    //Load Composer's autoloader
    require 'vendor/autoload.php';
   //Create an instance; passing `true` enables exceptions
   $mail = new PHPMailer(true);

    //Server settings
   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //Enable verbose debug output
    $mail->isSMTP();                                           //Send using SMTP
    $mail->Host       = $FORM_EMAIL_HOST;                      //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $FORM_EMAIL;                            //SMTP username
    $mail->Password   = $FORM_EMAIL_PASS;                       //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    //Recipients
    $mail->setFrom($FORM_EMAIL, 'IUBAT Journal');
    $mail->addAddress($to, 'Dear');     //Add a recipient
    $mail->addReplyTo($FORM_EMAIL, 'IUBAT Journal');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');


    //Content
    $mail->isHTML(true);                                      //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;

    return ($mail->send());
}
// ----------------------------------------------------------------------------------------------------------------------