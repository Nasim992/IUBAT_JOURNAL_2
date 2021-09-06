<?php
session_start();
include 'config.php';
include 'functions.php';
include '../mail_functions.php';

    //  Remove as a Editor section starts Here 
    if(isset($_POST['editor-remove'])) {
        $paperid = $_POST['paperid'];
        $username = $_POST['username'];
  
        $action = 1;
        $actionz= 0;
        $sqlremovereview="update editortable set action=$action where paperid='$paperid' and username='$username'";
  
        if(mysqli_query($link, $sqlremovereview))
        {
        echo "<script>alert('Editor of this paper removed.');</script>";
          header("refresh:0;url=editordetails");
          exit;
        }
        else {
            echo "<script>alert('Something went wrong');</script>";
            header("refresh:0;url=editordetails");
            exit;
        }
  
          }
           // Remove as  a Editor Section Ends Here 