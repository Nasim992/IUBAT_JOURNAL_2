<?php
session_start();
include 'config.php';
include 'functions.php';
include '../mail_functions.php';

    //  ----------------------------------Sending Review --------------------------------------------
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
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-success alert-dismissible" id="message">Review Sent Successfully</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."chiefeditor/rfeedback");
    }
    else {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-success alert-dismissible" id="message">Already Sent</p>
                  </div>
            </div>
        ');
        redirect($BASE_URL."chiefeditor/rfeedback");
    }
}

  //  ----------------------------------Sending Review --------------------------------------------


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
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-success alert-dismissible" id="message">Feedback Removed Successfully</p>
                  </div>
            </div>
        ');
        redirect($BASE_URL."chiefeditor/rfeedback");
      }
      else {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-danger alert-dismissible" id="message">RSomething went wrong</p>
                  </div>
            </div>
        ');
        redirect($BASE_URL."chiefeditor/rfeedback");
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
                set_message('
                <div class="notification-div">
                          <div class="container" id="flash-message">
                          <p class="alert alert-success alert-dismissible" id="message">Feedback Removed Successfully</p>
                          </div>
                    </div>
                ');
                redirect($BASE_URL."chiefeditor/rfeedback");
            }
            else {
                set_message('
                <div class="notification-div">
                          <div class="container" id="flash-message">
                          <p class="alert alert-danger alert-dismissible" id="message">Something Went Wrong</p>
                          </div>
                    </div>
                ');
                redirect($BASE_URL."chiefeditor/rfeedback");
            }
              }
         // Remove as  a Reviewer Section Ends Here 