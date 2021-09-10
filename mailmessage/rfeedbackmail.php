<?php
$subject = "Paper Reviewed";

$msg = "$paperid - this paper has been reviewed.
Please login to see the feedback of the reviewer -- $BASE_URL.login";
    
$msg = "
<html>
<body>
  <h1><b>YOUR PAPER HAS BEEN REVIEWED !</b></h1>
  <p>Your paper <b>$paperid</b> has been Reviewed by IUBAT Review.
  </p><br>

  <p> Please Click on the link below and give your new password for resetting your password.</p><br>
  <a style='text-decoration:none;
            font-size:18px; 
            color:white;
            background-color:black;
            padding:10px;
            border:none;
            border-radius:10px;
            font-weight:bold;
            'href='$BASE_URL_2/layout/login'>CLICK HERE TO LOG IN
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
</body>
</html>

";