<?php 

if(isset($_POST['reviewer-feedbacks'])) {
    $paperid = $_POST['paperid'];
  }

  if(isset($_POST['editor-submit'])) {
    $paperid = $_POST['paperid'];
    $email = $_POST['authoremail'];
    $feedbackin = $_POST['reviewer-review'];
    $feedbackdatein = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 0, date('Y')));

      // Full pdf if necessary info file section starts Here 
      $filereviewer = $_FILES['reviewerfile'];  
      $namereviewer = $_FILES['reviewerfile']['name'];
      $filetmpreviewer = $_FILES['reviewerfile']['tmp_name'];
      $typereviewer = $_FILES['reviewerfile']['type'];
      // Full pdf if necessary info  File section ends here
   $feedback = serialize(array($feedbackin));
   $feedbackdate = serialize(array($feedbackdatein));
    $sqlreviewer="update editortable set feedback='".escape($feedback)."',feedbackdate='$feedbackdate',feedbackfile='$namereviewer' where paperid='$paperid' and primaryemail='$email'";

    if(mysqli_query($link, $sqlreviewer))
    {
      move_uploaded_file($filetmpreviewer,"../documents/review/".$namereviewer);
      echo "<script>alert('Feedback Sent Successfully');</script>";
      header("refresh:0;url=reviewedpaper");
      exit;
    }
    else {
      echo "<script>alert('Something went wrong');</script>";
      header("refresh:0;url=reviewedpaper");
      exit;
    }

  }
  // Reviewer Paper Section Ends Here 