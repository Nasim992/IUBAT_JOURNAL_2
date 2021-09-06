<?php 
     $TITLE = "Download Paper - IUBAT Review";
     include "../layout/toplayout_user.php";
     checkLoggedInOrNot($BASE_URL."layout/login");
     IsAcademicEditorLoggedIn($email,$BASE_URL."layout/login");
     include "../layout/navbar.php";
     include "../link/paperdownload.php";
?>
      
    <!-- Author showing header sections ends   -->
    <div id="mySidebar" class="sidebar">
        <?php  include '../layout/sidebar.php'; ?>
    </div>

    <div id="main">

<a href="#"><span class="openbtn" onclick="openNav()" id="closesign">☰</span></a>
<a href="javascript:void(0)" class="closebtn" id="closesignof" onclick="closeNav()">×</a>
<div class="container">

    <h4>DOWNLOAD THIS PAPER</h4>
    <hr class="bg-secondary">
    <!-- Dashboard section starts  -->
    <div class="jumbotron ">

        <h5 class="display-4">Name : <?php echo $papername; ?></h5>
        <h6 class="display-5">Author:<span style='color:goldenrod;'> <?php echo $name; ?></span></h6>

        <p style="font-size:14px;"><b>Abstract:</b><?php echo $abstract ?></p>
        <hr class="my-4">
        <div class="row">

            <?php  if(!empty($filename1)) { ?>
            <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4">
                <a style="font-size:14px;" class="btn btn-success btn-sm " href="<?php echo $filepathtitle; ?> "
                    target="_blank" role="button">Title and Abstract</a>
            </div>
            <?php }?>

            <?php  if(!empty($filename2)) { ?>
            <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4">
                <a style="font-size:14px;" class="btn btn-success btn-sm "
                    href="<?php echo $filepathsecond; ?> " target="_blank" role="button">Full Manuscript</a>
            </div>
            <?php }?>

            <?php if(!empty($filepath)) {?>
            <div class="col-sm-12 col-md-6 col-xl-4 col-lg-4">
                <a style="font-size:14px;" class="btn btn-success btn-sm " href="<?php echo $filepath; ?> "
                    target="_blank" role="button">Necessary Info</a>
            </div>
            <?php  }?>

        </div>
    </div>

    <!-- DashBoard Section ends  -->

</div>
</div>
</div>


<?php
     include "../layout/bottomlayout.php";
?>