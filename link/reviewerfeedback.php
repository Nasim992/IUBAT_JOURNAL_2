<?php 

      // Reviewer Paper Section Starts Here
      if(isset($_POST['reviewer-feedbacks'])) {
        $paperid = $_POST['paperid'];
      }

      if(isset($_POST['reviewer-submit'])) {
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
        $sqlreviewer="update reviewertable set feedback='".escape($feedback)."',feedbackfile='$namereviewer',feedbackdate='$feedbackdate' where paperid='$paperid' and primaryemail='$email'";

        if(mysqli_query($link, $sqlreviewer))
        {
          move_uploaded_file($filetmpreviewer,"../documents/review/".$namereviewer);

        //   Select mail 
        $chiefeditor = "SELECT * FROM chiefeditor";
        $resultchiefmail = mysqli_query($link,$chiefeditor);  
        $filechiefmail = mysqli_fetch_assoc($resultchiefmail);
        $chiefmail = $filechiefmail['email'];
        // Select mail 
        // Select editor mail 
        $academiceditorshowing = array();
        $sqlacademiceditor = "SELECT editortable.id,editortable.paperid,editortable.primaryemail from editortable Where paperid='$paperid'";
        $queryacademiceditor = $dbh->prepare($sqlacademiceditor); 
        $queryacademiceditor ->execute(); 
        $resultacademiceditor=$queryacademiceditor ->fetchAll(PDO::FETCH_OBJ); 
        $cnt=1;
        
        if($queryacademiceditor->rowCount() > 0) 
        {
        foreach($resultacademiceditor as $result) 
        { 
        $usernameeditor = htmlentities($result->primaryemail);
        array_push($academiceditorshowing,$usernameeditor);
        }}
        $alleditoremail = implode(',',$academiceditorshowing);
        // Select editor mail  
        $to_mail = "$chiefmail";
        //   Reviewed messages sending
        include '../mailmessage/rfeedbackmail.php';
        send_mail($chiefmail, $subject, $msg,$FORM_EMAIL,$FORM_EMAIL_PASS);
        //  Reviewed messages sending 
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-success alert-dismissible" id="message">Feedback Sent Successfully</p>
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
          echo "<script type='text/javascript'> document.location = 'reviewerfeedback'; </script>";
        }
      }
      // Reviewer Paper Section Ends Here 