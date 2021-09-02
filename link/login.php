<?php
session_start();
include 'config.php';
include 'functions.php';
include '../mail_functions.php';
// Author Login Form - Login
if(isset($_POST['author-login'])) {

$email = $_POST['input-email']; 
$password=md5($_POST["input-password"]); 
$_SESSION["email"]=$_POST['input-email'];
$sql ="SELECT primaryemail,password,activation FROM author WHERE primaryemail=:email and password=:password";
$query= $dbh -> prepare($sql); 
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();  

$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0) 
{
$_SESSION['alogin']=$_POST['input-email'];
set_message('
<div class="notification-div">
          <div class="container" id="flash-message">
          <p class="alert alert-success alert-dismissible" id="message">Logged in Success</p>
          </div>
    </div>
');
redirect($BASE_URL."author/");
} else{ 
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-warning alert-dismissible" id="message">Logged in Fail.If dont have any account please sign up</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."layout/login");
}
}

// Reviewer Login Form - Login
if(isset($_POST['reviewer-login'])) {

    $email = $_POST['input-email'];
    $password=md5($_POST["input-password"]); 
    $_SESSION["email"]=$_POST['input-email'];
    // Checking that reviewer is selected or not 
    $sql ="SELECT primaryemail,password,reviewerselection FROM author WHERE primaryemail=:email and password=:password and reviewerselection=1";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();   
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    // Checking that reviewer is selected or not

    if($query->rowCount() > 0) 
    {
    $_SESSION['alogin']=$_POST['input-email'];
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-success alert-dismissible" id="message">Logged in Success</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."reviewer");
    } else{ 
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Logged in Fail.You are not selected as a reviewer</p>
                  </div>
            </div>
        ');
        redirect($BASE_URL."layout/login");
    }
    }

// Reviewer Login Form - Login
if(isset($_POST['editor-login'])) {
    $email = $_POST['input-email'];
    $password=md5($_POST["input-password"]); 
    $_SESSION["email"]=$_POST['input-email'];

    // Admin 
    $sql ="SELECT email,password FROM admin WHERE email=:email and password=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute(); 

    $results=$query->fetchAll(PDO::FETCH_OBJ);
 
    if($query->rowCount() > 0)
    { 
    $_SESSION['alogin']=$_POST['input-email'];
    set_message('
    <div class="notification-div">
              <div class="container" id="flash-message">
              <p class="alert alert-success alert-dismissible" id="message">Logged in Success</p>
              </div>
        </div>
    ');
    redirect($BASE_URL."admin");
    }else {
    // Admin
    // Chiefeditor 
    $sql ="SELECT chiefeditor.id,chiefeditor.fullname,chiefeditor.password,chiefeditor.contact FROM chiefeditor WHERE email=:email and password=:password";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':password', $password, PDO::PARAM_STR); 
        $query-> execute();  
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0)
        {
            $_SESSION['alogin']=$_POST['input-email'];
            set_message('
            <div class="notification-div">
                      <div class="container" id="flash-message">
                      <p class="alert alert-success alert-dismissible" id="message">Logged in Success</p>
                      </div>
                </div>
            ');
            redirect($BASE_URL."chiefeditor/");
       }
       else {
    // Chiefeditor 
        $sql ="SELECT author.id,author.primaryemail,author.password,author.associateeditor,author.academiceditor FROM author WHERE primaryemail=:email and password=:password";
        $query= $dbh -> prepare($sql);
        $query-> bindParam(':email', $email, PDO::PARAM_STR);
        $query-> bindParam(':password', $password, PDO::PARAM_STR); 
        $query-> execute();  
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        if($query->rowCount() > 0)
        {
        // Selecting Associate Editor and Academic Editor
        foreach($results as $result) {
            $associateeditor = htmlentities($result->associateeditor);
            $academiceditor = htmlentities($result->academiceditor);
            if($associateeditor==1) {
                $_SESSION['alogin']=$_POST['input-email'];
                set_message('
                <div class="notification-div">
                          <div class="container" id="flash-message">
                          <p class="alert alert-success alert-dismissible" id="message">Logged in Success</p>
                          </div>
                    </div>
                ');
                redirect($BASE_URL."associateeditor");
            }
            else if($academiceditor==1) {
                $_SESSION['alogin']=$_POST['input-email']; 
                set_message('
                <div class="notification-div">
                          <div class="container" id="flash-message">
                          <p class="alert alert-success alert-dismissible" id="message">Logged in Success</p>
                          </div>
                    </div>
                ');
                redirect($BASE_URL."academiceditor");
            }
            else {
                set_message('
                <div class="notification-div">
                          <div class="container" id="flash-message">
                          <p class="alert alert-warning alert-dismissible" id="message">Logged in Fail.You are not selected as a Editor</p>
                          </div>
                    </div>
                ');
                redirect($BASE_URL."layout/login");
            }
        }
     // Selecting Associate Editor and Academic Editor
    } else{ 
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Logged in Fail.You are not selected as a Editor</p>
                  </div>
            </div>
        ');
        redirect($BASE_URL."layout/login");
    }
    }
}
}





// Registration Form 
if(isset($_POST['sign-up'])){
    $username=$_POST['pemail'];
    $title=$_POST['title'];
    $firstname=$_POST['firstName'];
    $middlename=$_POST['middleName'];  
    $lastname=$_POST['lastName'];
    $pemail=$_POST['pemail'];
    $pemailAgain=$_POST['pemailAgain'];
    $pemailcc=$_POST['pemail'];
    $semail=$_POST['semail'];
    $semailcc=$_POST['semail'];
    $userpassword=md5($_POST['user-password']);
    $repeatpassword=md5($_POST['repeat-password']);
    $contact=$_POST['user-contact'];
    $address=$_POST['user-address'];

    // Adding Reviewer username on the reviewertable(When seding reviewer request through email)  
    $revieweremail = array();
    $sqlreviewer = "SELECT reviewertable.id,reviewertable.paperid,reviewertable.primaryemail from reviewertable Where primaryemail='$pemail'";
    $queryreviewer = $dbh->prepare($sqlreviewer); 
    $queryreviewer ->execute(); 
    $resultreviewer=$queryreviewer ->fetchAll(PDO::FETCH_OBJ); 
    $cnt=1;

    if($queryreviewer->rowCount() > 0)   
    {
    foreach($resultreviewer as $result) 
    { 
    $usernameeditor = htmlentities($result->primaryemail);
    array_push($revieweremail,$usernameeditor);
    }}
    if (!empty($revieweremail)) {
    foreach($revieweremail as $pp) {
        $selectreviewerupdate = "UPDATE reviewertable set username='$username' where primaryemail='$pp'";
        mysqli_query($link,$selectreviewerupdate);  
    }
    }
    // Adding Reviewer username on the reviewertable(When sending reviewer request through email)

    $validation_code = md5($username . microtime()); 
    
    if(is_author_available($pemail)>0) {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">"This email is already is in use.Try different email or Logged in your account"</p>
                  </div>
            </div>
        ');
        redirect($BASE_URL."layout/login");
    }else
    {
    $sql="INSERT INTO  author(username,title,firstname,middlename,lastname,primaryemail,primaryemailcc,secondaryemail,secondaryemailcc,password,contact,address,validation_code) VALUES(:username,:title,:firstname,:middlename,:lastname,:pemail,:pemailcc,:semail,:semailcc,:userpassword,:contact,:address,:validation_code)";

    $query = $dbh->prepare($sql);

    $query->bindParam(':username',$username,PDO::PARAM_STR);
    $query->bindParam(':title',$title,PDO::PARAM_STR);
    $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
    $query->bindParam(':middlename',$middlename,PDO::PARAM_STR);
    $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
    $query->bindParam(':pemail',$pemail,PDO::PARAM_STR);
    $query->bindParam(':pemailcc',$pemailcc,PDO::PARAM_STR);
    $query->bindParam(':semail',$semail,PDO::PARAM_STR);
    $query->bindParam(':semailcc',$semailcc,PDO::PARAM_STR);
    $query->bindParam(':userpassword',$userpassword,PDO::PARAM_STR);
    $query->bindParam(':contact',$contact,PDO::PARAM_STR);
    $query->bindParam(':address',$address,PDO::PARAM_STR);
    $query->bindParam(':validation_code',$validation_code,PDO::PARAM_STR);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0) 
    {
        if (!empty($revieweremail)) {
                $selectreviewerselection = "UPDATE author set reviewerselection=1 where primaryemail='$pemail'";
                mysqli_query($link,$selectreviewerselection);  
            }
                // Activation Link sending Messages starts here
                include '../mailmessage/accountactivation.php'; 
                // Activation Link sending Messages section ends here                  
                send_mail($pemail, $subject, $msg,$FORM_EMAIL,$FORM_EMAIL_PASS);
                set_message('
                <div class="notification-div">
                          <div class="container" id="flash-message">
                          <p class="alert alert-success alert-dismissible" id="message">Activation link sent to your email.$pemail</p>
                          </div>
                    </div>
                ');
                redirect($BASE_URL."layout/login");
    } else{
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Already Account Exists,Try to logged in or try resetting password</p>
                  </div>
            </div>
        ');
        redirect($BASE_URL."layout/login");
    }     
    }
}

// Forgot Password

if(isset($_POST['rsubmit']))  {
    $pemail = $_POST['remail'];
    $validation_code_password = md5($pemail . microtime()); 
    // Reseting link sending mail section starts here.
    include '../mailmessage/resetpasswordmessage.php';
    // Reseting link sending mail section ends here 
    //  Check that the email is available or not in the database
    $sql = "SELECT author.id,author.username,author.primaryemail,author.password,author.contact from author where primaryemail='$pemail'"; 
    $query = $dbh->prepare($sql); 
    $query->execute(); 
    $results=$query->fetchAll(PDO::FETCH_OBJ);  
    $cnt=1;
    if($query->rowCount() > 0) 
    {
        // Update password validation code
        $sqlUpdateValidationCode ="UPDATE author set validation_code='$validation_code_password' where primaryemail='$pemail'";
        mysqli_query($link,$sqlUpdateValidationCode);  
        // Update Password validation code 

    // Check that the email is available or not in the database
    if(send_mail($pemail, $subject, $msg,$FORM_EMAIL,$FORM_EMAIL_PASS)) {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-success alert-dismissible" id="message">Reset Password link is sent to your email</p>
                  </div>
            </div>
        ');
        redirect($BASE_URL."layout/login");
    }
    else {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Already Account Exists,Try to logged in or try resetting password</p>
                  </div>
            </div>
        ');
        redirect($BASE_URL."layout/login");
        }
    }else
    {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Already Account Exists,Try to logged in or try resetting password</p>
                  </div>
            </div>
        ');
        redirect($BASE_URL."layout/login");
    }
}