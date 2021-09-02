<?php
session_start();
include 'config.php';
include 'functions.php';

    //   Update Author Profile Section starts here  
    if(isset($_POST['updateauthor']))
    { 
    // $username=$_POST['userName'];
    $title=$_POST['title'];
    $firstname=$_POST['firstName'];
    $middlename=$_POST['middleName'];
    $lastname=$_POST['lastName'];
    $pemail=$_POST['pemail'];
    $pemailcc=$_POST['pemailcc'];
    $semail=$_POST['semail'];
    $semailcc=$_POST['semailcc'];
    $contact=$_POST['user-contact'];
    $address=$_POST['user-address']; 

    $sqlauthorupdate = "update author set title='$title',firstname='$firstname',middlename='$middlename',lastname='$lastname',primaryemailcc='$pemailcc',secondaryemail='$semail',secondaryemailcc='$semailcc',contact='$contact',address='$address' where primaryemail='$pemail'";

    if(mysqli_query($link,$sqlauthorupdate)) {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-success alert-dismissible" id="message">Profile Updated Successfully</p>
                  </div>
            </div>
        ');
        redirect($BASE_URL."author/updateprofile");
  } 
  else {
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">Something went Wrong !</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."author/updateprofile");
  }
  }

