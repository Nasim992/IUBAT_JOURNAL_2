<?php
ob_start();
session_start(); 
error_reporting(0); 
include "../link/config.php";
include "../link/functions.php";
include "../mail_functions.php";
 
if($_SERVER['REQUEST_METHOD'] == "GET") { 
    if(isset($_GET['email'])){
         $email = clean($_GET['email']);
         $validation_code = clean($_GET['code']);    

         $sql = "SELECT * FROM author WHERE primaryemail = '".escape($_GET['email'])."' AND validation_code ='".escape($_GET['code'])."' ";
         $result = query($sql); 
         confirm($result);
         if(row_count($result) ==1) {
         $sql2 = "UPDATE author SET activation =1, validation_code = 0 WHERE primaryemail ='".escape($email)."' AND validation_code ='" .escape($validation_code) ."' ";
         $result2 = query($sql2);
         confirm($result2);
         set_message("<p class='bg-success text-white p-2 text-center'>Your Account has been activated please login </p>");
        // echo "<script type='text/javascript'> document.location = '../layout/login'; </script>";
         redirect($BASE_URL."layout/login");
         } else {
             set_message("<p class='bg-danger text-white p-2 text-center'>Something went wrong. Sorry! Your account is not activated</p>");
             redirect($BASE_URL."layout/login");
               }               
             }
 }