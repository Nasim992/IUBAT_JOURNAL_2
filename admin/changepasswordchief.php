<?php 
     $TITLE = "Change Password Chief- IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAdminLoggedIn($email,$BASE_URL."layout/login");
     $editoremail = $email;
     include "../layout/navbar.php";
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

 <!-- Author showing header sections ends   -->
    <div id="mySidebar" class="sidebar">
        <?php  include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">
        <a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
        <a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
        <div class="container">
            <?php display_message(); ?>
            <h6>CHANGE CHIEF EDITOR PASSWORD</h6>
            <hr class="bg-secondary">
            <form class="change-password-form" action="../link/changepassword.php" method="post">
                <div class="form-group has-success">
                    <?php 
                         $sql = "SELECT email FROM chiefeditor";
                         $result = mysqli_query($link,$sql);
                         $file = mysqli_fetch_assoc($result);
                         $emailChief=$file['email'];
                    ?>
                        <input type="hidden" name="editoremail" value="<?php  echo $emailChief;?>">
                </div>
                <div class="form-group has-success">
                    <label for="success" class="control-label">New Password</label>
                    <div class="">
                        <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                            name="newpassword" required="required" class="form-control" id="success"
                            placeholder="Enter New Password">
                    </div>
                </div>
                <div class="form-group has-success">
                    <label for="success" class="control-label">Confirm Password</label>
                    <div class="">
                        <input type="password" name="confirmpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
                            class="form-control" required="required" id="success"
                            placeholder="Enter New Password Again">
                    </div>
                </div>
                <div class="form-group has-success">
                    <button type="submit" name="submit_change_chief" class="btn btn-success btn-sm  ">Change password</button>
            </form>

            <div class="mb-5"></div>
        </div>
    </div>

<?php
     include "../layout/bottomlayout.php";
?>