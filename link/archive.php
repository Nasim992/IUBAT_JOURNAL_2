<?php
 if(isset($_POST['submit']))
 { 
 $paperid = $_POST['paperid'];
 $papername = $_POST['papername'];
 $authorname = $_POST['authorname'];
 $abstract = $_POST['abstract'];
 $publisheddate =  $_POST['publisheddate'];
 $versionyear = date("Y",strtotime($publisheddate));
 $versionissue= intval($versionyear);

 // Full pdf if necessary info file section starts Here 
 $file = $_FILES['file'];
 $name = $_FILES['file']['name'];
 $filetmp = $_FILES['file']['tmp_name'];
 $type = $_FILES['file']['type']; 
  // Full pdf if necessary info  File section ends here

  $sqlarchive="INSERT INTO  archive(versionissue,paperid,papername,authorname,abstract,filename,publisheddate) VALUES('$versionissue','$paperid','".escape($papername)."','$authorname','".escape($abstract)."','$name','$publisheddate')";

  if( mysqli_query($link,$sqlarchive))
  {
    move_uploaded_file($filetmp,"../documents/archivefile/".$name);
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-success alert-dismissible" id="message">Paper Uploaded Success</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."admin/archivepaper");
  } else{
      
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">Invalid Details or Your paper has already been uploaded</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."admin/archive");
   }   
 }