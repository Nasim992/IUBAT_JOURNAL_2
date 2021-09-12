<?php 
  // Reviewer Paper Section Starts Here
  if(isset($_POST['edit-feedbacks'])) {
    $paperid = $_POST['paperid'];
  }

  if(isset($_POST['editor-update'])) {
    $paperid = $_POST['paperid'];
    $email = $_POST['authoremail']; 
    $feedbackinput = $_POST['reviewer-review'];
    $feedbackdateinput = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 0, date('Y')));

           // Full pdf if necessary info file section starts Here 
           $filereviewer = $_FILES['reviewerfile'];
           $namereviewer = $_FILES['reviewerfile']['name']; 
           $filetmpreviewer = $_FILES['reviewerfile']['tmp_name'];
           $typereviewer = $_FILES['reviewerfile']['type'];
           // Full pdf if necessary info  File section ends here

    // Select Previous review of this paper 
    $sqlselectpfeedback = "SELECT * FROM editortable WHERE  paperid= '$paperid' and primaryemail='$email'";
    $resultpfeedback = mysqli_query($link,$sqlselectpfeedback); 
    $filepfeedback = mysqli_fetch_assoc($resultpfeedback);
     $pfeedback = unserialize($filepfeedback['feedback']);
     $pfeedbackfname = $filepfeedback['feedbackfile'];
     $pfeedbackdate = unserialize($filepfeedback['feedbackdate']);
    // Select Previous review of this paper  
      if(empty($namereviewer )) {
        $pfeedbackfname = $filepfeedback['feedbackfile'];
      }
      else  {
        $pfeedbackfname = $namereviewer;
        $filefpath = '../documents/review/'.$pfeedbackfname;
        unlink( $filefpath);
      }
     array_push($pfeedback,$feedbackinput);
     array_push($pfeedbackdate,$feedbackdateinput);
    $feedback = serialize($pfeedback);
    $feedbackdate = serialize($pfeedbackdate);

    $sqlreviewer="update editortable set feedback='".escape($feedback)."',feedbackfile='$pfeedbackfname',feedbackdate='$feedbackdate' where paperid='$paperid' and primaryemail='$email'"; 

    if(mysqli_query($link, $sqlreviewer))
    {
      move_uploaded_file($filetmpreviewer,"../documents/review/".$namereviewer);

      set_message('
      <div class="notification-div">
                <div class="container" id="flash-message">
                <p class="alert alert-success alert-dismissible" id="message">Feedback sent Successfully</p>
                </div>
          </div>
      ');
      echo "<script type='text/javascript'> document.location = 'reviewedpaper'; </script>";
    }
    else {
      set_message('
      <div class="notification-div">
                <div class="container" id="flash-message">
                <p class="alert alert-warning alert-dismissible" id="message">Something went wrong</p>
                </div>
          </div>
      ');
      echo "<script type='text/javascript'> document.location = 'reviewedpaper'; </script>";
    }

  }
  // Reviewer Paper Section Ends Here 

