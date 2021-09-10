<?php
session_start();
include 'config.php';
include 'functions.php';

 // Associate Editor 
 if(isset($_POST['select-associateeditor'])) {

    $pemail = $_POST['pemail'];

    $sqlquthor = "UPDATE author SET associateeditor=1,academiceditor=NULL,reviewerselection=NULL WHERE primaryemail='$pemail'";
    if(mysqli_query($link, $sqlquthor)){
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-success alert-dismissible" id="message">Associate Editor Selected Success</p>
                  </div>
            </div>
        ');
       // redirect($BASE_URL."chiefeditor/selecteditor");
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    else {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Something Went Wrong</p>
                  </div>
            </div>
        ');
      //  redirect($BASE_URL."chiefeditor/selecteditor");
      header("Location: " . $_SERVER["HTTP_REFERER"]);
     }
    }


// Associate Editor 

// Academic Editor 
if(isset($_POST['select-academiceditor'])) {

    $pemail = $_POST['pemail'];

    $sqlquthor = "UPDATE author SET academiceditor=1,associateeditor=NULL,reviewerselection=NULL WHERE primaryemail='$pemail'";
    if(mysqli_query($link, $sqlquthor)){
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-success alert-dismissible" id="message">Academic Editor Selected Success</p>
                  </div>
            </div>
        ');
       // redirect($BASE_URL."chiefeditor/selecteditor");
       header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
    else {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Something Went Wrong</p>
                  </div>
            </div>
        ');
      //  redirect($BASE_URL."chiefeditor/selecteditor");
      header("Location: " . $_SERVER["HTTP_REFERER"]);
     }
    }


// Academic Editor 

// Author
if(isset($_POST['select-author'])) {

    $pemail = $_POST['pemail'];

    $sqlquthor = "UPDATE author SET academiceditor=NULL,associateeditor=NULL WHERE primaryemail='$pemail'";
    if(mysqli_query($link, $sqlquthor)){
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-success alert-dismissible" id="message">Author Selected Success</p>
                  </div>
            </div>
        ');
      //  redirect($BASE_URL."chiefeditor/selecteditor");
      header("Location: " . $_SERVER["HTTP_REFERER"]);
     }
    else {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Something Went Wrong</p>
                  </div>
            </div>
        ');
       // redirect($BASE_URL."chiefeditor/selecteditor");
       header("Location: " . $_SERVER["HTTP_REFERER"]);
     }

 }
 // Author