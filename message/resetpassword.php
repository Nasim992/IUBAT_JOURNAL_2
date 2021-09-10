<?php 
     $TITLE = "Paper Details - IUBAT Review";
     include "../layout/toplayout_user.php";
     include "../layout/navbar.php";

     $email = $_GET['email'];
     $password_token =$_GET['token'];
     // Reset-Password section starts here 
     if(isset($_POST['change-submit']))  
     {
         $pemail = $_POST['remail'];
         $password = md5($_POST['rpassword']);
         $passwordconf = md5($_POST['rpasswordconf']);
  
         if($password !== $passwordconf) {
            set_message('
            <div class="notification-div">
                      <div class="container" id="flash-message">
                      <p class="alert alert-warning alert-dismissible" id="message">Password Does not match properly</p>
                      </div>
                </div>
            ');
          header("Location: " . $_SERVER["HTTP_REFERER"]);
         }
         else {
 
     // Change Password Section Starts Here 
     $sql="update author set password='".escape($password)."',validation_code='0' where primaryemail='$pemail' and validation_code='$password_token'";
 
     if(query($sql)) {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-success alert-dismissible" id="message">Password Changed Successfully</p>
                  </div>
            </div>
        ');
        redirect($BASE_URL."layout/login");
 
     }else
     {
        set_message('
        <div class="notification-div">
                  <div class="container" id="flash-message">
                  <p class="alert alert-warning alert-dismissible" id="message">Password Does not match properly</p>
                  </div>
            </div>
        ');
      header("Location: " . $_SERVER["HTTP_REFERER"]);
     }
         }
     }
?>
 <?php display_message(); ?>
 <div style="font-size:14px; font-weight:bold;" class="container form-control-login">
        <div class="row pt-5">
            <div id="logreg-forms">
                <form class="form-signin marginbtm" method="post">
                    <div class="logo-container">
                        <img src="images/forgotpass.png" alt="">
                    </div>
                    <input style="font-size:13px;" type="hidden" id="inputEmail" class="form-control" name="remail"
                        placeholder="" value="<?php echo $email;  ?>">

                    <input style="font-size:13px;" type="password" id="inputPassword"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="rpassword" class="form-control"
                        placeholder="Enter New password" required>

                    <input style="font-size:13px;" type="password" id="inputPassword"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="rpasswordconf" class="form-control"
                        placeholder="Enter New password again" required>

                    <button class="btn btn-success btn-sm btn-block" name="change-submit" type="submit"> Change
                        password</button>
                    <div class="pb-5"></div>
            </div>
        </div>
    </div>
<div class="p-5"></div>
<?php
     include "../layout/footer.php";
     include "../layout/bottomlayout.php";
?>