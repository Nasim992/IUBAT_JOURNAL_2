<?php 

// Paper description showing section starts here 

//  Number of Feedback  count section starts here 
$queryreviewerpermits = "SELECT COUNT(*) as total_rows FROM reviewertable where paperid='$id' and permits IS NOT NULL";
$stmtpermits = $dbh->prepare($queryreviewerpermits);
$stmtpermits->execute();
$rowpermits = $stmtpermits->fetch(PDO::FETCH_ASSOC);
$reviewed = $rowpermits['total_rows'];                                    
// Number of Feedback count section ends here

// if (!empty($_POST['paperid'])) {
$id=$_POST['paperid'];
$sql = "SELECT * FROM paper WHERE paperid = '$id'";
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

// Resubmit file path section
$filepathresubmit ='../documents/resubmit/'.$file['resubmitpaper'];
$filepathresubmitname = $file['resubmitpaper'];
$fileresubmitdate = $file['resubmitdate'];
// Resubmit file path section 

$papername = $file['papername'];
$authormail = $file['authoremail'];
$abstract = $file['abstract'];
$numberofcoauthor = $file['numberofcoauthor'];

$uploaddate = $file['uploaddate'];

$maindate = date("d-M-Y",strtotime($uploaddate));

$cauname = unserialize($file['coauthorname']);

$action = $file['action'];

// Chief Feedback selection section 
$sqlchief = "SELECT * FROM chieffeedback WHERE  paperid='$id' ";

$resultchief = mysqli_query($link,$sqlchief ); 

$filechief = mysqli_fetch_assoc( $resultchief );

$status  =   $filechief['status'];

// Chief Feedback Selection section 

// Authorname selection starts here 
$sql1 = "SELECT * FROM author WHERE  primaryemail= '$authormail' ";

$result1 = mysqli_query($link,$sql1); 

$file1 = mysqli_fetch_assoc($result1);

$title = $file1['title'];
$fname= $file1['firstname'];
$middlename= $file1['middlename'];
$lastname= $file1['lastname'];

$authorname = $title.' '.$fname.' '.$middlename.' ' .$lastname;
// Authorname selection section ends here 

// Paper description showing section ends here 

$arrayusernamereviewershowing = array();
// Show Reviewer Selection section starts Here
$sqlrshowing = "SELECT reviewertable.id,reviewertable.paperid,reviewertable.username,reviewertable.action from reviewertable Where paperid='$id' and action IS NULL";
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

$arrayusernameeditorshowing = array();
// Editor showing section starts here here
$sqleshowing = "SELECT editortable.id,editortable.paperid,editortable.username,editortable.action from editortable Where paperid='$id' and action IS NULL";
$queryeshowing = $dbh->prepare($sqleshowing); 
$queryeshowing ->execute(); 
$resulteshowing=$queryeshowing ->fetchAll(PDO::FETCH_OBJ); 
$cnt=1;

if($queryeshowing->rowCount() > 0) 
{
foreach($resulteshowing as $result) 
{ 
$usernameeditor = htmlentities($result->username);
array_push($arrayusernameeditorshowing,$usernameeditor);
}}
// Editor showing section ends here


$associateeditorshowing = array();
// Associate Editor showing section starts here
$sqlassociateeditor = "SELECT editortable.id,editortable.paperid,editortable.username,editortable.action,editortable.accepted,editortable.associateeditor from editortable Where paperid='$id' and action IS NULL and associateeditor IS NOT NULL";
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
$sqlacademiceditor = "SELECT editortable.id,editortable.paperid,editortable.username,editortable.action,editortable.accepted,editortable.academiceditor from editortable Where paperid='$id' and action IS NULL  and academiceditor IS NOT NULL";
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

$arrayallusername = array();
// Selecting All the username from the autor section starts here 
$sqlreviewer = "SELECT username FROM author";
$resultreviewer = mysqli_query($link,$sqlreviewer);
$filereviewer = mysqli_fetch_assoc($resultreviewer);
    foreach($resultreviewer as $filerev) {
        array_push($arrayallusername,$filerev['username']);
  }
// Selecting All the username from the author section ends here

// Resubmit paper section starts here 
if(isset($_POST['resubmit']))
{ 
$paperidresubmit = $_POST['resubmit-paperid'];
$fileresubmit = $_FILES['fileresubmit'];
$nameresubmit = $_FILES['fileresubmit']['name'];
$filetmpresubmit = $_FILES['fileresubmit']['tmp_name']; 
$typeresubmit = $_FILES['fileresubmit']['type'];
$resubmitdate = date('Y-m-d', mktime(0, 0, 0, date('m'), date('d') + 0, date('Y')));
 $sqlresubmit="update paper set resubmitpaper='".escape($nameresubmit)."',resubmitdate='$resubmitdate' where paperid='$paperidresubmit'"; 
 if(mysqli_query($link, $sqlresubmit))
 {
    unlink($filepathresubmit);
    move_uploaded_file($filetmpresubmit,"../documents/resubmit/".$nameresubmit);
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-success alert-dismissible" id="message">Paper Resubmitted Successfully</p>
              </div>
        </div>
    ');
    echo "<script type='text/javascript'> document.location = '../author/paperstatus.php'; </script>";
 }
 else {
  set_message('
  <div class="notification-div">
            <div class="container" id="flash-message">
            <p class="alert alert-warning alert-dismissible" id="message">Paper is already Submitted</p>
            </div>
      </div>
  ');
  echo "<script type='text/javascript'> document.location = '../author/paperstatus.php'; </script>";
 }   
}
// Resubmit paper section ends here

// Delete paper section starts here  

if(isset($_POST['deletepaper'])) { 
$papid=($_POST['paperiddelete']);
$file1 = $_POST['filepathtitle']; 
$file2 = $_POST['filepathsecond']; 
$file = $_POST['filepath'];
$fileresubmit = $_POST['filepathresubmit'];

$sqldelete="DELETE FROM paper WHERE paperid='$papid' ";
// $sqleditortable="DELETE FROM editortable WHERE paperid='$papid' ";

// Delete Editor  section 
$editoremail = array();
$sqleditor = "SELECT editortable.id,editortable.paperid,editortable.primaryemail from editortable Where paperid='$papid'";
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

// $sqlreviewertable="DELETE FROM reviewertable WHERE paperid='$papid' ";

  // Delete Reviewer  section 
  $revieweremail = array();
  $sqlreviewer = "SELECT reviewertable.id,reviewertable.paperid,reviewertable.primaryemail from reviewertable Where paperid='$papid'";
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

$sqlselectchieffeedback="SELECT * FROM chieffeedback WHERE paperid='$papid' ";
$resultchieffeedback= mysqli_query($link,$sqlselectchieffeedback);  
$filechieffeedback = mysqli_fetch_assoc($resultchieffeedback);
$chieffilename = $filechieffeedback['file'];
$sqlrchieffeedback="DELETE FROM chieffeedback WHERE paperid='$papid' ";

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
          <p class="alert alert-success alert-dismissible" id="message">Paper Deleted Successfully</p>
          </div>
    </div>
');
redirect($BASE_URL."author/paperstatus");
} else{
  set_message('
  <div class="notification-div">
            <div class="container" id="flash-message">
            <p class="alert alert-warning alert-dismissible" id="message">Could not be able to execute!</p>
            </div>
      </div>
  ');
  echo "<script type='text/javascript'> document.location = '../author/paperstatus.php'; </script>";
}

} 
// Delete paper section ends here 

// -----------------------------------Edit paper Section ---------------------------------

if(isset($_POST['paper-update'])) { 
$paperid = $_POST['paperid'];
$papername = $_POST['papername-update']; 
$abstract = $_POST['abstract-update'];  

$sqleditpaper = "update paper set papername='".escape($papername)."',abstract='".escape($abstract)."' where paperid='$paperid'";

if(mysqli_query($link,  $sqleditpaper))
{
  set_message('
  <div class="notification-div">
            <div class="container" id="flash-message">
            <p class="alert alert-success alert-dismissible" id="message">Paper Updated Success</p>
            </div>
      </div>
  ');
  echo "<script type='text/javascript'> document.location = '../author/paperstatus.php'; </script>";
}
else {
  set_message('
  <div class="notification-div">
            <div class="container" id="flash-message">
            <p class="alert alert-warning alert-dismissible" id="message">Already Updated</p>
            </div>
      </div>
  ');
  echo "<script type='text/javascript'> document.location = '../author/paperstatus.php'; </script>";
}

}
// -----------------------------------Edit paper Section ---------------------------------

