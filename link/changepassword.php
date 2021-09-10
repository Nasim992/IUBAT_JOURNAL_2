<?php
session_start();
include 'config.php';
include 'functions.php';


// Change Author Password
if(isset($_POST['submit']))
{
$password=($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$authoremails =$_POST['authoremail'];
$confirmpassword = md5($_POST['confirmpassword']);

if($password !== $confirmpassword) {

$sqlpass="update author set password='".escape($newpassword)."' where primaryemail='$authoremails '";

if(mysqli_query($link,$sqlpass))
{
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-success alert-dismissible" id="message">Password Changed Successfully</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."author/changepassword");
}
else {
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">You entered wrong password Or,Your Current password cannot be your new password</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."author/changepassword");
}
}
else {
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">New password and confirm password doesnt match</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."author/changepassword");
}
} 



// Change Chiefeditor passwords
if(isset($_POST['submit_Chief']))
{
$password=($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$editoremail =$_POST['editoremail'];
$confirmpassword = md5($_POST['confirmpassword']);

if($password !== $confirmpassword) {

$sqlpass="update chiefeditor set password='".escape($newpassword)."' where email='$editoremail'";

if(mysqli_query($link,$sqlpass))
{
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-success alert-dismissible" id="message">Password Changed Successfully</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."chiefeditor/changepassword");
}
else {
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">You entered wrong password Or,Your Current password cannot be your new password</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."chiefeditor/changepassword");
}
}
else {
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">New password and confirm password doesnt match</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."chiefeditor/changepassword");
}
} 

// Change CAdmin Password
if(isset($_POST['submit_admin']))
{
$password=($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$editoremail =$_POST['editoremail'];
$confirmpassword = md5($_POST['confirmpassword']);

if($password !== $confirmpassword) {

$sqlpass="update admin set password='".escape($newpassword)."' where email='$editoremail'";

if(mysqli_query($link,$sqlpass))
{
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-success alert-dismissible" id="message">Password Changed Successfully</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."admin/changepassword");
}
else {
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">You entered wrong password Or,Your Current password cannot be your new password</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."admin/changepassword");
}
}
else {
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">New password and confirm password doesnt match</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."admin/changepassword");
}
} 

// Change ChiefEditor Password By Admin Password

if(isset($_POST['submit_change_chief']))
{
$newpassword=md5($_POST['newpassword']);
$editoremail =$_POST['editoremail'];
$confirmpassword = md5($_POST['confirmpassword']);

if($newpassword == $confirmpassword) {
$sqlpass="update chiefeditor set password='".escape($newpassword)."' where email='$editoremail'";
if(mysqli_query($link,$sqlpass))
{
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-success alert-dismissible" id="message">Password Changed Successfully</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."admin/changepasswordchief");
}
else {
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">You Entered wrong Password</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."admin/changepasswordchief");
}
}
else {
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">New password and confirm password doesnt match</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."admin/changepasswordchief");
}
}    