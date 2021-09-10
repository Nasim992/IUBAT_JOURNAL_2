<?php 
     $TITLE = "Update Profile - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAdminLoggedIn($email,$BASE_URL."layout/login");
     $editoremail = $email;
     include "../layout/navbar.php";
     $results = all_by_SPECIFIC_ID($ADMIN_DB,"email",$editoremail);
?>
<head>
    <style>
            form input {
        font-size: 16px !important;
    }
    </style>
</head>
 <!-- Author showing header sections ends   -->
    <div id="mySidebar" class="sidebar">
        <?php  include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">
        <!-- <a href="#"><span class="resbtn"onclick="openNav()" id="closesign">☰</span></a> -->
        <a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
        <a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
        <div class="container">
        <?php echo display_message(); ?>
            <h6>UPDATE PROFILE</h6>
            <hr class="bg-success">

            <!-- Update Profile section starts here  -->
            <?php  foreach($results as $result) { 
            ?>
            <form class="form-signup marginbtm" action="../link/updateprofile.php" method="post">

                <input style="font-size:11px;" type="hidden" id="editoremails" class="form-control" name="editoremails" placeholder="Email" value="<?php echo  $editoremail ;?>">

                <input style="font-size:11px;" type="text" id="pemail" class="form-control" name="fullname" placeholder="Fullname" required="" value="<?php echo returnSingleValue($ADMIN_DB,"fullname","email",$editoremail); ?>">

                <input style="font-size:11px;" type="email" id="user-name" class="form-control" name="email" placeholder="Email" required="" value="<?php echo   $editoremail ;?>">

                <input style="font-size:11px;" type="text" id="user-name" class="form-control" name="contact" placeholder="Secondary Email Address" required="" value="<?php echo returnSingleValue($ADMIN_DB,"contact","email",$editoremail); ?>">

                <button name="updateadmin" class="btn btn-sm btn-primary btn-block" type="submit"><i class="fas fa-user-plus"></i> UPDATE</button>
            </form>
            <?php  } ?>
            <!-- Update profile section ends here  -->


        </div>
    </div>


<?php
     include "../layout/bottomlayout.php";
?>