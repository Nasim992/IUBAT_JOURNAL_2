<?php 
// ----------------------------------------------------------------------------------------------------------------------
// Function send Mail
function send_mail($to,$subject,$message){
    // $headers = 'From: no-reply@bcsshomprity.com' . "\r\n" . 
    
    //     'Reply-To: no-reply@bcsshomprity.com' . "\r\n" . 
    
    //     'X-Mailer: PHP/' . phpversion(); 
    
    //  mail($to, $subject, $message, $headers); 
    include('smtp/PHPMailerAutoload.php');
    
    $mail = new PHPMailer();
    $mail->IsSMTP();        
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = " according your domain ";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "journal@iubat.net";
    $mail->Password = " what you have given ";
    $mail->SetFrom("journal@iubat.net");
    $mail->Subject = $subject;
    $mail->Body =$msg;
    $mail->AddAddress($to);
    $mail->SMTPOptions=array('ssl'=>array(
    'verify_peer'=>false,
    'verify_peer_name'=>false,
    'allow_self_signed'=>false
    ));

    if(!$mail->Send()){
        return 0;
    }else{
        return 1;
    }

}
// ----------------------------------------------------------------------------------------------------------------------