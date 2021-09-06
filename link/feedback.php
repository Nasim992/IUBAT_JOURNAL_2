<?php 

  // Sending Review to the author section starts here  
  if(isset($_POST['send-review']))
  {
      $paperid = $_POST['paperid']; 
      $username = $_POST['username'];
      $primaryemailauthor = $_POST['primaryemailauthor'];
      
      $action = 1;
      $sql="update reviewertable set permits=$action where paperid='$paperid' and username='$username'";
      if(mysqli_query($link, $sql))
      {
                // Send Review Message Section Starts Here 
                include '../mailmessage/sendreview.php';
                // Send Review Message Section Ends Here 
      send_mail($primaryemailauthor, $subject, $msg,$FORM_EMAIL,$FORM_EMAIL_PASS);
      echo "<script>alert('Send this Review to the author Successfully.');</script>";
        header("refresh:0;url=feedback");
        exit;
      }
      else {
          echo "<script>alert('Already sent!');</script>";
          header("refresh:0;url=feedback");
          exit;
      }
  }
  
// Sending Review to the author section ends here 



 //  Remove as a Reviewer section starts Here 

 if(isset($_POST['reviewer-remove-feedback'])) {
   $paperid = $_POST['paperid'];
   $username = $_POST['username'];
   $filepathreviewer = $_POST['reviewpaperpath'];

   $action = 1;
   $action0=0;
   $feedback = NULL;
   $feedbackdate = NULL;
   $feedbackfile = NULL;
   $permits = NULL;
   $sqlremovereview="update reviewertable set feedback='$feedback',feedbackdate='$feedbackdate',feedbackfile='$feedbackfile',permits='$permits' where paperid='$paperid' and username='$username'";

   if(mysqli_query($link, $sqlremovereview))
   {
     unlink($filepathreviewer);
   echo "<script>alert('Feedback Removed Successfully for this paper.');</script>";
     header("refresh:0;url=feedback");
     exit;
   }
   else {
       echo "<script>alert('Something went wrong');</script>";
       header("refresh:0;url=feedback");
       exit;
   }


     }

     if(isset($_POST['editor-remove-feedback'])) {
         $paperid = $_POST['paperid'];
         $username = $_POST['username'];
   
         $action = 1;
         $action0=0;
         $feedback = NULL;
         $sqlremoveedit="update editortable set feedback='$feedback' where paperid='$paperid' and username='$username'";
   
         if(mysqli_query($link, $sqlremoveedit))
         {
         echo "<script>alert('Feedback Removed Successfully for this paper.');</script>";
           // header("refresh:0;url=reviewerdetails");
         }
         else {
             echo "<script>alert('Something went wrong');</script>";
             // header("refresh:0;url=reviewerdetails");
         }
      
   
           }
      // Remove as  a Reviewer Section Ends Here 
