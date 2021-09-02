<?php 
if($link === false){
    die("ERROR: Could not connect. " .mysqli_connect_error());
}
if (!empty($_GET['id'])) {
$id=$_GET['id'];
}
if(empty($id)){
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">ID not Found</p>
              </div>
        </div>
    ');
    echo "<script type='text/javascript'> document.location = '../chiefeditor/publishedpaper'; </script>";
}
// Selecting paper section starts here 
$sql = "SELECT * FROM paper WHERE paperid = '$id' ";

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

$uploaddatestring = $file['uploaddate'];

$maindate = date('d-M-Y',strtotime($uploaddatestring));

// Selecting paper section ends here 

// Selecting authorname section starts here 
$sql = "SELECT * FROM author WHERE  primaryemail= '$authormail' ";

$result1 = mysqli_query($link,$sql); 

$file1 = mysqli_fetch_assoc($result1);

$title = $file1['title'];
$fname= $file1['firstname'];
$middlename= $file1['middlename'];
$lastname= $file1['lastname'];

$name = $title.' '.$fname.' '.$middlename.' ' .$lastname;
// Selecting authorname section starts here 