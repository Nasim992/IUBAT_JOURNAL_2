<?php 
$subject = "RESET YOUR PASSWORD";
$msg = "
  <p> Please Click on the link below and give your new password for resetting your password.</p><br>
   <a style='text-decoration:none;
             font-size:18px; 
             color:white;
             background-color:#c30000;
             padding:10px;
             border:none;
             border-radius:10px;
             font-weight:bold;
             'href='$BASE_URL_2/message/resetpassword.php?email=$pemail&token=$validation_code_password'>CLICK HERE TO RESET YOUR PASSWORD
   </a>
   <br>
   <hr>
  <p>
   <i>
   <b>
   IUBAT Review<br>
   A Multidisciplinary Academic Journal<br>
   </b>
    <img height='100px' width='100px'src='https://iubat.edu/wp-content/uploads/2019/01/Iubat-logo-300x263.png'>
   </i>
  </p>
";
?>