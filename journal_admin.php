<?php 
     $TITLE = "IUBAT Review -ADMIN";
     include "layout/toplayout.php";
     include "layout/navbar.php";
?>

<div style="font-size:17px; font-weight:bold;" class="container form-control-login">
            <div class="row pt-2">
<!-- --------------------------------Instructions for authors ----------------------------------------------------   -->
            <div  class="col-sm-12 col-md-12 col-lg-6 col-xl-6 instruction__fontsize text-justify">
                    <h4 class="text-center"><b>Instructions for Admin </b></h4>
                    <p style="font-size:20px;color:red;"><b>Important Note:</b>Don't Forget your password.No System Available for resetting password for admin</p>
           
                </div>
<!-- --------------------------------Instructions for authors ----------------------------------------------------   -->

<!-- ------------------------------Log in form/Sign in form ------------------------------------------------------------ -->
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 pt-4 ">
                    <div id="logreg-forms">
                        <form class="form-signin marginbtm" action="link/login.php" method="post"> 
                            <div class="logo-container">
                                <i style="font-size:35px;color:#17a2b8;" class="fas fa-users logo"></i>
                            </div>
                            <h3 class="h3 mb-3 font-weight-normal"
                                style="text-align: center;font-size:18px; padding:5px;"><b> SIGN IN</b></h3>
                            <div class="social-login">     
                            </div>
                            <?php  display_message(); ?>
                            <input style="font-size:16px;" type="email" id="inputEmail" class="form-control" name="input-email" placeholder="Email address" required="">
                            <input style="font-size:16px;" type="password" id="inputPassword"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" name="input-password" class="form-control" placeholder="Password" required>
                          <?php if(empty($email)) {  ?>
                                <div>
                                    <button class="btn btn-info btn-block" name="admin-login" type="submit">Admin</button>
                                </div>
                            <?php }else {
                                echo "<p class='alert alert-warning'>Logged out first then try to logged in again</p>";
                            } ?>
                        </form>
<!-- ------------------------------Log in form ------------------------------------------------------------ -->
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="pb-5"></div>
        <div class="pb-5"></div>
        <div class="pb-5"></div>

<?php 
     include "layout/footer.php";
     include "layout/bottomlayout.php";
?>