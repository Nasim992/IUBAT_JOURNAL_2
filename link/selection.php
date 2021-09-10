<?php 
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Paper description showing section starts here 
 
$idstr=strval($_GET['id']);
// Check that the id is available or not in the database 
$querypublished = "SELECT COUNT(*) as total_available FROM paper WHERE paperid='$idstr'";
$stmt = $dbh->prepare($querypublished);     
// execute query
$stmt->execute();       
// get total rows
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$total_available = $row['total_available'];
// Check that the id is available or not in the database


$unpublished = $idstr[-1];

$paperid=rtrim($_GET['id'],"u");

if (!empty($_GET['id'])) {
    if($total_available==0) {
        echo "<script>alert('This id is not available');</script>";
        echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
    } 
}
if(empty($_GET['id'])) {
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">Id is not Available</p>
              </div>
        </div>
    ');
    echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
}


$paperid=rtrim($_GET['id'],"u");

$sql = "SELECT * FROM paper WHERE paperid = '$paperid' and action=0";
$result = mysqli_query($link,$sql);
$file = mysqli_fetch_assoc($result);

// Title File and Abstract Section Starts Here
$filepathtitle = '../documents/file1/'.$file['name1'];
$filepathmessagetitle = 'documents/file1/'.$file['name1'];
$filename1 = $file['name1'];
$type1 = $file['type1']; 
// Title File and Abstract Section Ends Here 

// Title second Section Starts Here
$filepathsecond = '../documents/file2/'.$file['name2'];
$filepathmessageseconod = 'documents/file2/'.$file['name2'];
$filename2 = $file['name2'];
$type2 = $file['type2']; 
// Title Second Section Ends Here 

// Main File Uploaded Section starts here 
$filepath = '../documents/'.$file['name'];
$filepathmessage = 'documents/'.$file['name'];
$filename = $file['name'];
$type = $file['type']; 
// Main File Uploaded Section Ends Here 

// Resubmit paper Section starts here 
$filepathresubmit = '../documents/resubmit/'.$file['resubmitpaper'];
$filepathmessageresubmit = 'documents/resubmit/'.$file['resubmitpaper'];
$filenameresubmit = $file['resubmitpaper'];
// Resubmit paper Section Ends Here 



$papername = $file['papername'];
$authormail = $file['authoremail'];
$abstract = $file['abstract'];
$numberofcoauthor = $file['numberofcoauthor'];

$uploaddatestring = $file['uploaddate'];

$maindate = date("d-M-Y",strtotime($uploaddatestring ));;

$cauname = unserialize($file['coauthorname']);


// Select Author name Section Starts here 
$sql1 = "SELECT * FROM author WHERE  primaryemail= '$authormail' ";

$result1 = mysqli_query($link,$sql1); 

$file1 = mysqli_fetch_assoc($result1);
 
$title = $file1['title'];
$fname= $file1['firstname'];
$middlename= $file1['middlename'];
$lastname= $file1['lastname'];

$authorname = $title.' '.$fname.' '.$middlename.' ' .$lastname;
// Select Author Name Section Ends Here 

// Paper description showing section ends here 

// Accept Paper section starts Here
  
if(isset($_POST['accept-paper']))
{
    $paperid = $_POST['acceptid']; 
    $action = 1;

    $pdate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 0, date('Y')));

    $sql="update paper set action=$action,pdate='$pdate',reject=NULL,rejectdate=NULL where paperid='$paperid' ";

    if(mysqli_query($link, $sql))
    {
    //Accepted paper  Starts Here  
    include '../mailmessage/acceptpaper.php';
    // Accepted paper Section Ends Here 
      send_mail($authormail, $subject, $msg,$FORM_EMAIL,$FORM_EMAIL_PASS);
      set_message('
      <div class="notification-div">
                <div class="container" id="flash-message">
                <p class="alert alert-success alert-dismissible" id="message">Paper Accepted</p>
                </div>
          </div>
      ');
      echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
    }
    else {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-success alert-dismissible" id="message">Paper is already accepted</p>
                  </div>
            </div>
        ');
        echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";

    }
}
// Accept Paper section ends here
// Reject paper section starts here 

if(isset($_POST['reject-paper']))
{ 
    $paperid = $_POST['rejectid'];
    $action = 1;
 
    $rejectdate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 0, date('Y')));


    $sql="update paper set action=0,pdate=NULL,reject=$action,rejectdate='$rejectdate' where paperid='$paperid' ";

    if(mysqli_query($link, $sql))
    {
    //Accepted paper  Starts Here 
    include '../mailmessage/rejectpaper.php';
    // Accepted paper Section Ends Here 
      send_mail($authormail, $subject, $msg, $FORM_EMAIL,$FORM_EMAIL_PASS);
      set_message('
      <div class="notification-div">
                <div class="container" id="flash-message">
                <p class="alert alert-success alert-dismissible" id="message">Paper is rejected</p>
                </div>
          </div>
      ');
      echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
    }
    else {
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">Something went wrong</p>
              </div>
        </div>
    ');
    echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
    }
} 

// Reject paper section ends here 

// Sending Review to the author section starts here 
if(isset($_POST['send-review']))
{ 
    $paperid = $_POST['paperidrev'];
    $primaryemail = $_POST['primaryemailrev'];
    $authornamsender = $_POST['authorenamsender'];
    $authoremailsender = $_POST['authoremailrev'];
    $action = 1;

    // Send Review Message Section Starts Here 
    include '../mailmessage/sendreview.php';
    // Send Review Message Section Ends Here 
    $sql="update reviewertable set permits=$action where paperid='$paperid' and primaryemail='$primaryemail' ";
    if(mysqli_query($link, $sql))
    {
    send_mail($authoremailsender, $subject, $msg, $FORM_EMAIL,$FORM_EMAIL_PASS);
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-success alert-dismissible" id="message">Review sent Successfully</p>
              </div>
        </div>
    ');
    echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
    }
    else {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Already sent</p>
                  </div>
            </div>
        ');
        echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
    }
}
// Sending Review to the author section ends here 



// Reviewer Selection Section starts here 
if(isset($_POST['select-reviewer']))
{
    $usernameauthor = $_POST['authornameselect']; 
    $pemail = $_POST['primaryemail'];
    // echo $usernameauthor;
    $sqlauthorselect = "SELECT primaryemail FROM author WHERE username = '$usernameauthor'";
    $resultauthorselect = mysqli_query($link,$sqlauthorselect);
    $fileauthorselect = mysqli_fetch_assoc($resultauthorselect);
    $primaryemail = $fileauthorselect['primaryemail'];

    $assigndate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 0, date('Y')));
    $endingdate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 7, date('Y')));

    $sqlinsert="INSERT INTO reviewertable (paperid,username,primaryemail,assigndate,endingdate) VALUES('$paperid','$usernameauthor','$primaryemail','$assigndate','$endingdate')";

    $reviewerselection =1;
    $sqlupdatereviewer = "update author set reviewerselection=$reviewerselection where username = '$usernameauthor' ";
     
    if(mysqli_query($link, $sqlinsert) and (mysqli_query($link, $sqlupdatereviewer)))
    {
 
      // Sending Messages that selected as a reviewer section starts here.
      include '../mailmessage/reviewerselected.php';
      // Sending Messages that selected as a reviewer section ends 
      send_mail($pemail, $subject, $msg, $FORM_EMAIL,$FORM_EMAIL_PASS);
      set_message('
      <div class="notification-div">
                <div class="container" id="flash-message">
                <p class="alert alert-success alert-dismissible" id="message">Request sent Success</p>
                </div>
          </div>
      ');
      echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
    }
    else {
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">Something went wrong</p>
              </div>
        </div>
    ');
    echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";

    }
}
// Reviewer Selection Section Ends Here 


// Select Reviewer Outside  Section
if(isset($_POST['select-reviewer-outside']))
{
    $pname = $_POST['outsideName'];
    $pemail = $_POST['email'];

    if(is_author_available($pemail) > 0) {
        echo "<script type='text/javascript'>alert('User is already registered');</script>";
    }else {
    //  Count that same email and paper id is availale or not 
    $querypublished = "SELECT COUNT(*) as total_rowspublished FROM reviewertable WHERE paperid='$paperid' and primaryemail='$pemail'";
    $stmt = $dbh->prepare($querypublished);     
    // execute query
    $stmt->execute();       
    // get total rows 
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $total_checkpaper = $row['total_rowspublished'];
    // Count that same email and paper is is available or not 
     if($total_checkpaper==0) {

    $assigndate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 0, date('Y')));
    $endingdate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 7, date('Y')));

    $sqlinsert="INSERT INTO reviewertable (paperid,primaryemail,assigndate,endingdate) VALUES('$paperid','$pemail','$assigndate','$endingdate')";

    if(mysqli_query($link, $sqlinsert))
    {
      // Sending Messages that selected as a reviewer section starts here.
      include '../mailmessage/reviewerselected.php';
      // Sending Messages that selected as a reviewer section ends 
      send_mail($pemail, $subject, $msg, $FORM_EMAIL,$FORM_EMAIL_PASS);
      set_message('
      <div class="notification-div">
                <div class="container" id="flash-message">
                <p class="alert alert-success alert-dismissible" id="message">Request sent Successfully</p>
                </div>
          </div>
      ');
      echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
    }
    else {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Something went wrong</p>
                  </div>
            </div>
        ');
        echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
    }
}else {
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">Already Requested</p>
              </div>
        </div>
    ');
    echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
}
        
}
}
// Select Reviewer Outside Section 


// Associate Editor Selection section starts here 
if(isset($_POST['select-associate-editor']))
{
    $usernameauthor = $_POST['authornameselect']; 
    // echo $usernameauthor;
    $sqlauthorselect = "SELECT primaryemail FROM author WHERE username = '$usernameauthor'";
    $resultauthorselect = mysqli_query($link,$sqlauthorselect);
    $fileauthorselect = mysqli_fetch_assoc($resultauthorselect);
    $pemail = $fileauthorselect['primaryemail']; 
    $associateeditor = 1;
    $assigndate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 0, date('Y')));

    $endingdate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 7, date('Y')));

      $sqlinsert="INSERT INTO editortable(paperid,username,primaryemail,assigndate,endingdate,associateeditor) VALUES('$paperid','$usernameauthor','$pemail','$assigndate','$endingdate','$associateeditor')";
      if(mysqli_query($link, $sqlinsert))
      {
              // Sending Messages that selected as a Editor section starts here.
              include '../mailmessage/editorselected.php';
              // Sending Messages that selected as a Editor section ends 
              send_mail($pemail, $subject, $msg, $FORM_EMAIL,$FORM_EMAIL_PASS);
              set_message('
              <div class="notification-div">
                        <div class="container" id="flash-message">
                        <p class="alert alert-success alert-dismissible" id="message">Editor requested Successfully</p>
                        </div>
                  </div>
              ');
              echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
      }
      else {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Something went wrong</p>
                  </div>
            </div>
        ');
        echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
      }
}
// Associate Editor selection section ends here 


// Academic  Editor Selection section starts here 

if(isset($_POST['select-academic-editor']))
{
    $usernameauthor = $_POST['authornameselect']; 
    // echo $usernameauthor;
    $sqlauthorselect = "SELECT primaryemail FROM author WHERE username = '$usernameauthor'";
    $resultauthorselect = mysqli_query($link,$sqlauthorselect);
    $fileauthorselect = mysqli_fetch_assoc($resultauthorselect);
    $pemail = $fileauthorselect['primaryemail']; 
    $academiceditor =1;
    $assigndate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 0, date('Y')));

    $endingdate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 7, date('Y')));

    $sqlinsert1="INSERT INTO editortable(paperid,username,primaryemail,assigndate,endingdate,academiceditor) VALUES('$paperid','$usernameauthor','$pemail','$assigndate','$endingdate','$academiceditor')";
      if(mysqli_query($link, $sqlinsert1))
      {
              // Sending Messages that selected as a Editor section starts here.
              include '../mailmessage/editorselected.php';
              // Sending Messages that selected as a Editor section ends 
              send_mail($pemail, $subject, $msg, $FORM_EMAIL,$FORM_EMAIL_PASS);
              set_message('
              <div class="notification-div">
                        <div class="container" id="flash-message">
                        <p class="alert alert-success alert-dismissible" id="message">Request sent Successfully</p>
                        </div>
                  </div>
              ');
              echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
      }
      else {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Something went wrong</p>
                  </div>
            </div>
        ');
        echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
      }
      
}

// Academic Editor Selection Ends Here 

$arrayusernamereviewershowing = array();
// Show Reviewer Selection section starts Here

$sqlrshowing = "SELECT reviewertable.id,reviewertable.paperid,reviewertable.username,reviewertable.action from reviewertable Where paperid='$paperid' and action IS NULL";
$queryrshowing = $dbh->prepare($sqlrshowing); 
$queryrshowing->execute(); 
$resultrshowing=$queryrshowing->fetchAll(PDO::FETCH_OBJ); 
$cnt=1;
if($queryrshowing->rowCount() > 0) 
{
foreach($resultrshowing as $resultr) 
{ 

$usernamereviewer = htmlentities($resultr->username);
array_push($arrayusernamereviewershowing,$usernamereviewer);
}}
// Show Reviewer Selection Section ends here 


$associateeditorshowing = array();
// Associate Editor showing section starts here
$sqlassociateeditor = "SELECT editortable.id,editortable.paperid,editortable.username,editortable.action,editortable.accepted,editortable.associateeditor from editortable Where paperid='$paperid' and action IS NULL and associateeditor IS NOT NULL";
$queryassociateeditor = $dbh->prepare($sqlassociateeditor); 
$queryassociateeditor ->execute(); 
$resultassociateeditor=$queryassociateeditor ->fetchAll(PDO::FETCH_OBJ); 
$cnt=1;

if($queryassociateeditor->rowCount() > 0) 
{
foreach($resultassociateeditor as $result) 
{ 
$usernameeditor = htmlentities($result->username);
array_push($associateeditorshowing,$usernameeditor);
}}
// Associate  Editor showing section ends here



$academiceditorshowing = array();
// Academic Editor showing section starts here
$sqlacademiceditor = "SELECT editortable.id,editortable.paperid,editortable.username,editortable.action,editortable.accepted,editortable.academiceditor from editortable Where paperid='$paperid' and action IS NULL  and academiceditor IS NOT NULL";
$queryacademiceditor = $dbh->prepare($sqlacademiceditor); 
$queryacademiceditor ->execute(); 
$resultacademiceditor=$queryacademiceditor ->fetchAll(PDO::FETCH_OBJ); 
$cnt=1;

if($queryacademiceditor->rowCount() > 0) 
{
foreach($resultacademiceditor as $result) 
{ 
$usernameeditor = htmlentities($result->username);
array_push($academiceditorshowing,$usernameeditor);
}}
// Academic Editor section ends here 


$arrayallusernameassociateeditor = array();
// Select All username of Associate Editor section
$sqlassociateeditor100 = "SELECT username FROM author where associateeditor IS NOT NULL";
$resultassociateeditor100 = mysqli_query($link,$sqlassociateeditor100);
$fileassociateeditor= mysqli_fetch_assoc($resultassociateeditor100);
    foreach($resultassociateeditor100 as $filerev) {
        array_push($arrayallusernameassociateeditor,$filerev['username']);
   }
// Select All Username of Associate Editor Section 

$arrayallusernameacademiceditor = array();
// Select All username of Academic Editor section starts here 
$sqlacademiceditor100 = "SELECT username FROM author where academiceditor IS NOT NULL";
$resultacademiceditor100 = mysqli_query($link,$sqlacademiceditor100);
$fileacademiceditor100 = mysqli_fetch_assoc($resultacademiceditor100);
    foreach($resultacademiceditor100 as $filerev) {
        array_push($arrayallusernameacademiceditor,$filerev['username']);
   }
// Select All Username of Academic Editor Section ends here 


$arrayallusername = array();
// Selecting All the username from the autor section starts here 
$sqlreviewer = "SELECT username FROM author where associateeditor IS  NULL and academiceditor IS  NULL and primaryemail!='$authormail'";
$resultreviewer = mysqli_query($link,$sqlreviewer);
$filereviewer = mysqli_fetch_assoc($resultreviewer);
    foreach($resultreviewer as $filerev) {
        array_push($arrayallusername,$filerev['username']);
   }
// Selecting All the username from the author section ends here


// Selecting Remaining Reviewer and Editor of the section starts here 
$emptyarray = array();
$resultreviewershown=array_diff($arrayallusername,$arrayusernamereviewershowing,$emptyarray);

$resultassociateeditorshown=array_diff($arrayallusernameassociateeditor,$associateeditorshowing,$emptyarray);

$resultacademiceditorshown=array_diff($arrayallusernameacademiceditor,$academiceditorshowing,$emptyarray);

// Selecting Remaining Reviewer and Editor of the section ends here

 
// Delete paper section starts here  
if(isset($_POST['deletepaperchiefeditor'])) { 
  $paperid=($_POST['paperiddelete']);
  $file1 = $_POST['filepathtitle'];
  $file2 = $_POST['filepathsecond']; 
  $file = $_POST['filepath'];
  $fileresubmit = $_POST['filepathresubmit'];

  // header("Location: " . $_SERVER["HTTP_REFERER"]);

  $sqldelete="DELETE FROM paper WHERE paperid='$paperid' ";
    // Delete Editor  section 
    $editoremail = array();
    $sqleditor = "SELECT editortable.id,editortable.paperid,editortable.primaryemail from editortable Where paperid='$paperid'";
    $queryeditor = $dbh->prepare($sqleditor); 
    $queryeditor ->execute(); 
    $resulteditor=$queryeditor->fetchAll(PDO::FETCH_OBJ); 
    $cnt=1;
 
    if($queryeditor->rowCount() > 0) 
    {
    foreach($resulteditor as $result) 
    { 
    $usernameeditor = htmlentities($result->paperid);
    array_push($editoremail,$usernameeditor);
    }}
    foreach($editoremail as $pp) {
        $selecteditor = "SELECT * FROM editortable where paperid='$pp'";
        $resulteditor= mysqli_query($link,$selecteditor);  
        $filerevpaper = mysqli_fetch_assoc($resulteditor);
        $filefeedback = $filerevpaper['feedbackfile'];
 
        unlink('../documents/review/'.$filefeedback);
        
        $sqlreditordelete="DELETE FROM editortable WHERE paperid= '$pp' ";
        mysqli_query($link, $sqlreditordelete);
    }
    // Delete Editor section 
  
        // Delete Reviewer  section 
        $revieweremail = array();
        $sqlreviewer = "SELECT reviewertable.id,reviewertable.paperid,reviewertable.primaryemail from reviewertable Where paperid='$paperid'";
        $queryreviewer = $dbh->prepare($sqlreviewer); 
        $queryreviewer ->execute(); 
        $resultreviewer=$queryreviewer ->fetchAll(PDO::FETCH_OBJ); 
        $cnt=1;
    
        if($queryreviewer->rowCount() > 0) 
        {
        foreach($resultreviewer as $result) 
        { 
        $usernameeditor = htmlentities($result->paperid);
        array_push($revieweremail,$usernameeditor);
        }}
        foreach($revieweremail as $pp) {
    
            $selectreviewer = "SELECT * FROM reviewertable where paperid='$pp'";
            $resultrevpaper= mysqli_query($link,$selectreviewer);  
            $filerevpaper = mysqli_fetch_assoc($resultrevpaper);
            $filefeedback = $filerevpaper['feedbackfile'];
    
            unlink('../documents/review/'.$filefeedback);
             
            $sqlreviewerdelete="DELETE FROM reviewertable WHERE paperid= '$pp' ";
            mysqli_query($link, $sqlreviewerdelete);
        } 
        // Delete Reviewer section
 
            $sqlselectchieffeedback="SELECT * FROM chieffeedback WHERE paperid='$paperid' ";
            $resultchieffeedback= mysqli_query($link,$sqlselectchieffeedback);  
            $filechieffeedback = mysqli_fetch_assoc($resultchieffeedback);
            $chieffilename = $filechieffeedback['file'];
            $sqlrchieffeedback="DELETE FROM chieffeedback WHERE paperid='$paperid' ";

            if(mysqli_query($link, $sqldelete)){
                mysqli_query($link, $sqlrchieffeedback);
                unlink($file1);
                unlink($file2 );
                unlink($file);
                unlink($fileresubmit);
                unlink('../documents/review/'.$chieffilename);
                set_message('
                <div class="notification-div">
                          <div class="container" id="flash-message">
                          <p class="alert alert-success alert-dismissible" id="message">Paper Deleted Success</p>
                          </div>
                    </div>
                ');
                echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
            } else{
                set_message('
                <div class="notification-div">
                          <div class="container" id="flash-message">
                          <p class="alert alert-warning alert-dismissible" id="message">Could not be able to execute</p>
                          </div>
                    </div>
                ');
                echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
            }
            // mysqli_close($link);
            }
       // Delete paper section ends here 

// -------------------Chiefeditor feedback section ---------------------------

if(isset($_POST['chief-update'])) {

  $paperid = $_POST['paperid'];
  $feedback = $_POST['reviewer-review'];
  $status = $_POST['status'];
  $feedbackdate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 0, date('Y')));

         // Full pdf if necessary info file section starts Here 
         $filereviewer = $_FILES['reviewerfile'];
         $namereviewer = $_FILES['reviewerfile']['name'];  
         $filetmpreviewer = $_FILES['reviewerfile']['tmp_name'];
         $typereviewer = $_FILES['reviewerfile']['type'];
         // Full pdf if necessary info  File section ends here 
        //  Unlink Previous file 
        $sqlprevious = "SELECT * from chieffeedback WHERE  paperid='$paperid'";

        $resultprevious = mysqli_query($link,$sqlprevious);
      
        $fileprevious = mysqli_fetch_assoc($resultprevious);
      
        $feedbackprevious = $fileprevious['file']; 

        if(!empty($status)) {
            $status = $_POST['status'];
        }
        else {
            $status = NULL;
        }

        $feedbackpreviouspath = '../documents/review/'.$fileprevious['file'];

        if (!empty($namereviewer)) {
          $namereviewer=$namereviewer;
          unlink($feedbackpreviouspath);
        }
        else {
          $namereviewer = $feedbackprevious;
        }
        // Unlink Previous file 

  $sqlreviewer="update chieffeedback set feedback='".escape($feedback)."',file='".escape($namereviewer)."',date='$feedbackdate',status='".escape($status)."' where paperid='$paperid'";

  if(mysqli_query($link, $sqlreviewer))
  {
    move_uploaded_file($filetmpreviewer,"../documents/review/".$namereviewer);
            // Sending Messages that selected as a Editor section starts here.
            include '../mailmessage/sendreview.php';
            // Sending Messages that selected as a Editor section ends  
            send_mail($authormail, $subject, $msg, $FORM_EMAIL,$FORM_EMAIL_PASS);
            set_message('
            <div class="notification-div">
                      <div class="container" id="flash-message">
                      <p class="alert alert-success alert-dismissible" id="message">Feedback sent Successfully</p>
                      </div>
                </div>
            ');
            echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
  }
  else {
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">Something went wrong</p>
              </div>
        </div>
    ');
    echo "<script type='text/javascript'> document.location = 'unpublishedpaper'; </script>";
  }
}
