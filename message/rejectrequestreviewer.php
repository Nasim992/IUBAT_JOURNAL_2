<?php
ob_start();
session_start(); 
error_reporting(0); 
include "../link/config.php";
include "../link/functions.php";
include "../mail_functions.php";
 

if($_SERVER['REQUEST_METHOD'] == "GET") {            
    if(isset($_GET['paperid']) and isset($_GET['email'])){               
        $paperid = clean($_GET['paperid']);
        $email = clean($_GET['email']);
        $sql = "SELECT * FROM reviewertable WHERE primaryemail = '".escape($_GET['email'])."' AND paperid ='".escape($_GET['paperid'])."' ";
        $result = query($sql); 
        confirm($result);           
        if(row_count($result) ==1) {           
        $sql2 = "DELETE FROM reviewertable WHERE primaryemail ='".escape($email)."' AND paperid ='" .escape($paperid) ."' ";
        $result2 = query($sql2);
        confirm($result2);           
        set_message("<p class='bg-danger text-white p-2 text-center'>Your are Reject the Invitation.For giving feedback ask admin</p>");    
        redirect($BASE_URL."layout/login");         
      } else {
          set_message("<p class='bg-danger text-white p-2 text-center'>You Are not Accepted any Invitation</p>");    
          redirect($BASE_URL."layout/login");   
      }    
    }
}      