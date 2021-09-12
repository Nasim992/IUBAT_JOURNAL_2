<?php 
     $TITLE = "Change Password - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAuthorLoggedIn($email,$BASE_URL."layout/login");
     include "../layout/navbar.php";
     $authoremail = $email;
?>

<head>
<style>
    @media only screen and (max-width: 992px) {
        form {
            margin-left: 0px !important;
            margin-right: 0px !important;
        }
    }
    form {

        padding: 20px;
        margin-top: 20px;
        margin-left: 200px;
        margin-right: 200px;
        border: 2px solid #e3e3e3;
        font-size: 14px;

    }
    </style>

</head>

<div id="mySidebar" class="sidebar">
        <?php  include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">

        <a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
        <a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
        <div class="container">
            <?php display_message(); ?>
            <h6>CHANGE YOUR PASSWORD</h6>
            <hr class="bg-secondary">

            <form class="change-password-form" action="../link/changepassword.php" method="post">
                <input type="hidden" name="authoremail" value="<?php  echo $authoremail;?>">
                <div class="form-group has-success">
                    <label for="success" class="control-label">Current Password</label>
                    <div class="">
                        <input type="password" name="password" class="form-control"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                            required="required" id="success" placeholder="Enter Old Password">
                    </div>
                </div>
                <div class="form-group has-success">
                    <label for="success" class="control-label">New Password</label>
                    <div class="">
                        <input type="password" name="newpassword" required="required"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                            class="form-control" id="success" placeholder="Enter New Password">
                    </div>
                </div>
                <div class="form-group has-success">
                    <label for="success" class="control-label">Confirm Password</label>
                    <div class="">
                        <input type="password" name="confirmpassword" class="form-control"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                            required="required" id="success" placeholder="Enter New Password Again">
                    </div>
                </div>
                <div class="form-group has-success">

                    <div class="d-flex justify-content-between mt-5">
                        <div>

                        </div>
                        <div>
                            <button type="submit" name="submit"
                                class="btn btn-success btn-sm btn-block float-right">Change password</button>
                        </div>

                    </div>
            </form>
        </div>
    </div>


<?php
     include "../layout/bottomlayout.php";
?>