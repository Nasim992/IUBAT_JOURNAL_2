<?php 

// use PHPMailer\PHPMailer\PHPMailer;
// ----------------------------------------------------------------------------------------------------------------------
// Function send Mail
function send_mail($to,$subject,$message,$FORM_EMAIL,$FORM_EMAIL_PASS){

    $headers = "Content-type: text/html\r\n";

    $headers .= 'From:'.$FORM_EMAIL . "\r\n" . 
    
        'Reply-To:'.$FORM_EMAIL . "\r\n" . 
    
        'X-Mailer: PHP/' . phpversion(); 
    
     return mail($to, $subject, $message, $headers); 


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

}
// ----------------------------------------------------------------------------------------------------------------------