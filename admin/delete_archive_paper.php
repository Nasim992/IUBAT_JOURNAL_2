<?php 
session_start();
error_reporting(0);
include('../link/config.php');
include "../link/functions.php";

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
} 
 
$id=$_GET['id']; 

// Select Email From the Archive Table sections Starts Here 

        $sql = "SELECT * FROM archive WHERE paperid= '$id' ";
        $result = mysqli_query($link,$sql);
        $file = mysqli_fetch_assoc($result);
        $filename=$file['filename'];

$sql="DELETE FROM archive WHERE paperid= '$id' ";

if(mysqli_query($link, $sql)){
    unlink("../documents/archivefile/".$filename);
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-success alert-dismissible" id="message">Selected Paper Deleted Success</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."admin/archivepaper");
} else{ 
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-danger alert-dismissible" id="message">Something went wrong</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."admin/archivepaper");
}
 
// Close connection
header("Location: " . $_SERVER["HTTP_REFERER"]);
exit;
mysqli_close($link);
